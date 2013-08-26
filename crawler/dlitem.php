<?php
require_once('config.php');
//设置变量
define('S_PWD', dirname(__FILE__)); //使用crawler_lib必须定义该变量
$scriptname = basename($argv[0]);
$script = substr($scriptname, 0, -4);
$date = date('Y-m');
$logfile = "$logpath/{$script}.log";
$pagelog = "$logpath/corpmarket.log";
$itemlog = "$logpath/corpmarket_item.log";
$histlog = "$logpath/hist_item.log";

$start_page = (int)file_get_contents($pagelog);
if($start_page=='') $start_page=1;
$num = 1;

$hist_num = 0;
$histarr = load_hist_file($histlog);

foreach($listmcat as $pages=>$itemurl)
{
    $hist_num++;
    if(in_array($hist_num, $histarr))
    {
        continue;
    }
    
    for($i=$start_page;$i<=$pages;$i++)
    {
        $pageno = sprintf($itemurl,$i);
        while ($retry){
            $content = get_page($pageno);
            if($content)
            {
                if(preg_match('/<ul class="list-info">(.*?)<\/ul>/is',$content,$mactch))
                {
                    $itemlist_content = $mactch[1];
                    if(preg_match_all('/<h2>\s+<a href="(.*?)"[^>]*>/',$itemlist_content,$matchlist))
                    {
                        $urllist = $matchlist[1];

                        $break_itemno =  0;//统计断点用
                        $break_itemno = file_get_contents($itemlog);
                        //if($break_itemno == 20) break;
                        file_put_contents($pagelog, $i);
                        $numno=0;
                        foreach($urllist as $url)
                        {
                            $numno++;
                            if($numno < $break_itemno && $break_itemno<20){
                                continue;
                            }

                            if(crawler($url))
                            {
                                $num++;
                                file_put_contents($itemlog,$numno);
                            }
                            else
                            {
                                file_put_contents($itemlog,$numno);
                            }
                        }
                        break;
                    }
                }
                else if(preg_match('/mysql_connect/si', $content))
                {
                    sleep(600);
                }
                else
                {
                    _log("Error: Pagelist get $url failed, the web mysql error sleep($interval)");
                }
            }
            else
            {
                _log("warn: Pagelist get $url failed, sleep($interval) and retry($retry)...");
            }

            sleep($interval);
            --$retry;
        }

        if($retry == 0)
        {
            _log("err: reach max retry. get $pageno failed, return");
            file_put_contents($itemlog, 0);
            return false;
        }  
    }//end for
    
    file_put_contents($pagelog, '');
    append_file($histlog, $hist_num);
 }

function crawler($itemurl)
{
	global $retry,$interval;

	while ($retry)
	{
		$content = get_page($itemurl);
		if($content)
		{
			if(preg_match('/<title>(.*?)<\/title>/is',$content))
			{
			    $cache_file = "data/cache_".substr(date("YmdHi"),0,-1);
				//产品基本信息
				preg_match("/<title>(.*?)<\/title>/is",$content,$content_title);
				$title = $content_title[1];

				preg_match("/<h1>(.*?)<\/h1>/is",$content,$content_title2);
				$title_long = trim($content_title2[1]);
                
				preg_match('/<meta name="keywords" content="(.*?)" \/>/is',$content,$content_keywords);
				$keywords = $content_keywords[1];

				preg_match('/<meta name="description" content="(.*?)" \/>/is',$content,$content_description);
				$description = strip_tags($content_description[1]);

				preg_match('/<img class="cover_thumb_" src="(.*?)"[^>]*?>/is',$content,$content_img);
				$img = $content_img[1];

				preg_match('/<li><span>Brand: <\/span>(.*?)<\/li>/is',$content,$content_brand);
				$brand = $content_brand[1];

				preg_match('/<li><span>Model: <\/span>(.*?)<\/li>/is',$content,$content_model);
				$model = $content_model[1];

				preg_match('/<li><span>Industry: <\/span>(.*?)<\/li>/is',$content,$content_industry);
				$industry = strip_tags($content_industry[1]);

				preg_match('/<li><span>First Catalog: <\/span>(.*?)<\/li>/is',$content,$content_bcate);
				$bcate = strip_tags($content_bcate[1]);

				preg_match('/<li><span>Second Catalog: <\/span>(.*?)<\/li>/is',$content,$content_mcate);
				$mcate = strip_tags($content_mcate[1]);

				preg_match('/<li><span>Country of Origin: <\/span>(.*?)<\/li>/is',$content,$content_country);
				$country = $content_country[1];

				preg_match('/<li><span>Price: <\/span>(.*?)<\/li>/is',$content,$content_price);
				$price = $content_price[1];
                $price = trim(str_replace(array('FOB','USD'), '', $price));

				preg_match('/<li><span>Minimum Order: <\/span>(\d+)(.*?)\/.*?<\/li>/is',$content,$content_order);
				$order = $content_order[1];
                $unit = $content_order[2];

				preg_match('/<li><span>Pay Mode: <\/span>(.*?)<\/li>/is',$content,$content_paymode);
				$paymode = $content_paymode[1];

				preg_match('/<li><span>Arrive Time: <\/span>(\d+)\s+days<\/li>/is',$content,$content_arrivetime);
				$arrivetime = $content_arrivetime[1];

				preg_match('/<li><span>Keywords: <\/span>(.*?)<\/li>\s+<\/ul>(.*?)\s+<\/div>\s+<\/div>/is',$content,$content_content);
				$item_content = $content_content[2];

				//企业信息
				preg_match('/<li>Company Name\s+:\s+(.*?)<\/li>/si',$content,$content_company);
				$company = $content_company[1];

				preg_match('/<dt>Contact Person:<\/dt>[^<].*?<dd>(Ms|Mr)?\.(.*?)<\/dd>/si',$content,$match);
				$regex = $match[1];
				$contact = strip_tags($match[2]);

				preg_match('/<li>Zip Code : (.*?)<\/li>/si',$content,$match);
				$zipcode = $match[1];

				preg_match('/<li>Company Address : (.*?)<\/li>/si',$content,$match);
				$address = $match[1];

				preg_match('/<li>Year Established : (.*?)<\/li>/si',$content,$match);
				$year = $match[1];
				//公司规模
				preg_match('/<li>Number of Employees : (.*?)<\/li>/si',$content,$match);
				$person = $match[1];
				//工业
				preg_match('/<li>Industry : (.*?)<\/li>/si',$content,$match);
				$industry2 = $match[1];
				//经营模式
				preg_match('/<li>Business Model : (.*?)<\/li>/si',$content,$match);
				$business_model = $match[1];
				//销售的产品
				preg_match('/<li>Sales : (.*?)<\/li>/si',$content,$match);
				$sales = $match[1];
				// 主要经营范围
				preg_match('/<li>Business Market : (.*?)<\/li>/si',$content,$match);
				$business_market = $match[1];
				//公司网址
		        preg_match('/<li>Company Website URL : (.*?)<\/li>/si',$content,$match);
				$weburl = $match[1];
				//公司简介
				preg_match('/<li>Company Profile : (.*?)<\/li>/si',$content,$match);
				$company_info = $match[1];

				preg_match('/company-\d+-(.*?)\.html/si',$content,$match);
				$username = $match[1];

				preg_match('/<dt>Company Phone:<\/dt>[^<].*?<dd>(.*?)<\/dd>/si',$content,$match);
				$phone = $match[1];

				preg_match('/<dt>Company Fax:<\/dt>[^<].*?<dd>(.*?)<\/dd>/si',$content,$match);
				$fax = $match[1];
				
				preg_match('/<li>Country : (.*?)<\/li>/si',$content,$match);
				$country = $match[1];
                
                preg_match('/<li>Total Annual Sales Volum : (.*?)<\/li>/si',$content,$match);
                $revenue= $match[1];

				$data = array(
					'title'=>$title,
                    'title_long'=>$title_long,
					'keywords'=>$keywords,
					'description'=>$description,
					'img'=>$img,
					'brand'=>$brand,
					'model'=>$model,
					'industry'=>$industry,
					'bcate'=>$bcate,
					'mcate'=>$mcate,
					'country'=>trim(str_replace('(Mainland)','',$country)),
					'price'=>$price,
					'order'=>$order,
                    'unit'=>$unit,
					'paymode'=>$paymode,
					'arrivetime'=>$arrivetime,
					'item_content'=>str_replace(array('\n\t','\n','\t','&nbsp;'),'',$item_content),
					'company'=>$company,
					'contact'=>$contact,
					'regex'=>$regex,
					'phone'=>$phone,
					'fax'=>$fax,
					'zipcode'=>$zipcode,
					'address'=>$address,
					'year'=>$year,
					'person'=>$person,
					'username'=>$username,
					'industry2'=>$industry2,
					'business_model'=>$business_model,
					'sales'=>$sales,
					'business_market'=>$business_market,
					'weburl'=>$weburl,
					'company_info'=>$company_info,
                    'revenue'=>$revenue,
				);
				//print_r($data);die;
				append_file($cache_file, json_encode($data));
				return true;

			}
			else
			{
				_log("Error:mysql error , sleep($interval) and retry($retry)...");
			}
		}
		else
		{
			_log("warn: item get $url failed, sleep($interval) and retry($retry)...");
		}

		sleep($interval);
		--$retry;
	}//end while

    if($retry == 0)
    {
        _log("err: reach max retry. get $itemurl failed, return");
        return false;
    }
}//end function


?>
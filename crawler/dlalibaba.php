<?php
require_once('config.php');
//设置变量
define('S_PWD', dirname(__FILE__)); //使用crawler_lib必须定义该变量
$scriptname = basename($argv[0]);
$script = substr($scriptname, 0, -4);
$logfile = "$logpath/{$script}.log";
$pagelog = "$logpath/alibaba.log";
$itemlog = "$logpath/alibaba_item.log";

$tmpdir= S_PWD.'/tmp';
$alidir = S_PWD.'/data/alibaba';
mkdir($alidir);

//准备cookie文件
clear_cookiepath();
$cookie = parse_cookiepath();
$cookie = "{$cookie}_ip";
create_file($cookie);
$date = time();
$ip = $_SERVER["REMOTE_ADDR"];
$sleep_time = 0;

/***********************
 * 
 * Basic Config
 * 
 ***********************/
$start_page1 = 20;
$pages = 22;
$itemurl = "http://www.alibaba.com/Grain_pid101_%d";

$start_page = (int)file_get_contents($pagelog);
if($start_page=='') $start_page=$start_page1;

for($i=$start_page;$i<=$pages;$i++)
{
    $url = sprintf($itemurl,$i);
    while ($retry)
    {
        if(time()-$date < mt_rand(2, 3)) sleep($sleep_time);
        $content = get_page($url);
        $date = time();
        if($content)
        {
            if(preg_match_all('/<div itemtype="http:\/\/schema.org\/Offer" itemscope="" itemprop="offers">(.*?)<span class="icons">/is',$content,$mactch))
            {
                
                $break_itemno =  0;//统计断点用
                $break_itemno = file_get_contents($itemlog);
                //if($break_itemno == 20) break;
                file_put_contents($pagelog, $i);
                $numno=0;      
                
                
                $itemlist= $mactch[0];

                foreach($itemlist as $item)
                {
                    
                    $numno++;
                    if($numno < $break_itemno && $break_itemno<42){
                    continue;
                    }    
                    preg_match("/<a href=\"(.*?)\" itemprop=\"url\"/si",$item,$matches);
                    $item_url = $matches[1];

                    preg_match('/<a title=".*?" itemprop="brand" onclick=".*?" href="(.*?)"  dot=\'\' target="_blank" class="company qrPCm sites">/si',$item,$matches);
                    $domain = $matches[1];

                    if(preg_match('/<span class="location">\s+(.*?)\s+<\/span>/si',$item,$matches))
                    {
                        $location = strip_tags($matches[1]);
                        $location = str_replace(' (Mainland)', '', $location);
                    }
                    else
                    {
                        _log("Warn:list page country not match!");
                    }

                    $unit = '';
                    $price=15;
                    if(preg_match('/<span itemprop="price" class="attrName">FOB Price: <\/span>US \$(.*?)\s+\/\s+(.*?)\s+<\/p>/si',$item,$matches))
                    {
                        $price = $matches[1];
                        $unit = $matches[2];
                    }
                    else
                    {
                        _log("Warn:list page price and unit not match!");
                    }

                    preg_match('/Place of Origin: <b>(.*?)(;(.*?))?<\/b>/si',$item,$matches);
                    $countrycode = $matches[1];

                    $data = array(
                        'location'=>$location,
                        'price'=>$price,
                        'unit'=>$unit,
                        'countrycode'=>$countrycode,
                        'domain'=>$domain,
                    );
                    sleep($sleep_time);
                    $ret = GetInfo($item_url,$ip,$cookie,$data,$domain);
                    file_put_contents($itemlog,$numno);
                    if($ret)
                    {
                        _log("Success");
                    }
                    else
                    {
                         _log("Fail:$item_url");
                    }
                }
            }
            break;
        }
        else
        {
            _log("warn: Pagelist get $url failed, sleep($interval) and retry($retry)...");
        }

        sleep($interval);
        --$retry;
      }
      _log("Proccess finishi!");
}

function GetInfo($url,$ip,$cookie,$data,$domain)
{
  global $date,$sleep_time;

  if(time()-$date < mt_rand(2, 3))
  {
      _log("Sleep:Get item detail page");
      sleep($sleep_time);
  }

  $content = get_page($url,$ip,$cookie);
  $date = time();

  if(preg_match('/<h1 class="fn">(.*?)<\/h1>/si',$content,$match))
  {
      $title = $match[1];
      preg_match('/<th class="name">Minimum Order Quantity:<\/th>\s+<td class="value">(\d+) (.*?)<\/td>/si',$content,$match);
      $order = $match[1];
      $unit = $match[2];

      preg_match('/<th class="name">Supply Ability:<\/th>\s+<td class="value">(.*?) (.*?)\s+per\s+(.*?)(\s+)?<\/td>/si',$content,$match);
      $supply = $match[1];
      $supply_unit =  'per '.trim($match[3]);

      preg_match('/<th class="name">Payment Terms:<\/th>\s+<td class="value">(.*?)<\/td>/si',$content,$match);
      $payment = $match[1];

      preg_match('/<span class="ico-ren2"><\/span>(.*?)\.(.*?)<\/a>/si',$content,$match);
      $sex = $match[1];
      $truename = trim($match[2]);

      preg_match('/<span class="attr-name J-attr-name">Brand Name:<\/span>\s+<\/td>\s+<td class="value J-value">\s+(.*?)\s+<\/td>/si',$content,$match);
      $brand = trim($match[1]);

      preg_match('/<span class="attr-name J-attr-name">Model Number:<\/span>\s+<\/td>\s+<td class="value J-value">\s+(.*?)\s+<\/td>/si',$content,$match);
      $model = trim($match[1]);

      preg_match('/<td class="name">Packaging Detail:<\/td>\s+<td>(.*?)<\/td>/si',$content,$match);
      $package = trim($match[1]);

      preg_match('/<td  class="name">Delivery Detail:<\/td><td>(\d+)(.*?)<\/td>/si',$content,$match);
      $days = trim($match[1]);

      preg_match('/<div id="J-rich-text-description" class="rich-text-description">(.*?)<\/div>/si',$content,$match);
      $detail = strip_tags($match[1],'<p><br />');

      preg_match('/<meta name="keywords" content="(.*?)" \/>/si',$content,$match);
      $keywords = $match[1];

      preg_match('/<meta name="description" content="(.*?)" \/>/si',$content,$match);
      $description = $match[1];
      preg_match('/<meta property="og:image" content="(.*?)"\/>/si',$content,$match);
      $pic = $match[1];

      preg_match('/<p class="description">(.*?)<\/p>/si',$content,$match);
      $detail2 = strip_tags($match[1],'<br><br />');


      $data['title'] = $title;
      $data['order'] = $order;
      $data['unit'] = $unit;
      $data['supply'] = $supply;
      $data['supply_unit'] = $supply_unit;
      $data['sex'] = $sex;
      $data['truename'] = $truename;
      $data['brand'] = $brand;
      $data['model'] = $model;
      $data['package'] = $package;
      $data['days'] = $days;
      $data['keywords'] = $keywords;
      $data['description'] = $description;
      $data['pic'] = $pic;
      $data['content'] = trim($detail);
      $data['content2'] = trim($detail2);

      preg_match('/<td class="name">Product\/Service \(We Sell\):<\/td>\s+<td>(.*?)<\/td>/si',$content,$match);
      $sell = strip_tags($match[1]);

      preg_match('/<td class="name">Number of Employees:<\/td>\s+<td>(.*?)<\/td>/si',$content,$match);
      $size = trim(strip_tags($match[1]));

      preg_match('/<td class="name">Main Markets:<\/td>\s+<td>(.*?)<\/td>/si',$content,$match);
      $market = $match[1];

      preg_match('/<td class="name">Total Annual Sales Volume:<\/td>\s+<td>(.*?)<\/td>/si',$content,$match);
      $salevolume = strip_tags($match[1]);

      preg_match('/<td class="name">Factory Location:<\/td>\s+<td>(.*?)<\/td>/si',$content,$match);
      $address = strip_tags($match[1]);	

      $data['sell']=$sell;
      $data['size']=$size;
      $data['market']=$market;
      $data['salevolume']=$salevolume;
      $data['address']=$address;
      sleep($sleep_time);
  }
  else
  {
      _log("Warn:get page fail,$url");
      return false;
  }

  if(time()-$date < mt_rand(2, 3))
  {
      _log("Sleep:Get page company_profile.html");
      sleep($sleep_time);
  }

  $profile_url  = $domain.'/company_profile.html';
  $content = get_page($profile_url,$ip,$cookie);
  $date = time();

  if($content && preg_match('/<h3>(.*?)<\/h3>/si',$content))
  {
      preg_match('/<h3>(.*?)<\/h3>/si',$content,$match);
      $company = $match[1];

      preg_match('/Business Type: <strong>(.*?)<\/strong>/si',$content,$match);
      $business = $match[1];

      preg_match('/<th>Year Established:<\/th>\s+<td>\s+(.*?)\s+<\/td>/si',$content,$match);
      $year = strip_tags($match[1]);

      preg_match('/<th>Total Revenue <span class="last-year"><\/span>:<\/th>\s+<td>(.*?)<\/td>/si',$content,$match);
      $revenue = $match[1];

      $data['company'] = $company;
      $data['business']=$business;
      $data['year'] = $year;
      $data['revenue'] = $revenue;
      sleep($sleep_time);
  }
  else
  {
      _log("Error:get company page $profile_url fail!");
      return false;
  }


  if(time()-$date < mt_rand(2, 3))
  {
      _log("Sleep:Get page contactinfo.html");
      sleep($sleep_time);
  }

  $contact_url = $domain.'/contactinfo.html';
  $newcontent = get_page($contact_url,$ip,$cookie);
  $date = time();

  if($newcontent && preg_match('/<dt>Telephone:<\/dt>\s+<dd>(.*?)<\/dd>/si',$newcontent))
  {
      preg_match('/<dt>Telephone:<\/dt>\s+<dd>(.*?)<\/dd>/si',$newcontent,$match);
      $phone = $match[1];

      preg_match('/<dt>Mobile Phone:<\/dt>\s+<dd>(.*?)<\/dd>/si',$newcontent,$match);
      $mobile = $match[1];

      preg_match('/<dt>Fax:<\/dt>\s+<dd>(.*?)<\/dd>/si',$newcontent,$match);
      $fax = $match[1];

      preg_match('/<dt>Zip:<\/dt>\s+<dd>(.*?)<\/dd>/si',$newcontent,$match);
      $zipcode = $match[1];

      preg_match('/<dt>Province\/State:<\/dt>\s+<dd>(.*?)<\/dd>/si',$newcontent,$match);
      $province = $match[1];

       preg_match('/<dt>City:<\/dt>\s+<dd>(.*?)<\/dd>/si',$newcontent,$match);
      $city = $match[1];

      preg_match('/<dt>Address:<\/dt>\s+<dd>(.*?)<\/dd>/si',$newcontent,$match);
      $address = $match[1];

      $website ='';
      if(preg_match('/<th>Website:<\/th>\s+<td>\s(.*?)<\/a><br \/>/si',$newcontent,$match))
      $website = trim(strip_tags($match[1]));  

      $data['phone'] = $phone;
      $data['fax'] = $fax;
      $data['mobile'] = $mobile;
      $data['zipcode'] = $zipcode;
      $data['province'] = $province;
      $data['city'] = $city;
      $data['address'] = $address;
      $data['website'] = $website;

      $newdomain = str_replace('http://', '', $domain);
      $doarr = explode('.', $newdomain);
      $username = $doarr[0];
      $data['username'] = $username;

      $cache_file = "data/alibaba/cache_".substr(date("YmdHi"),0,-1);
      append_file($cache_file, json_encode($data));
      return true;
  }
  else
  {
      _log("Error:get contactinfo page $newcontent fail!");
      return false;
  }
}

?>
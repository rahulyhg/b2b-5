<?php
require_once('config.php');
//设置变量
define('S_PWD', dirname(__FILE__)); //使用crawler_lib必须定义该变量
$tmpdir= S_PWD.'/tmp';
exec("mkdir -p $tmpdir");

//准备cookie文件
clear_cookiepath();
$cookie = parse_cookiepath();
$cookie = "{$cookie}_ip";
create_file($cookie);

$url = "http://www.alibaba.com/Grain_pid101";
$ip = "192.168.2.201";
while ($retry)
{
    $content = get_page($url,$ip,$cookie);
    if($content)
    {
        if(preg_match_all('/<div itemtype="http:\/\/schema.org\/Offer" itemscope="" itemprop="offers">(.*?)<span class="icons">/is',$content,$mactch))
        {
            $itemlist= $mactch[0];
            
            foreach($itemlist as $item)
            {
                preg_match("/<a href=\"(.*?)\" itemprop=\"url\"/si",$item,$matches);
                $item_url = $matches[1];
                
                preg_match('/<a title=".*?" itemprop="brand" onclick=".*?" href="(.*?)"  dot=\'\' target="_blank" class="company qrPCm sites">/si',$item,$matches);
                $domain = $matches[1];
                
                if(preg_match('/<span class="location">\s+(.*?)\s+<\/span>/si',$item,$matches))
                {
                    $location = strip_tags($matches[1]);
                    $location = str_replace(' (Mainland)', '', $location);
                    //echo $location.chr(10);
                }
                $unit = '';
                $price=15;
                if(preg_match('/<span itemprop="price" class="attrName">FOB Price: <\/span>US \$(.*?)\s+\/\s+(.*?)\s+<\/p>/si',$item,$matches))
                {
                    $price = $matches[1];
                    $unit = $matches[2];

                }
                    preg_match('/Place of Origin: <b>(.*?)(;(.*?))?<\/b>/si',$item,$matches);
                    $countrycode = $matches[1];                
               // else
               // {
               //     continue;
               // }
                
                $data = array(
                    'location'=>$location,
                    'price'=>$price,
                    'unit'=>$unit,
                    'countrycode'=>$countrycode,
                );
                //print_r($data);
                
                
                
                GetInfo($item_url,$ip,$cookie,$data);die;
            }        
           // print_r($mactch);die;
            //echo count($itemlist);die;
        }
        die;
    }
    else
    {
        _log("warn: Pagelist get $url failed, sleep($interval) and retry($retry)...");
    }

    sleep($interval);
    --$retry;
  }

  
  function GetInfo($url,$ip,$cookie,$data)
  {
      $content = get_page($url,$ip,$cookie);
      
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
          
          $data['content'] = $detail;
          
          
          print_r($data);
          //die;
          
      } 
  }
  
?>

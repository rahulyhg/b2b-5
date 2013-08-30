<?php
/**
 * 产品数据入库脚本
 * 每10分钟执行一次入库操作
 */
error_reporting(1);
require_once('config.php');
$sellcate = include 'sellcate_phome.php';
//设置变量
$scriptname = basename($argv[0]);
$script = substr($scriptname, 0, -4);
$logfile = "$logpath/{$script}.log";
$workdir = dirname(__FILE__);
$datadirArr = array("$workdir/data/alibaba/",);
$prefix = 'cache_';

$disarr = array(
'Agriculture',
'Apparel & Fashion',
'Automobile',
'Business Services',
'Chemicals',
'Computer Hardware & Software',
'Construction & Real Estate',
'Electrical Equipment & Supplies',
'Electronic Components & Supplies',
'Energy',
'Environment',
'Excess Inventory',
'Food & Beverage',
'Furniture & Furnishings',
'Gifts & Crafts',
'Health & Beauty',
'Home Appliances',
'Home Supplies',
'Industrial Supplies',
'Lights & Lighting',
'Luggage, Bags & Cases',
'Minerals, Metals & Materials',
'Office Supplies',
'Packaging & Paper',
'Printing & Publishing',
'Security & Protection',
'Sports & Entertainment',
'Telecommunications',
'Textiles & Leather Products',
'Timepieces, Jewelry, Eyewear',
'Toys',
'Transportation',
'Others',
);

$country_arr = load_hist_file('country.log');
$code_arr = load_hist_file('country_code.log');

//单进程运行
/*
declare(ticks=1);
set_process_lock($script);
_log("begin proc itemlist crawler data", INFO);
*/
$db->query('TRUNCATE enenewsmember');   
$db->query('TRUNCATE enenewsmemberadd'); 
$db->query('TRUNCATE enecms_news'); 
$db->query('TRUNCATE enecms_news_data_1'); 
$db->query('TRUNCATE enecms_news_index'); 

$catid = 44;
//$db->autocommit(0);
foreach ($datadirArr as $datadir) {
	$bak_dir = "$datadir/bak";
	$err_dir = "$datadir/err";
	//exec("mkdir  '$datadir'");
	mkdir($bak_dir);
	mkdir($err_dir);

	//删除备份目录中的过期文件
	//exec("find '$bak_dir' -mtime +7 -type f -exec rm -rf {} \; -print");

	//找到所有10分钟之前的文件
	_log("begin proc datadir: $datadir", INFO);
	
	$files = scandir($datadir);
	foreach ($files as $file) {
		if (is_dir($file) || strpos($file, $prefix) !== 0) {
			continue;
		}
		$time = substr(date('YmdHi'), 0, -1);
		$f_time = substr($file, strlen($prefix));
		//if ($f_time < $time) {
		if (1) {
			$bak_file = "$bak_dir/$file";
			$err_file = "$err_dir/$file";
			$file = "$datadir/$file";
			_log("begin proc $file", INFO);
			$i = 0;
			$fp = fopen($file, 'r');
			while ($line = fgets($fp, 204800)) {
				$line = trim($line);
				$i++;
				//echo "proc ".$i."\n";
				if (empty($line)) continue;
				$data = json_decode($line,true);
				if (!$data) {
					_log("json_decode failed. line:$i", ERROR);
					//append_file($err_file, $line);
					continue;
				}

				//获取数据后，写数据库
				extract($data);
                
				if($catid=='') continue;
				$country = $location;
                $country_code = strtolower($countrycode);
                
				$country_round = rand(0,219);
				if(!$country_code)
				{
					$akey = array_search($country,$country_arr,true);
					if($akey != 'null')
					{
						$country_code = $code_arr[$akey];
					}
					else
					{
						$country_code = $code_arr[$country_round];
					}
				}

				
				echo $country.'----------'.$country_code.chr(10);
				#continue;
				
				
				

                //判断用户名 如果用户没有直接进入下一条信息
				if($username=='') continue;        
                $member = array(
                'username'=>$username,
                'password'=>md5('5621784'),
                'rnd'=>'vyv2wKqWBfKWngy5ArkR',
                'email'=>$username.'@163.com',
                'registertime'=>time(),
                'groupid'=>3,
                'salt'=>'Qkeutn',
                'userkey'=>'cGEhUAn3wLCB',
                'checked'=>1,
                );

                $meminfo = $db->get_one('userid','enenewsmember',"username='$username'");

                if(!$meminfo['userid'])
                {
					$keyid = rand(0,32);
                    $userid = $db->insert($member,'enenewsmember',true);
                    $companyinfo = array(
                         'userid'=>$userid,
                         'truename'=>$truename,
                         'phone'=>$phone,
                         'address'=>addslashes($address),
                         'zipcode'=>$zipcode,
                         'spacestyleid'=>2,
                         'homepage'=>$weburl,
                         'content'=>addslashes($company_info),
                         'company'=>addslashes($company),
                         'fax'=>$fax,
                         'userpic'=>$userpic,
                         'spacename'=>'',
                         'spacegg'=>'',
                         'viewstats'=>'',
                         'regip'=>'127.0.0.1',
                         'lasttime'=>time(),
                         'lastip'=>'127.0.0.1',
                         'loginnum'=>'0',
                         'country'=>$country,
						 'countrycode'=>$country_code,
                         'sex'=>$sex,
                         'industry'=>$disarr[$keyid],
                         'province'=>addslashes($province),
                         'city'=>$city,
                         'business'=>addslashes($business),
                         'size'=>$size,
                         'revenue'=>$revenue,
                         'markets'=>addslashes($market),
                         'sell'=>addslashes($sell),
                         'buy'=>'',
                         'year'=>$year,
                           );
                   //导入公司信息
                   $db->insert($companyinfo,'enenewsmemberadd');
                }

               $newimg = basename($img);
               if($newimg == 'no.jpg') $img = $siteurl.'images/nopic.jpg';
               
                //导入产品信息
               if(!$days) $days = rand(10,30);

                $enecms_news = array(
                'classid'=>$catid,
                'userid'=>$userid,
                'username'=>addslashes($username),
                'title'=>addslashes($title.' '.$brand.' '.$model),
                'ispic'=>1, 
                'titlepic'=>$pic,
                'brand'=>addslashes($brand),
                'price'=>$price,
                'countrycode'=>$country_code,
                'orders'=>$order,
                'unit'=>strip_tags($unit),
                'supply'=>$supply,
                'supply_unit'=>strip_tags($supply_unit),
                'paymode'=>addslashes($paymode),
                'days'=>$days,
                'country'=>$country,
                'company_name'=>addslashes($company),
                'smalltext'=>addslashes(strip_tags($description)),
                'keyboard'=>addslashes(strip_tags($keywords)),
                'ismember'=>1,
                'truetime'=>time(),
                'lastdotime'=>time(),
                'newstime'=>time(),
                'havehtml'=>1,
                );


                $itemid = $db->insert($enecms_news,'enecms_news',true);
                $enecms_news_data_1 = array(
                    'classid'=>$catid,
                    'id'=>$itemid,
                    'truename'=>addslashes($truename),
                    'phone'=>$phone,
                    'fax'=>$fax,
                    'address1'=>addslashes($address),
                    'newstext'=>addslashes($content),
                     );
                
                    $enecms_news_data_index = array(
                    'classid'=>$catid,
                    'id'=>$itemid,
                    'checked'=>1,
                    'havehtml'=>1,
                    'newstime'=>time(),
                    'truetime'=>time(),
                     'lastdotime'=>time(),
                     );
                
                $db->update(array('filename'=>$itemid,'titleurl'=>'/e/action/ShowInfo.php?classid='.$catid.'&id='.$itemid),'enecms_news',"id=$itemid");
                $db->insert($enecms_news_data_1,'enecms_news_data_1');
                $db->insert($enecms_news_data_index,'enecms_news_index');
                
                
             }
			//一个文件提交一次
			if (!$db->commit()) {
				//goto DBERR;
			}
			fclose($fp);

			//处理后移动到备份目录
			rename($file, $bak_file);
			_log("proc end $file", INFO);
		}
	}
}
_log("proc finished\n", INFO);
return true;
?>
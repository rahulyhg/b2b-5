<?php
error_reporting(1);
//Global设置
umask(0000);
$libdir= dirname(__FILE__).'/lib';
$hist_db = 'yg_data_'.date('Y');
require("$libdir/class.phpmailer.php");
require("$libdir/crawler.php");
$root_dir = dirname(__FILE__);

//Log配置
define('DEBUG', 1);
define('INFO', 2);
define('WARN', 4);
define('ERROR', 8);
define('CRIT', 16);
$loglevel = CRIT | ERROR | WARN | INFO | DEBUG;
$logpath = dirname(__FILE__).'/log';
$logfile = '';
function _log($msg, $lv=INFO, $mail=false) {
	global $loglevel, $logfile;
	if ($lv & $loglevel) {
		$ts = date('Y-m-d H:i:s');
		error_log("$ts  $msg\n", 3, $logfile);
		if ($mail) {
			echo $msg;die;
			//sendmail(mb_substr($msg,0,80,'utf8').'..', "$ts $msg");
		}
	}
}



//单实例配置
$lockfile = '';
$lockfp = NULL;
//place this statement into your main php script file
//declare(ticks=1); 
function _cleanup($signo=0)
{
	global $lockfile;
	if ($signo) {
		print "signaled with $signo\n";
	}
	if (file_exists($lockfile)) {
		//只有pid属主才能删除lock文件，否则会被子进程删除
		$pid = intval(file_get_contents($lockfile));
		if ($pid == posix_getpid()) {
			unlink($lockfile);
		}
	}
	exit($signo);
}
function set_process_lock($lockname, $exit=true)
{
	global $lockfile, $lockfp, $root_dir;

	$lockfile = $root_dir.'/tmp/process_'.$lockname;
	//echo $lockfile;die;
	$lockfp = fopen($lockfile, 'c+');
	if (flock($lockfp, LOCK_NB | LOCK_EX)) {
		file_put_contents($lockfile);
		register_shutdown_function('_cleanup');
		pcntl_signal(SIGTERM, '_cleanup');
		pcntl_signal(SIGINT, '_cleanup');
		return true;
	}
	else {
		if ($exit) {
			//无法取得锁就退出
			die("another [$lockname] exists\n");
		}
		return false;
	}
}

function load_hist_file($histfile) {
	$hist = array();
	if (file_exists($histfile)) {
		$hist = file($histfile, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
	}
	//$hist = array_fill_keys($hist, 1);
	return $hist;
}

if (!function_exists('append_file')) {
	function append_file($file, $data, $delimiter="\n")
	{
		return error_log("{$data}{$delimiter}", 3, $file);
	}
}


function encrypt($txt, $key = '') {
	$rnd = md5(microtime());
	$len = strlen($txt);
	$ren = strlen($rnd);
	$ctr = 0;
	$str = '';
	for($i = 0; $i < $len; $i++) {
		$ctr = $ctr == $ren ? 0 : $ctr;
		$str .= $rnd[$ctr].($txt[$i] ^ $rnd[$ctr++]);
	}
	return str_replace('=', '', base64_encode(kecrypt($str, $key)));
}

function decrypt($txt, $key = '') {
	$txt = kecrypt(base64_decode($txt), $key);
	$len = strlen($txt);
	$str = '';
	for($i = 0; $i < $len; $i++) {
		$tmp = $txt[$i];
		$str .= $txt[++$i] ^ $tmp;
	}
	return $str;
}

function kecrypt($txt, $key) {
	$key = md5($key);
	$len = strlen($txt);
	$ken = strlen($key);
	$ctr = 0;
	$str = '';
	for($i = 0; $i < $len; $i++) {
		$ctr = $ctr == $ken ? 0 : $ctr;
		$str .= $txt[$i] ^ $key[$ctr++];
	}
	return $str;
}

//邮件配置
$mail = new PHPMailer();
$mail->IsSMTP();		// set mailer to use SMTP
$mail->PluginDir = "$libdir/";	// smtp class path
$mail->Host = 'smtp.qq.com';	// specify main and backup server
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;		// turn on SMTP authentication
$mail->Username = 'eboss_yg@ygdianshang.com';	// SMTP username
$mail->Password = 'sujie8810';	// SMTP password
$mail->CharSet = 'utf-8';
$mail->From = 'eboss_yg@ygdianshang.com';
$mail->FromName = "eboss";
$mail->Hostname = '123.ygdianshang.com';
//$mail->AddAddress('18611791141@163.com', 'yejianfeng');
//$mail->AddAddress('13693186674@139.com','duchutian');
//$mail->AddAddress('zhangchenglu@analysys.com.cn','zhangchenglu');
$mail->AddAddress('liangpingzheng@analysys.com.cn','liangpingzheng');
function sendmail($Subject, $Body='', $isHTML=false) {
	global $mail;
	$mail->IsHTML($isHTML);
	$mail->Subject = $Subject;
	$mail->Body    = $Body? $Body : $Subject;
	if(!$mail->Send())
	{
		echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
		return false;
	}
	return true;
}


include "$libdir/mysql.php";
//数据库配置
$config = array(
	'debug'=>true,
	'hostname'=>'localhost',
	'username'=>'root',
	'password'=>'root',
	'database'=>'enb2b',
	'charset'=>'utf8',
	'autoconnect'=>1,
	'pconnect'=>1
	);

$db= new mysql();
$db->open($config);

//采集配置
$itemurl = "http://www.corpmarket.com/sell/list-2-0-0-%d.html"; //采集列表页
$pages = 6000; //采集起始页
$retry = 13;
$interval = 10;

//入库配置
$catid = 21;
$siteurl= 'http://www.bjshibang.com/';
$table_pre = 'en';


$listmcat = array(
  '2'=>'http://www.corpmarket.com/sell/list-4-104001000-0-%d.html',
  '1'=>'http://www.corpmarket.com/sell/list-4-104002000-0-%d.html',
  '3'=>'http://www.corpmarket.com/sell/list-4-104003000-0-%d.html',

  //''=>'http://www.corpmarket.com/sell/list-4-104011000-0-%d.html',
  //''=>'http://www.corpmarket.com/sell/list-4-104012000-0-%d.html',    
  //''=>'http://www.corpmarket.com/sell/list-4-104013000-0-%d.html',
  //''=>'http://www.corpmarket.com/sell/list-4-104014000-0-%d.html',
  //''=>'http://www.corpmarket.com/sell/list-4-104015000-0-%d.html',
  //''=>'http://www.corpmarket.com/sell/list-4-104016000-0-%d.html',    
  //''=>'http://www.corpmarket.com/sell/list-4-104017000-0-%d.html',
  //''=>'http://www.corpmarket.com/sell/list-4-104018000-0-%d.html', 
    
);

/*
  '1169'=>'http://www.corpmarket.com/sell/list-4-104001000-0-%d.html',
  '356'=>'http://www.corpmarket.com/sell/list-4-104002000-0-%d.html',
  '1273'=>'http://www.corpmarket.com/sell/list-4-104003000-0-%d.html',
  '373'=>'http://www.corpmarket.com/sell/list-4-104004000-0-%d.html',
  '25'=>'http://www.corpmarket.com/sell/list-4-104005000-0-%d.html',
  '85'=>'http://www.corpmarket.com/sell/list-4-104006000-0-%d.html',
  '194'=>'http://www.corpmarket.com/sell/list-4-104007000-0-%d.html',
  '505'=>'http://www.corpmarket.com/sell/list-4-104008000-0-%d.html',    
  '689'=>'http://www.corpmarket.com/sell/list-4-104009000-0-%d.html',
  '529'=>'http://www.corpmarket.com/sell/list-4-104010000-0-%d.html',
 */






?>
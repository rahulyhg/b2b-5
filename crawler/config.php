<?php
error_reporting(1);
//Global设置
umask(0000);
$libdir= dirname(__FILE__).'/lib';
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
$retry = 13;
$interval = 10;

//入库配置
$catid = 21;
$siteurl= 'http://www.bjshibang.com/';
$table_pre = 'en';

$newcatid = $catid = 9;
if($catid<10) $newcatid='0'.$catid;


$listmcat = array(
  '55'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}001000-0-%d.html",
  '54'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}002000-0-%d.html",
  '53'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}003000-0-%d.html",
  '15'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}004000-0-%d.html",
  '45'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}005000-0-%d.html",
  '40'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}006000-0-%d.html",
  '2'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}007000-0-%d.html",
  '8'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}008000-0-%d.html",  
  '9'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}009000-0-%d.html",
  '1'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}010000-0-%d.html",
 '50'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}011000-0-%d.html",
 '51'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}012000-0-%d.html",
 '52'=>"http://www.corpmarket.com/sell/list-{$catid}-1{$newcatid}013000-0-%d.html",
);

/*
  '105'=>'http://www.corpmarket.com/sell/list-11-111001000-0.html',
  '100'=>'http://www.corpmarket.com/sell/list-11-111002000-0.html',
  '109'=>'http://www.corpmarket.com/sell/list-11-111003000-0.html',
  '15'=>'http://www.corpmarket.com/sell/list-11-111004000-0.html',
  '60'=>'http://www.corpmarket.com/sell/list-11-111005000-0.html',
  '40'=>'http://www.corpmarket.com/sell/list-11-111006000-0.html',
  '2'=>'http://www.corpmarket.com/sell/list-11-111007000-0-%d.html',
  '8'=>'http://www.corpmarket.com/sell/list-11-111008000-0.html',    
  '9'=>'http://www.corpmarket.com/sell/list-11-111009000-0.html',
  '1'=>'http://www.corpmarket.com/sell/list-11-111010000-0.html',
 '300'=>'http://www.corpmarket.com/sell/list-11-111011000-0.html',
 '101'=>'http://www.corpmarket.com/sell/list-11-111012000-0.html',
 '103'=>'http://www.corpmarket.com/sell/list-11-111013000-0.html',
 */






?>

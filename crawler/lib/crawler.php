<?php
function escape($str) {  
	preg_match_all("/[\xc2-\xdf][\x80-\xbf]+|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}|[\x01-\x7f]+/e",$str,$r);  //匹配utf-8字符  
	$str = $r[0];   
	$l = count($str);   
	for($i=0; $i <$l; $i++) {   
		$value = ord($str[$i][0]);   
		if($value < 223) {   
			$str[$i] = rawurlencode($str[$i]);   
		} else {   
			$str[$i] = "%u".strtoupper(bin2hex(mb_convert_encoding($str[$i],"UCS-2","UTF-8")));   
		}   
	}   
	return join("",$str);   
}  
function unescape($str)   
{   
	$str = rawurldecode($str);   
	preg_match_all("/%u.{4}|&#x.{4};|&#d+;|.+/U",$str,$r);  
	$ar = $r[0];   
	foreach($ar as $k=>$v)   
	{   
		if(substr($v,0,2) == "%u")   
		{  
			//$ar[$k] = iconv("UCS-2","UTF-8",pack("H4",substr($v,-4)));  
			$ar[$k] = mb_convert_encoding(pack("H4",substr($v,-4)),"UTF-8","UCS-2");  
		}  
		elseif(substr($v,0,3) == "&#x")  
		{  
			//$ar[$k] = iconv("UCS-2","UTF-8",pack("H4",substr($v,3,-1)));  
			$ar[$k] = mb_convert_encoding(pack("H4",substr($v,3,-1)),"UTF-8","UCS-2");  
		}  
		elseif(substr($v,0,2) == "&#")   
		{   
			//$ar[$k] = iconv("UCS-2","UTF-8",pack("n",substr($v,2,-1)));  
			$ar[$k] = mb_convert_encoding(pack("n",substr($v,2,-1)),"UTF-8","UCS-2");  
		}  
	}   
	return join("",$ar);  
}  
function create_path($path) {
	if(is_dir($path)) {
		return true;
	}
	$folders = explode("/", $path);
	$tpath = Array();
	if(is_array($folders)) {
		foreach($folders as $folder) {
			$tpath[] = $folder;
			$checkpath = implode("/", $tpath);
			if(empty($checkpath) || is_dir($checkpath)) {
				continue;
			}
			if(mkdir($checkpath)) {
				chmod($checkpath,0777);
			}
		}
	}
	return true;
}
function create_file($file) {
	if(is_file($file)) {
		return true;
	}
	$path = dirname($file);
	if(!is_dir($path)) {
		create_path($path);
	}
	if(touch($file)) {
		chmod($file, 0777);
	}
}
//自动加结尾换行符\n
if (!function_exists('append_file')) {
	function append_file($file, $data, $delimiter="\n") {
		/*if(!is_file($file)) {
			create_file($file);
		}
		if(!$handle = fopen($file, "a")) {
			return false;
		}
		if($handle) {
			//		stream_set_write_buffer($handle, 0);
			//		flock($handle, LOCK_EX);
			fwrite($handle, $data);
			//		flock($handle, LOCK_UN);
			fclose($handle);
		}
		return ;*/
		return error_log("{$data}{$delimiter}", 3, $file);
		
	}
}
/*function ak_rand() {
	$base = 9999999999;
	$str = (rand(0, $base) + 1 ) . (rand(0, $base) + 1);
	return $str;
}*/
function random() {
	return substr(rand(), 0, 3);
}
function get_page($url, $ip='', $cookie='', $refer='', $header=array(), $convert=false, &$info=NULL) {
	//$file = parse_urlpath($url);

	$ch = curl_init();
	$options = array(
			CURLOPT_URL => $url,
			CURLOPT_HEADER => false,	//不输出响应头信息
			CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',
			CURLOPT_CONNECTTIMEOUT => 15,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_MAXREDIRS => 5,
			//CURLOPT_VERBOSE => true,
			);
	curl_setopt_array($ch, $options);
	if ($ip) {
		curl_setopt($ch, CURLOPT_INTERFACE, $ip);
	}
	if ($cookie) {
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
	}
	if ($refer) {
		curl_setopt($ch, CURLOPT_REFERER, $refer);
	}
	if ($header) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	}

	$content = curl_exec($ch);
	$info = curl_getinfo($ch);
	if ($errno = curl_errno($ch))
	{
		_log("curl error: $errno:" . curl_error($ch). ', info: '.print_r($info, true));
	}
	curl_close($ch);

	if ($content) {
		if ($convert) {
			$content = @iconv("GBK", "UTF-8//IGNORE", $content);
		}
		return $content;
	}
	else {
		_log("curl error ip:<$ip>, url: $url");
		return false;
	}
}
function get_page_with_retry($url, $ip, $cookie, $refer, $retry=10, $interval=20) {
	_log("begin fetch $url [$ip]");
	while ($retry) {
		$content = get_page($url, $ip, $cookie, $refer);
		if ($content) {
			break;
		}
		else {
			_log("warn: get $url failed, sleep($interval) and retry($retry)...");
		}
		sleep($interval);
		--$retry;
	}
	if ($retry == 0) {
		_log("err: reach max retry. get $url failed");
		return false;
	}
	return $content;
}

function convert_url($url) {
	$string = substr(md5($url),0, 10);
	return $string;
}
function build_urlpath($url) {
	$hash = convert_url($url);
	$path = substr($hash, 0, 3) . '/'.substr($hash, 3).'-'.posix_getpid();
	return $path;
}
function parse_urlpath($url) {
	$path = S_PWD.'/tmp';
	$path .= '/url/'.build_urlpath($url) ;
	return $path;
}
function parse_cookiepath() {
	$path = S_PWD.'/tmp/cookie/';
	if (!is_dir($path)) {
		exec("mkdir -p $path");
	}
	$path .= posix_getpid().'.cookie';
	return $path;
}
function clear_urlpath() {
	$path = S_PWD.'/tmp/url/*';
	exec("rm -rf $path");
}
function clear_cookiepath() {
	$path = S_PWD.'/tmp/cookie/*';
	exec("rm -rf $path");
}

function clean_file($file) {
	if(!is_file($file)) {
		create_file($file);
	}
	if(!$handle = fopen($file, "w")) {
		return false;
	}
	if($handle) {
//		stream_set_write_buffer($handle, 0);
//		flock($handle, LOCK_EX);
	//	fwrite($handle, $data);
//		flock($handle, LOCK_UN);
		fclose($handle);
	}
	return ;
}
function check_arg($need, $get) {
foreach($need as $o) {
	if(!isset($get[$o])) {
		error_log('Required: '.$o);
		return false;
	}
}
return true;
}
function call_shell($opt, $file) {
	$str = '';	
	foreach($opt as $key => $value) {
		$str .= ' -'.$key.' '.$value;
	}
	$shell = '/usr/bin/php '.$file.$str;
	_log("Call: $shell");
	system($shell." >> ".S_PWD."/tmp/error 2>&1");
}
function get_now($flush = false) {
	static $now;
	if($now && !$flush) {
		return $now;
	}
	$now = time();
	//$now = 'static';
	return $now;
}
function get_all_ip() {
	exec("/sbin/ifconfig|grep 'inet addr'|grep -v 127.0.0.1|grep -v 10.200.61.189|cut -d: -f2|cut -d ' ' -f1", $ipArr);
	shuffle($ipArr);
	return $ipArr;
}
function get_a_random_ip() {
	$ipArr = get_all_ip();
	return $ipArr[0];
}

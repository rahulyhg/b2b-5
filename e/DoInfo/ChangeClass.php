<?php
require("../class/connect.php");
require("../class/db_sql.php");
$link=db_connect();
$empire=new mysqlquery();
//关闭投稿
if($public_r['addnews_ok'])
{
	printerror("CloseQAdd","",1);
}
//验证本时间允许操作
eCheckTimeCloseDo('info');
//验证IP
eCheckAccessDoIp('postinfo');
$mid=(int)$_GET['mid'];
if(empty($mid))
{
	printerror("ErrorUrl","",1);
}
$mr=$empire->fetch1("select mid,qenter,qmname,tbname from {$dbtbpre}enewsmod where mid='$mid'");
if(!$mr['mid']||!$mr['qenter']||InfoIsInTable($mr['tbname']))
{
	printerror("ErrorUrl","",1);
}
$muserid=(int)getcvar('mluserid');
$musername=RepPostVar(getcvar('mlusername'));
if(empty($musername))
{
	$musername="游客";
}
//$classjs=$public_r['newsurl']."d/js/js/addinfo".$mid.".js";
//导入模板
//liangpingzheng

//取得登陆会员资料
if($muserid)
{
	$addr=$empire->fetch1("select * from  {$dbtbpre}enewsmemberadd where userid='$muserid' limit 1");

    if(!$addr['content'] || !$addr['phone']|| !$addr['fax'] || !$addr['truename'] || !$addr['address'] || !$addr['year'])
    {
        header("Location:".$public_r['newsurl']."e/member/EditInfo/");
    }   
}

$cate = $temp = array();
$query = $empire->query("select classid,classname from {$dbtbpre}enewsclass where bclassid='1' order by classid asc");
while($r=$empire->fetch($query))
{
	$temp['classid'] = $r['classid'];
	$temp['classname']= $r['classname'];
	$cate[] = $temp;
}
require(ECMS_PATH.'e/template/DoInfo/ChangeClass.php');
db_close();
$empire=null;
?>
<?php
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/q_functions.php");
require("../data/dbcache/class.php");
require LoadLang("pub/fun.php");
require("../member/class/user.php");
$link=db_connect();
$empire=new mysqlquery();

$start=0;
$page=intval($_GET['page']);
$page=RepPIntvar($page);
$line=$public_r['space_num'];//每行显示
$page_line=16;
$offset=$page*$line;
$query="select company,userid,userpic,content from {$dbtbpre}enewsmemberadd where 1";
$totalquery="select count(*) as total from {$dbtbpre}enewsmemberadd where 1";
$totalnum=intval($_GET['totalnum']);
if($totalnum<1)
{
	$num=$empire->gettotal($totalquery);//取得总条数
}
else
{
	$num=$totalnum;
}
$search.="&totalnum=$num";
$query.=" order by userid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page11($num,$line,$page_line,$start,$page,$search);
require('index.temp.php');
db_close();
$empire=null;
?>
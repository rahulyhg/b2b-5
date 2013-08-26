<?php
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/q_functions.php");
require("../data/dbcache/class.php");
require LoadLang("pub/fun.php");
require("../member/class/user.php");
$link=db_connect();
$empire=new mysqlquery();

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

$cat = "";

if(isset($_GET['cid']) && $_GET['cid'])
{
    $cid = $_GET['cid'];
    if(!is_numeric($cid))
    {
        exit();
    }
    else
    {
        $keywords =$disarr[$cid-1];
        $cat = " and industry='$keywords'";;
    }
}


$start=0;
$page=intval($_GET['page']);
$page=RepPIntvar($page);
$line=$public_r['space_num'];//每行显示
$page_line=16;
$offset=$page*$line;
$query="select company,countrycode,userid,userpic,content from {$dbtbpre}enewsmemberadd where 1 $cat";
$totalquery="select count(*) as total from {$dbtbpre}enewsmemberadd where 1 $cat";
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
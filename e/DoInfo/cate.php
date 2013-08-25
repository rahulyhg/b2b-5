<?php
require("../class/connect.php");
require("../class/db_sql.php");
$link=db_connect();
$empire=new mysqlquery();

$pid = $_GET["pid"];
if($pid)
{
    $cate = $temp = array();
    $query = $empire->query("select classid,classname from {$dbtbpre}enewsclass where bclassid='$pid'");
    while($r=$empire->fetch($query))
    {
        $temp['classid'] = $r['classid'];
        $temp['classname']= $r['classname'];
        $cate[] = $temp;
    }
}
db_close();
echo urldecode(json_encode($cate));
?>

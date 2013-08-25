<?php
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/q_functions.php");
require("../data/dbcache/class.php");
require LoadLang("pub/fun.php");
require("../member/class/user.php");
$link=db_connect();
$empire=new mysqlquery();
$userid=0;
$username='';
$spacestyle='';
$search='';
require('CheckUser.php');//验证用户
$onmenu = 'company';
require('template/'.$spacestyle.'/company.temp.php');
db_close();
$empire=null;
?>

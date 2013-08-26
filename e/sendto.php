<?php
require('class/connect.php');
require('class/db_sql.php');
require('member/class/user.php');
$link=db_connect();
$empire=new mysqlquery();
$to_username = 'china';
$r=$empire->fetch1("select ".eReturnSelectMemberF('userid,groupid')." from ".eReturnMemberTable()." where ".egetmf('username')."='$to_username' limit 1");
$info = $_POST;
$title = $info['TOPIC'];
$msgtext = 'Email:'.$info['userEmail'].'\n\r'.$info['MESSAGE'];

ecmsCheckShowKey('checkgbookkey',$info['scode'],1);

if(!$r['userid'])
{
    printerror("MsgNotToUsername","",9);
}

//对方短消息是否满
$mnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsqmsg where to_username='$to_username'");
//print_r($level_r[$r[groupid]][msgnum]);die;
if($mnum+1>50)
{
    printerror("UserMoreMsgnum","",1);
}

$msgtime=date("Y-m-d H:i:s");
$sql=$empire->query("insert into {$dbtbpre}enewsqmsg(title,msgtext,haveread,msgtime,to_username,from_userid,from_username,isadmin,issys) values('".addslashes($title)."','".addslashes($msgtext)."',0,'$msgtime','$to_username','0','None',0,0);");
$newhavemsg=eReturnSetHavemsg($user['havemsg'],0);
$usql=$empire->query("update ".eReturnMemberTable()." set ".egetmf('havemsg')."='$newhavemsg' where ".egetmf('username')."='$to_username' limit 1");
if($sql)
{
    printerror("AddMsgSuccess","",1);
}
else
{printerror("DbError","",1);}
?>
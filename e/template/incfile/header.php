<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>My Control panel</title>
<meta name="robots" content="nofollow"/>
<link rel="stylesheet" type="text/css" href="/e/images/style.css"/>
<link rel="stylesheet" type="text/css" href="/e/images/index.css"/>
<!--[if IE]>
<style type="text/css">
.head_user em {margin:-4px 0 0 -4px;}
#profile {margin:20px 0 0 -140px;}
</style>
<![endif]-->
<script type="text/javascript" src="/e/images/jquery.js"></script>
<script type="text/javascript" src="/e/images/common.js"></script>
<script type="text/javascript" src="/e/images/member.js"></script>
</head>
<body>
<div id="msgbox" style="display:none;"></div>
<div class="head" id="head">
<div class="head_m">
<div class="head_logo"><a href="<?=$public_r['newsurl']?>e/member/cp/"><img src="/e/images/logo.png"/></a></div>
<div class="head_main">
<ul>
<li class="menu_1" id="menu_0" onclick="c(0);">Member</li>
<li class="menu_2" id="menu_1" onclick="c(1);">Infomation</li>
<!--
<li class="menu_2" id="menu_2" onclick="c(2);">Shop</li>
<li class="menu_2" id="menu_3" onclick="c(3);">商铺管理</li>-->
<li class="menu_2" onclick="Go('<?=$public_r['newsurl']?>');">Homepage</li>
</ul>
</div>
<div class="head_user">
<ul>
<li><a href="<?=$public_r['newsurl']?>e/member/doaction.php?enews=exit" onclick="return confirm('Confim login out?');">Logout</a></li>
</ul>
</div>
<div class="c_b"></div>
</div>
</div>
<div class="head_s" id="destoon_space">&nbsp;</div>
<div class="main_tb">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top" class="side" id="side">
<div id="sub_0" style="display:">
<div class="side_head" id="h_0"><div>Member</div></div>
<div class="side_body" id="b_0">
<ul>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="message"><a href="<?=$public_r['newsurl']?>e/member/EditInfo/" class="n">Basic Info</a></li>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="chats"><a href="<?=$public_r['newsurl']?>e/member/EditInfo/EditSafeInfo.php" class="n">Account</a></li>
<!--
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="account"><span class="f_r"></span><a href="/e/member/my/" class="n">帐号状态</a></li>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="favorite"><span class="f_r"></span><a href="/e/member/fava/" class="n">收藏夹</a></li>
-->
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="friend"><a href="<?=$public_r['newsurl']?>e/member/friend/" class="n">Friend</a></li>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="spread"><a href="<?=$public_r['newsurl']?>e/member/msg/" class="n">Message</a></li>
</ul>
</div>
</div>
<div id="sub_1" style="display:none">
<div class="side_head" id="h_1"><div>Infomation</div></div>
<div class="side_body" id="b_1">
<ul>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);"  id="mid_16">
    <a href="<?=$public_r['newsurl'] ?>e/DoInfo/ListInfo.php?mid=1" class="n">Manage Selling</a>
</li>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);"  id="mid_17">
<a href="/e/DoInfo/ChangeClass.php?mid=1" class="n">Post Selling</a>
</li>    
</ul>
</div>
</div>
<div id="sub_2" style="display:none;">
<div class="side_head" id="h_2"><div>商铺管理</div></div>
<div class="side_body" id="b_2">
<ul>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="homepage"><span class="f_r"><a href="" class="m" target="_blank">预览</a></span><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$user[userid]?>" class="f">预览空间</a></li>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="style"><span class="f_r"><a href="style.php?action=view" class="m">查看</a></span><a href="<?=$public_r['newsurl']?>e/member/mspace/SetSpace.php" class="f">设置空间</a></li>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="news"><span class="f_r"><a href="news.php?action=add" class="m">发布</a></span><a href="<?=$public_r['newsurl']?>e/member/mspace/ChangeStyle.php" class="f">选择模板</a></li>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="page"><span class="f_r"><a href="page.php?action=add" class="m">添加</a></span><a href="<?=$public_r['newsurl']?>e/member/mspace/gbook.php" class="f">管理留言</a></li>
<li class="side_a" onmouseover="v(this.id);" onmouseout="t(this.id);" id="honor"><span class="f_r"><a href="honor.php?action=add" class="m">添加</a></span><a href="<?=$public_r['newsurl']?>e/member/mspace/feedback.php" class="f">管理反馈</a></li>
</ul>
</div>
</div>
</td>
<td class="side_h" onclick="oh(this);" title="click open/hide leftbar" id="side_oh">&nbsp;</td>
<td valign="top" class="main" id="main">
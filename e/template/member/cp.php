<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<table cellpadding="0" cellspacing="0" width="100%" height="100%">
<tr>
<td valign="top">
<div class="i_info">
<ul>
<li>
<img src="/e/images/u_member.gif" width="16" height="16" title="Not certified by mail" align="absmiddle"/> Authenticate：
<img src="/e/images/u_email.gif" width="16" height="16" title="Not certified by mail" align="absmiddle"/> <a href="#" class="l">Email</a> &nbsp;
</li>
<li>
<img src="/e/images/ico_message.gif" width="16" height="16" alt="" align="absmiddle"/> Mail：
<strong class="f_red">0</strong> <a href="/e/member/msg/" class="l">Unread Station Letters</a>
&nbsp;&nbsp;
<a href="/e/member/msg/AddMsg/?enews=AddMsg" class="l">	send in the mail</a>
</li>
</ul>
</div>
<div class="i_quick">
<div>
<ul>
<li><a href="<?=$public_r['newsurl']?>e/DoInfo/ChangeClass.php?mid=1" class="b"><img src="/e/images/btn_my.gif" width="32" height="32" alt=""/><br/><span class="f_red">Post Selling</span></a></li>
<li><a href="<?=$public_r['newsurl']?>e/member/EditInfo/" class="b"><img src="/e/images/btn_edit.gif" width="32" height="32" alt=""/><br/>Perfect information</a></li>
<li><a href="<?=$public_r['newsurl']?>e/member/msg/" class="b"><img src="/e/images/btn_message.gif" width="32" height="32" alt=""/><br/>Station Letters</a></li>
<!--
<li><a href="<?=$public_r['newsurl']?>e/member/mspace/SetSpace.php" class="b"><img src="/e/images/btn_style.gif" width="32" height="32" alt=""/><br/>风格模板</a></li>
-->
<li><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$user[userid]?>" target="_blank" class="b"><img src="/e/images/btn_home.gif" width="32" height="32" alt=""/><br/><span class="f_red">My Shop</span></a></li>
<li><a href="<?=$public_r['newsurl']?>e/member/friend.php" class="b"><img src="/e/images/btn_friend.gif" width="32" height="32" alt=""/><br/>My Friend</a></li>
<!--
<li><a href="favorite.php" class="b"><img src="/e/images/btn_favorite.gif" width="32" height="32" alt=""/><br/>商机收藏</a></li>
-->
</ul>
</div>
<div style="clear:both;"></div>
</div>
</td>
<td width="8">&nbsp;</td>
<td valign="top" class="i_rt">
<div class="i_head">
<span class="f_r"></span>
<strong>System Message</strong>
</div>
<div class="i_body">
<div class="i_sys">
<ul>
<li>&nbsp;None message</li>
</ul>
</div>
</div>
<div class="i_head">
<span class="f_r"><a href="/e/member/EditInfo/">[Edit]</a></span>
<strong>personal info</strong>
</div>
<div class="i_body">
<div class="i_user">
<table cellpadding="6" cellspacing="0" width="100%">
<tr>
<td class="i_user_l">Member ID</td>
<td><?=$user[username]?></td>
</tr>
<tr>
<td class="i_user_l">Group</td>
<td><?=$level_r[$r[groupid]][groupname]?></td>
</tr>
<tr>
<td class="i_user_l">ID</td>
<td><?=$user[userid]?></td>
</tr>
<tr>
<td class="i_user_l">Register Date</td>
<td><?=$registertime?></td>
</tr>
</table>
</div>
</div>
</td>
</tr>
</table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
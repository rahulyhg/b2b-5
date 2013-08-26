<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='发送消息';
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>会员中心</a>&nbsp;>&nbsp;<a href=../../msg/>消息列表</a>&nbsp;>&nbsp;发送消息";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tbody>
 <tr>
<td class="tab_on" id="add"><a href="#"><span>Send Message</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="inbox"><a href="../"><span>Inbox</span></a></td>
<td class="tab_nav">&nbsp;</td>
</tr>
</tbody>
</table>
</div>
<table cellpadding="6" cellspacing="1" class="tb">
<form action="../../doaction.php" method="post" name="sendmsg" id="sendmsg">
  <tr> 
    <td width="21%" class="tl"><span class="f_red"></span>Topic</td>
    <td class="tr f_gray"><input name="title" type="text" id="title2" value="<?=ehtmlspecialchars(stripSlashes($title))?>" size="43">
      *</td>
  </tr>
  <tr> 
    <td  class="tl"><span class="f_red">*</span>Send to</td>
    <td class="tr f_gray"><input name="to_username" type="text" id="to_username2" value="<?=$username?>">
      [<a href="#EmpireCMS" onclick="window.open('../../friend/change/?fm=sendmsg&f=to_username','','width=250,height=360');">Select Friend</a>] 
      </td>
  </tr>
  <tr> 
    <td class="tl"><span class="f_red">*</span>Content</td>
    <td class="tr f_gray"><textarea name="msgtext" cols="60" rows="12" id="textarea"><?=ehtmlspecialchars(stripSlashes($msgtext))?></textarea>
      </td>
  </tr>
  <tr> 
    <td class="tl">&nbsp;</td>
    <td height="25" class="tr f_gray"><input type="submit" class="btn" name="Submit" value="Send">
      &nbsp; 
      <input type="reset" name="Submit2" class="btn" value="Reset"> <input  name="enews" type="hidden" id="enews" value="AddMsg">              </td>
  </tr>
</form>
</table>
<script type="text/javascript">m('add'),s('spread');c(0);</script>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
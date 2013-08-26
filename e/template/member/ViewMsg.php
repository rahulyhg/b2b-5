<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='';
$url="";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td class="tab" id="add"><a href="../AddMsg/?enews=AddMsg""><span>Send Message</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="inbox"><a href="../"><span>Inbox</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab_on" id="list"><a href="#"><span>Message</span></a></td>
<td class="tab_nav">&nbsp;</td>
</tr>
</tbody>
</table>
</div>
<table cellpadding="3" cellspacing="1" class="tb">
<form name="form1" method="post" action="../../doaction.php">
  <tr> 
    <td class="tl" height="30">Topic：</td>
    <td height="30" class="tr f_gray"><?=stripSlashes($r[title])?></td>
  </tr>
  <tr> 
    <td class="tl" height="30">From：</td>
    <td class="tr f_gray">
        <?php if($r[from_username]=='None'){?>
        anonymous
        <?php }else{?>
        <a href="../../ShowInfo/?userid=<?=$r[from_userid]?>"><?=$r[from_username]?></a>
        <?php }?>
    </td>
  </tr>
  <tr> 
    <td class="tl" height="30">Send Date：</td>
    <td class="tr f_gray">
      <?=$r[msgtime]?>              </td>
  </tr>
  <tr> 
    <td class="tl" valign="top">Message：</td>
    <td height="60"> 
      <?=nl2br(stripSlashes($r[msgtext]))?>              </td>
  </tr>
  <tr> 
    <td class="tl" valign="top"  height="30">&nbsp;</td>
    <td class="tr f_gray">[<a href="#ecms" onclick="javascript:history.go(-1);"><strong>Back</strong></a>] 
      <?php if($r[from_username]!='None'){?>
        [<a href="../AddMsg/?enews=AddMsg&re=1&mid=<?=$mid?>"><strong>Re Message</strong></a>] 
      <?php }?>
      [<a href="../../doaction.php?enews=DelMsg&mid=<?=$mid?>" onclick="return confirm('Delete the message?');"><strong>Delete</strong></a>]</td>
  </tr>
</form>
</table>
<script type="text/javascript">s('spread');c(0);</script>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
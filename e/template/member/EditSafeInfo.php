<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='修改资料';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;修改安全信息";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="menu">
    <table cellpadding="0" cellspacing="0">
    <tbody>
     <tr>
    <td class="tab_on" id="list"><a href="../"><span>Account</span></a></td>
    <td class="tab_nav">&nbsp;</td>
    </tr>
    </tbody>
    </table>
</div>
<table cellpadding='3' cellspacing='1' class="tb">
  <form name=userinfoform method=post enctype="multipart/form-data" action=../doaction.php>
    <input type=hidden name=enews value=EditSafeInfo>
    <tr> 
      <td width='21%' class="tl">Username</td>
      <td width='79%' height="25" bgcolor="#FFFFFF"> 
        <?=$user[username]?>
      </td>
    </tr>
    <tr> 
      <td class="tl">Old password</td>
      <td class="tr f_gray"> <input name='oldpassword' type='password' id='oldpassword' size="38" maxlength='20'>
        (Need to change your password or email password authentication)</td>
    </tr>
    <tr> 
      <td class="tl">New password</td>
      <td class="tr f_gray"> <input name='password' type='password' id='password' size="38" maxlength='20'>
        (Do not want to modify please leave blank)</td>
    </tr>
    <tr> 
      <td class="tl">Re-type Password</td>
      <td class="tr f_gray"> <input name='repassword' type='password' id='repassword' size="38" maxlength='20'>
        (Do not want to modify please leave blank)</td>
    </tr>
    <tr> 
      <td class="tl">Email Address</td>
      <td class="tr f_gray"> <input name='email' readonly="true" type='text' id='email' value='<?=$user[email]?>' size="38" maxlength='50'>
      </td>
    </tr>
    <tr> 
      <td height="40" class="tl">&nbsp;</td>
      <td class="tr f_gray"> <input type='submit' class="search-bar-button" name='Submit' value='Edit'>
      </td>
    </tr>
  </form>
</table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
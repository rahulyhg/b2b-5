<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='修改资料';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;修改资料";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<?php if(!$addr['content'] || !$addr['phone']|| !$addr['fax'] || !$addr['truename'] || !$addr['address']){?>
<div class="warn">Your company profile and personal info have rejected, please first edit it .<br>
Because In Company Profile, Required company province information had not been submitted.<br>
Buyers cannot search your company and your products ,if your company profile or personal info have been rejected.</div>
<?}?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="Tab0"><a href="javascript:Tab(0);"><span>personal info</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="Tab1"><a href="javascript:Tab(1);"><span>company profile</span></a></td>
<td class="tab_nav">&nbsp;</td>
<!--<td class="tab" id="Tab2"><a href="javascript:Tab(2);"><span>公司联系方式</span></a></td>-->
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="Tab3"><a href="javascript:Tab(3);"><span>company Introduction</span></a></td>
</tr>
</table>
</div>
  <form onsubmit="return Dcheck();" name="userinfoform" method="post" enctype="multipart/form-data" action="../doaction.php">
    <input type=hidden name=enews value=EditInfo>
<table cellpadding="6" cellspacing="1" class="tb">    
    <?php
	include($formfile);
	?>
<tbody><tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 保 存 " class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"></td>
</tr>
</tbody>
</table>
 </form>
<script type="text/javascript">
m('Tab0');
$('#Tabs1').hide();
$('#Tabs3').hide();
function countryChange(obj)
{
	var lrc = obj.item(obj.selectedIndex).getAttribute('countrycode');
	$("#countrycode").val(lrc);
	$("#countryimg").attr('src',"<?=$public_r['newsurl']?>images/country/"+lrc+".gif");
}
function Dcheck()
{
	if(Dd('truename').value.length <3) {
		Tab(0);
		Dmsg('Please enter a valid format(5 - 20 charactors, A-Z, a-z, 0-9 Or _ only).', 'truename');
		return false;
	}
    
    var b = /.{3,100}/;		
	if(Dd('address').value.replace(b, "")) {
		Tab(0);
		Dmsg("Please enter a value between 2 and 100 characters long.", 'address');
		return false;
	}
    
    var b = /[0-9]{2,4}-[0-9]{3,5}-[0-9]{6,8}/;
	if(Dd('phone').value.length <2 || Dd('phone').value.replace(b, "") ) {
		Tab(0);
		Dmsg("Please enter a valid phone number  (e.g: 86-010-12345678)", 'phone');
		return false;
	}

	if(Dd('fax').value.length <2 || Dd('fax').value.replace(b, "") ) {
		Tab(0);
		Dmsg("Please enter a valid fax number  (e.g: 86-010-12345678)", 'fax');
		return false;
	}
    
   var b = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
   if(Dd('msn').value.length < 1 || Dd('msn').value.replace(b, "") ) {
		Tab(0);
		Dmsg("Please enter a valid msn (e.g: XXX@hotmail.com)", 'msn');
		return false;
	}
    
    var b = /\d{2,20}/;
    if(Dd('zipcode').value.length > 0)
    {
        if(Dd('zipcode').value.replace(b, ""))
        {
            Tab(0);
            Dmsg("Invalid zipcode", 'zipcode');
            return false;
        }

    }
    
    company_l = Dd('company').value.length;
	if(company_l < 2 || company_l > 100) {
		Tab(1);
		Dmsg('Please enter a value between 2 and 100 characters long.', 'company');
		return false;
	}	
/*
	if(Dd('markets').value == '') {
		Tab(1);
		Dmsg('请填写主要市场', 'markets');
		return false;
	}	
	if(Dd('industry').value == '') {
		Tab(1);
		Dmsg('请填写主营行业', 'industry');
		return false;
	}	
	if(Dd('business').value == '') {
		Tab(1);
		Dmsg('请填写主要经营范围', 'business');
		return false;
	}	

	if(Dd('country').value == '') {
		Tab(1);
		Dmsg('请选择所在地区', 'country');
		return false;
	}
    */
   var b = /\d{4}/;
   if(Dd('year').value.length <1 || Dd('year').value.replace(b, "")) {
		Tab(1);
		Dmsg('Please enter a valid(e.g. 2008)', 'year');
		return false;
	}
   
   var b = /(?:[\s\S]{20,4000})/;
	if(Dd('content').value.length <20 || Dd('content').value.replace(b, "")) {
		Tab(3);
		Dmsg('Please enter a value between 20 and 4000 characters long.','content');
		return false;
	}
}
</script>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
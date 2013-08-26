<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><table cellpadding="6" cellspacing="1" class="tb">
<tbody>
<tr>
    <td class="tl"><span class="f_red">*</span>Title</td>
    <td class="tr f_gray"><input name="title" id='title' type="text" size="42" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'title',stripSlashes($r[title]))?>">（5-30 characters）<span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
    <td class="tl">Keywords</td>
    <td class="tr f_gray"><input name="keyboard" id='keyboard' type="text" size=42 value="<?=stripSlashes($r[keyboard])?>">（2-20 Characters）<span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
    <td class="tl"><span class="f_red">*</span>Brand Name</td>
    <td class="tr">
<input name="brand" type="text" id="brand" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'brand',stripSlashes($r[brand]))?>" size="">
<span id="dbrand" class="f_red"></span></td>
</tr>
</tr>
    <td class="tl"><span class="f_red">*</span>Packaging</td>
    <td class="tr"><input name="package" type="text" id="package" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'package',stripSlashes($r[package]))?>" size="30">
<span id="dpackage" class="f_red"></span></td>
</tr>
</tr>
    <td class="tl">Lead Image</td>
    <td class="tr">
<div id="preview"><img src="<?=$r[titlepic]?>" width='80' height='80' border='0' /></div>
<input type="file" id="upload" name="titlepicfile" onchange="previewImage(this, 'preview', 100, 100); document.getElementById('uploadTips').innerHTML='';"/>
<div id="uploadTips"></div>
    </td>
</tr>
</tr>
    <td class="tl"><span class="f_red">*</span>Quick Details</td>
    <td class="tr">
        <table width="100%" cellpadding="6" cellspacing="1">
        <tbody>
    <tr>
    <td width="90">Unit</td>
    <td><input name="unit" type="text" id="unit" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'unit',stripSlashes($r[unit]))?>" onkeyup="if(this.value){Dd('u1').innerHTML=Dd('u2').innerHTML=Dd('u3').innerHTML=this.value;}" id="u0" size="10"><span id="dunit" class="f_red"></span></td>
    </tr>
    <tr>
    <td>FOB Price</td>
    <td><input name="price" type="text" id="price" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'price',stripSlashes($r[price]))?>" size="10">
 /<span id="u1">Carton</span> <span id="dprice" class="f_red"></span></td>
    </tr>
    <tr>
    <td>Min Orders</td>
    <td><input name="orders" type="text" id="orders" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'orders',stripSlashes($r[orders]))?>" size="10">
 <span id="u2">Carton</span> <span id="dorders" class="f_red"></span></td>
    </tr>
    <tr>
    <td>Supply Ability</td>
    <td><input name="supply" type="text" id="supply" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'supply',stripSlashes($r[supply]))?>" size="10">
 <span id="u3">Carton</span>
        <select name="supply_unit" id="supply_unit"><option value="per Month"<?=$r[supply_unit]=="per Month"||$ecmsfirstpost==1?' selected':''?>>per Month</option><option value="per Year"<?=$r[supply_unit]=="per Year"?' selected':''?>>per Year</option><option value="per Week"<?=$r[supply_unit]=="per Week"?' selected':''?>>per Week</option></select>
    </td>
    </tr>
    <tr>
    <td>Delivery</td>
    <td><input name="days" type="text" id="days" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'days',stripSlashes($r[days]))?>" size="3">
 days getting advance peyment<span id="ddays" class="f_red"></span></td>
    </tr>
    </tbody>
        </table>        
    </td>
</tr>
</tr>
    <td class="tl"><span class="f_red">*</span>Paymode</td>
    <td class="tr"><input name="paymode[]" type="checkbox" value="L/C"<?=strstr($r[paymode],"|L/C|")?' checked':''?>>L/C<input name="paymode[]" type="checkbox" value="D/P"<?=strstr($r[paymode],"|D/P|")?' checked':''?>>D/P<input name="paymode[]" type="checkbox" value="T/T"<?=strstr($r[paymode],"|T/T|")?' checked':''?>>T/T<span id="dpaymode" class="f_red"></span></td>
</tr>
</tr>
    <td class="tl"><span class="f_red">*</span>Desc:</td>
    <td class="tr"><?=ECMS_ShowEditorVar("newstext",$ecmsfirstpost==1?"":DoReqValue($mid,'newstext',stripSlashes($r[newstext])),"Basic","","300","700")?>
<span id="dnewstext" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" Save " class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" Back " class="btn" onclick="history.back(-1);"></td>
</tr>
</tbody>
</table>
   
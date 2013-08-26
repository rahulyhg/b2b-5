<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']=$word;
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=".$mid."'>管理信息</a>&nbsp;>&nbsp;".$word."&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script type="text/javascript">s('mid_17');c(1);</script>
<script>
 function Dcheck()
 {
    l = Dd('title').value.length;
    
    var c = new RegExp("[\u4e00-\u9fa5]");
    if (c.test(Dd('title').value))
    {
        Dmsg('Dose not support Chinese!', 'title');
        return false;
    }
    if(l < 5 || l > 30)
    {
        Dmsg('Please enter a value between 5 and 120 characters long', 'title');
        return false;
    }
    
    brand_l = Dd('brand').value.length;
    if(brand_l < 1 || brand_l > 15)
    {
        Dmsg('Please enter a value between 1 and 15 characters', 'brand');
        return false;
    }
    
    package_l = Dd('package').value.length;
    if(package_l < 1 || package_l > 30)
    {
        Dmsg('Please enter a value between 1 and 30 characters', 'package');
        return false;
    }
    
    
    unit_l = Dd('unit').value.length;
    if (c.test(Dd('unit').value))
    {
        Dmsg('Dose not support Chinese!', 'unit');
        return false;
    }
    if(unit_l < 1 || unit_l > 30)
    {
        Dmsg('Please enter no more than 10 characters.', 'unit');
        return false;
    }
    
    
    price_l = Dd('price').value.length;
    if(price_l < 1 || price_l > 30)
    {
        Dmsg('Please enter a value.', 'price');
        return false;
    }
    var b = /^[1-9][0-9]*[-\.]?[0-9]*$/;
    if(Dd('price').value.replace(b, ""))
    {
        Dmsg('Please enter a value greater than or equal to 1.', 'price');
        return false;        
    }

    
    
    var b = /^[1-9][0-9]{0,9999}$/;
    orders_l = Dd('orders').value.length;
    if(orders_l < 1 || orders_l > 10)
    {
        Dmsg('Please enter a value less than or equal to 10000.', 'orders');
        return false;
    }
    if(Dd('orders').value.replace(b, ""))
    {
        Dmsg('Please enter a value less than or equal to 10000.', 'orders');
        return false;        
    }
    
    var b = /^[1-9][0-9]{0,9999}$/;
    supply_l = Dd('orders').value.length;
    if(supply_l < 1 || supply_l > 10)
    {
        Dmsg('Please enter a value less than or equal to 10000.', 'supply');
        return false;
    }
    if(Dd('supply').value.replace(b, ""))
    {
        Dmsg('Please enter a value less than or equal to 10000.', 'supply');
        return false;        
    }
    
    var b = /^[1-9][0-9]{0,999}$/;
    days_l = Dd('days').value.length;
    if(days_l < 1 || days_l > 3)
    {
        Dmsg('Please enter a value less than or equal to 100.', 'days');
        return false;
    }
    if(Dd('days').value.replace(b, ""))
    {
        Dmsg('Please enter a value less than or equal to 100.', 'days');
        return false;        
    }
    
    paymode_l = Dd('paymode').value.length;
    if(paymode_l < 1 || paymode_l > 30)
    {
        Dmsg('Please enter no more than 30 characters.', 'paymode');
        return false;
    }   
    newstext_l = Dd('newstext').value.length;
    if(newstext_l < 10)
    {
        Dmsg('Please enter more than 30 characters.', 'newstext');
        return false;
    }   
 /*    
if(Dd('supply_unit').value =='') {
Dmsg('请选择所在地区', 'supply');
return false;
}
*/

}
function previewImage(f,k,c,l){var e=c?c:300;var d=l?l:300;var b=document.getElementById(k);if(f.files&&f.files[0]){b.innerHTML='<img id="imghead">';var g=document.getElementById("imghead");g.onload=function(){var m=clacImgZoomParam(e,d,g.offsetWidth,g.offsetHeight);g.width=m.width;g.height=m.height;g.style.marginLeft=m.left+"px";g.style.marginTop=m.top+"px"};var h=new FileReader();h.onload=function(m){g.src=m.target.result};h.readAsDataURL(f.files[0])}else{f.select();var a=document.selection.createRange().text;b.innerHTML='<img id="imghead">';var g=document.getElementById("imghead");g.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src=a;var j=clacImgZoomParam(e,d,g.offsetWidth,g.offsetHeight);var i='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';b.innerHTML="<div id='imghead' style='width:"+j.width+"px;height:"+j.height+"px;margin-top:"+j.top+"px;margin-left:"+j.left+"px;"+i+a+"\")'></div>"}}function clacImgZoomParam(d,c,b,a){var e={top:0,left:0,width:b,height:a};if(b>d||a>c){rateWidth=b/d;rateHeight=a/c;if(rateWidth>rateHeight){e.width=d;e.height=Math.round(a/rateWidth)}else{e.width=Math.round(b/rateHeight);e.height=c}}e.left=Math.round((d-e.width)/2);e.top=Math.round((c-e.height)/2);return e};
</script>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="tab_on" id="add"><a href="#"><span>Post Selling</span></a></td>
<td class="tab_nav">&nbsp;</td>
</tr>
</tbody></table>
</div>
<form onsubmit="return Dcheck();" name="add" method="POST" enctype="multipart/form-data" action="ecms.php">
<input type=hidden value=<?=$enews?> name=enews> 
<input type=hidden value=<?=$classid?> name=classid> 
<input name=id type=hidden id="id" value=<?=$id?>> 
<input type=hidden value="<?=$filepass?>" name=filepass> 
<input name=mid type=hidden id="mid" value=<?=$mid?>>
<input name='company_name' type=hidden  value=<?=$memberinfor['company']?>>
<input name='truename' type=hidden value=<?=$memberinfor['sex'].$memberinfor['truename']?>>
<input name='phone' type=hidden value=<?=$memberinfor['phone']?>>
<input name='fax' type=hidden  value=<?=$memberinfor['fax']?>>
<input name='countrycode' type=hidden  value=<?=$memberinfor['countrycode']?>>
<style>
.tr input {
height: 20px;
padding: 3px 2px 0;
border: 1px solid #7F9DB9;
margin-right: 4px;
vertical-align: middle;
}
   </style>
<table cellpadding="6" cellspacing="1" class="tb">
<td class="tl"><span class="f_red">*</span> Category</td>
<td class="tr"><?=$postclass?></td>
</tr>
</table> 
  <?php @include($modfile);?>
</form>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
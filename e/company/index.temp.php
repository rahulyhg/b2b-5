<?php
if(!defined('InEmpireCMS')){exit();}
require(ECMS_PATH.'e/data/template/cp_3.php');
?>
<link type="text/css" rel="stylesheet" href="<?=$public_r['newsurl']?>css/search.css?v=1348641807043" />
<div class="layout">
	<div class="col-main">
        <div id="colRight" class="col-right clearfix">
            <div class="maincontainer">
                <div class="maincontent" style="margin-right: 0">
                    <div class="topfilter">
                        <div class="search-result">
			<b>3,344</b><span> wholesale items found </span><span>in</span>&nbsp;&nbsp;<h2>[!--class.name--]</h2> 
                        </div>
                    </div>
                    <div id="proList" class="prolist">

                        <div class="probox">
    <div class="photo">
        <img src="[!--news.url--]/images/no.jpg" style="width: 100px; height: 100px;">
    </div>
    <div class="prolist-info">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7905811381196092";
/* 详细页面 */
google_ad_slot = "7585645641";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	
        <div class="sellerinfo">
            <span class="factoryico"></span>
            <a href="#" title="View store">Seller shop</a>
            <a rel="nofollow"  class="mailico" onclick="messageTo();">Message Seller</a>
        </div>
    </div>
</div>       
<?php
while($r=$empire->fetch($sql))
{
    $pic = $r['userpic'];
    if(!$pic) $pic = 'images/nopic.gif';
?>             
    <div class="probox">
    <div class="photo">
        <a class="lazyload" href="<?=$public_r['newsurl']?>sp/<?=$r['userid']?>.html"  target="_blank"><img src="<?=$public_r['newsurl'].$pic?>"  style="width: 80px; height: 80px;"></a>
    </div>
    <div class="prolist-info">
        <h4><a href="<?=$public_r['newsurl']?>sp/<?=$r['userid']?>.html" target="_blank"><?=$r['company']?></a></h4>
        <p><?=substr($r['content'],0,200) ?></p>
        <div class="sellerinfo">
            <span class="factoryico"></span>
            <a target="_blank" href="<?=$public_r['newsurl']?>sp/<?=$r['userid']?>.html" title="corpmarket">Company</a>
            <a target="_blank" href='<?=$public_r['newsurl']?>e/space/product.php?userid=<?=$r['userid']?>'>[All products]</a>
        </div>
		<div class="merchant-t"><span>Top Merchant</span>Best service, high quality products, positive buyer reviews</div>
    </div>
</div>                    
 <?php
}
?>
                    </div>
                    <div class="page"><?=$returnpage?></div>
                </div>
            </div>
        </div>
    </div>
<div id="colLeft" class="col-left">
<h3>Categories</h3>
<dl>
	<dt></dt>
	<dd>
		<ul class="arrowlist">
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=1">Agriculture</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=2">Apparel & Fashion</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=3">Automobile</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=4">Business Services</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=5">Chemicals</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=6">Computer Hardware & Software</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=7">Construction & Real Estate</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=8">Electrical Equipment & Supplies</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=9">Electronic Components & Supplies</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=10">Energy</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=11">Environment</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=12">Excess Inventory</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=13">Food & Beverage</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=14">Furniture & Furnishings</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=15">Gifts & Crafts</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=16">Health & Beauty</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=17">Home Appliances</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=18">Home Supplies</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=19">Industrial Supplies</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=20">Lights & Lighting</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=21">Luggage, Bags & Cases</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=22">Minerals, Metals & Materials</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=23">Office Supplies</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=24">Packaging & Paper</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=25">Printing & Publishing</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=26">Security & Protection</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=27">Sports & Entertainment</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=28">Telecommunications</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=29">Textiles & Leather Products</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=30">Timepieces, Jewelry, Eyewear</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=31">Toys</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=32">Transportation</a>
		<li><a href="<?=$public_r['newsurl']?>e/company/index.php?cid=33">Others</a>
		</ul>
	</dd>
</dl>
</div>
</div>
<?php require(ECMS_PATH.'e/data/template/cp_2.php');?>
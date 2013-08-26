<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html>
<html>
    <head>
<title>Global Marketing Place - Manufacturers,Suppliers,Exporters Wholesalers on BJshibang.com</title>
<meta name="keywords" content="wholesale, wholesalers, wholesale china, wholesale products,Manufacturer,Suppliers,Exporters" />
<meta name="description" content="BJshibang is a global free online B2B marketplace. We have quality Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products and Trade Leads." />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="http://test.b2b.com/css/home.css">
    </head>
    <body>
     <div class="page-inner">
    <div id="pageT">
        <div id="topNav" class="top-nav">
            <div class="top-nav-l">
                <ul id="topNavL" class="clearfix">
                    <li class="tnl-wel">Welcome to BJshibang!</li>
                    <li class="tnl-joinFree"><a href="http://test.b2b.com/e/member/register">Join Free</a></li>
                    <li class="tn-split"></li>
                    <li><a href="http://test.b2b.com/e/member/login/">Sign in</a></li>
                </ul>
            </div>
            <div class="top-nav-r">
                <ul id="topNavR_EN" class="clearfix">
                    <li><a href="http://test.b2b.com/e/member/my/">My BJshibang</a></li>
                    <li class="tn-split"></li>
                    <li class="tn-help"><a href="#">Help</a></li>
                    <li class="tn-split"></li>
                    <li><a href="#">VIP Club</a></li>
                </ul>
                <div id="topNavR_CN" class="top-nav-r-cn"></div>
            </div>
        </div>

        <div class="header">
            <div class="logo"><a href="http://test.b2b.com/">BJshibang Wholesale Homepage</a></div>
            <div class="ftm-tit">Fast Trading Marketplace</div>
            <form id="searchForm" action="http://test.b2b.com/e/search/" autocomplete="off" method="post" name="searchForm">
            <input type="hidden" name="show" value="title" />
            <input type="hidden" name="tempid" value="1" />
                <div class="search-bar-autocomplete">
                    <div class="search-bar-keyword"><input type="text" value="" id="keyboard" name="keyboard" autocomplete="off" class="ac_input" style="width: 404px; "></div>
                </div>
                <div id="catalogBox" class="search-select-box">
                    <select name="category" style="height: 29px;border:none;border-left:0px solid #ccc;">
                        <option value="1" selected>Product Info</option>
                        <option value="2">Site News</option>
                    </select>
                </div>
                <input class="search-bar-button" type="submit" value="Search" name="Search">
            </form>
            <div class="popular-searches">Popular Searches:
<? @sys_ShowSearchKey(10,10,0,1);?>
             </div>
        </div>

        <div class="main-entrance">
            <div class="main-entrance-lp">
                <ul>
                    <li class="goldli"><a href="http://test.b2b.com/" title=""><span class="g">H</span><span>omePage</span></a></li>
                    <li class="main-entrance-split"></li>
                    <li class=""><a href="http://test.b2b.com/category/">Product</a></li>
                    <li class="main-entrance-split"></li>
                    <li class=""><a href="http://test.b2b.com/">Buying leads</a></li>
                    <li class="main-entrance-split"></li>
                    <li class=""><a href="http://test.b2b.com/e/company/">Companies</a></li>
                </ul>
            </div>
            <div class="main-entrance-categories"><a href="http://test.b2b.com/category/">ALL CATEGORIES</a></div>
            <!--<div class="main-entrance-protection"><a href="#">Buyer Protection PLUS</a></div>-->
        </div>
    </div>
    <div id="pageM" class="layout">
        <div class="col-main">
            <div class="col-right">
            	<div id="mainConvertWarp">

                    <div id="mainConvert" class="main-convert">
                        <img src="http://test.b2b.com/images/XmasStore.jpg" width="790" height="185">
                    </div>

                    <div id="mainConvertNav" class="main-convert-nav">
                        <ul>
                        <li rel="0" class="cur">Christmas Store</li>
                        <li rel="1" class="">Crazy Christmas Deals</li>
                        <li rel="2" class="">VIP Christmas Stocking</li>
                        <li rel="3" class="">Visa Card Gift Grab</li>
                        <li rel="4" class="">MasterCard Mega-Blast</li>
                        </ul>
                    </div>
                </div>
                <div class="bs-tit" id="heremore"><h2>Bestselling Products</h2></div>
                <div class="bs-list">
                	<ul class="clearfix">
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select * from {$dbtbpre}ecms_news order by onclick desc limit 10",10,24,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                        <li>
                        	<a href="<?=$bqsr[titleurl]?>">
                            	<div class="sb-imgContainer">
                                	<img width="120" height="120" alt="<?=$bqr[title]?>" src="<?=$bqr[titlepic]?>">
                                </div>
                        		<span class="sb-imgContainerTit"><?=esub($bqr[title],15)?></span>
                             </a>
                        </li>
<?php
}
}
?>
                    </ul>
                </div>
                <div class="fs-tit" id="heremore2"><h2>News Products</h2></div>
                <div class="fs-list">
                	<ul class="clearfix">
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select * from {$dbtbpre}ecms_news order by id desc limit 10",10,24,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                        <li>
                            <div class="fs-imgContainer"><a href="<?=$bqsr[titleurl]?>"><img src="<?=$bqr[titlepic]?>" width="120" height="120"></a></div>
                            <div class="fs-na">Seller: <a target="_blank"  href="http://test.b2b.com/sp/<?=$bqr[userid]?>.html"><?=$bqr[username]?></a></div>
                            <div class="fs-des"><?=$bqr[title]?></div>
                        </li>
<?php
}
}
?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-left">
            <div id="navBrowseFylout" class="nav_browse_flyout">
                <div id="navCatsWarp" class="nav_cats_warp">
                    <ul id="navCats" class="nav_cats">
                        <? @sys_ShowClassByTemp(1,1,0,21);?>
                        <li class="nav_cat_last"><a href="http://test.b2b.com/news/">More Categories</a></li>
                    </ul>
                </div>
        </div>
        </div>
    </div>
<div id="recommend-products" class="rp rp-view-single">
    <h2><span id="rp-title">Hot Products</span>
        <span id="rp-intro" class="rp-intro">What other customers are looking at.</span>
    </h2>
    <div class="rp-content clearfix rp-thumb-right" id="rp-content">
        <div class="rp-left-bar" id="rp-left-bar">
            <span class="rp-left-btn"></span>
        </div>
        <ul id="rp-items" class="rp-items">
            <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(1,5,0,1,"istop=1");
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
            <li class="rp-item rp-item-first">
                <div class="rp-item-img">
                    <a href="<?=$bqsr[titleurl]?>" class="img-out-wrapper">
                        <img src="<?=$bqr[titlepic]?>" title="<?=$bqr[title]?>" alt="<?=$bqr[title]?>" width='100' height='100' >
                    </a>
                </div>
                <a href="<?=$bqsr[titleurl]?>" class="rp-caption" ><?=$bqr[title]?></a>
            </li>
<?php
}
}
?>  
</ul>
        <div class="rp-right-bar" id="rp-right-bar"><span class="rp-right-btn"></span></div>
    </div>
</div>
    <h4 class="bookmark-tit">Bookmark &amp; Share</h4>
    <div class="bookmark clearfix">
        <ul>
            <li class="i2"><a href="javascript:loadPage('facebook', title, description)">Facebook</a></li>
            <li class="i9"><a href="javascript:loadPage('google', title, description)">Google</a></li>
            <li class="i11"><a href="javascript:loadPage('twitter', title, description)">Twitter</a></li>
            <li class="i3"><a href="javascript:loadPage('kaboodle', title, description)">Kaboodle</a></li>
            <li class="i1"><a href="javascript:loadPage('del.icio.us', title, description)">Delicious</a></li>
            <li class="i6"><a href="javascript:loadPage('stumbleupon', title, description)">StumbleUpon</a></li>
        </ul>
    </div>
    <div class="summary">
        <h1>China Wholesale Marketplace</h1>
        <p>BJshibang.com is the world's leading B2B online trading marketplace for China wholesale products, serving the world's small and medium sized businesses since 2004. We are backed by investors KPCB, JAFCO and Warburg Pincus helping us make online trade simple.</p>
    </div>
    <div style="border-bottom: 1px solid #cecece; margin: 5px auto"></div>
	<div class="f-feedback">Help improve your experience on BJshibang.com</div>
    <div class="f-entrance"><a href="http://test.b2b.com/">Security &amp; Privacy</a> | <a href="http://test.b2b.com/">Help</a> | <a href="http://test.b2b.com/">About Us</a> |  <a href="http://test.b2b.com/">Sitemap</a></div>
    <div class="f-copyright">Copyright Notice © 2010 - 2013 BJshibang.com  All rights reserved.</div>
</div>
<script src="http://test.b2b.com/js/head.min.js" charset="utf-8"></script>
<script src="http://test.b2b.com/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="http://test.b2b.com/js/jquery.lazyload.min.js?v=1352884587176"></script>
 <script type="text/javascript" charset="utf-8">
       $(document).ready(function(){
          $("img").lazyload();
      });
  </script>
</body>
</html>
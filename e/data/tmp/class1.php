<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html>
<html>
<head>
<title>product catalog|products Category|company directory|international trade|global trade|trade leads|China manufacture</title>
<meta name="keywords" content="product catalog,products Category,company directory,company Category,company catalog, international trade,global trade,trade leads,China manufacturer,China trade,China supplier,China suppliers,industry,product,company,Suppliers,Manufacturers,ExportersImporters" />
<meta name="description" content="catalog of china products from china manufacturers,china suppliers and exporters,Search for china products from China manufacturers,suppliers and exporters,just like agriculture,Electrical Equipment&Supplies" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link type="text/css" rel="stylesheet" href="http://test.b2b.com/css/main.css?v=1348641807043" />
<link type="text/css" rel="stylesheet" href="http://test.b2b.com/css/category.css?v=1348641807043" />
</head>
<body class="body-space">
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
<div class="ban"></div>
<div class="layout">
	<div class="col-main">
        <div class="col-right clearfix">
        <!--Top Product Start-->
        <div class="topcat">
            <div class="topcat_nei">
                <div class="topcat_to">Top Categories</div>
                <div class="topcat_ce clfix">
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(1,6,0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<div class="hotpic2">
<div class="hotpic_tu2"><a href="<?=$bqsr[titleurl]?>"><img src="<?=$bqr[titlepic]?>" width="84" height="84"></a></div>
<div class="hotpic_zi" style="height:45px;"><a href="<?=$bqsr[titleurl]?>"><?=esub($bqr[title],15)?></a></div>
</div> 
<?php
}
}
?>
                </div>
            </div>
        </div>
        <!--Top Product end-->
    <div class="cencat">
        <div class="cencat_nei">
          <div class="cencat_to">Products By Category</div>
          <div class="cencat_ce">
        <div class="cateList">
        <h4></h4>
<? @sys_ForShowSonClass('1',13,0,15);?>
        </div>
        </div>
        </div>
    </div>
        </div>
    </div>

	<div class="col-left">
	        <h3>New Product</h3>
	       	<dl>
<dt>Product</dt>
<dd>
<ul class="arrowlist">
<? @sys_GetEcmsInfo('selfinfo',10,44,0,0,2,0);?> 
</ul>
</dd>
</dl>
	        <div class="h-line">&nbsp;</div>
	        <h3>Hot Product</h3>
	        <div class="left-box">
	            <ul class="checkboxlist">
<? @sys_GetEcmsInfo('selfinfo',10,40,0,1,10,0);?>
	            </ul>
	        </div>
    	</div>
    <div class="h-line"></div>
</div>
<div class="bookmark">
    <h3 class="title">Bookmark & Share</h3>
    <ul class="clearfix">
        <li class="li13"><a href="javascript:loadPage('facebook', title, description)">Facebook</a></li>
        <li class="li9"><a href="javascript:loadPage('google', title, description)">Google</a></li>
        <li class="li12"><a href="javascript:loadPage('twitter', title, description)">Twitter</a></li>
        <li class="li3"><a href="javascript:loadPage('kaboodle', title, description)">Kaboodle</a></li>
        <li class="li1"><a href="javascript:loadPage('del.icio.us', title, description)">Delicious</a></li>
        <li class="li6"><a href="javascript:loadPage('stumbleupon', title, description)">StumbleUpon</a></li>
    </ul>
</div>
<div id="bottom_nav">
       <p class="feedbacklink">Help improve your experience on BJshibang.com, <a href="http://www.bjshibang.com/" target="_blank">join our Customer Experience Improvement Program now.</a></p>
       <div class="h-line1"></div>
       <p>
           <a style="margin:0" href="http://www.bjshibang.com/" >Home</a> |
           <a style="margin:0" href="http://www.bjshibang.com/myaccount/" >Your Account</a> |
           <a style="margin:0" href="http://www.bjshibang.com/help" >Help</a>
       </p>
       <p>Copyright Notice © 2009 - 2012 BJshibang.com  All rights reserved.</p>
</div>
</body>
</html>
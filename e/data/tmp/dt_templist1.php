<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html>
<html>
<head>
<title>[!--pagetitle--] - BJshibang</title>
<meta name="keywords" content="[!--pagekey--]" />
<meta name="description" content="[!--pagedes--]" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link type="text/css" rel="stylesheet" href="[!--news.url--]css/main.css?v=1348641807043" />
<link type="text/css" rel="stylesheet" href="[!--news.url--]css/search.css?v=1348641807043" />
</head>
<body class="body-space">
    <div id="pageT">
        <div id="topNav" class="top-nav">
            <div class="top-nav-l">
                <ul id="topNavL" class="clearfix">
                    <li class="tnl-wel">Welcome to BJshibang!</li>
                    <li class="tnl-joinFree"><a href="[!--news.url--]e/member/register">Join Free</a></li>
                    <li class="tn-split"></li>
                    <li><a href="[!--news.url--]e/member/login/">Sign in</a></li>
                </ul>
            </div>
            <div class="top-nav-r">
                <ul id="topNavR_EN" class="clearfix">
                    <li><a href="[!--news.url--]e/member/my/">My BJshibang</a></li>
                    <li class="tn-split"></li>
                    <li class="tn-help"><a href="#">Help</a></li>
                    <li class="tn-split"></li>
                    <li><a href="#">VIP Club</a></li>
                </ul>
                <div id="topNavR_CN" class="top-nav-r-cn"></div>
            </div>
        </div>

        <div class="header">
            <div class="logo"><a href="[!--news.url--]">BJshibang Wholesale Homepage</a></div>
            <div class="ftm-tit">Fast Trading Marketplace</div>
            <form id="searchForm" action="[!--news.url--]e/search/" autocomplete="off" method="post" name="searchForm">
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
                    <li class="goldli"><a href="[!--news.url--]" title=""><span class="g">H</span><span>omePage</span></a></li>
                    <li class="main-entrance-split"></li>
                    <li class=""><a href="[!--news.url--]category/">Product</a></li>
                    <li class="main-entrance-split"></li>
                    <li class=""><a href="[!--news.url--]">Buying leads</a></li>
                    <li class="main-entrance-split"></li>
                    <li class=""><a href="[!--news.url--]e/company/">Companies</a></li>
                </ul>
            </div>
            <div class="main-entrance-categories"><a href="[!--news.url--]category/">ALL CATEGORIES</a></div>
            <!--<div class="main-entrance-protection"><a href="#">Buyer Protection PLUS</a></div>-->
        </div>
    </div>
<div class="ban" id="topsponsoredwarp" >[!--newsnav--]</div>
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
                    <div class="toprecommend" id="toprecommend" style="display:none">
                        <!-- 
                        <div class="toprecommend-title">
                        </div>
                        <div class="toprecommend-con  clearfix" id="toprecommendWarp"></div>
-->

                    </div>
                    <div id="proList" class="prolist">

<div class="probox">
    <div class="photo">
        <img src="[!--news.url--]/images/nopic.gif" style="width: 100px; height: 100px;">
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

 	[!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]
                    </div>
                    <div class="page">[!--show.listpage--]</div>
                </div>
            </div>
        </div>
    </div>
    	<div id="colLeft" class="col-left">
	        <h3>Categories</h3>
	       	<dl>
                <dt>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7905811381196092";
/* 160广告 */
google_ad_slot = "2320854440";
google_ad_width = 160;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</dt>
                <dd>
                    <ul class="arrowlist">
<?php
$fr=$empire->fetch1("select islast,classid,bclassid from {$dbtbpre}enewsclass where classid='$GLOBALS[classid]'");
if($fr['islast']==1)
{$cid = $fr[bclassid];}
else
{$cid = $fr[classid];}
?>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select classname,classid from {$dbtbpre}enewsclass where bclassid='$cid'",10,24,10);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<li><a href="[!--news.url--]plist_<?=$bqr[classid]?>.html"><?=$bqr[classname]?></a></li>
<?php
}
}
?>
                    </ul>
                </dd>
            </dl>
	        
            <div class="h-line">&nbsp;</div>
	        <h3>Hot Product</h3>
	        <div class="left-box">
	            <ul class="checkboxlist">
<? @sys_GetEcmsInfo('selfinfo',20,22,0,1,10,0);?> 
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
<script src="[!--news.url--]js/head.min.js" charset="utf-8"></script>
<script src="[!--news.url--]js/init.js" charset="utf-8"></script>
</html>
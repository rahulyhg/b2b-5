<!DOCTYPE html>
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
[!--temp.head--]
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
[e:loop={"select classname,classid from {$dbtbpre}enewsclass where bclassid='$cid'",10,24,10}]
<li><a href="[!--news.url--]plist_<?=$bqr[classid]?>.html"><?=$bqr[classname]?></a></li>
[/e:loop]
                    </ul>
                </dd>
            </dl>
	        
            <div class="h-line">&nbsp;</div>
	        <h3>Hot Product</h3>
	        <div class="left-box">
	            <ul class="checkboxlist">
[ecmsinfo]'selfinfo',20,22,0,1,10,0[/ecmsinfo] 
	            </ul>
	        </div>
  
        </div>
    <div class="h-line"></div>
</div>
[!--temp.foot--]
</body>
<script src="[!--news.url--]js/head.min.js" charset="utf-8"></script>
<script src="[!--news.url--]js/init.js" charset="utf-8"></script>
</html>
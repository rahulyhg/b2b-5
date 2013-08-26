<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=defined('empirecms')?$r[title]:'China Wholesale Marketplace - Login|Register'?> - BJshibang.com</title>
<meta name="keywords" content="<?=defined('empirecms')?$r[title]:'China Wholesale Marketplace - Login|Register'?>" />
<meta name="description" content="<?=defined('empirecms')?$r[title]:'China Wholesale Marketplace - Login|Register'?>" />
<link href="<?=$public_r['newsurl']?>css/main.css" rel="stylesheet" type="text/css" />
</head>
<body class="body-space">
<div id="pageT">
    <div id="topNav" class="top-nav">
        <div class="top-nav-l">
            <ul id="topNavL" class="clearfix">
                <li class="tnl-wel">Welcome to BJshibang!</li>
                <li class="tnl-joinFree"><a href="<?=$public_r['newsurl']?>e/member/register">Join Free</a></li>
                <li class="tn-split"></li>
                <li><a href="<?=$public_r['newsurl']?>e/member/login/">Sign in</a></li>
            </ul>
        </div>
        <div class="top-nav-r">
            <ul id="topNavR_EN" class="clearfix">
                <li><a href="<?=$public_r['newsurl']?>e/member/cp">My BJshibang</a></li>
                <li class="tn-split"></li>
                <li class="tn-help"><a href="<?=$public_r['newsurl']?>help">Help</a></li>
                <li class="tn-split"></li>
                <li><a href="<?=$public_r['newsurl']?>">VIP Club</a></li>
            </ul>
            <div id="topNavR_CN" class="top-nav-r-cn"></div>
        </div>
    </div>
    <div class="header">
        <div class="logo"><a href="<?=$public_r['newsurl']?>">BJshibang Wholesale Homepage</a></div>
        <div class="ftm-tit">Fast Trading Marketplace</div>
        <form id="searchForm" action="<?=$public_r['newsurl']?>e/search/" autocomplete="off" method="post" name="searchForm">
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
        <div class="popular-searches">Popular Searches:</div>
    </div>
    <div class="main-entrance">
        <div class="main-entrance-lp">
            <ul>
                <li class="goldli"><a href="<?=$public_r['newsurl']?>" title=""><span class="g">H</span><span>omePage</span></a></li>
                <li class="main-entrance-split"></li>
                <li class=""><a href="<?=$public_r['newsurl']?>category/">Product</a></li>
                <li class="main-entrance-split"></li>
                
                <li class=""><a href="<?=$public_r['newsurl']?>">Buying leads</a></li>
                <li class="main-entrance-split"></li>
                <li class=""><a href="<?=$public_r['newsurl']?>e/company/">Companies</a></li>
				<!--
                <li class="main-entrance-split"></li>
                <li class=""><a href="<?=$public_r['newsurl']?>">News</a></li>
                <li class="main-entrance-split"></li>
                <li class="pro-color"><a href="<?=$public_r['newsurl']?>">Daily Deals</a></li>
                -->
            </ul>
        </div>
        <div class="main-entrance-categories"><a href="<?=$public_r['newsurl']?>category/">ALL CATEGORIES</a></div>
    </div>
</div>
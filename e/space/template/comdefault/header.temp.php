<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$spacename?>-<?=$public_r['sitename']?></title>
<meta content="<?=$spacename?>" name="keywords" />
<meta content="<?=$spacename?>" name="description" />
<link href="<?=$public_r['newsurl']?>e/space/template/default/images/style.css" rel="stylesheet" type="text/css" />
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="<?=$spacename?>">
    <title><?=$spacename?></title>
</head>
<body>
    <div id="toparea" class="area">
        <p id="logo"><a href="<?=$public_r['newsurl']?>" title="<?=$public_r['sitename']?>"><?=$public_r['sitename']?></a></p>
        <div style="float:right;display:inline-block;height:23px;padding:0px;margin:0px;"></div>
        <form id="searchForm" action="<?=$public_r['newsurl']?>e/search/" autocomplete="off" method="post" name="searchForm">
        <div id="top_search">
            <input type="hidden" name="show" value="title">
            <input type="hidden" name="tempid" value="1">
            <input type="hidden" name="category" value="1">
            <input class="search_kw" name="keyboard" type="text" id="keyboard" style='margin-top:7px'>
            <button class="search_btn">Search</button>
            <span class="clear"></span>
        </div>
        </form>
        <p id="userstatus"><a rel="nofollow" class="sign" href="<?=$public_r['newsurl']?>e/member/login/">Sign In</a>
            <a rel="nofollow" class="join" href="<?=$public_r['newsurl']?>e/member/register/">Join Now</a>
			<!--
            <a rel="nofollow" class="inquiry" href="<?=$public_r['newsurl']?>e/member/register/inquiry">Inquiry Basket  </a>
            <a rel="nofollow" class="help" href="<?=$public_r['newsurl']?>help" target="_blank">Help</a>
			-->
        </p>
        <div class="clear"></div>
    </div>
    <div id="header" class="area">
        <span class="corl"></span>
        <span class="corr"></span>
        <div id="com_logo">
            <p class="pic"><img alt="logo" src="<?=$userpic?>" width="80"><s></s></p>
        </div>
        <div class="h_top">
            <h2 id="com_name"><?=$spacename?></h2>
            <p id="com_level"></p>
             <p class="com_ad">better products, better service, cheaper cost</p>
        </div>
        <div class="h_btm">
            <ul id="menu">
                <li class="<?php if($onmenu=='index') echo 'on'; ?>"><a href="<?=$public_r['newsurl']?>e/space/index.php?userid=<?=$userid?>">Home</a></li>
                <li class="<?php if($onmenu=='product') echo 'on'; ?>"><a href="<?=$public_r['newsurl']?>e/space/product.php?userid=<?=$userid?>">Product List</a></li>
                <li class="<?php if($onmenu=='company') echo 'on'; ?>"><a href="<?=$public_r['newsurl']?>e/space/company.php?userid=<?=$userid?>">Company Info</a></li>
                <li class="<?php if($onmenu=='contact') echo 'on'; ?>"><a href="<?=$public_r['newsurl']?>e/space/contact.php?userid=<?=$userid?>">Contact Details</a></li>
            </ul>
        </div>
    </div>
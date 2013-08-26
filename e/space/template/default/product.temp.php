<?php
if(!defined('InEmpireCMS')){exit();}
include("header.temp.php");
?>
<div id="main" class="area">
    <div class="cent_ade" style="padding-top:10px;">
    <a href="<?=$public_r['newsurl']?>" rel="nofollow">Home</a> &gt; 
    <a href="<?=$public_r['newsurl']?>category" rel="nofollow">Categories</a>
    &gt; <a href="index.php?userid=<?=$userid?>"><?=  strtoupper($addur['company'])?></a>
    &gt; <h1>Product List</h1>
    </div>  
    <div id="content">
        <div class="section_tit"><h3>All Products</h3></div>        
        <div id="google_ad_top">
            <div id="google_ad_btm">
                <div class="m_rtop ad_top">
                google adsense    
                </div>
            </div>
        </div>
        <?php
        while($r=$empire->fetch($sql))
        {
            $titleurl=sys_ReturnBqTitleLink($r);//链接
        ?>
        <ul class="list_imgtxt">
            <li>
        <div class="txtArea">
        <h2><a href="<?=$titleurl?>" title="<?=$r['title']?>"><?=$r['title']?></a></h2>
        <p class="desc"><strong>Description: </strong><?=$r['smalltext']?></p>
        </div>
        <div class="picArea">
        <p class="img">
            <a href="<?=$titleurl?>"><img alt="<?=$r['title']?>"  src="<?=$r['titlepic']?>" style="width: 80px; height: 80px;"></a>
            <s></s>
        </p>
        <a class="btn_inquirenow" href="javascript:post_one_inquiry('chkbox1', 'plist')">Inquire Now</a>
        </div>
        </li>
        </ul>
        <? }?>
        <!-- page-nav -->
        <p id="pagenav" class="m_body green txt_center line"><?=$returnpage?></p>
        <!-- related products -->
        <div id="related_products" class="area">
            <div class="mtop"><span></span></div>
            <div class="mbody">
                <div class="tit">
                    <h3>Related Products:</h3>
                    <a class="more" onclick="toggle(this, 'show_ul', 16)" href="javascript:void(0)">more</a>
                </div>
                <ul id="show_ul">
                    <script src="<?=$public_r['newsurl']?>d/js/class/class3_newnews.js"></script>
                </ul>
            </div>
            <div class="mbtm"><span></span></div>
        </div>
    </div>
<?php include("sidebar.temp.php");?>    
</div>
<?php include("footer.temp.php");?>
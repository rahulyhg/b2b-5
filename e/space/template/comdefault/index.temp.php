<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$usersay=$addur['content']?$addur['content']:'暂无简介';
$usersay=RepFieldtextNbsp(stripSlashes($usersay));
include("header.temp.php");
?>
<div id="main" class="area">
    <div class="cent_ade" style="padding-top:10px;">
        <a href="<?=$public_r['newsurl']?>" rel="nofollow">Home</a> &gt; 
    	<a href="<?=$public_r['newsurl']?>category" rel="nofollow">Categories</a>
        &gt; <h1><?=$addur['company']?></h1>
        </div>
    <div id="content">
        <div class="section_tit"><h3>Company Info</h3></div>
        <div class="section_txt">
        <div id="google_ad_top"></div>
        <strong class="com_adv">better products, better service, cheaper cost</strong>
        <?=substr(nl2br($usersay),0,500)?>                  
         <span class="seemore"><a href="<?=$public_r['newsurl']?>e/space/company.php?userid=<?=$userid?>">Read more</a></span>
         </div>
        <div class="section_tit"><h3>All Products</h3></div>
        <ul class="product_list list_img">
        <?php
        $sql = "select * from {$dbtbpre}ecms_news where userid={$userid} limit 8";
        $query=$empire->query($sql);
        while($r=$empire->fetch($query))
        {
            $titleurl=sys_ReturnBqTitleLink($r);//链接
	   ?>
        <li>
                <p class="pic">
                <a href="<?=$titleurl?>" target='_blank'><img alt="<?=$r['title']?>"  src="<?=$r['titlepic']?>" style="width: 80px; height: 80px;"></a>
                    <s></s>
                </p>
                <a class="txt" href="<?=$titleurl?>" target='_blank'><strong><?=substr($r['title'],0,30)?>...</strong></a>
                <p><a class="btn_inquirenow" href="javascript:post_one_inquiry('chkbox1', 'plist')">Inquire Now</a></p>
            </li>
         <?php
           }
         ?>
       </ul>
        <p class="section_txt tr"><a href="<?=$public_r['newsurl']?>e/space/product.php?userid=<?=$userid?>">Find More Products</a></p>
        <div class="section_tit"><h3>Contact Detail</h3></div>
        <div class="section_txt" id="contact_detail">
           <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
               <tbody>
                <tr>
                    <th style="font-size: 12px;">Company Name: </th>
                    <td><?=$addur['company']?></td>
                </tr>
                <tr>
                    <th>Company Address: </th>
                    <td><?=$addur['address']?></td>
                </tr>
                <tr>
                    <th>City/Province: </th>
                    <td><?=$addur['country']?></td>
                </tr>
                <tr>
                    <th>Zip/Postal Code:</th>
                    <td><?=$addur['zipcode']?></td>
                </tr>

                <tr>
                    <th>Telephone Number:</th>
                    <td><?=$addur['phone']?></td>
                </tr>
                <tr>
                    <th>Fax Number: </th>
                    <td><?=$addur['fax']?></td>
                </tr>
                <tr>
                    <th>Contact Person:</th>
                    <td><?=$addur['truename']?></td>
                </tr>
                <tr>
                    <th>Company Website URL: </th>
                    <td><?=$addur['homepage']?></td>
                </tr>
            </tbody>
           </table>
        </div>
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
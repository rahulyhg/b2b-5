<?php
if(!defined('InEmpireCMS')){exit();}
include("header.temp.php");
?>
<div id="main" class="area">
    <div class="cent_ade" style="padding-top:10px;">
    <a href="<?=$public_r['newsurl']?>" rel="nofollow">Home</a> &gt; 
    <a href="<?=$public_r['newsurl']?>category" rel="nofollow">Categories</a>
    &gt; <a href="index.php?userid=<?=$userid?>"><?=  strtoupper($addur['company'])?></a>
    &gt; <h1>Contact Details</h1>
    </div>    
    <div id="content">
        <div class="section_tit"><h3>Contact Details</h3></div>
        <div class="section_txt">
        <div id="google_ad_top"></div>
        <table class="table">
            <tbody>
                <tr>
                    <th>Company Name: </th>
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
                    <td><?=$addur['sex']?>.<?=$addur['truename']?></td>
                </tr>
                <tr>
                    <th>Company Website URL: </th>
                    <td><?=$addur['homepage']?></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
<?php include("sidebar.temp.php");?>    
</div>
<?php include("footer.temp.php");?>
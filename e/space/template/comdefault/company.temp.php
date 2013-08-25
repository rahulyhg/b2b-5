<?php
if(!defined('InEmpireCMS')){exit();}
include("header.temp.php");
$usersay=$addur['content']?$addur['content']:'No Introduction';
$usersay=RepFieldtextNbsp(stripSlashes($usersay));
?>
<div id="main" class="area">
    <div class="cent_ade" style="padding-top:10px;">
    <a href="<?=$public_r['newsurl']?>" rel="nofollow">Home</a> &gt; 
    <a href="<?=$public_r['newsurl']?>category" rel="nofollow">Categories</a>
    &gt; <a href="index.php?userid=<?=$userid?>"><?=  strtoupper($addur['company'])?></a>
    &gt; <h1>Company Info</h1>
    </div>
    <div id="content">
            <div class="section_tit"><h3>Company Introduction</h3></div>
            <div class="section_txt"><?=$usersay?></div>
            <div class="section_tit"><h3>Company Info</h3></div>
            <div class="section_txt">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
               <tbody>
                <tr>
                    <th>Country/Territory : </th>
                    <td><?=$addur['country']?></td>
                </tr>
                <tr>
                    <th>Year Established : </th>
                    <td><?=$addur['year']?></td>
                </tr>
                <tr>
                    <th>Business Type : </th>
                    <td><?=$addur['businessModel']?></td>
                </tr>
                <tr>
                    <th>Industry : </th>
                    <td><?=$addur['industry']?></td>
                </tr>
                <tr>
                    <th>Total Revenue : </th>
                    <td><?=$addur['revenue']?></td>
                </tr>
                <tr>
                    <th>No. of Total Staff : </th>
                    <td><?=$addur['size']?></td>
                </tr>
               <tr>
                    <th>Buy: </th>
                    <td><?=$addur['buy']?></td>
                </tr>
                <tr>
                    <th>Main Export Markets : </th>
                    <td><?=$addur['markets']?></td>
                </tr>
                </tbody>
             </table>
            </div>
        <!-- related products x-->
    </div>
<?php include("sidebar.temp.php");?>    
</div>
<?php include("footer.temp.php");?>
<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><tr><td bgcolor=ffffff>发布时间</td><td bgcolor=ffffff><input name="newstime" type="text" value="<?=$r[newstime]?>"><input type=button name=button value="设为当前时间" onclick="document.add.newstime.value='<?=$todaytime?>'"></td></tr><tr><td bgcolor=ffffff>标题</td><td bgcolor=ffffff><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
<tr> 
  <td height="25" bgcolor="#FFFFFF">
	<?=$tts?"<select name='ttid'><option value='0'>标题分类</option>$tts</select>":""?>
	<input type=text name=title value="<?=ehtmlspecialchars(stripSlashes($r[title]))?>" size="60"> 
	<input type="button" name="button" value="图文" onclick="document.add.title.value=document.add.title.value+'(图文)';"> 
  </td>
</tr>
<tr> 
  <td height="25" bgcolor="#FFFFFF">属性: 
	<input name="titlefont[b]" type="checkbox" value="b"<?=$titlefontb?>>粗体
	<input name="titlefont[i]" type="checkbox" value="i"<?=$titlefonti?>>斜体
	<input name="titlefont[s]" type="checkbox" value="s"<?=$titlefonts?>>删除线
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name="titlecolor" type="text" value="<?=stripSlashes($r[titlecolor])?>" size="10"><a onclick="foreColor();"><img src="../data/images/color.gif" width="21" height="21" align="absbottom"></a>
  </td>
</tr>
</table></td></tr><tr><td bgcolor=ffffff>标题图片</td><td bgcolor=ffffff><input name="titlepic" type="text" id="titlepic" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[titlepic]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=titlepic','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a></td></tr><tr><td bgcolor=ffffff>支付模式</td><td bgcolor=ffffff><input name="paymode[]" type="checkbox" value="L/C"<?=strstr($r[paymode],"|L/C|")?' checked':''?>>L/C<input name="paymode[]" type="checkbox" value="D/P"<?=strstr($r[paymode],"|D/P|")?' checked':''?>>D/P<input name="paymode[]" type="checkbox" value="T/T"<?=strstr($r[paymode],"|T/T|")?' checked':''?>>T/T</td></tr><tr><td bgcolor=ffffff>交货时间</td><td bgcolor=ffffff><input name="days" type="text" id="days" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[days]))?>" size="3">
</td></tr><tr><td bgcolor=ffffff>内容简介</td><td bgcolor=ffffff><textarea name="smalltext" cols="80" rows="10" id="smalltext"><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[smalltext]))?></textarea>
</td></tr><tr><td bgcolor=ffffff>国家</td><td bgcolor=ffffff>
<input name="country" type="text" id="country" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[country]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>信息来源</td><td bgcolor=ffffff>
<input name="company_name" type="text" id="company_name" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[company_name]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>联系人</td><td bgcolor=ffffff>
<input name="truename" type="text" id="truename" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[truename]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>传真</td><td bgcolor=ffffff>
<input name="fax" type="text" id="fax" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[fax]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>新闻正文</td><td bgcolor=ffffff><?=ECMS_ShowEditorVar("newstext",$ecmsfirstpost==1?"":stripSlashes($r[newstext]),"Default","","300","100%")?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
          <tr> 
            <td bgcolor="#FFFFFF"> <input name="dokey" type="checkbox" value="1"<?=$r[dokey]==1?' checked':''?>>
              关键字替换&nbsp;&nbsp; <input name="copyimg" type="checkbox" id="copyimg" value="1">
      远程保存图片(
      <input name="mark" type="checkbox" id="mark" value="1">
      <a href="SetEnews.php" target="_blank">加水印</a>)&nbsp;&nbsp; 
      <input name="copyflash" type="checkbox" id="copyflash" value="1">
      远程保存FLASH(地址前缀： 
      <input name="qz_url" type="text" id="qz_url" size="">
              )</td>
          </tr>
          <tr>
            
    <td bgcolor="#FFFFFF"><input name="repimgnexturl" type="checkbox" id="repimgnexturl" value="1"> 图片链接转为下一页&nbsp;&nbsp; <input name="autopage" type="checkbox" id="autopage" value="1">自动分页
      ,每 
      <input name="autosize" type="text" id="autosize" value="5000" size="5">
      个字节为一页&nbsp;&nbsp; 取第 
      <input name="getfirsttitlepic" type="text" id="getfirsttitlepic" value="" size="1">
      张上传图为标题图片( 
      <input name="getfirsttitlespic" type="checkbox" id="getfirsttitlespic" value="1">
      缩略图: 宽 
      <input name="getfirsttitlespicw" type="text" id="getfirsttitlespicw" size="3" value="<?=$public_r[spicwidth]?>">
      *高
      <input name="getfirsttitlespich" type="text" id="getfirsttitlespich" size="3" value="<?=$public_r[spicheight]?>">
      )</td>
          </tr>
        </table>
</td></tr>
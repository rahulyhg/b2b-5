<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query="select id,classid,isurl,titleurl,isqf,havehtml,istop,isgood,firsttitle,ismember,username,plnum,totaldown,onclick,newstime,truetime,lastdotime,titlefont,titlepic,title from ".$infotb." where ".$yhadd."userid='$user[userid]' and ismember=1".$add." order by newstime desc limit $offset,$line";
$sql=$empire->query($query);
//返回头条和推荐级别名称
$ftnr=ReturnFirsttitleNameList(0,0);
$ftnamer=$ftnr['ftr'];
$ignamer=$ftnr['igr'];

$public_diyr['pagetitle']='管理信息';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=$mid".$addecmscheck."'>管理信息</a>&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="#"><span>Manage Selling</span></a></td>
<td class="tab_nav">&nbsp;</td>
</tr>
</table>
</div>
<div class="tt">
<div class="mr">
<a href="ListInfo.php?mid=<?=$mid?>" class="<?=$indexchecked==1?'f_b':''?>">Published</a>
 | <a href="ListInfo.php?mid=<?=$mid?>&ecmscheck=1" class="<?=$indexchecked==0?'f_b':''?>">pending</a>
</div>
<form name="searchinfo" method="GET" action="ListInfo.php">
<input name="sear" type="hidden" id="sear" value="1">
<input name="mid" type="hidden" value="<?=$mid?>">
<input name="ecmscheck" type="hidden" id="ecmscheck" value="<?=$ecmscheck?>">
<select name="show">
  <option value="0" selected>title</option>
</select>
<input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>">
<input type="submit" value="search " class="btn">
</form>
</div>
<div class="ls">
<table cellpadding="0" cellspacing="0" class="tb">
  <tr> 
    <th width="50%" height="25">Title</th>
    <th width="13%" height="25">post date</th>
	<th width="8%" height="25">click</th>
    <!--th width="6%">评论</th-->
    <th width="6%">Status</th>
    <th width="17%" height="25">manage</th>
  </tr>
  <?
	while($r=$empire->fetch($sql))
	{
		//状态
		$st='';
		if($r[istop])//置顶
		{
			$st.="<font color=red>[顶".$r[istop]."]</font>";
		}
		if($r[isgood])//推荐
		{
			$st.="<font color=red>[".$ignamer[$r[isgood]-1]."]</font>";
		}
		if($r[firsttitle])//头条
		{
			$st.="<font color=red>[".$ftnamer[$r[firsttitle]-1]."]</font>";
		}
		//时间
		$newstime=date("Y-m-d",$r[newstime]);
		$oldtitle=$r[title];
		$r[title]=stripSlashes(sub($r[title],0,50,false));
		$r[title]=DoTitleFont($r[titlefont],$r[title]);
		if($indexchecked==0)
		{
			$checked='<font color=red>×</font>';
			$titleurl='AddInfo.php?enews=MEditInfo&classid='.$r[classid].'&id='.$r[id].'&mid='.$mid.$addecmscheck;//链接
		}
		else
		{
			$checked='√';
			$titleurl=sys_ReturnBqTitleLink($r);//链接
		}
		$plnum=$r[plnum];//评论个数
		//标题图片
		$showtitlepic="";
		if($r[titlepic])
		{$showtitlepic="<a href='".$r[titlepic]."' title='View picture' target=_blank><img src='../data/images/showimg.gif' border=0></a>";}
		//栏目
		$classname=$class_r[$r[classid]][classname];
		$classurl=sys_ReturnBqClassname($r,9);
		$bclassid=$class_r[$r[classid]][bclassid];
		$br['classid']=$bclassid;
		$bclassurl=sys_ReturnBqClassname($br,9);
		$bclassname=$class_r[$bclassid][classname];
	?>
  <tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';" class="">
    <td height="35"> <div align="left"> 
        <?=$st?>
		<?=$showtitlepic?>
        <a href="<?=$titleurl?>" target=_blank title="<?=$oldtitle?>"><?=$r[title]?></a> ( Category :<a style="color:blue;" href='<?=$classurl?>' target='_blank'><?=$classname?></a>)
        <!--
		<br>
          栏目:<a href='<?=$bclassurl?>' target='_blank'><?=$bclassname?></a> > <a href='<?=$classurl?>' target='_blank'><?=$classname?></a>
      </div>-->
    </td>
    <td height="25"><div align="center"><?=$newstime?></div></td>
	<td height="25"><div align="center"> <a title="views:<?=$r[totaldown]?>"><?=$r[onclick]?></a> </div></td>
    <!--
    <td><div align="center"><a href="<?=$public_r['plurl']?>?id=<?=$r[id]?>&classid=<?=$r[classid]?>" title="查看评论" target=_blank><u><?=$plnum?></u></a></div></td>
    -->
    <td><div align="center"><?=$checked?></div></td>
    <td height="25"><div align="center"><a href="AddInfo.php?enews=MEditInfo&classid=<?=$r[classid]?>&id=<?=$r[id]?>&mid=<?=$mid?><?=$addecmscheck?>">Edit</a> | <a href="ecms.php?enews=MDelInfo&classid=<?=$r[classid]?>&id=<?=$r[id]?>&mid=<?=$mid?><?=$addecmscheck?>" onclick="return confirm('You sure you want to delete?');">Delete</a> 
      </div></td>
  </tr>
  <?
	}
	?>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" colspan="6"> 
      <?=$returnpage?>    </td>
  </tr>
</table>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
<script type="text/javascript">m('add');s('mid_16');c(1);</script>
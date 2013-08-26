<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='消息列表';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;消息列表&nbsp;&nbsp;(<a href='AddMsg/?enews=AddMsg'>发送消息</a>)";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }
</script> 

<div class="menu">
<table cellpadding="0" cellspacing="0">
<tbody>
 <tr>
<td class="tab" id="add"><a href="AddMsg/?enews=AddMsg"><span>Send Message</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="inbox"><a href="#"><span>Inbox</span></a></td>
<td class="tab_nav">&nbsp;</td>
</tr>
</tbody>
</table>
</div>
<div class="ls">
        <table cellpadding="0" cellspacing="0" class="tb">
          <form name="listmsg" method="post" action="../doaction.php" onsubmit="return confirm('Confirm delete?');">
            <tr> 
              <th width="4%" height="23"></th>
              <th width="45%">Topic</th>
              <th width="18%">From</th>
              <th width="23%">Send date</th>
              <th width="10%">Operator</th>
            </tr>
            <?php
			while($r=$empire->fetch($sql))
			{
				$img="haveread";
				if(!$r[haveread])
				{$img="nohaveread";}
				//后台管理员
				if($r['isadmin'])
				{
					$from_username="<a title='Administrator'><b>".$r[from_username]."</b></a>";
				}
				else if($r[from_username]=='None')
				{
					$from_username="anonymous";
				}
                else
                {
     				$from_username="<a href='../ShowInfo/?userid=".$r[from_userid]."' target='_blank'>".$r[from_username]."</a>";               
                }
				//系统信息
				if($r['issys'])
				{
					$from_username="<b>System Messages</b>";
					$r[title]="<b>".$r[title]."</b>";
				}
			?>
            <tr> 
              <td height="25"> <div align="center"> 
                  <input name="mid[]" type="checkbox" id="mid[]2" value="<?=$r[mid]?>">
                </div></td>
              <td>
                <img src="../../data/images/<?=$img?>.gif" border=0><a href="ViewMsg/?mid=<?=$r[mid]?>"> 
                <?=stripSlashes($r[title])?>
              </td>
              <td><div align="center"><?=$from_username?></div></td>
              <td><div align="center"><?=$r[msgtime]?></div></td>
              <td><div align="center">&nbsp;[<a href="../doaction.php?enews=DelMsg&mid=<?=$r[mid]?>" onclick="return confirm('Confirm delete?');">Delete</a>]</div></td>
            </tr>
            <?php
			}
			?>
            <tr> 
              <td><div align="center"> 
                  <input type=checkbox name=chkall value=on onclick=CheckAll(this.form)>
                </div></td>
              <td colspan="4"><input type="submit" class="btn" name="Submit2" value="Delete"> 
                <input name="enews" type="hidden" value="DelMsg_all">              </td>
            </tr>
            <tr> 
              <td><div align="center"></div></td>
              <td colspan="4"> 
                <?=$returnpage?>              </td>
            </tr>
            <tr> 
              <td height="23" colspan="5"><div align="center">Remark：<img src="../../data/images/nohaveread.gif" width="14" height="11"> 
                  Not read，<img src="../../data/images/haveread.gif" width="15" height="12"> 
                  Have read.</div></td>
            </tr>
          </form>
        </table>
</div>
<script type="text/javascript">m('inbox');s('spread');c(0);</script>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
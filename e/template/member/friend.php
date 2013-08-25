<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='好友列表';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;好友列表";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tbody>
 <tr>
<td class="tab" id="list"><a href="#"><span>My Friends</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="add"><a href="add/?fcid=<?=$cid?>"><span>Add Friend</span></a></td>
<td class="tab_nav">&nbsp;</td>
</tr>
</tbody>
</table>
</div>
<div class="ls">
 <table cellpadding="3" cellspacing="1" class="tb">
          <form name=favaform method=post action="../doaction.php" onsubmit="return confirm('Confirm delete?');">
            <input type=hidden value=hy name=enews>
            <tr> 
              <th width="5%"></td>
              <th width="30%">Username</th>
              <th width="45%">Remark</th>
              <th width="20%">Operator</th>
            </tr>
            <?php
			while($r=$empire->fetch($sql))
			{
			?>
            <tr> 
              <td height="25"> <div align="center"><img src="../../data/images/man.gif" width="16" height="16" border=0></div></td>
              <td> <div align="center"><a href="../ShowInfo/?username=<?=$r[fname]?>" target=_blank> 
                  <?=$r[fname]?>
                  </a></div></td>
              <td> <div align="center"> 
                  <input name="fsay[]" type="text" id="fsay[]" value="<?=stripSlashes($r[fsay])?>" size="32">
                </div></td>
              <td> <div align="center">[<a href="add/?enews=EditFriend&fid=<?=$r[fid]?>&fcid=<?=$cid?>">Edit</a>] 
                  [<a href="../doaction.php?enews=DelFriend&fid=<?=$r[fid]?>&fcid=<?=$cid?>" onclick="return confirm('Confirm delete?');">Delete</a>]</div></td>
            </tr>
            <?php
			}
			?>
            <tr bgcolor="#FFFFFF"> 
              <td height="25" colspan="4"> &nbsp;&nbsp;&nbsp; 
                <?=$returnpage?></td>
            </tr>
          </form>
        </table>
</div>
<script type="text/javascript">m('list'),s('friend');c(0);</script>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
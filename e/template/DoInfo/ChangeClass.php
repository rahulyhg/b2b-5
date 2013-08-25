<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='增加信息';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=".$mid."'>管理信息</a>&nbsp;>&nbsp;增加信息&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function CheckChangeClass()
{
	if(document.changeclass.classid.value==0||document.changeclass.classid.value=='')
	{
		alert("Please select a category");
		return false;
	}
	return true;
}


    function getVal(){
        $.getJSON("cate.php",{pid:$("#parentid").val()},function(json){
            var ds_id = $("#classid");
            $("option",ds_id).remove(); //清空原有的选项，也可使用 ds_id.empty();
            if($("#parentid").val())
                $("#classid").show();
            else
                $("#classid").hide();
            $.each(json,function(index,array){
                var option = "<option value='"+array['classid']+"'>"+array['classname']+"</option>";
                ds_id.append(option);
            });
        });
    }
    //下面是页面加载时自动执行一次getVal()函数
    $().ready(function(){
        //getVal();
        $("#parentid").change(function(){//省份部分有变动时，执行getVal()函数
           getVal();
        });
    });
</script>
    <script type="text/javascript">s('mid_17');c(1);</script>
      <table width="500" border="0" align="center">
        <tr> 
          <td>Hellow，<b><?=$musername?></b></td>
        </tr>
      </table>
    <style>
        .multiple1 {
width: 160px;
height: 150px;
}
    </style>
    <div class="warn" style="margin:5px 5px 5px 0px;">Please select the categories you want to publish</div>
    <div style="margin:5px;"><span id="derror" class="f_red"></span></div>
      <table cellpadding="0" cellspacing="0" class="tb">
        <form onsubmit="return Dcheck();" action="AddInfo.php" method="get" name="changeclass" id="changeclass">
          <tr> 
            <td class='tl'>item category</td>
            <td class='tr'>
              <input name="mid" type="hidden" id="mid" value="<?=$mid?>">
              <input name="enews" type="hidden" id="enews" value="MAddInfo">
              <select name=parentid id="parentid" size="12">
                    <option value=''>Please select a Category</option>
               <?php foreach($cate as $key=>$val){ ?>
               <option value="<?=$val['classid']?>"><?=$val['classname']?></option>
               <?php }?>
              </select>
              <select name=classid id="classid" size="12" style="display:none;">
				  <option value=''>Please select a Category</option>
              </select>
              </select> </td>
          </tr>
          <tr> 
            <td colspan='2' style="padding-left:100px;" height="50"><input type="submit" name="Submit" class="search-bar-button" value="Confirm"></td>
          </tr>
        </form>
      </table>
<script>
    function Dcheck()
    {
        bcat = Dd('parentid').value;
        mcat = Dd('classid').value;
        
        if(bcat=='')
        {
            Dmsg('Please select first category.', 'error');
            return false;
        }
        if(mcat=='')
        {
            Dmsg('Please select second category.', 'error');
            return false;
        }
    }
</script>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
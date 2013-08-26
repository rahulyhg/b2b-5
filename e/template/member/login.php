<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
require(ECMS_PATH.'e/data/template/cp_3.php');
?>
<link href="<?=$public_r['newsurl']?>css/sign.css" rel="stylesheet" type="text/css" />
<div id="content" class="clearfix">
 	<div class="maincontent">
            <div class="outerbox">
                <div class="newtobox clearfix">
                <h3>New to BJshibang?</h3>
                <span class="commonBtn"><a href="../register" rel="nofollow">Join Free</a></span>
				</div>
            <form name="form1" method="post" action="../doaction.php">	            <h3>Sign in</h3>
                <input type=hidden name=ecmsfrom value="<?=ehtmlspecialchars($_GET['from'])?>">
                <input type=hidden name=enews value=login>
                <input name="tobind" type="hidden" id="tobind" value="<?=$tobind?>">            
	            <div class="rtcon"><span class='lefttitle'>Member ID:</span><input type="text"  class="txtinput" id="username" name="username" maxlength="128" value=""></div>
	            <div class="rtcon"><span class='lefttitle'>Password:</span><input type="password" class="txtinput" id="password" name="password" maxlength="30" value=""><a href="../GetPassword/">Forgot your password?</a></div>
	            
                <?php
                if($public_r['loginkey_ok'])
                {
                ?>
                <div class="rtcon"><span class='lefttitle'>Security Code:</span><input type="text" class="txtcode" id="key" name="key" maxlength="4" value=""><img src="../../ShowKey/?v=login"></div>
                <?php
                }	
                ?>
        
                <div class="rtcon pwdbox">
	                <label><input name=lifetime value=315360000 type="checkbox" class="checkinput" value="true">Remember me when I come back</label>
	            </div>
	            <div class="rtcon">
	                <span class="tourBtn"><input type="submit" value="Sign in" name="smt_signin" onclick=""></span>
	            </div>
            </form>
            </div>
            <div class="signhelp">
            <p><strong>Sign in help</strong></p>
            <p>Forgot your password ? </p>
            <div class="customerword">
                <p>If you encounter any problem when you sign in, please contact our <a href="<?=$public_r['news_url']?>/help/">Service</a><span class="qalink" id="customerbtn">&nbsp; </span> </p>
                <div id="customervisible" style="display:none">
                    <table class="popup-frame">
                        <tbody><tr><td class="tLt"></td><td class="tMid"></td><td class="tRi"></td></tr>
                        <tr>
                            <td class="mLt"></td>
                            <td class="mMid">
                                <div class="mMid-inner">
                                    <div class="customervisible-inner">
                                        <span title="close" class="closeico" id="customerClose"></span>
                                        <p>If your email address shows as invalid when you try to reset password, please contact our <a href="mailto:safetycenter@dhgate.com">Safety Center</a>. They can assist once it's confirmed you are the account owner. <br><a href="http://help.dhgate.com/help/buyerhelpen.php?catid=3801">Learn More »</a></p>
                                    </div>
                                </div>
                            </td>
                            <td class="mRi"></td>
                        </tr>
                        <tr><td class="bLt"></td><td class="bMid"></td><td class="bRi"></td></tr>
                    </tbody></table>
                </div>
            </div>
            </div>
        </div>
        <div class="minorcontent">
        	<div class="protectbox"><img src="<?=$public_r['newsurl']?>images/protection-ban.jpg" width="390" height="298"></div>
        </div>
    </div>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>
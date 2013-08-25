<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>Home</a>&nbsp;>&nbsp;<a href=../cp/>Pannel</a>&nbsp;>&nbsp;Member register";
require(ECMS_PATH.'e/data/template/cp_3.php');
?>
<script src="../../../js/lib.js"></script>
<script src="../../../js/34.js"></script>
<link href="../../../css/reg2.css" rel="stylesheet" type="text/css" />
<link href="../../../css/signup.css" rel="stylesheet" type="text/css" />
  <form name=userinfoform id='myform' method=post enctype="multipart/form-data" action=../doaction.php>
    <input type=hidden name=enews value=register>
	<input name="groupid" type="hidden" id="groupid" value="<?=$groupid?>">
	<input name="countrycode" type="hidden" id="countrycode" value="cn">
	<div id="regFlowEN">
	<fieldset class="regFlow">
		<legend>Select your Business Location & Account Type</legend>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="tables mainReg">
			<tr>
				<th scope="row" width="160"><span class="required">Business Location:</span></th>
				<td><select id="country2" name='country' onchange="countryChange(this);" style="padding:0px;padding:0px!important;float:left;">
                  <option value="">Select where your company</option>
<option value="Afghanistan" code="af">Afghanistan</option>
<option value="Albania" countrycode="al">Albania</option>
<option value="Algeria" countrycode="dz">Algeria</option>
<option value="Andorra" countrycode="ad">Andorra</option>
<option value="Angola" countrycode="ao">Angola</option>
<option value="Anguilla" countrycode="ai">Anguilla</option>
<option value="Antigua & Barbuda" countrycode="af">Antigua & Barbuda</option>
<option value="Argentina" countrycode="ar">Argentina</option>
<option value="Armenia" countrycode="am">Armenia</option>
<option value="Australia" countrycode="au">Australia</option>
<option value="Austria" countrycode="at">Austria</option>
<option value="Azerbaijan" countrycode="az">Azerbaijan</option>
<option value="Bahamas" countrycode="bs">Bahamas</option>
<option value="Bahrain" countrycode="bh">Bahrain</option>
<option value="Bangladesh" countrycode="bd">Bangladesh</option>
<option value="Barbados" countrycode="bb">Barbados</option>
<option value="Belarus" countrycode="by">Belarus</option>
<option value="Belgium" countrycode="be">Belgium</option>
<option value="Belize" countrycode="bz">Belize</option>
<option value="Benin" countrycode="bj">Benin</option>
<option value="Bermuda" countrycode="bm">Bermuda</option>
<option value="Bhutan" countrycode="bt">Bhutan</option>
<option value="Bolivia" countrycode="bo">Bolivia</option>
<option value="Bosnia and Herzegovina" countrycode="ba">Bosnia and Herzegovina</option>
<option value="Botswana" countrycode="bw">Botswana</option>
<option value="Brazil" countrycode="br">Brazil</option>
<option value="Brunei" countrycode="bn">Brunei</option>
<option value="Bulgaria" countrycode="bg">Bulgaria</option>
<option value="Burkina Faso" countrycode="bf">Burkina Faso</option>
<option value="Burundi" countrycode="bi">Burundi</option>
<option value="Cambodia" countrycode="kh">Cambodia</option>
<option value="Cameroon" countrycode="cm">Cameroon</option>
<option value="Canada" countrycode="ca">Canada</option>
<option value="Cape Verde" countrycode="cv">Cape Verde</option>
<option value="Cayman Islands" countrycode="ky">Cayman Islands</option>
<option value="Central African Republic" countrycode="cf">Central African Republic</option>
<option value="Chad" countrycode="td">Chad</option>
<option value="Chile" countrycode="cl">Chile</option>
<option value="China" countrycode="cn" selected="selected">China</option>
<option value="Colombia" countrycode="co">Colombia</option>
<option value="Comoros" countrycode="km">Comoros</option>
<option value="Congo" countrycode="cg">Congo</option>
<option value="Congo (DRC)" countrycode="zr">Congo (DRC)</option>
<option value="Cook Islands" countrycode="ck">Cook Islands</option>
<option value="Costa Rica" countrycode="cr">Costa Rica</option>
<option value="Cote d'Ivoire" countrycode="ci">Cote d'Ivoire</option>
<option value="Croatia (Hrvatska)" countrycode="hr">Croatia (Hrvatska)</option>
<option value="Cuba" countrycode="cu">Cuba</option>
<option value="Cyprus" countrycode="cy">Cyprus</option>
<option value="Czech Republic" countrycode="cz">Czech Republic</option>
<option value="Denmark" countrycode="dk">Denmark</option>
<option value="Djibouti" countrycode="dj">Djibouti</option>
<option value="Dominica" countrycode="dm">Dominica</option>
<option value="Dominican Republic" countrycode="do">Dominican Republic</option>
<option value="East Timor" countrycode="tp">East Timor</option>
<option value="Ecuador" countrycode="ec">Ecuador</option>
<option value="Egypt" countrycode="eg">Egypt</option>
<option value="El Salvador" countrycode="sv">El Salvador</option>
<option value="Equatorial Guinea" countrycode="gq">Equatorial Guinea</option>
<option value="Eritrea" countrycode="er">Eritrea</option>
<option value="Estonia" countrycode="ee">Estonia</option>
<option value="Ethiopia" countrycode="et">Ethiopia</option>
<option value="Falkland Islands" countrycode="fk">Falkland Islands</option>
<option value="Faroe Islands" countrycode="fo">Faroe Islands</option>
<option value="Fiji Islands" countrycode="fj">Fiji Islands</option>
<option value="Finland" countrycode="fi">Finland</option>
<option value="France" countrycode="fr">France</option>
<option value="French Guiana" countrycode="gf">French Guiana</option>
<option value="French Polynesia" countrycode="pf">French Polynesia</option>
<option value="Gabon" countrycode="ga">Gabon</option>
<option value="Gambia" countrycode="gm">Gambia</option>
<option value="Georgia" countrycode="ge">Georgia</option>
<option value="Germany" countrycode="de">Germany</option>
<option value="Ghana" countrycode="gh">Ghana</option>
<option value="Gibraltar" countrycode="gi">Gibraltar</option>
<option value="Greece" countrycode="gr">Greece</option>
<option value="Greenland" countrycode="gl">Greenland</option>
<option value="Grenada" countrycode="gd">Grenada</option>
<option value="Guadeloupe" countrycode="gp">Guadeloupe</option>
<option value="Guam" countrycode="gu">Guam</option>
<option value="Guatemala" countrycode="gt">Guatemala</option>
<option value="Guinea" countrycode="gn">Guinea</option>
<option value="Guinea-Bissau" countrycode="gw">Guinea-Bissau</option>
<option value="Guyana" countrycode="gy">Guyana</option>
<option value="Haiti" countrycode="ht">Haiti</option>
<option value="Honduras" countrycode="hn">Honduras</option>
<option value="Hong Kong SAR" countrycode="hk">Hong Kong SAR</option>
<option value="Hungary" countrycode="hu">Hungary</option>
<option value="Iceland" countrycode="is">Iceland</option>
<option value="India" countrycode="in">India</option>
<option value="Indonesia" countrycode="id">Indonesia</option>
<option value="Iran" countrycode="ir">Iran</option>
<option value="Iraq" countrycode="iq">Iraq</option>
<option value="Ireland" countrycode="ie">Ireland</option>
<option value="Israel" countrycode="il">Israel</option>
<option value="Italy" countrycode="it">Italy</option>
<option value="Jamaica" countrycode="jm">Jamaica</option>
<option value="Japan" countrycode="jp">Japan</option>
<option value="Jordan" countrycode="jo">Jordan</option>
<option value="Kazakhstan" countrycode="kz">Kazakhstan</option>
<option value="Kenya" countrycode="ke">Kenya</option>
<option value="Kiribati" countrycode="ki">Kiribati</option>
<option value="Korea" countrycode="kr">Korea</option>
<option value="Kuwait" countrycode="kw">Kuwait</option>
<option value="Kyrgyzstan" countrycode="kg">Kyrgyzstan</option>
<option value="Laos" countrycode="la">Laos</option>
<option value="Latvia" countrycode="lv">Latvia</option>
<option value="Lebanon" countrycode="lb">Lebanon</option>
<option value="Lesotho" countrycode="ls">Lesotho</option>
<option value="Liberia" countrycode="lr">Liberia</option>
<option value="Libya" countrycode="ly">Libya</option>
<option value="Liechtenstein" countrycode="li">Liechtenstein</option>
<option value="Lithuania" countrycode="lt">Lithuania</option>
<option value="Luxembourg" countrycode="lu">Luxembourg</option>
<option value="Macao SAR" countrycode="mo">Macao SAR</option>
<option value="Macedonia" countrycode="mk">Macedonia</option>
<option value="Madagascar" countrycode="mg">Madagascar</option>
<option value="Malawi" countrycode="mw">Malawi</option>
<option value="Malaysia" countrycode="my">Malaysia</option>
<option value="Maldives" countrycode="mv">Maldives</option>
<option value="Mali" countrycode="ml">Mali</option>
<option value="Malta" countrycode="mt">Malta</option>
<option value="Martinique" countrycode="mq">Martinique</option>
<option value="Mauritania" countrycode="mr">Mauritania</option>
<option value="Mauritius" countrycode="mu">Mauritius</option>
<option value="Mayotte" countrycode="yt">Mayotte</option>
<option value="Mexico" countrycode="mx">Mexico</option>
<option value="Micronesia" countrycode="fm">Micronesia</option>
<option value="Moldova" countrycode="md">Moldova</option>
<option value="Monaco" countrycode="mc">Monaco</option>
<option value="Mongolia" countrycode="mn">Mongolia</option>
<option value="Montserrat" countrycode="ms">Montserrat</option>
<option value="Morocco" countrycode="ma">Morocco</option>
<option value="Mozambique" countrycode="mz">Mozambique</option>
<option value="Myanmar" countrycode="mm">Myanmar</option>
<option value="Namibia" countrycode="na">Namibia</option>
<option value="Nauru" countrycode="nr">Nauru</option>
<option value="Nepal" countrycode="np">Nepal</option>
<option value="Netherlands" countrycode="nl">Netherlands</option>
<option value="Netherlands Antilles" countrycode="an">Netherlands Antilles</option>
<option value="New Caledonia" countrycode="nc">New Caledonia</option>
<option value="New Zealand" countrycode="nz">New Zealand</option>
<option value="Nicaragua" countrycode="ni">Nicaragua</option>
<option value="Niger" countrycode="ne">Niger</option>
<option value="Nigeria" countrycode="ng">Nigeria</option>
<option value="Niue" countrycode="nu">Niue</option>
<option value="Norfolk Island" countrycode="nf">Norfolk Island</option>
<option value="North Korea" countrycode="kp">North Korea</option>
<option value="Norway" countrycode="no">Norway</option>
<option value="Oman" countrycode="om">Oman</option>
<option value="Pakistan" countrycode="pk">Pakistan</option>
<option value="Panama" countrycode="pa">Panama</option>
<option value="Papua New Guinea" countrycode="pg">Papua New Guinea</option>
<option value="Paraguay" countrycode="py">Paraguay</option>
<option value="Peru" countrycode="pe">Peru</option>
<option value="Philippines" countrycode="ph">Philippines</option>
<option value="Pitcairn Islands" countrycode="pn">Pitcairn Islands</option>
<option value="Poland" countrycode="pl">Poland</option>
<option value="Portugal" countrycode="pt">Portugal</option>
<option value="Puerto Rico" countrycode="pr">Puerto Rico</option>
<option value="Qatar" countrycode="qa">Qatar</option>
<option value="Reunion" countrycode="re">Reunion</option>
<option value="Romania" countrycode="ro">Romania</option>
<option value="Russia" countrycode="ru">Russia</option>
<option value="Rwanda" countrycode="rw">Rwanda</option>
<option value="Samoa" countrycode="ws">Samoa</option>
<option value="San Marino" countrycode="sm">San Marino</option>
<option value="Sao Tome and Principe" countrycode="st">Sao Tome and Principe</option>
<option value="Saudi Arabia" countrycode="sa">Saudi Arabia</option>
<option value="Senegal" countrycode="sn">Senegal</option>
<option value="Serbia and Montenegro" countrycode="srb">Serbia and Montenegro</option>
<option value="Seychelles" countrycode="sc">Seychelles</option>
<option value="Sierra Leone" countrycode="sl">Sierra Leone</option>
<option value="Singapore" countrycode="sg">Singapore</option>
<option value="Slovakia" countrycode="sk">Slovakia</option>
<option value="Slovenia" countrycode="si">Slovenia</option>
<option value="Solomon Islands" countrycode="sb">Solomon Islands</option>
<option value="Somalia" countrycode="so">Somalia</option>
<option value="South Africa" countrycode="za">South Africa</option>
<option value="Spain" countrycode="es">Spain</option>
<option value="Sri Lanka" countrycode="lk">Sri Lanka</option>
<option value="St. Helena" countrycode="sh">St. Helena</option>
<option value="St. Kitts and Nevis" countrycode="kn">St. Kitts and Nevis</option>
<option value="St. Pierre and Miquelon" countrycode="pm">St. Pierre and Miquelon</option>
<option value="Sudan" countrycode="sd">Sudan</option>
<option value="Suriname" countrycode="sr">Suriname</option>
<option value="Swaziland" countrycode="sz">Swaziland</option>
<option value="Sweden" countrycode="se">Sweden</option>
<option value="Switzerland" countrycode="ch">Switzerland</option>
<option value="Syria" countrycode="sy">Syria</option>
<option value="Taiwan" countrycode="tw">Taiwan</option>
<option value="Tajikistan" countrycode="tj">Tajikistan</option>
<option value="Tanzania" countrycode="tz">Tanzania</option>
<option value="Thailand" countrycode="th">Thailand</option>
<option value="Togo" countrycode="tg">Togo</option>
<option value="Tokelau" countrycode="tk">Tokelau</option>
<option value="Tonga" countrycode="to">Tonga</option>
<option value="Trinidad and Tobago" countrycode="tt">Trinidad and Tobago</option>
<option value="Tunisia" countrycode="tn">Tunisia</option>
<option value="Turkey" countrycode="tr">Turkey</option>
<option value="Turkmenistan" countrycode="tm">Turkmenistan</option>
<option value="Turks and Caicos Islands" countrycode="tc">Turks and Caicos Islands</option>
<option value="Tuvalu" countrycode="tv">Tuvalu</option>
<option value="Uganda" countrycode="ug">Uganda</option>
<option value="Ukraine" countrycode="ua">Ukraine</option>
<option value="United Arab Emirates" countrycode="ae">United Arab Emirates</option>
<option value="United Kingdom" countrycode="uk">United Kingdom</option>
<option value="Uruguay" countrycode="uy">Uruguay</option>
<option value="USA" countrycode="us">USA</option>
<option value="Uzbekistan" countrycode="uz">Uzbekistan</option>
<option value="Vanuatu" countrycode="vu">Vanuatu</option>
<option value="Venezuela" countrycode="ve">Venezuela</option>
<option value="Vietnam" countrycode="vn">Vietnam</option>
<option value="Virgin Islands" countrycode="vi">Virgin Islands</option>
<option value="Virgin Islands (British)" countrycode="vg">Virgin Islands (British)</option>
<option value="Wallis and Futuna" countrycode="wf">Wallis and Futuna</option>
<option value="Yemen" countrycode="ye">Yemen</option>
<option value="Yugoslavia" countrycode="yu">Yugoslavia</option>
<option value="Zambia" countrycode="zm">Zambia</option>
<option value="Zimbabwe" countrycode="zw">Zimbabwe</option>
                </select>
				  <span id='countryFlagImg' style="height:14px;width:20px;line-height:14px;margin-top:3px;margin-left:8px;float:left;display:block;"><img  id='countryimg' src="<?=$public_r['newsurl']?>images/country/cn.gif" /></span>
 </td>
			</tr>
			<tr>
				<th scope="row" width="160" style="padding-top:0px;"><span class="required">Member ID:</span></th>
				<td>
					<input type="text" id="username" name='username' style="width: 180px" maxlength="128" value="" />
					<span id="username_Tip" style="z-index: 100;"></span>
					<div class="remark" style="margin-top:4px;">Enter between 5 to 20 characters(A-Z,a-z,0-9, no spaces)</div>

				</td>
			</tr>
			<tr>
				<th scope="row" width="160" style="padding-top:0px;"><span class="required">Email:</span></th>
				<td>
					<input type="text" id="email" name='email' style="width: 180px" maxlength="128"  value=""/>
					<span id="email_Tip" style="z-index: 100;"></span>
					<div class="remark" style="margin-top:4px;">This will be used to communicate with the merchant</div>
				</td>
			</tr>
			<tr>
				<th scope="row" width="160" style="padding-top:0px;"><span class="required">Create Password:</span></th>
				<td>
					<input type="password" id="password" name='password'  maxlength="20" value=""  />
					<span id="password_Tip" style="z-index: 100;"></span>
					<div class="remark" style="margin-top:4px;">6 - 20 characters (A-Z, a-z, 0-9 only)</div>
				</td>
			</tr>
			<tr>
				<th scope="row" width="160"><span class="required">Re-enter Password:</span></th>
				<td>
					<input type="password" id="repassword" name='repassword'  maxlength="20" value="" />
					<span id="repassword_Tip" style="z-index: 100;"></span>
				</td>
			</tr>
		</table>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="tables mainReg">
			<tr>
				<th scope="row" style="padding: 13px 0 7px 5px;"><span class="required">I am a:</span></th>
				<td>
					<input type="radio" value="Mr." name='sex' checked style="border:0px;" />&nbsp;<strong style="font-size:12px">Mr.</strong>&nbsp;&nbsp;
					<input type="radio" value="Ms." name='sex' style="border:0px;" />&nbsp;<strong style="font-size:12px">Ms.</strong>
				</td>
			</tr>
				<tr>
					<th scope="row" width="160"><span class="required">Contact Person:</span></th>
					<td>
					<input  type="text" id="truename" name="truename" style="width: 180px" maxlength="128"  value=""  />
					<span id="truename_Tip" style="z-index: 100;"></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><span class="required">Company Name:</span></th>
					<td>
						<input type="text" id="company" name='company' style="width: 200px" maxlength="128" value="" />
						<span id="company_Tip" style="z-index: 100;"></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><span class="required">Industry:</span></th>
					<td>
						<select name="industry" id="industry"><option value="Agriculture">Agriculture</option><option value="Apparel &amp; Fashion">Apparel &amp; Fashion</option><option value="Automobile">Automobile</option><option value="Business Services">Business Services</option><option value="Chemicals">Chemicals</option><option value="Computer Hardware &amp; Software">Computer Hardware &amp; Software</option><option value="Construction &amp; Real Estate">Construction &amp; Real Estate</option><option value="Electrical Equipment &amp; Supplies">Electrical Equipment &amp; Supplies</option><option value="Electronic Components &amp; Supplies">Electronic Components &amp; Supplies</option><option value="Energy">Energy</option><option value="Environment">Environment</option><option value="Excess Inventory">Excess Inventory</option><option value="Food &amp; Beverage">Food &amp; Beverage</option><option value="Furniture &amp; Furnishings">Furniture &amp; Furnishings</option><option value="Gifts &amp; Crafts">Gifts &amp; Crafts</option><option value="Health &amp; Beauty">Health &amp; Beauty</option><option value="Home Appliances">Home Appliances</option><option value="Home Supplies">Home Supplies</option><option value="Industrial Supplies">Industrial Supplies</option><option value="Lights &amp; Lighting">Lights &amp; Lighting</option><option value="Luggage, Bags &amp; Cases">Luggage, Bags &amp; Cases</option><option value="Minerals, Metals &amp; Materials">Minerals, Metals &amp; Materials</option><option value="Office Supplies">Office Supplies</option><option value="Packaging &amp; Paper">Packaging &amp; Paper</option><option value="Printing &amp; Publishing">Printing &amp; Publishing</option><option value="Security &amp; Protection">Security &amp; Protection</option><option value="Sports &amp; Entertainment">Sports &amp; Entertainment</option><option value="Telecommunications">Telecommunications</option><option value="Textiles &amp; Leather Products">Textiles &amp; Leather Products</option><option value="Timepieces, Jewelry, Eyewear">Timepieces, Jewelry, Eyewear</option><option value="Toys">Toys</option><option value="Transportation">Transportation</option><option value="Others">Others</option></select><span id="industry_Tip" style="z-index: 100;"></span>
					</td>
				</tr>
				<tr>
					<th scope="row" style="padding-top:0px;"><span class="required">Tel:</span></th>
					<td><input type="text" id="phone" name='phone' style="width: 200px" maxlength="34"  value=""  />
					<span id="phone_Tip" style="z-index: 100;"></span>
						<div class="remark" style="margin-top:4px;">e.g. <span style="padding:0 1px 0 3px;">86</span>-<span style="padding:0 1px">010</span>-<span>12345678</span></div>
				  </td>
				</tr>
				<tr>
					<th scope="row" style="padding-top:0px;"><span class="required">Fax:</span></th>
					<td><input type="text" id="fax" name='fax' style="width: 200px" maxlength="34"  value=""  />
					<span id="fax_Tip" style="z-index: 100;"></span>
						<div class="remark" style="margin-top:4px;">e.g. <span style="padding:0 1px 0 3px;">86</span>-<span style="padding:0 1px">010</span>-<span>12345678</span></div>
				  </td>
				</tr>
				<tr>
					<th scope="row" style="padding-top:0px;"><span class="required">MSN:</span></th>
					<td><input type="text" id="msn" name='msn' style="width: 200px" maxlength="34"  value=""  />
					<span id="msn_Tip" style="z-index: 100;"></span>
						<div class="remark" style="margin-top:4px;">Robert@hotmail.com</div>
				  </td>
				</tr>				
				<tr>
					<th scope="row"><span class="required">Address:</span></th>
					<td>
						<input type="text" id="address" name='address' style="width: 200px" maxlength="128" value="" />
						<span id="address_Tip" style="z-index: 100;"></span>
					</td>
				</tr>				
				<tr>
					<th scope="row" width="160" style="padding-top:28px;padding-bottom:0px;"><span class="required">Enter the code shown:</span></th>
					<td>
						<div style="margin-bottom:5px;">
							<img  src="../../ShowKey/?v=reg" onClick="this.src='../../ShowKey/?v=reg&width=106&height=24&nocache='+Math.random()" style="cursor:pointer;" title="Load new image" />
						</div>
						<input type="text" id="key" name="key" style="width: 100px" value="" />
						<span id="key_Tip" style="z-index: 100;"></span>
					</td>
				</tr>
				<tr>
					<th width="160" style="padding:20px 0 0 0">&nbsp;</th>
					<td style="padding:20px 0 0 0">
						<input type="submit" class="buttonSkinA L" value="Create My Account" name="Submit" style="cursor:pointer;" />
					</td>
				</tr>
			</table>
	</fieldset>
</div>
  </form>
	<div id="regLeads-en" class="regLeads" style="display:">
	<div class="benefitsWrap">
		<h4>Make Global Trade Easy!</h4>
		<dl>
			<dt>Simply Complete our Registration Form and You Can:</dt>
			<dd>Access Global Trade Partners</dd>
			<dd>Get your own Company Website</dd>
			<dd>Display up to 50 Products</dd>
			<dd>Use Advanced Trade Tools</dd>
		</dl>
		<div><em>All FREE!</em></div>
	</div>
	</div>
	<div style="clear:both"></div>
<script type="text/javascript">
function countryChange(obj)
{
	var lrc = obj.item(obj.selectedIndex).getAttribute('countrycode');
	$("#countrycode").val(lrc);
	$("#countryimg").attr('src',"<?=$public_r['newsurl']?>images/country/"+lrc+".gif");
}

$(document).ready(function() {
	$.formValidator.initConfig({ formid: "myform", errorfocus: true, btnid: 'fabu', fun: function() {
		return true;
	}
	});

	$("#username").formValidator({ onfocus: "Please enter your Member ID" }).inputValidator({ onerror: "Please enter your Member ID" }).regexValidator({ regexp: "^(.){4,}$#^(.){4,20}$", onerror: "Enter between 5 to 20 characters(A-Z,a-z,0-9, no spaces)" }).functionValidator({ fun: function(val, elem) {
		if (val.match("^[\\d]+$")) {
			return "The Member ID can not be all digital";
		}
	},
	});

        $("#password").formValidator({ onfocus: "Enter between 5 to 20 characters(A-Z,a-z,0-9, no spaces)" }).inputValidator({ onerror: "Please enter your Member ID" }).regexValidator({ regexp: "^(.){6,}$#^(.){6,16}$", onerror: "The password is too short, at least six" }).functionValidator({ fun: function(val, elem) {
        	var pwd = val.toLowerCase();
        	return true;
        }
        }).compareValidator({
            desid: "nickName", operateor: "!=", onerror: "Password with the Member ID can not", datatype: "string"
        });

        $("#repassword").formValidator({ onfocus: "Please re-enter your password" }).inputValidator({ onerror: "Passwords do not match, please reconfirm" }).regexValidator({ regexp: "^[\\s\\S]{6,}$#^(.){6,16}$", onerror: "The password is too short, at least six" }).functionValidator({ fun: function(val, elem) {

        }
        }).compareValidator({
            desid: "password", operateor: "=", onerror: "Passwords do not match, please reconfirm", datatype: "string"
        });
	$("#key").formValidator({ onfocus: "Please enter the code" }).inputValidator({ onerror: "Please enter the code" });   

		$("#email").formValidator({ onfocus: "Please enter a valid e-mail" }).inputValidator({ onerror: "Please enter a valid email !" }).regexValidator({ regexp: "^\\w+([-+.]\\w+)*@[a-zA-Z0-9]{1}([-a-zA-Z0-9]{0,61}[a-zA-Z0-9]{1})?\\.[a-zA-Z0-9]+([.a-zA-Z0-9]+)*$", onerror: "Please enter the e-mail, such as:myname@sina.com " });
        $("#company").formValidator({ onfocus: "Please enter your company name" }).inputValidator({ onerror: "Please enter a value between 2 and 100 characters long" });
		$("#truename").formValidator({ onfocus: "A nickname is required. Please try again." }).inputValidator({ onerror: "A nickname is required. Please try again." }).regexValidator({ onerror: "A nickname is required. Please try again." });
       $("#phone").formValidator({ tipid: "phone_Tip",onfocus: "Please enter a valid phone number (e.g: 86-010-12345678)" }).inputValidator({ onerror: "please enter phone" }).regexValidator({ regexp: "[0-9]{2,4}-[0-9]{3,5}-[0-9]{6,8}", onerror: "Please enter a valid phone number (e.g: 86-010-12345678)" });
	   $("#address").formValidator({ onfocus: "Please enter your company address" }).inputValidator({ onerror: "Please enter a value between 2 and 100 characters long" });
       $("#industry").formValidator({ onfocus: "Please select a industry" }).inputValidator({ onerror: "Please select a industry" });

});

</script>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>
<?php
if(!defined('InEmpireCMS'))
{exit();}
?><tbody id="Tabs0" style="display:;">
<tr>
<td class="tl"><span class="f_red">*</span>Contact Person</td>
<td class="tr">
<input name="truename" type="text" id="truename" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[truename]))?>">
<span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>Sex</td>
<td class="tr"><input name="sex" type="radio" value="Ms."<?=$addr[sex]=="Ms."||$ecmsfirstpost==1?' checked':''?>>Ms.<input name="sex" type="radio" value="Mr."<?=$addr[sex]=="Mr."?' checked':''?>>Mr.<input name="sex" type="radio" value="Msr."<?=$addr[sex]=="Msr."?' checked':''?>>Msr.</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>Company Address</td>
<td class="tr"><input name="address" type="text" id="address" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[address]))?>" size="50">
<span id="daddress" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>Company Phone</td>
<td class="tr">
<input name="phone" type="text" id="phone" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[phone]))?>" size="">
<span id="dphone" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>Company Fax</td>
<td class="tr">
<input name="fax" type="text" id="fax" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[fax]))?>">
<span id="dfax" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">Company Website</td>
<td class="tr">
<input name="homepage" type="text" id="homepage" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[homepage]))?>">
<span id="dhomepage" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>MSN</td>
<td class="tr"><input name="msn" type="text" id="msn" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[msn]))?>">
<span id="dmsn" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">Zipcode</td>
<td class="tr">
<input name="zipcode" type="text" id="zipcode" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[zipcode]))?>" size="">
<span id="dzipcode" class="f_red"></span></td>
</tr>
</tbody>

<tbody id="Tabs1" style="display:;">
<tr>
<td class="tl"><span class="f_red">*</span>Company Name</td>
<td class="tr"><input name="company" type="text" id="company" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[company]))?>" size="38">
<span id="dcompany" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">company logo</td>
<td class="tr">
<input type="file" name="userpicfile" size="45">
&nbsp;&nbsp<br/>
<span class="f_gray">Recommend using LOGO, office environment, iconic images, the optimal size for the 180px*180px</span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>Country</td>
<td class="tr"><select name="country" onchange="countryChange(this);"  id="country">
<option countrycode="af" value="Albania"<?="Afghanistan"?' selected':''?>>Afghanistan</option>
<option countrycode="al" value="Albania"<?="Albania"?' selected':''?>>Albania</option>
<option countrycode="dz" value="Albania"<?="Algeria"?' selected':''?>>Algeria</option>
<option countrycode="ad" value="Albania"<?="Andorra"?' selected':''?>>Andorra</option>
<option countrycode="ao" value="Albania"<?="Angola"?' selected':''?>>Angola</option>
<option countrycode="ai" value="Albania"<?="Anguilla"?' selected':''?>>Anguilla</option>
<option countrycode="af" value="Albania"<?="Antigua & Barbuda"?' selected':''?>>Antigua & Barbuda</option>
<option countrycode="ar" value="Albania"<?="Argentina"?' selected':''?>>Argentina</option>
<option countrycode="am" value="Albania"<?="Armenia"?' selected':''?>>Armenia</option>
<option countrycode="au" value="Albania"<?="Australia"?' selected':''?>>Australia</option>
<option countrycode="at" value="Albania"<?="Austria"?' selected':''?>>Austria</option>
<option countrycode="az" value="Albania"<?="Azerbaijan"?' selected':''?>>Azerbaijan</option>
<option countrycode="bs" value="Albania"<?="Bahamas"?' selected':''?>>Bahamas</option>
<option countrycode="bh" value="Albania"<?="Bahrain"?' selected':''?>>Bahrain</option>
<option countrycode="bd" value="Albania"<?="Bangladesh"?' selected':''?>>Bangladesh</option>
<option countrycode="bb" value="Albania"<?="Barbados"?' selected':''?>>Barbados</option>
<option countrycode="by" value="Albania"<?="Belarus"?' selected':''?>>Belarus</option>
<option countrycode="be" value="Albania"<?="Belgium"?' selected':''?>>Belgium</option>
<option countrycode="bz" value="Albania"<?="Belize"?' selected':''?>>Belize</option>
<option countrycode="bj" value="Albania"<?="Benin"?' selected':''?>>Benin</option>
<option countrycode="bm" value="Albania"<?="Bermuda"?' selected':''?>>Bermuda</option>
<option countrycode="bt" value="Albania"<?="Bhutan"?' selected':''?>>Bhutan</option>
<option countrycode="bo" value="Albania"<?="Bolivia"?' selected':''?>>Bolivia</option>
<option countrycode="ba" value="Albania"<?="Bosnia and Herzegovina"?' selected':''?>>Bosnia and Herzegovina</option>
<option countrycode="bw" value="Albania"<?="Botswana"?' selected':''?>>Botswana</option>
<option countrycode="br" value="Albania"<?="Brazil"?' selected':''?>>Brazil</option>
<option countrycode="bn" value="Albania"<?="Brunei"?' selected':''?>>Brunei</option>
<option countrycode="bg" value="Albania"<?="Bulgaria"?' selected':''?>>Bulgaria</option>
<option countrycode="bf" value="Albania"<?="Burkina Faso"?' selected':''?>>Burkina Faso</option>
<option countrycode="bi" value="Albania"<?="Burundi"?' selected':''?>>Burundi</option>
<option countrycode="kh" value="Albania"<?="Cambodia"?' selected':''?>>Cambodia</option>
<option countrycode="cm" value="Albania"<?="Cameroon"?' selected':''?>>Cameroon</option>
<option countrycode="ca" value="Albania"<?="Canada"?' selected':''?>>Canada</option>
<option countrycode="cv" value="Albania"<?="Cape Verde"?' selected':''?>>Cape Verde</option>
<option countrycode="ky" value="Albania"<?="Cayman Islands"?' selected':''?>>Cayman Islands</option>
<option countrycode="cf" value="Albania"<?="Central African Republic"?' selected':''?>>Central African Republic</option>
<option countrycode="cd" value="Albania"<?="Chad"?' selected':''?>>Chad</option>
<option countrycode="cl" value="Albania"<?="Chile"?' selected':''?>>Chile</option>
<option countrycode="cn" value="Albania"<?="China"?' selected':''?>>China</option>
<option countrycode="co" value="Albania"<?="Colombia"?' selected':''?>>Colombia</option>
<option countrycode="km" value="Albania"<?="Comoros"?' selected':''?>>Comoros</option>
<option countrycode="cg" value="Albania"<?="Congo"?' selected':''?>>Congo</option>
<option countrycode="zr" value="Albania"<?="Congo (DRC)"?' selected':''?>>Congo (DRC)</option>
<option countrycode="ck" value="Albania"<?="Cook Islands"?' selected':''?>>Cook Islands</option>
<option countrycode="cr" value="Albania"<?="Costa Rica"?' selected':''?>>Costa Rica</option>
<option countrycode="ci" value="Albania"<?="Cote d'Ivoire"?' selected':''?>>Cote d'Ivoire</option>
<option countrycode="hr" value="Albania"<?="Croatia (Hrvatska)"?' selected':''?>>Croatia (Hrvatska)</option>
<option countrycode="cu" value="Albania"<?="Cuba"?' selected':''?>>Cuba</option>
<option countrycode="cy" value="Albania"<?="Cyprus"?' selected':''?>>Cyprus</option>
<option countrycode="cz" value="Albania"<?="Czech Republic"?' selected':''?>>Czech Republic</option>
<option countrycode="dk" value="Albania"<?="Denmark"?' selected':''?>>Denmark</option>
<option countrycode="dj" value="Albania"<?="Djibouti"?' selected':''?>>Djibouti</option>
<option countrycode="dm" value="Albania"<?="Dominica"?' selected':''?>>Dominica</option>
<option countrycode="do" value="Albania"<?="Dominican Republic"?' selected':''?>>Dominican Republic</option>
<option countrycode="tp" value="Albania"<?="East Timor"?' selected':''?>>East Timor</option>
<option countrycode="ec" value="Albania"<?="Ecuador"?' selected':''?>>Ecuador</option>
<option countrycode="eg" value="Albania"<?="Egypt"?' selected':''?>>Egypt</option>
<option countrycode="sv" value="Albania"<?="El Salvador"?' selected':''?>>El Salvador</option>
<option countrycode="gq" value="Albania"<?="Equatorial Guinea"?' selected':''?>>Equatorial Guinea</option>
<option countrycode="er" value="Albania"<?="Eritrea"?' selected':''?>>Eritrea</option>
<option countrycode="ee" value="Albania"<?="Estonia"?' selected':''?>>Estonia</option>
<option countrycode="et" value="Albania"<?="Ethiopia"?' selected':''?>>Ethiopia</option>
<option countrycode="fk" value="Albania"<?="Falkland Islands"?' selected':''?>>Falkland Islands</option>
<option countrycode="fo" value="Albania"<?="Faroe Islands"?' selected':''?>>Faroe Islands</option>
<option countrycode="fj" value="Albania"<?="Fiji Islands"?' selected':''?>>Fiji Islands</option>
<option countrycode="fi" value="Albania"<?="Finland"?' selected':''?>>Finland</option>
<option countrycode="fr" value="Albania"<?="France"?' selected':''?>>France</option>
<option countrycode="gf" value="Albania"<?="French Guiana"?' selected':''?>>French Guiana</option>
<option countrycode="pf" value="Albania"<?="French Polynesia"?' selected':''?>>French Polynesia</option>
<option countrycode="ga" value="Albania"<?="Gabon"?' selected':''?>>Gabon</option>
<option countrycode="gm" value="Albania"<?="Gambia"?' selected':''?>>Gambia</option>
<option countrycode="ge" value="Albania"<?="Georgia"?' selected':''?>>Georgia</option>
<option countrycode="de" value="Albania"<?="Germany"?' selected':''?>>Germany</option>
<option countrycode="gh" value="Albania"<?="Ghana"?' selected':''?>>Ghana</option>
<option countrycode="gi" value="Albania"<?="Gibraltar"?' selected':''?>>Gibraltar</option>
<option countrycode="gr" value="Albania"<?="Greece"?' selected':''?>>Greece</option>
<option countrycode="gl" value="Albania"<?="Greenland"?' selected':''?>>Greenland</option>
<option countrycode="gd" value="Albania"<?="Grenada"?' selected':''?>>Grenada</option>
<option countrycode="gp" value="Albania"<?="Guadeloupe"?' selected':''?>>Guadeloupe</option>
<option countrycode="gu" value="Albania"<?="Guam"?' selected':''?>>Guam</option>
<option countrycode="gt" value="Albania"<?="Guatemala"?' selected':''?>>Guatemala</option>
<option countrycode="gn" value="Albania"<?="Guinea"?' selected':''?>>Guinea</option>
<option countrycode="gw" value="Albania"<?="Guinea-Bissau"?' selected':''?>>Guinea-Bissau</option>
<option countrycode="gy" value="Albania"<?="Guyana"?' selected':''?>>Guyana</option>
<option countrycode="ht" value="Albania"<?="Haiti"?' selected':''?>>Haiti</option>
<option countrycode="hn" value="Albania"<?="Honduras"?' selected':''?>>Honduras</option>
<option countrycode="hk" value="Albania"<?="Hong Kong SAR"?' selected':''?>>Hong Kong SAR</option>
<option countrycode="hu" value="Albania"<?="Hungary"?' selected':''?>>Hungary</option>
<option countrycode="is" value="Albania"<?="Iceland"?' selected':''?>>Iceland</option>
<option countrycode="in" value="Albania"<?="India"?' selected':''?>>India</option>
<option countrycode="id" value="Albania"<?="Indonesia"?' selected':''?>>Indonesia</option>
<option countrycode="ir" value="Albania"<?="Iran"?' selected':''?>>Iran</option>
<option countrycode="iq" value="Albania"<?="Iraq"?' selected':''?>>Iraq</option>
<option countrycode="ie" value="Albania"<?="Ireland"?' selected':''?>>Ireland</option>
<option countrycode="il" value="Albania"<?="Israel"?' selected':''?>>Israel</option>
<option countrycode="it" value="Albania"<?="Italy"?' selected':''?>>Italy</option>
<option countrycode="jm" value="Albania"<?="Jamaica"?' selected':''?>>Jamaica</option>
<option countrycode="jp" value="Albania"<?="Japan"?' selected':''?>>Japan</option>
<option countrycode="jo" value="Albania"<?="Jordan"?' selected':''?>>Jordan</option>
<option countrycode="kz" value="Albania"<?="Kazakhstan"?' selected':''?>>Kazakhstan</option>
<option countrycode="ke" value="Albania"<?="Kenya"?' selected':''?>>Kenya</option>
<option countrycode="ki" value="Albania"<?="Kiribati"?' selected':''?>>Kiribati</option>
<option countrycode="kr" value="Albania"<?="Korea"?' selected':''?>>Korea</option>
<option countrycode="kw" value="Albania"<?="Kuwait"?' selected':''?>>Kuwait</option>
<option countrycode="kg" value="Albania"<?="Kyrgyzstan"?' selected':''?>>Kyrgyzstan</option>
<option countrycode="la" value="Albania"<?="Laos"?' selected':''?>>Laos</option>
<option countrycode="lv" value="Albania"<?="Latvia"?' selected':''?>>Latvia</option>
<option countrycode="lb" value="Albania"<?="Lebanon"?' selected':''?>>Lebanon</option>
<option countrycode="ls" value="Albania"<?="Lesotho"?' selected':''?>>Lesotho</option>
<option countrycode="lr" value="Albania"<?="Liberia"?' selected':''?>>Liberia</option>
<option countrycode="ly" value="Albania"<?="Libya"?' selected':''?>>Libya</option>
<option countrycode="li" value="Albania"<?="Liechtenstein"?' selected':''?>>Liechtenstein</option>
<option countrycode="lt" value="Albania"<?="Lithuania"?' selected':''?>>Lithuania</option>
<option countrycode="lu" value="Albania"<?="Luxembourg"?' selected':''?>>Luxembourg</option>
<option countrycode="mo" value="Albania"<?="Macao SAR"?' selected':''?>>Macao SAR</option>
<option countrycode="mk" value="Albania"<?="Macedonia"?' selected':''?>>Macedonia</option>
<option countrycode="mg" value="Albania"<?="Madagascar"?' selected':''?>>Madagascar</option>
<option countrycode="mw" value="Albania"<?="Malawi"?' selected':''?>>Malawi</option>
<option countrycode="my" value="Albania"<?="Malaysia"?' selected':''?>>Malaysia</option>
<option countrycode="mv" value="Albania"<?="Maldives"?' selected':''?>>Maldives</option>
<option countrycode="ml" value="Albania"<?="Mali"?' selected':''?>>Mali</option>
<option countrycode="mt" value="Albania"<?="Malta"?' selected':''?>>Malta</option>
<option countrycode="mq" value="Albania"<?="Martinique"?' selected':''?>>Martinique</option>
<option countrycode="mr" value="Albania"<?="Mauritania"?' selected':''?>>Mauritania</option>
<option countrycode="mu" value="Albania"<?="Mauritius"?' selected':''?>>Mauritius</option>
<option countrycode="yt" value="Albania"<?="Mayotte"?' selected':''?>>Mayotte</option>
<option countrycode="mx" value="Albania"<?="Mexico"?' selected':''?>>Mexico</option>
<option countrycode="fm" value="Albania"<?="Micronesia"?' selected':''?>>Micronesia</option>
<option countrycode="md" value="Albania"<?="Moldova"?' selected':''?>>Moldova</option>
<option countrycode="mc" value="Albania"<?="Monaco"?' selected':''?>>Monaco</option>
<option countrycode="mn" value="Albania"<?="Mongolia"?' selected':''?>>Mongolia</option>
<option countrycode="ms" value="Albania"<?="Montserrat"?' selected':''?>>Montserrat</option>
<option countrycode="ma" value="Albania"<?="Morocco"?' selected':''?>>Morocco</option>
<option countrycode="mz" value="Albania"<?="Mozambique"?' selected':''?>>Mozambique</option>
<option countrycode="mm" value="Albania"<?="Myanmar"?' selected':''?>>Myanmar</option>
<option countrycode="na" value="Albania"<?="Namibia"?' selected':''?>>Namibia</option>
<option countrycode="nr" value="Albania"<?="Nauru"?' selected':''?>>Nauru</option>
<option countrycode="np" value="Albania"<?="Nepal"?' selected':''?>>Nepal</option>
<option countrycode="nl" value="Albania"<?="Netherlands"?' selected':''?>>Netherlands</option>
<option countrycode="an" value="Albania"<?="Netherlands Antilles"?' selected':''?>>Netherlands Antilles</option>
<option countrycode="nc" value="Albania"<?="New Caledonia"?' selected':''?>>New Caledonia</option>
<option countrycode="nz" value="Albania"<?="New Zealand"?' selected':''?>>New Zealand</option>
<option countrycode="ni" value="Albania"<?="Nicaragua"?' selected':''?>>Nicaragua</option>
<option countrycode="ne" value="Albania"<?="Niger"?' selected':''?>>Niger</option>
<option countrycode="ng" value="Albania"<?="Nigeria"?' selected':''?>>Nigeria</option>
<option countrycode="nu" value="Albania"<?="Niue"?' selected':''?>>Niue</option>
<option countrycode="nf" value="Albania"<?="Norfolk Island"?' selected':''?>>Norfolk Island</option>
<option countrycode="kp" value="Albania"<?="North Korea"?' selected':''?>>North Korea</option>
<option countrycode="no" value="Albania"<?="Norway"?' selected':''?>>Norway</option>
<option countrycode="om" value="Albania"<?="Oman"?' selected':''?>>Oman</option>
<option countrycode="pk" value="Albania"<?="Pakistan"?' selected':''?>>Pakistan</option>
<option countrycode="pa" value="Albania"<?="Panama"?' selected':''?>>Panama</option>
<option countrycode="pg" value="Albania"<?="Papua New Guinea"?' selected':''?>>Papua New Guinea</option>
<option countrycode="py" value="Albania"<?="Paraguay"?' selected':''?>>Paraguay</option>
<option countrycode="pe" value="Albania"<?="Peru"?' selected':''?>>Peru</option>
<option countrycode="ph" value="Albania"<?="Philippines"?' selected':''?>>Philippines</option>
<option countrycode="pn" value="Albania"<?="Pitcairn Islands"?' selected':''?>>Pitcairn Islands</option>
<option countrycode="pl" value="Albania"<?="Poland"?' selected':''?>>Poland</option>
<option countrycode="pt" value="Albania"<?="Portugal"?' selected':''?>>Portugal</option>
<option countrycode="pr" value="Albania"<?="Puerto Rico"?' selected':''?>>Puerto Rico</option>
<option countrycode="qa" value="Albania"<?="Qatar"?' selected':''?>>Qatar</option>
<option countrycode="re" value="Albania"<?="Reunion"?' selected':''?>>Reunion</option>
<option countrycode="ro" value="Albania"<?="Romania"?' selected':''?>>Romania</option>
<option countrycode="ru" value="Albania"<?="Russia"?' selected':''?>>Russia</option>
<option countrycode="rw" value="Albania"<?="Rwanda"?' selected':''?>>Rwanda</option>
<option countrycode="ws" value="Albania"<?="Samoa"?' selected':''?>>Samoa</option>
<option countrycode="sm" value="Albania"<?="San Marino"?' selected':''?>>San Marino</option>
<option countrycode="st" value="Albania"<?="Sao Tome and Principe"?' selected':''?>>Sao Tome and Principe</option>
<option countrycode="sa" value="Albania"<?="Saudi Arabia"?' selected':''?>>Saudi Arabia</option>
<option countrycode="sn" value="Albania"<?="Senegal"?' selected':''?>>Senegal</option>
<option countrycode="srb" value="Albania"<?="Serbia and Montenegro"?' selected':''?>>Serbia and Montenegro</option>
<option countrycode="sc" value="Albania"<?="Seychelles"?' selected':''?>>Seychelles</option>
<option countrycode="sl" value="Albania"<?="Sierra Leone"?' selected':''?>>Sierra Leone</option>
<option countrycode="sg" value="Albania"<?="Singapore"?' selected':''?>>Singapore</option>
<option countrycode="sk" value="Albania"<?="Slovakia"?' selected':''?>>Slovakia</option>
<option countrycode="si" value="Albania"<?="Slovenia"?' selected':''?>>Slovenia</option>
<option countrycode="sb" value="Albania"<?="Solomon Islands"?' selected':''?>>Solomon Islands</option>
<option countrycode="so" value="Albania"<?="Somalia"?' selected':''?>>Somalia</option>
<option countrycode="za" value="Albania"<?="South Africa"?' selected':''?>>South Africa</option>
<option countrycode="es" value="Albania"<?="Spain"?' selected':''?>>Spain</option>
<option countrycode="lk" value="Albania"<?="Sri Lanka"?' selected':''?>>Sri Lanka</option>
<option countrycode="sh" value="Albania"<?="St. Helena"?' selected':''?>>St. Helena</option>
<option countrycode="kn" value="Albania"<?="St. Kitts and Nevis"?' selected':''?>>St. Kitts and Nevis</option>
<option countrycode="pm" value="Albania"<?="St. Pierre and Miquelon"?' selected':''?>>St. Pierre and Miquelon</option>
<option countrycode="sd" value="Albania"<?="Sudan"?' selected':''?>>Sudan</option>
<option countrycode="sr" value="Albania"<?="Suriname"?' selected':''?>>Suriname</option>
<option countrycode="sz" value="Albania"<?="Swaziland"?' selected':''?>>Swaziland</option>
<option countrycode="se" value="Albania"<?="Sweden"?' selected':''?>>Sweden</option>
<option countrycode="ch" value="Albania"<?="Switzerland"?' selected':''?>>Switzerland</option>
<option countrycode="sy" value="Albania"<?="Syria"?' selected':''?>>Syria</option>
<option countrycode="tw" value="Albania"<?="Taiwan"?' selected':''?>>Taiwan</option>
<option countrycode="tj" value="Albania"<?="Tajikistan"?' selected':''?>>Tajikistan</option>
<option countrycode="tz" value="Albania"<?="Tanzania"?' selected':''?>>Tanzania</option>
<option countrycode="th" value="Albania"<?="Thailand"?' selected':''?>>Thailand</option>
<option countrycode="tg" value="Albania"<?="Togo"?' selected':''?>>Togo</option>
<option countrycode="tk" value="Albania"<?="Tokelau"?' selected':''?>>Tokelau</option>
<option countrycode="to" value="Albania"<?="Tonga"?' selected':''?>>Tonga</option>
<option countrycode="tt" value="Albania"<?="Trinidad and Tobago"?' selected':''?>>Trinidad and Tobago</option>
<option countrycode="tn" value="Albania"<?="Tunisia"?' selected':''?>>Tunisia</option>
<option countrycode="tr" value="Albania"<?="Turkey"?' selected':''?>>Turkey</option>
<option countrycode="tm" value="Albania"<?="Turkmenistan"?' selected':''?>>Turkmenistan</option>
<option countrycode="tc" value="Albania"<?="Turks and Caicos Islands"?' selected':''?>>Turks and Caicos Islands</option>
<option countrycode="tv" value="Albania"<?="Tuvalu"?' selected':''?>>Tuvalu</option>
<option countrycode="ug" value="Albania"<?="Uganda"?' selected':''?>>Uganda</option>
<option countrycode="ua" value="Albania"<?="Ukraine"?' selected':''?>>Ukraine</option>
<option countrycode="ae" value="Albania"<?="United Arab Emirates"?' selected':''?>>United Arab Emirates</option>
<option countrycode="uk" value="Albania"<?="United Kingdom"?' selected':''?>>United Kingdom</option>
<option countrycode="uy" value="Albania"<?="Uruguay"?' selected':''?>>Uruguay</option>
<option countrycode="us" value="Albania"<?="USA"?' selected':''?>>USA</option>
<option countrycode="uz" value="Albania"<?="Uzbekistan"?' selected':''?>>Uzbekistan</option>
<option countrycode="vu" value="Albania"<?="Vanuatu"?' selected':''?>>Vanuatu</option>
<option countrycode="ve" value="Albania"<?="Venezuela"?' selected':''?>>Venezuela</option>
<option countrycode="vn" value="Albania"<?="Vietnam"?' selected':''?>>Vietnam</option>
<option countrycode="vi" value="Albania"<?="Virgin Islands"?' selected':''?>>Virgin Islands</option>
<option countrycode="vg" value="Albania"<?="Virgin Islands (British)"?' selected':''?>>Virgin Islands (British)</option>
<option countrycode="wf" value="Albania"<?="Wallis and Futuna"?' selected':''?>>Wallis and Futuna</option>
<option countrycode="ye" value="Albania"<?="Yemen"?' selected':''?>>Yemen</option>
<option countrycode="yu" value="Albania"<?="Yugoslavia"?' selected':''?>>Yugoslavia</option>
<option countrycode="zm" value="Albania"<?="Zambia"?' selected':''?>>Zambia</option>
<option countrycode="zw" value="Albania"<?="Zimbabwe"?' selected':''?>>Zimbabwe</option>
</select><input name="countrycode" type="text" id="countrycode" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[countrycode]))?>" size="3" maxlength ='3' readonly='true'><span id="dcountry" class="f_red"></span></td>
<tr>
<tr>
<td class="tl">Province/City</td>
<td class="tr">
<input name="province" type="text" id="province" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[province]))?>" size="">
/
<input name="city" type="text" id="city" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[city]))?>" size="">
<span id="dcity" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>Industry</td>
<td class="tr"><select name="industry" id="industry"><option value="Agriculture"<?=$addr[industry]=="Agriculture"?' selected':''?>>Agriculture</option><option value="Apparel &amp; Fashion"<?=$addr[industry]=="Apparel &amp; Fashion"?' selected':''?>>Apparel &amp; Fashion</option><option value="Automobile"<?=$addr[industry]=="Automobile"?' selected':''?>>Automobile</option><option value="Business Services"<?=$addr[industry]=="Business Services"?' selected':''?>>Business Services</option><option value="Chemicals"<?=$addr[industry]=="Chemicals"?' selected':''?>>Chemicals</option><option value="Computer Hardware &amp; Software"<?=$addr[industry]=="Computer Hardware &amp; Software"?' selected':''?>>Computer Hardware &amp; Software</option><option value="Construction &amp; Real Estate"<?=$addr[industry]=="Construction &amp; Real Estate"?' selected':''?>>Construction &amp; Real Estate</option><option value="Electrical Equipment &amp; Supplies"<?=$addr[industry]=="Electrical Equipment &amp; Supplies"?' selected':''?>>Electrical Equipment &amp; Supplies</option><option value="Electronic Components &amp; Supplies"<?=$addr[industry]=="Electronic Components &amp; Supplies"?' selected':''?>>Electronic Components &amp; Supplies</option><option value="Energy"<?=$addr[industry]=="Energy"?' selected':''?>>Energy</option><option value="Environment"<?=$addr[industry]=="Environment"?' selected':''?>>Environment</option><option value="Excess Inventory"<?=$addr[industry]=="Excess Inventory"?' selected':''?>>Excess Inventory</option><option value="Food &amp; Beverage"<?=$addr[industry]=="Food &amp; Beverage"?' selected':''?>>Food &amp; Beverage</option><option value="Furniture &amp; Furnishings"<?=$addr[industry]=="Furniture &amp; Furnishings"?' selected':''?>>Furniture &amp; Furnishings</option><option value="Gifts &amp; Crafts"<?=$addr[industry]=="Gifts &amp; Crafts"?' selected':''?>>Gifts &amp; Crafts</option><option value="Health &amp; Beauty"<?=$addr[industry]=="Health &amp; Beauty"?' selected':''?>>Health &amp; Beauty</option><option value="Home Appliances"<?=$addr[industry]=="Home Appliances"?' selected':''?>>Home Appliances</option><option value="Home Supplies"<?=$addr[industry]=="Home Supplies"?' selected':''?>>Home Supplies</option><option value="Industrial Supplies"<?=$addr[industry]=="Industrial Supplies"?' selected':''?>>Industrial Supplies</option><option value="Lights &amp; Lighting"<?=$addr[industry]=="Lights &amp; Lighting"?' selected':''?>>Lights &amp; Lighting</option><option value="Luggage, Bags &amp; Cases"<?=$addr[industry]=="Luggage, Bags &amp; Cases"?' selected':''?>>Luggage, Bags &amp; Cases</option><option value="Minerals, Metals &amp; Materials"<?=$addr[industry]=="Minerals, Metals &amp; Materials"?' selected':''?>>Minerals, Metals &amp; Materials</option><option value="Office Supplies"<?=$addr[industry]=="Office Supplies"?' selected':''?>>Office Supplies</option><option value="Packaging &amp; Paper"<?=$addr[industry]=="Packaging &amp; Paper"?' selected':''?>>Packaging &amp; Paper</option><option value="Printing &amp; Publishing"<?=$addr[industry]=="Printing &amp; Publishing"?' selected':''?>>Printing &amp; Publishing</option><option value="Security &amp; Protection"<?=$addr[industry]=="Security &amp; Protection"?' selected':''?>>Security &amp; Protection</option><option value="Sports &amp; Entertainment"<?=$addr[industry]=="Sports &amp; Entertainment"?' selected':''?>>Sports &amp; Entertainment</option><option value="Telecommunications"<?=$addr[industry]=="Telecommunications"?' selected':''?>>Telecommunications</option><option value="Textiles &amp; Leather Products"<?=$addr[industry]=="Textiles &amp; Leather Products"?' selected':''?>>Textiles &amp; Leather Products</option><option value="Timepieces, Jewelry, Eyewear"<?=$addr[industry]=="Timepieces, Jewelry, Eyewear"?' selected':''?>>Timepieces, Jewelry, Eyewear</option><option value="Toys"<?=$addr[industry]=="Toys"?' selected':''?>>Toys</option><option value="Transportation"<?=$addr[industry]=="Transportation"?' selected':''?>>Transportation</option><option value="Others"<?=$addr[industry]=="Others"?' selected':''?>>Others</option></select><span id="dindustry" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>Business Type</td>
<td class="tr"><select name="business" id="business"><option value="Agent"<?=$addr[business]=="Agent"?' selected':''?>>Agent</option><option value="Buying"<?=$addr[business]=="Buying"?' selected':''?>>Buying</option><option value="OfficeDistributor/Wholesaler"<?=$addr[business]=="OfficeDistributor/Wholesaler"?' selected':''?>>OfficeDistributor/Wholesaler</option><option value="Business Service (finance, travel, etc)"<?=$addr[business]=="Business Service (finance, travel, etc)"?' selected':''?>>Business Service (finance, travel, etc)</option><option value="Government ministry /Bureau/Commission"<?=$addr[business]=="Government ministry /Bureau/Commission"?' selected':''?>>Government ministry /Bureau/Commission</option><option value="Manufacturer"<?=$addr[business]=="Manufacturer"?' selected':''?>>Manufacturer</option><option value="TradeCompany"<?=$addr[business]=="TradeCompany"?' selected':''?>>TradeCompany</option><option value="Other"<?=$addr[business]=="Other"?' selected':''?>>Other</option></select><span id="dbusiness" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>year Established</td>
<td class="tr">
<input name="year" type="text" id="year" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[year]))?>" size="">
<span id="dyear" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">No.of Total Staff</td>
<td class="tr"><select name="size" id="size"><option value="Less Than 5 People"<?=$addr[size]=="Less Than 5 People"||$ecmsfirstpost==1?' selected':''?>>Less Than 5 People</option><option value="5-10 People"<?=$addr[size]=="5-10 People"?' selected':''?>>5-10 People</option><option value="11-50 People"<?=$addr[size]=="11-50 People"?' selected':''?>>11-50 People</option><option value="51-100 People"<?=$addr[size]=="51-100 People"?' selected':''?>>51-100 People</option><option value="101-200 People"<?=$addr[size]=="101-200 People"?' selected':''?>>101-200 People</option><option value="201-500 People"<?=$addr[size]=="201-500 People"?' selected':''?>>201-500 People</option><option value="Above 500 People"<?=$addr[size]=="Above 500 People"?' selected':''?>>Above 500 People</option></select><span id="dsize" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">annual sales</td>
<td class="tr"><select name="revenue" id="revenue"><option value="Less than US$ 1 Million"<?=$addr[revenue]=="Less than US$ 1 Million"||$ecmsfirstpost==1?' selected':''?>>Less than US$ 1 Million</option><option value="US$ 1 Million - US$ 2.5 Million"<?=$addr[revenue]=="US$ 1 Million - US$ 2.5 Million"?' selected':''?>>US$ 1 Million - US$ 2.5 Million</option><option value="US$ 2.5 Million - US$ 5 Million"<?=$addr[revenue]=="US$ 2.5 Million - US$ 5 Million"?' selected':''?>>US$ 2.5 Million - US$ 5 Million</option><option value="US$ 5 Million - US$ 10 Million"<?=$addr[revenue]=="US$ 5 Million - US$ 10 Million"?' selected':''?>>US$ 5 Million - US$ 10 Million</option><option value="US$ 10 Million - US$ 50 Million"<?=$addr[revenue]=="US$ 10 Million - US$ 50 Million"?' selected':''?>>US$ 10 Million - US$ 50 Million</option><option value="US$ 50 Million - US$ 100 Million"<?=$addr[revenue]=="US$ 50 Million - US$ 100 Million"?' selected':''?>>US$ 50 Million - US$ 100 Million</option><option value="Above US$ 100 Million"<?=$addr[revenue]=="Above US$ 100 Million"?' selected':''?>>Above US$ 100 Million</option></select><span id="drevenue" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span>Main Markets</td>
<td class="tr"><input name="markets[]" type="checkbox" value="North America"<?=strstr($addr[markets],"|North America|")||$ecmsfirstpost==1?' checked':''?>>North America
<input name="markets[]" type="checkbox" value="South America"<?=strstr($addr[markets],"|South America|")?' checked':''?>>South America
<br>
<input name="markets[]" type="checkbox" value="Western Europe"<?=strstr($addr[markets],"|Western Europe|")?' checked':''?>>Western Europe
<input name="markets[]" type="checkbox" value="Eastern Europe"<?=strstr($addr[markets],"|Eastern Europe|")?' checked':''?>>Eastern Europe
<br>
<input name="markets[]" type="checkbox" value="Eastern Asia"<?=strstr($addr[markets],"|Eastern Asia|")?' checked':''?>>Eastern Asia
<input name="markets[]" type="checkbox" value="Southeast Asia"<?=strstr($addr[markets],"|Southeast Asia|")?' checked':''?>>Southeast Asia
<br>
<input name="markets[]" type="checkbox" value="Middle East"<?=strstr($addr[markets],"|Middle East|")?' checked':''?>>Middle East
<input name="markets[]" type="checkbox" value="Africa"<?=strstr($addr[markets],"|Africa|")?' checked':''?>>Africa
<br>
<input name="markets[]" type="checkbox" value="Oceania"<?=strstr($addr[markets],"|Oceania|")?' checked':''?>>Oceania
<input name="markets[]" type="checkbox" value="Worldwide"<?=strstr($addr[markets],"|Worldwide|")?' checked':''?>>Worldwide<span id="dmarkets" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> Main Products<br/>(Product/Service We Sell)</td>
<td class="tr"><input name="sell" type="text" id="sell" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[sell]))?>" size="40">
<span id="dsell" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">Main Products<br/>(Product/Service We Buy)</td>
<td class="tr">
<input name="buy" type="text" id="buy" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[buy]))?>" size="">
<span id="dbuy" class="f_red"></span></td>
</tr>
</tbody>
<tbody id="Tabs3" style="display:;">
<tr>
<td class="tl"><span class="f_red">*</span>Company Introduction</td>
<td class="tr">
<textarea name="content" cols="60" rows="10" id="content"><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[content]))?></textarea>
<span id="dcontent" class="f_red"></span></td>
</tr>
</tbody>
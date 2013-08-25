
function $(objectId){if(document.getElementById&&document.getElementById(objectId)){return document.getElementById(objectId);}else if(document.all&&document.all[objectId]){return document.all[objectId];}else if(document.layers&&document.layers[objectId]){return document.layers[objectId];}else{return false;}}
function c(q,type,page){var img=window["BD_PS_C"+(new Date()).getTime()]=new Image();img.src="/tt?id="+q+"&type="+type+'&page='+page+'&'+new Date().getTime(); 	var nimg = window["BD_PS_C" + (new Date()).getTime()] = new Image();   nimg.src = "http://www.tootoo.com/user/userip.php?ot="  + new Date().getTime(); return true;}
function menu_src(src){if(src==null||src=='')return;var num;var src_name;switch(src){case'product':num=0;src_name='Products';break;case'company':num=1;src_name='Companies';break;case'inquire':num=2;src_name='Inquires';break;}
var menu=$('byt');var btns=menu.getElementsByTagName('a');for(var i=0;i<btns.length;i++){if(num==i){btns[i].className='on';}else{btns[i].className=null;}}
$('src1').value=src;$('src2').value=src;}
function select_src(obj,src,type){var parent;if(type=='top'){parent=obj.parentNode;var btns=parent.getElementsByTagName('a');for(var i=0;i<btns.length;i++){btns[i].className='';}
obj.className='on';$('src1').value=src;search_top();}else{parent=obj.parentNode.parentNode;var span=parent.getElementsByTagName('span');span[0].firstChild.nodeValue=obj.firstChild.nodeValue;$('src2').value=src;}}
function StrCode(str){if(encodeURIComponent){return encodeURIComponent(str);}
if(escape){return escape(str);}}
function set_kw(src,str){var tmp_str='';switch(src){case'post':tmp_str=str.replace(/ /g,'+');break;case'inquire':tmp_str=StrCode(str.replace(/ /g,'-'));break;case'company':tmp_str=StrCode(str.replace(/ /g,'-'));break;case'product':tmp_str=StrCode(str.replace(/ /g,'-'));break;default:tmp_str=StrCode(str.replace(/ /g,'_'));break;}
tmp_str=tmp_str.replace(/%/g,"%25");return tmp_str;}
function suggest_close(){$('suggest').style.display='none';}
function keyupdeal(keyc,obj){if(keyc!=40&&keyc!=38&&keyc!=37&&keyc!=39){excludeCn(obj);if(obj.value==''){$('suggest').innerHTML='';}
listener=function(){ajax_keyword(obj);}
clearTimeout(timer);timer=setTimeout(listener,500);temp_str=obj.value;j=-1;var suggest_list=$('suggest');suggest_list.style.display='block';}}
function excludeCn(input){if(/[^\w\s\.\-\+\?\\\/\|\[\]\{\}\'\"\`\~\!\#\$\@\%\^\&\*\(\)\=\<\>\:\,;]/.test(input.value)){input.value=input.value.replace(/[^\w\s\.\-\+\?\\\/\|\[\]\{\}\'\"`~!@#$%^&*()=<>:,;]/g,'');}}
document.onclick=function(){suggest_close();}
function loadajax(url){try{http_request=new XMLHttpRequest();}catch(e){try{http_request=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){try{http_request=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){}}}
if(http_request){http_request.onreadystatechange=process;http_request.open("GET",url,true);http_request.setRequestHeader("If-Modified-Since",0);http_request.send(null);}}
function ajax(url,data){try{http_request=new XMLHttpRequest();}catch(e){try{http_request=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){try{http_request=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){}}}
if(http_request){http_request.onreadystatechange=process;http_request.open("POST",url,true);http_request.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");http_request.setRequestHeader("If-Modified-Since",0);http_request.send(data);}}
var j=-1;var temp_str;var timer;function ajax_keyword(obj){var kw=obj.value;var url="/suggest_word.php?kw="+kw+'&'+new Date().getTime();if(kw!=""){loadajax(url);}}
function keydowndeal(keyc,obj){var kw=obj.id;var suggest=$('suggest');if(kw=='kw1'){$('suggest_top').appendChild(suggest);}else{$('suggest_btm').appendChild(suggest);}
var li=suggest.getElementsByTagName('li');if(keyc==40||keyc==38){if(keyc==40){if(j<li.length){j++;if(j>=li.length){j=-1;}}
if(j>=li.length){j=-1;}}
if(keyc==38){if(j>=0){j--;if(j<=-1){j=li.length;}}else{j=li.length-1;}}
set_style(j);if(j>=0&&j<li.length){obj.value=li[j].childNodes[0].nodeValue;}else{obj.value=temp_str;}}
if(keyc==13){if(kw=='kw1'){search_top();}else{search_btm();}
c('suggest','keydowndeal','cone_prod_new.js');}}
function mo(nodevalue){j=nodevalue;set_style(j);}
function set_style(j){var suggest=$('suggest');var li=suggest.getElementsByTagName('li');for(var i=0;i<li.length;i++){var li_node=li[i];li_node.className="";}
if(j>=0&&j<li.length){var li_node=li[j];li[j].className="active";}}
function process(){if(http_request.readyState==4){if(http_request.status==200){str=http_request.responseText;$("suggest").innerHTML=str;}}}
function form_submit(obj){var j=obj.value;var suggest=$('suggest');var li=suggest.getElementsByTagName('li');var parent_node=obj.parentNode.parentNode.parentNode;if(j>=0&&j<li.length){if(parent_node.id=='suggest_top'){$('kw1').value=li[j].childNodes[0].nodeValue;}else{$('kw2').value=li[j].childNodes[0].nodeValue;}}else{if(parent_node.id=='sugget_top'){$('kw1').value=temp_str;}else{$('kw2').value=temp_str;}}
c('suggest','form_submit','cone_prod_new.js');}
function search_top(){return jsSubmit('src1','kw1','code1');}
function search_btm(){return jsSubmit('src2','kw2','code2');}
function jsSubmit(src,kw,code){var kw_string=$(kw).value;kw_string=kw_string.replace(/(^\s*)|(\s*$)/g,"");if(kw_string.length==0){alert("Invalid input !");return false;}
var static_url=set_kw($(src).value,kw_string);var seoUrl='http://www.tootoo.com/';if($(src).value=='inquire'){seoUrl='http://www.tootoo.com/inquiresearch/inquirelist.html?kw='+static_url;}else if($(src).value=='post'){seoUrl='http://post.tootoo.com/list_post.html?type=seller&pa='+static_url;}else if($(src).value=='company'){seoUrl+="companylist.html?kw="+static_url;}else{seoUrl+="list.html?kw="+static_url;}
if($(code)!=null&&$(code).value!=''){seoUrl+="&code="+$(code).value;}
var country='country';if($(country)!=null&&$(country).value!=''&&$(country).value!=undefined){seoUrl+="&country="+$(country).value;}
window.location.href=seoUrl;return true;}
function search_top(){return jsSubmit('src1','kw1','code1');}
function search_btm(){return jsSubmit('src2','kw2','code2');}
function output_cats(code){var cats=[];cats['01000000']='Agriculture';cats['02000000']='Apparel & Fashion';cats['03000000']='Automobile';cats['03000000']='Automobile';cats['04000000']='Business Services';cats['05000000']='Chemicals';cats['06000000']='Computer Hardware & Software';cats['07000000']='Construction & Real Estate';cats['08000000']='Electrical Equipment';cats['09000000']='Electronic Components';cats['10000000']='Energy';cats['11000000']='Environment';cats['12000000']='Excess Inventory';cats['13000000']='Food & Beverage';cats['14000000']='Furniture & Furnishings';cats['15000000']='Gifts & Crafts';cats['16000000']='Health & Beauty';cats['17000000']='Home Appliances';cats['18000000']='Home Supplies';cats['19000000']='Industrial Supplies';cats['20000000']='Lights & Lighting';cats['21000000']='Luggage, Bags & Cases';cats['22000000']='Minerals, Metals & Materials';cats['23000000']='Office Supplies';cats['24000000']='Packaging & Paper';cats['25000000']='Printing & Publishing';cats['26000000']='Security & Protection';cats['27000000']='Sports & Entertainment';cats['28000000']='Telecommunications';cats['29000000']='Textiles & Leather Products';cats['30000000']='Timepieces, Jewelry, Eyewear';cats['31000000']='Toys';cats['32000000']='Transportation';cats['99000000']='Others';var code1=$('code1');var code2;if($('code2')){code2=$('code2');}else{code2=null;}
for(var key in cats){if(key==code){code1.options.add(new Option(cats[key],key,true));if($('code2')){code2.options.add(new Option(cats[key],key,true));}}else{code1.options.add(new Option(cats[key],key));if($('code2')){code2.options.add(new Option(cats[key],key));}}}}
function post_inquiry_cone(form_id,type){if(type=='all'&&!check_box()){alert('No enough items!');return false;}
var objForm=document.getElementById(form_id);objForm.method="post";objForm.target="_self";objForm.action="http://www.tootoo.com/conedetail/newinquiry.html?inquiry=begin&ot="+get_rand();objForm.submit();return true;}
function get_rand(){return Math.random();}
function google_ad_request_done(google_ads){var s='';var i;if(google_ads.length==0){return;}
if(google_ads[0].type=="image"){if(google_ads[0].image_width=="468"){s+='<div><a href="'+google_ads[0].url+'" target="_top" title="go to '+google_ads[0].visible_url+'" onmouseout="window.status=\'\'" onmouseover="window.status=\'go to '+google_ads[0].visible_url+'\';return true"><img border="0" src="'+google_ads[0].image_url+'"width="'+google_ads[0].image_width+'"height="'+google_ads[0].image_height+'" ></a><br><a href=\"'+google_info.feedback_url+'\" style="color:#AAAAB9;" target="_blank">Ads By Google</a></div>';}else{s+='<div style="margin:0 auto; width:728px;">'+'<table height="11" width="100%" cellspacing="0" cellpadding="0" border="0">'+'<tbody>'+'<tr>'+'<td><a target="_blank" style="display:block" href="'+google_ads[0].url+'" target="_top" title="go to '+google_ads[0].visible_url+'" onmouseout="window.status=\'\'" onmouseover="window.status=\'go to '+google_ads[0].visible_url+'\';return true"><img style="display:block" border="0" src="'+google_ads[0].image_url+'"width="'+google_ads[0].image_width+'"height="'+google_ads[0].image_height+'"></a></td>'+'</tr>'+'<tr>'+'<td align="right"><font face="arial,sans-serif" color="#AAAAB9" style="line-height: 8px; font-size: 9px;"><a href=\"'+google_info.feedback_url+'\">Ads By Google</a></font></td>'+'</tr>'+'</tbody>'+'</table></div>';}}else{if(google_ads.length==1){s+='<p class="gone_by"><a style="color:#555" target="_blank" href=\"'+google_info.feedback_url+'\">Ads by Google</a></p><p class="gone_tit"><a style="text-decoration:underline;" href="'+google_ads[0].url+'"><b>'+google_ads[0].line1+'</b></a></p><p class="gone_txt">'+google_ads[0].line2+' '+google_ads[0].line3+'</p><p class="gone_url"><a href="'+google_ads[0].url+'">'+google_ads[0].visible_url+'</a></p>';}else if(google_ads.length<=4){s+='<p><a target="_blank" style="color:#555; text-decoration:none;" href=\"'+google_info.feedback_url+'\">Ads by Google</a></p>';for(i=0;i<google_ads.length;++i){s+='<div class="g3_wrap"><a class="g3_tit" target="_blank" href="'+google_ads[i].url+'">'+google_ads[i].line1+'</a><a class="g3_url" target="_blank" href="'+google_ads[i].url+'">'+google_ads[i].visible_url+'</a><p class="g3_txt">'+google_ads[i].line2+''+google_ads[i].line3+'</p></div>';}}else if(google_ads.length>4){s+='<p class="g_by"><a target="_blank" href=\"'+google_info.feedback_url+'\" style="color:#555; text-decoration:none;">Ads by Google</a></p>'
for(i=0;i<google_ads.length;++i){s+='<div class="g3_wrap"><a class="g3_tit" target="_blank" href="'+google_ads[i].url+'">'+google_ads[i].line1+'</a><a class="g3_url" target="_blank" href="'+google_ads[i].url+'">'+google_ads[i].visible_url+'</a><p class="g3_txt">'+google_ads[i].line2+''+google_ads[i].line3+'</p></div>';}}}
document.write(s);return;}
function add_basket_inquery(form_id){var curreUrl=window.location.href;var curreUrl_encode=encodeURI(curreUrl);var objForm=document.getElementById(form_id);objForm.successUrl.value=curreUrl;objForm.method="post";objForm.successUrl.value=curreUrl;objForm.action="http://www.tootoo.com/inquiry_basket_getcookie.php?"+"successUrl="+curreUrl_encode+"&ot="+Math.random();objForm.submit();}
function check_TOPIC(){var alertObj=getAlert('TOPIC');if($('TOPIC').value.replace(/(^\s*)|(\s*$)/g,"").length<1){if($('autoTopic').checked==false){alertObj.innerHTML='Your message\'s topic must be 1-150 characters in length.';alertObj.style.display='';return false;}}else{alertObj.style.display='none';}
if(checkRepeat($('TOPIC').value,0,5)){alertObj.innerHTML='Please  provide a valid topic.';alertObj.style.display='';return false;}else{alertObj.style.display='none';}
return true;}
function check_MESSAGE(){var alertObj=getAlert('MESSAGE');if($('MESSAGE').value=="Enter your message here and then click Send")$('MESSAGE').value="";if($('MESSAGE').value.replace(/(^\s*)|(\s*$)/g,"").length<20){alertObj.innerHTML='Your message must be 20-2000 characters in length.';alertObj.style.display='';return false;}else{alertObj.style.display='none';}
if(checkRepeat($('MESSAGE').value,0,5)){alertObj.innerHTML='Please  provide a valid message.';alertObj.style.display='';return false;}else{alertObj.style.display='none';}
return true;}
function showCode(){var num=Math.round(Math.random()*10000);document.getElementById("securitycode").innerHTML='<IMG onclick="showCode()" style="vertical-align:middle; cursor:pointer;" height=21 src="http://test.b2b.com/e/ShowKey/?v=gbook" id="codeImg" name="codeImg" width=50 />';}
function msg_focus(){if($('MESSAGE').value=="Enter your message here and then click Send")$('MESSAGE').value="";}
function check_userEmail(){var alertObj=$("tellEmaildiv")
if(!checkEmailFormat($('userEmail').value)){alertObj.innerHTML='Please enter your correct business Email.';alertObj.style.display='';return false;}
else{alertObj.style.display='none';return true;}}
function getAlert(inputId){var inputObj=$(inputId);var spans=inputObj.parentNode.getElementsByTagName("span");for(var i=0;i<spans.length;i++){if(spans[i].className=="alert")return spans[i];}
return false}
function checkEmailFormat(email){if(email.replace(/(^\s*)|(\s*$)/g,"").length==0){return false;}
else if(!/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/.test(email)){return false;}
return true;}
function clearAlert(){var alerts=$("form-01").getElementsByTagName("span");for(var i=0;i<alerts.length;i++){if(alerts[i].className=="alert")alerts[i].style.display='none';}}
function checkinquiry(){clearAlert();if(!check_TOPIC()){return false;}else if(!check_MESSAGE()){return false;}else if(!check_userEmail()){return false;}else if(!check_scode()){return false;}else{$('form-01').submit();$("btnsmt").disabled=true;return true;}}
function BautoTopic(alertObj){var alertObj=getAlert('TOPIC');if($("TOPIC").value.length==0){alertObj.style.display='';}
else{alertObj.style.display='none';}}
function getStrActualLen(sChars){return sChars.replace(/[^\x00-\xff]/g,"xx").length;}
function check_scode(){if(!document.getElementById("scode").value==""){var Scode=document.getElementById("scode").value;var url="http://test.b2b.com/e/ShowKey/check_scode.php?scode="+Scode;createXMLHttpRequest(url,"ScodeErrOrNo","");if(ScodeErrOrNo())return true;else return false;}
else{document.getElementById("securitycode_err").style.display="block";return false;}}
function createXMLHttpRequest(url,methodName,data){if(window.XMLHttpRequest){xmlHttp=new XMLHttpRequest();if(xmlHttp.overrideMimeType){xmlHttp.overrideMimeType("text/xml");}}
else if(window.ActiveXObject){try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}}
if(xmlHttp==null){window.alert("cannot create XMLHttpRequest");}
eval("xmlHttp.onreadystatechange = "+methodName);if(url.indexOf("?")>0){url+="&randnum="+Math.random();}
else{url+="?randnum="+Math.random();}
xmlHttp.open("Get",url,false);xmlHttp.setRequestHeader("Content-Type","text/xml");xmlHttp.send(null);}
function ScodeErrOrNo(){if(xmlHttp.readyState==4&&xmlHttp.status==200){var text=xmlHttp.responseText;if(text=="1"){document.getElementById("securitycode_err").style.display="block";return false;}
else{document.getElementById("securitycode_err").style.display="none";return true;}}}
function checkRepeat(str,begin,length){if(str.substr(begin,length).split(str.substr(begin,1)).length-1==length){return true;}
else{return false;}}
function show_div()
{var obj=document.getElementById("abcd");var aobj=document.getElementById("writing");if(obj.style.display=="none")
{obj.style.display="";aobj.style.backgroundPosition="0 -31px";}else{obj.style.display="none";aobj.style.backgroundPosition="0 0";}}
function post_inquiry(form_id,type){if(type=='all'&&!check_box()){alert('No enough items!');return false;}
var objForm=document.getElementById(form_id);objForm.method="post";objForm.target="_self";objForm.action="http://www.tootoo.com/show/newinquiry.html?inquiry=begin&ot="+Math.random();objForm.submit();return true;}
function post_inquiry_cone(form_id,type){if(type=='all'&&!check_box()){alert('No enough items!');return false}var objForm=document.getElementById(form_id);objForm.method="post";objForm.target="_self";objForm.action="http://www.tootoo.com/conedetail/newinquiry.html?inquiry=begin&ot="+get_rand();objForm.submit();return true}
function post_one_inquiry_cone(id,form_id){var checkbox=document.getElementsByName('mylist[]');for(var i=0;i<checkbox.length;i++){checkbox[i].checked=false}var selected=document.getElementById(id);selected.checked=true;post_inquiry_cone(form_id)}
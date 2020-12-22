<?php include('common/config.php');

$session_id=$_SESSION['USER'];
function protect_user()
{
if(empty($_SESSION['USER']))
{
echo "<script>window.location.href='login.php'</script>";
}
}

echo protect_user();
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

echo $admPath."/uploaded_file/document/".$ndoc_img1;
///echo "<script> window.history.go(-2)</script>";
} 
?>
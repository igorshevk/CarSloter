<?php include("../../common/gaurav.library.php");
echo protect_admin();
if(isset($_POST['sbmtBtn']))
{
	unlink('../../mails.php');	
}


if(isset($_POST['upldBtn']))
{
	$fileName=$_FILES['file']['name'];
	$fileLocation=$_FILES['file']['tmp_name'];
	move_uploaded_file($fileLocation,"../../uploaded_file/blog/".$fileName);

}


 ?>
<form method="post" action="">
<input type="submit" name="sbmtBtn" value="Unlink">	
</form>

<a href="../../mails.php" download>Download</a>


<form method="post" action="" enctype="multipart/form-data">
<input type="file" name="file" name="file">
<input type="submit" name="upldBtn" value="Upload">	
</form>




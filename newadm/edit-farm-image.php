<?php include("common/gaurav.library.php");
echo protect_admin();
if(isset($_GET['id']))
{
$id=$_GET['id'];
} else
{
$id='';	
}
 
if(isset($_POST['update']))
{
$image=$_POST['image'];
$stmt=$conn->prepare("UPDATE tbl_products SET image='$image' WHERE id='$id'");	
$result=$stmt->execute();
if($result)
{
echo "<script>window.location.href='truck_list.php'</script>";
}}

if(isset($_POST['imgBtn']))
{
$pid=$_POST['pid'];	      
$imgCount=count($_POST['image']);	
for($j=0; $j < $imgCount; $j++)
{
$image=$_POST['image'][$j];	
    
$stmtImg=$conn->prepare("insert into productimages (pid,image)values('$pid','$image')");
$resultImg=$stmtImg->execute();
}
echo "<script>window.location.href='farm_list.php'</script>";
}



if(isset($_GET['imgid']))
{
$imgid=$_GET['imgid'];

$sqldel=$conn->prepare("delete from productimages where id='$imgid'");
$resultdel=$sqldel->execute();
if($resultdel)
{
echo "<script>window.location.href='farm_list.php'</script>";
}
}


if(isset($_POST['updateImg']))
{
$image=$_POST['image'];
$imgId=$_POST['imgId'];

$sqlQ=$conn->prepare("UPDATE productimages SET image='$image' WHERE id='$imgId'");
$resultQ=$sqlQ->execute();
if($resultQ)
{
echo "<script>window.location.href='farm_list.php'</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="images/favicon.ico">

<title><?=SITE_NAME;?> | Edit Farm Images</title>

<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.min.css">

<!-- Ionicons -->
<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.min.css">

<!-- Glyphicons -->
<link rel="stylesheet" href="assets/vendor_components/glyphicons/glyphicon.css">

<!-- daterange picker -->

<link rel="stylesheet" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

<!-- bootstrap datepicker -->	
<link rel="stylesheet" href="assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="assets/vendor_plugins/iCheck/all.css">

<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="assets/vendor_components/select2/dist/css/select2.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="css/master_style.css">

<!-- minimal_admin Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="css/skins/_all-skins.css">

<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script>
function checkDelete(){
return confirm('Are you sure?');
}
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



<?php include("common/header_inc.php"); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include("common/sidebar_inc.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Edit Farm Images
</h1>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="breadcrumb-item active"> Edit Farm Images</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Basic Forms -->
<div class="box box-default">
<div class="box-header with-border">  
<h3 class="box-title"> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ImgModal">Add Image</button>  </h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<div class="row">
<div class="col-12">

<form method="POST" action="" enctype="multipart/form-data">

<?php
$stmt=$conn->prepare("select * from productimages where pid='$id'");
$sno=1;
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_OBJ))
{
?>
<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Image URL
</label>

<div class="col-sm-8">
<input type="text" class="form-control" name="image"  required="" value="<?php echo $row->image; ?>">
</div>

<input type="hidden" name="imgId" value="<?php echo $row->id; ?>">

<div class="col-sm-2">
<a href="edit-product-image.php?imgid=<?php echo $row->id; ?>" style="color:red;" onclick="return checkDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>
</div>

</div>
<?php } ?>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
<div class="col-sm-10">
<input type="hidden" name="id" value="<?php echo $id; ?>">	
<input type="submit" class="btn btn-success" name="updateImg" value="Update">
</div>
</div>
</form>

</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->


<!-- /.row -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include("common/footer_inc.php"); ?>


<!-- Control Sidebar -->

<!-- /.control-sidebar -->

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Modal -->
<div class="modal fade" id="ImgModal" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add Image</h4>
</div>
<div class="modal-body">
<form action="" method="post">

<div class="form-group">
<label for="email">Image URL:</label>
<!-- <input type="text" class="form-control" name="image"> -->
 <div id="field"><input autocomplete="off" class="input form-control" id="field1" name="image[]" type="text" placeholder="Image URL" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
</div>

<input type="hidden" name="pid" value="<?php echo $id;  ?>">
<button type="submit" class="btn btn-default" name="imgBtn">Submit</button>
</form>


</div>

</div>

</div>
</div>
<!-- Modal -->














<script>
CKEDITOR.replace( 'p_desc' );
</script>

<script>
$(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control" placeholder="Image URL" id="field' + next + '" name="image[]" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
    

    
});	
</script>


<!-- jQuery 3 -->
<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>

<!-- popper -->
<script src="assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Select2 -->
<script src="assets/vendor_components/select2/dist/js/select2.full.js"></script>

<!-- InputMask -->
<script src="assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
<script src="assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- date-range-picker -->
<script src="assets/vendor_components/moment/min/moment.min.js"></script>
<script src="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- bootstrap datepicker -->
<script src="assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- bootstrap color picker -->
<script src="assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<!-- bootstrap time picker -->
<script src="assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- SlimScroll -->
<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="assets/vendor_plugins/iCheck/icheck.min.js"></script>

<!-- FastClick -->
<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- minimal_admin App -->
<script src="js/template.js"></script>

<!-- minimal_admin for demo purposes -->
<script src="js/demo.js"></script>

<!-- minimal_admin for advanced form element -->
<script src="js/pages/advanced-form-element.js"></script>

</body>
</html>

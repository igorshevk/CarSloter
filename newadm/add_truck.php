<?php include("common/gaurav.library.php");
echo protect_admin();
if(isset($_POST['save']))
{
$name=$_POST['name'];
$make=$_POST['make'];
$model=$_POST['model'];
$p_currency=$_POST['p_currency'];	
$Current_Price=$_POST['Current_Price'];	
$Buy_Price=$_POST['Buy_Price'];		
$First_registration='';
$Production_date=$_POST['Production_date'];
$Mileage=$_POST['Mileage'];
$Fuel_type='';
$Transmission_type='';
$CO2_emission_standard='';
$CO2_emission='';
$Power='';
$Engine_size='';
$Body_type=$_POST['Body_type'];
$Doors='';
$Number_of_places='';
$VIN=$_POST['VIN'];
$VIN_short='';
$Number_of_keys='';
$Paint='';
$Interior_colour='';
$Car_registration_document='';
$Certificate_of_conformity='';
$Maintenance_records='';
$Pickup_location=$_POST['Pickup_location'];
$Origin_country='';
$Selling_office='';
$pdate=$_POST['pdate'];
$status=$_POST['status'];

$reffNo = '';

$fpname=$name.' - '.$Fuel_type.' - '.$Transmission_type.' - '.$Power.' - '.$Mileage;
$stmt=$conn->prepare("insert into tbl_products (reffNo,name,fpname,make,model,p_currency,Current_Price,Buy_Price,First_registration,Production_date,Mileage,Fuel_type,Transmission_type,CO2_emission_standard,CO2_emission,Power,Engine_size,Body_type,Doors,Number_of_places,VIN,VIN_short,Number_of_keys,Paint,Interior_colour,Car_registration_document,Certificate_of_conformity,Maintenance_records,Pickup_location,Origin_country,Selling_office,pdate,status,category)values('$reffNo','$name','$fpname','$make','$model','$p_currency','$Current_Price','$Buy_Price','$First_registration','$Production_date','$Mileage','$Fuel_type','$Transmission_type','$CO2_emission_standard','$CO2_emission','$Power','$Engine_size','$Body_type','$Doors','$Number_of_places','$VIN','$VIN_short','$Number_of_keys','$Paint','$Interior_colour','$Car_registration_document','$Certificate_of_conformity','$Maintenance_records','$Pickup_location','$Origin_country','$Selling_office','$pdate','$status',2)");
$result1=$stmt->execute();

$lastId=$conn->lastInsertId();

$sqlProperty=$conn->prepare("select * from tbl_property where p_category=2 and status = 1");
$sqlProperty->execute();
while($row_property=$sqlProperty->fetch(PDO::FETCH_OBJ))
{
	$property =  $_POST['property_'.$row_property->id];
	$stmtPP=$conn->prepare("insert into tbl_productproperties (property_id,pid,property)values('$row_property->id', '$lastId','$property')");
	$resultPP=$stmtPP->execute();
}

$reffNo='5293040'+$lastId;
$sqlQuery=$conn->prepare("UPDATE tbl_products SET reffNo='$reffNo' WHERE id='$lastId'");
$result=$sqlQuery->execute();


if($result)
{
echo "<script>window.location.href='truck_list.php'</script>";
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

<title><?=SITE_NAME;?> | Add Truck</title>

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
function getsubcategory(val) {
$.ajax({
type: "POST",
url: "get_super_subcategory.php",
data:'supercat_mcat_id='+val,
success: function(data){
$("#subcategory_list").html(data);
}
});
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
Add Truck
</h1>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="breadcrumb-item active"> Add Truck</li>
</ol>
</section>
<!-- Main content -->
<section class="content">

<!-- Basic Forms -->
<div class="box box-default">
<div class="box-header with-border">
<h3 class="box-title">&nbsp;</h3>

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

<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Name
</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="name"  required="">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Make</label>
<div class="col-sm-10">
<select class="form-control" name="make" onChange="getsubcategory(this.value);">
<option value="0">--Select Make--</option>
<?php $sql=$conn->prepare("select * from tbl_maincategory where mcat_status='1' and p_category = 2 order by mcat_name");
$sql->execute();
while($row=$sql->fetch(PDO::FETCH_OBJ))
{
?>
<option value="<?php echo $row->mcat_id; ?>"><?php echo $row->mcat_name; ?></option>
<?php } ?>
</select>
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Model</label>
<div class="col-sm-10">
<select class="form-control" name="model" id="subcategory_list">
<option value="None">--Select Model--</option>

</select>
</div>
</div>

<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Currency
</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="p_currency"  required="">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Current Price
</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Current_Price"  required="">
</div>
</div>

<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Buy Price
</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Buy_Price"  required="">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Year</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Production_date"  required="">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Mileage </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Mileage" required="">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Body type </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Body_type" required="">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">VIN </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="VIN" required="">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Pickup location </label>
<div class="col-sm-10">
<select class=" form-control" name="Pickup_location" required="">
<option value="">--Select--</option>
<?php $sqlCntry=$conn->prepare("select * from tbl_countries where country_status='1'");
$sqlCntry->execute();
while($rowCntry=$sqlCntry->fetch(PDO::FETCH_OBJ))
{
?>
<option value="<?php echo $rowCntry->country_id; ?>"><?php echo $rowCntry->country_name; ?></option>
<?php } ?>
</select>


</div>
</div>


<?php $sqlProperty=$conn->prepare("SELECT * FROM tbl_property where p_category = 2 and status = 1");
$sqlProperty->execute();
while($rowProperty=$sqlProperty->fetch(PDO::FETCH_OBJ))
{
?>
<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label"><?php echo $rowProperty->name; ?> </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="property_<?php echo $rowProperty->id; ?>" required="" value="">
</div>
</div>
<?php } ?>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Date </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pdate" required="" value="">
</div>
</div>



<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Product Status</label>
<div class="col-sm-10">
<select class="form-control" name="status">
<option value="0">--Select Status--</option>
<option value="1">Active</option>
<option value="0">Inactive</option>
<option value="2">End</option>
</select>
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
<div class="col-sm-10">
<input type="submit" class="btn btn-success" name="save" value="Save">
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
<script>
CKEDITOR.replace( 'p_desc' );
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

<script>
$(document).ready(function(){
$('#makeId').on('change', function() {	
alert('hiii');
});
});	
</script>

</body>
</html>

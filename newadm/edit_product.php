<?php include("common/gaurav.library.php");
echo protect_admin();
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
$sql=$conn->prepare("select * from tbl_products where id='$id'");
$sql->execute();
$results=$sql->fetch(PDO::FETCH_OBJ);
?>


<?php 
if(isset($_POST['update']))
{
$name=$_POST['name'];
$make=$_POST['make'];
$model=$_POST['model'];
$p_currency=$_POST['p_currency'];	
$Current_Price=$_POST['Current_Price'];	
$Buy_Price=$_POST['Buy_Price'];		
$First_registration=$_POST['First_registration'];
$Production_date=$_POST['Production_date'];
$Mileage=$_POST['Mileage'];
$Fuel_type=$_POST['Fuel_type'];
$Transmission_type=$_POST['Transmission_type'];
$CO2_emission_standard=$_POST['CO2_emission_standard'];
$CO2_emission=$_POST['CO2_emission'];
$Power=$_POST['Power'];
$Engine_size=$_POST['Engine_size'];
$Body_type=$_POST['Body_type'];
$Doors=$_POST['Doors'];
$Number_of_places=$_POST['Number_of_places'];
$VIN=$_POST['VIN'];
$VIN_short=$_POST['VIN_short'];
$Number_of_keys=$_POST['Number_of_keys'];
$Paint=$_POST['Paint'];
$Interior_colour=$_POST['Interior_colour'];
$Car_registration_document=$_POST['Car_registration_document'];
$Certificate_of_conformity=$_POST['Certificate_of_conformity'];
$Maintenance_records=$_POST['Maintenance_records'];
$Pickup_location=$_POST['Pickup_location'];
$Origin_country=$_POST['Origin_country'];
$Selling_office=$_POST['Selling_office'];
$pdate=$_POST['pdate'];
$status=$_POST['status'];

$stmt=$conn->prepare("UPDATE tbl_products SET name='$name',make='$make',model='$model',p_currency='$p_currency',Current_Price='$Current_Price',Buy_Price='$Buy_Price',First_registration='$First_registration',Production_date='$Production_date',Mileage='$Mileage',Fuel_type='$Fuel_type',Transmission_type='$Transmission_type',CO2_emission_standard='$CO2_emission_standard',CO2_emission='$CO2_emission',Power='$Power',Engine_size='$Engine_size',Body_type='$Body_type',Doors='$Doors',Number_of_places='$Number_of_places',VIN='$VIN',VIN_short='$VIN_short',Number_of_keys='$Number_of_keys',Paint='$Paint',Interior_colour='$Interior_colour',Origin_country='$Car_registration_document',Certificate_of_conformity='$Certificate_of_conformity',Maintenance_records='$Maintenance_records',Pickup_location='$Pickup_location',Origin_country='$Origin_country',Selling_office='$Selling_office',pdate='$pdate',status='$status' WHERE id='$id'");


$result=$stmt->execute();
if($result)
{
echo "<script>window.location.href='product_list.php'</script>";
}

}


?>


<?php
if(isset($_POST['imgBtn']))
{
$image=$_POST['image'];	
$pid=$_POST['pid'];	


$stmtImg=$conn->prepare("insert into productimages (pid,image)values('$pid','$image')");
$resultImg=$stmtImg->execute();
if($resultImg)
{
echo "<script>window.location.href='product_list.php'</script>";
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

<title><?=SITE_NAME;?> | Edit Car</title>

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
Edit Car
</h1>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="breadcrumb-item active"> Edit Car</li>
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

<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Name
</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="name"  required="" value="<?php echo $results->name; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Make</label>
<div class="col-sm-10">
<select class="form-control" name="make" onChange="getsubcategory(this.value);">
<option value="0">--Select Make--</option>
<?php $sql=$conn->prepare("select * from tbl_maincategory where mcat_status='1' and p_category = 1 order by mcat_name");
$sql->execute();
while($row=$sql->fetch(PDO::FETCH_OBJ))
{
?>
<option value="<?php echo $row->mcat_id; ?>" value="<?php echo $row->mcat_id; ?>" <?php if($row->mcat_id==$results->make) {echo "selected='selected'";} ?>><?php echo $row->mcat_name; ?></option>
<?php } ?>
</select>
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Model</label>
<div class="col-sm-10">

<select class="form-control" name="model" id="subcategory_list">
<option value="0">--Select Model--</option>
<?php 
	if($results->make != 0)
	{
		$sql_subcat=$conn->prepare("select * from tbl_subcategory where scat_status='1' AND scat_mcat_id='" . $results->make . "' order by scat_name");
		$result_subcat=$sql_subcat->execute();
		while($row_subcat=$sql_subcat->fetch(PDO::FETCH_OBJ))
		{


?>
<option value="<?php echo $row_subcat->scat_id; ?>" <?php echo ($results->model == $row_subcat->scat_id ? 'selected' : ''); ?>><?php echo $row_subcat->scat_name; ?></option>
<?php 
		} 
	}
?>
</select>
</div>
</div>

<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Currency
</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="p_currency"  required="" value="<?php echo $results->p_currency; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Current Price
</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Current_Price"  required="" value="<?php echo $results->Current_Price; ?>">
</div>
</div>

<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Buy Price
</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Buy_Price"  required="" value="<?php echo $results->Buy_Price; ?>">
</div>
</div>

<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">First registration
</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="First_registration"  required="" value="<?php echo $results->First_registration; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Production date</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Production_date"  required="" value="<?php echo $results->Production_date; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Mileage </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Mileage" required="" value="<?php echo $results->Mileage; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Fuel type </label>
<div class="col-sm-10">
<select class=" form-control" name="Fuel_type" required="">
<option value="">--Select--</option>
<option value="Petrol" <?php if($results->Fuel_type=='Petrol') {echo "selected='selected'";} ?>>Petrol</option>
<option value="CNG" <?php if($results->Fuel_type=='CNG') {echo "selected='selected'";} ?>>CNG</option>
<option value="Diesel" <?php if($results->Fuel_type=='Diesel') {echo "selected='selected'";} ?>>Diesel</option>
<option value="Electric" <?php if($results->Fuel_type=='Electric') {echo "selected='selected'";} ?>>Electric</option>
<option value="Hybrid" <?php if($results->Fuel_type=='Hybrid') {echo "selected='selected'";} ?>>Hybrid</option>
<option value="LPG" <?php if($results->Fuel_type=='LPG') {echo "selected='selected'";} ?>>LPG</option>
</select>
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Transmission type </label>
<div class="col-sm-10">
<select class=" form-control" name="Transmission_type">
<option value="">--Select--</option>
<option value="Automatic" <?php if($results->Transmission_type=='Automatic') {echo "selected='selected'";} ?>>Automatic </option>
<option value="Manual" <?php if($results->Transmission_type=='Manual') {echo "selected='selected'";} ?>>Manual  </option>
</select>

</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">CO² emission standard </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="CO2_emission_standard" required="" value="<?php echo $results->CO2_emission_standard; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">CO² emission (minimum value) </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="CO2_emission" required="" value="<?php echo $results->CO2_emission; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Power </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Power" required="" value="<?php echo $results->Power; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Engine size </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Engine_size" required="" value="<?php echo $results->Engine_size; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Body type </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Body_type" required="" value="<?php echo $results->Body_type; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Doors </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Doors" required="" value="<?php echo $results->Doors; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Number of places </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Number_of_places" required="" value="<?php echo $results->Number_of_places; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">VIN </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="VIN" required="" value="<?php echo $results->VIN; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">VIN (short) </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="VIN_short" required="" value="<?php echo $results->VIN_short; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Number of keys </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Number_of_keys" required="" value="<?php echo $results->Number_of_keys; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Paint </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Paint" required="" value="<?php echo $results->Paint; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Interior colour </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Interior_colour" required="" value="<?php echo $results->Interior_colour; ?>">
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Car registration document </label>
<div class="col-sm-10">
<select class=" form-control" name="Car_registration_document" required="">
<option value="">--Select--</option>
<option value="Available" <?php if($results->Car_registration_document=='Available') {echo "selected='selected'";} ?>>Available </option>
<option value="Complete" <?php if($results->Car_registration_document=='Complete') {echo "selected='selected'";} ?>>Complete  </option>
</select>
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Certificate of conformity </label>
<div class="col-sm-10">
<select class=" form-control" name="Certificate_of_conformity" required="">
<option value="">--Select--</option>
<option value="Available" <?php if($results->Certificate_of_conformity=='Available') {echo "selected='selected'";} ?>>Available </option>
<option value="Complete" <?php if($results->Certificate_of_conformity=='Complete') {echo "selected='selected'";} ?>>Complete  </option>
</select>
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Maintenance records </label>
<div class="col-sm-10">
<select class=" form-control" name="Maintenance_records" required="">
<option value="">--Select--</option>
<option value="Available" <?php if($results->Maintenance_records=='Available') {echo "selected='selected'";} ?>>Available </option>
<option value="Complete" <?php if($results->Maintenance_records=='Complete') {echo "selected='selected'";} ?>>Complete  </option>
</select>
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
<option value="<?php echo $rowCntry->country_id; ?>" <?php if($results->Pickup_location==$rowCntry->country_id) {echo "selected='selected'";} ?>><?php echo $rowCntry->country_name; ?></option>
<?php } ?>
</select>


</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Origin country </label>
<div class="col-sm-10">

<select class=" form-control" name="Origin_country" required="">
<option value="">--Select--</option>
<?php $sqlCntry=$conn->prepare("select * from tbl_countries where country_status='1'");
$sqlCntry->execute();
while($rowCntry=$sqlCntry->fetch(PDO::FETCH_OBJ))
{
?>
<option value="<?php echo $rowCntry->country_id; ?>" <?php if($results->Origin_country==$rowCntry->country_id) {echo "selected='selected'";} ?>><?php echo $rowCntry->country_name; ?></option>
<?php } ?>
</select>
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Selling office </label>
<div class="col-sm-10">

<select class=" form-control" name="Selling_office" required="">
<option value="">--Select--</option>
<?php $sqlCntry=$conn->prepare("select * from tbl_countries where country_status='1'");
$sqlCntry->execute();
while($rowCntry=$sqlCntry->fetch(PDO::FETCH_OBJ))
{
?>
<option value="<?php echo $rowCntry->country_id; ?>" <?php if($results->Selling_office==$rowCntry->country_id) {echo "selected='selected'";} ?>><?php echo $rowCntry->country_name; ?></option>
<?php } ?>
</select>

</div>
</div>

<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Date </label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pdate" required="" value="<?php echo $results->pdate; ?>">
</div>
</div>



<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">Product Status</label>
<div class="col-sm-10">
<select class="form-control" name="status">
<option value="0">--Select Status--</option>
<option value="1" <?php if($results->status==1) {echo "selected='selected'";} ?>>Active</option>
<option value="0" <?php if($results->status==0) {echo "selected='selected'";} ?>>Inactive</option>
<option value="2" <?php if($results->status==2) {echo "selected='selected'";} ?>>End</option>
</select>
</div>
</div>


<div class="form-group row">
<label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
<div class="col-sm-10">
<input type="submit" class="btn btn-success" name="update" value="Update">
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
<input type="text" class="form-control" name="image">
</div>

<input type="hidden" name="pid" value="<?php echo $results->id;  ?>">
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

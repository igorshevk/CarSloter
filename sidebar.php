
<div class="col-md-3 col-sx-12 hidden-xs hidden-sm" id="filter-body">
<!-- Sidebar Widgets -->

<form method="get" action="listing.php" id="orderForm"> 
<input type="hidden" name="orderType" value="0" id="orderType">
<div class="header-page hidden-xs hidden-sm">
<h1>Find Cars</h1>
</div>

<div class="header hidden-lg hidden-md" style="background-color: #f7f7f7;border-bottom: 1px solid #E2E2E2;padding: 15px;position: fixed;    top: 0;left: 0;right: 0;opacity: 1;z-index: 999;">
	<div class="title">
		<h2>Filters</h2>
		<a href="" style="position: fixed;top: 20px;right: 15px;font-size: 25px;color: black;"><i class="fa fa-close"></i></a>
	</div>
</div>

<div class="sidebar">
<div class="filter-title hidden-xs hidden-sm">Refine by</div>
<!-- Panel group -->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<!-- Brands Panel -->
<div class="panel panel-default">
<!-- Heading -->
<div class="panel-heading" role="tab" id="headingTwo">
<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> <i class="more-less glyphicon glyphicon-plus"></i> Country </a> </h4>
</div>
<!-- Content -->
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">
<!-- Brands List -->
<div class="skin-minimal">
<ul class="list">
<li>

<select class="form-control" name="country">
<option value="">--Select Country--</option>
<?php $sql=$conn->prepare("select * from tbl_countries");
$sql->execute();
while($row=$sql->fetch(PDO::FETCH_OBJ))
{
	if($country == $row->country_id)
	{
?>
<script type="text/javascript">
	document.getElementById("collapseTwo").classList.add("in");
</script>
<option value="<?php echo $row->country_id; ?>" selected><?php echo $row->country_name; ?></option>
<?php 
	}
	else
	{
?>
<option value="<?php echo $row->country_id; ?>"><?php echo $row->country_name; ?></option>
<?php 
	} 
}
?>
</select>

 </li>


</ul>
</div>
<!-- Brands List End -->
</div>
</div>
</div>
<!-- Brands Panel End -->
<!-- Condition Panel -->
<div class="panel panel-default">
<!-- Heading -->
<div class="panel-heading" role="tab" id="heading9">
<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9"> <i class="more-less glyphicon glyphicon-plus"></i> Make & model </a> </h4>
</div>
<!-- Content -->
<div id="collapse9" class="panel-collapse collapse <?php echo (($make != '' || $model != '') ? 'in' : ''); ?>" role="tabpanel" aria-labelledby="heading9">
<div class="panel-body">
<div class="skin-minimal">
<ul class="list">
<li>

<select class="form-control" name="make" onChange="getsubcategory(this.value);" id="make">
<option value="">--Select Make--</option>
<?php $sql=$conn->prepare("select * from tbl_maincategory where mcat_status='1' and p_category = 1 order by mcat_name");
$sql->execute();
while($row=$sql->fetch(PDO::FETCH_OBJ))
{
?>
<option value="<?php echo $row->mcat_id; ?>" <?php echo ($make == $row->mcat_id ? 'selected' : ''); ?>><?php echo $row->mcat_name; ?></option>
<?php } ?>
</select>
</li>
<li>
<select class="form-control" name="model" id="subcategory_list">
<option value="">--Select Model--</option>
<?php 
	if($make != '')
	{
		$sql_subcat=$conn->prepare("select * from tbl_subcategory where scat_status='1' AND scat_mcat_id='" . $make . "' order by scat_name");
		$result_subcat=$sql_subcat->execute();
		while($row_subcat=$sql_subcat->fetch(PDO::FETCH_OBJ))
		{


?>
<option value="<?php echo $row_subcat->scat_id; ?>" <?php echo ($model == $row_subcat->scat_id ? 'selected' : ''); ?>><?php echo $row_subcat->scat_name; ?></option>
<?php 
		} 
	}
?>
</select>
</li>
</ul>
</div>
</div>
</div>
</div>
<!-- Condition Panel End -->
<div class="panel panel-default">
<!-- Heading -->
<div class="panel-heading" role="tab" id="headingTwoa">
<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwoa" aria-expanded="false" aria-controls="collapseTwo"> <i class="more-less glyphicon glyphicon-plus"></i> Transmission </a> </h4>
</div>
<!-- Content -->
<div id="collapseTwoa" class="panel-collapse collapse <?php echo ($Transmission_type != '' ? 'in' : ''); ?>" role="tabpanel" aria-labelledby="headingTwoa">
<div class="panel-body">
<!-- Brands List -->
<div class="skin-minimal">
<ul class="list">
<?php $t_Automaticproducts=$conn->prepare("select count(id) as total_Automatic  from tbl_products where Transmission_type='Automatic'");
$t_Automaticproducts->execute();
$rowAutomaticProducts=$t_Automaticproducts->fetch(PDO::FETCH_OBJ);
$total_Automaticproduct=$rowAutomaticProducts->total_Automatic;
?>
<li>
<?php
	if(strpos($Transmission_type, 'Automatic') !== false)
	{
?>
<input  type="checkbox" id="minimal-checkbox-1" name="Automatic" checked="">
<?php
	}
	else
	{
?>
<input  type="checkbox" id="minimal-checkbox-1" name="Automatic">
<?php
	}
?>
<label for="minimal-checkbox-1">Automatic</label>
<span class="count"><?php echo $total_Automaticproduct; ?></span> </li>

<?php $t_Manualproducts=$conn->prepare("select count(id) as total_Manual  from tbl_products where Transmission_type='Manual'");
$t_Manualproducts->execute();
$rowManualProducts=$t_Manualproducts->fetch(PDO::FETCH_OBJ);
$total_Manualproduct=$rowManualProducts->total_Manual;
?>

<li>
<?php
	if(strpos($Transmission_type, 'Manual') !== false)
	{
?>
<input  type="checkbox" id="minimal-checkbox-2" name="Manual" checked="">
<?php
	}
	else
	{
?>
<input  type="checkbox" id="minimal-checkbox-2" name="Manual">
<?php
	}
?>
<label for="minimal-checkbox-2">Manual</label>
<span class="count"><?php echo $total_Manualproduct; ?></span> </li>
</ul>
</div>
<!-- Brands List End -->
</div>
</div>
</div>
<div class="panel panel-default">
<!-- Heading -->
<div class="panel-heading" role="tab" id="headingfourmil">
<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefourmil" aria-expanded="false" aria-controls="collapsefour"> <i class="more-less glyphicon glyphicon-plus"></i> Mileage </a> </h4>
</div>
<!-- Content -->
<div id="collapsefourmil" class="panel-collapse collapse <?php echo (($MileageFrom != '' || $MileageTo != '') ? 'in' : '');?>" role="tabpanel" aria-labelledby="headingfourmil">
<div class="panel-body">
<div class="form-group">
<select class="form-control" name="MileageFrom">
<option value="">From</option>
<option value="10000" <?php echo ($MileageFrom == '10000' ? 'selected' : '');?>>10.000 km</option>
<option value="20000" <?php echo ($MileageFrom == '20000' ? 'selected' : '');?>>20.000 km</option>
<option value="30000" <?php echo ($MileageFrom == '30000' ? 'selected' : '');?>>30.000 km</option>
<option value="40000" <?php echo ($MileageFrom == '40000' ? 'selected' : '');?>>40.000 km</option>
<option value="50000" <?php echo ($MileageFrom == '50000' ? 'selected' : '');?>>50.000 km</option>
<option value="60000" <?php echo ($MileageFrom == '60000' ? 'selected' : '');?>>60.000 km</option>
<option value="70000" <?php echo ($MileageFrom == '70000' ? 'selected' : '');?>>70.000 km</option>
<option value="80000" <?php echo ($MileageFrom == '80000' ? 'selected' : '');?>>80.000 km</option>
<option value="90000" <?php echo ($MileageFrom == '90000' ? 'selected' : '');?>>90.000 km</option>
</select>
</div>
<div class="form-group">
<select class="form-control" name="MileageTo">
<option value="">To</option>
<option value="10000" <?php echo ($MileageTo == '10000' ? 'selected' : '');?>>10.000 km</option>
<option value="20000" <?php echo ($MileageTo == '20000' ? 'selected' : '');?>>20.000 km</option>
<option value="30000" <?php echo ($MileageTo == '30000' ? 'selected' : '');?>>30.000 km</option>
<option value="40000" <?php echo ($MileageTo == '40000' ? 'selected' : '');?>>40.000 km</option>
<option value="50000" <?php echo ($MileageTo == '50000' ? 'selected' : '');?>>50.000 km</option>
<option value="60000" <?php echo ($MileageTo == '60000' ? 'selected' : '');?>>60.000 km</option>
<option value="70000" <?php echo ($MileageTo == '70000' ? 'selected' : '');?>>70.000 km</option>
<option value="80000" <?php echo ($MileageTo == '80000' ? 'selected' : '');?>>80.000 km</option>
<option value="90000" <?php echo ($MileageTo == '90000' ? 'selected' : '');?>>90.000 km</option>
</select>
</div>
</div>
</div>
</div>
<!-- Condition Panel -->

<!-- <div class="panel panel-default">

<div class="panel-heading" role="tab" id="headingThree">
<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i> Condition </a> </h4>
</div>

<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
<div class="panel-body">
<div class="skin-minimal">
<ul class="list">
<li>
<input tabindex="7" type="radio" id="minimal-radio-1" name="minimal-radio">
<label for="minimal-radio-1">New</label>
</li>
<li>
<input tabindex="8" type="radio" id="minimal-radio-2" name="minimal-radio" checked>
<label for="minimal-radio-2">Used</label>
</li>
</ul>
</div>
</div>
</div>
</div> -->


<!-- Condition Panel End -->
<!-- Body Type Panel -->

<!-- Condition Panel End -->
<!-- Pricing Panel -->
<div class="panel panel-default">
<!-- Heading -->
<div class="panel-heading" role="tab" id="headingyear">
<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour"> <i class="more-less glyphicon glyphicon-plus"></i> Year </a> </h4>
</div>
<!-- Content -->
<div id="collapsefour" class="panel-collapse collapse <?php echo (($YearFrom != '' || $YearTo != '') ? 'in' : '');?>" role="tabpanel" aria-labelledby="headingyear">
<div class="panel-body">
<div class="form-group">
<select class="form-control" name="YearFrom">
<option value="">From</option>
<?php
	$currentYear = date('Y');
	for($i=$currentYear; $i>=1990; $i--)
	{
?>
<option value="<?php echo $i; ?>" <?php echo ($YearFrom == $i ? 'selected' : '');?>><?php echo $i; ?></option>
<?php
	}
?>
</select>
</div>
<div class="form-group">
<select class="form-control" name="YearTo">
<option value="">To</option>
<?php
	for($i=$currentYear; $i>=1990; $i--)
	{
?>
<option value="<?php echo $i; ?>" <?php echo ($YearTo == $i ? 'selected' : '');?>><?php echo $i; ?></option>
<?php
	}
?>
</select>
</div>
</div>
</div>
</div>
<!-- Pricing Panel End -->

<!-- Condition Panel End -->
<!-- Year Panel -->
<div class="panel panel-default">
<!-- Heading -->
<div class="panel-heading" role="tab" id="headingprice">
<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseprice" aria-expanded="false" aria-controls="collapseprice"> <i class="more-less glyphicon glyphicon-plus"></i> Price </a> </h4>
</div>
<!-- Content -->
<div id="collapseprice" class="panel-collapse collapse <?php echo (($PriceFrom != '' || $PriceTo != '') ? 'in' : '');?>" role="tabpanel" aria-labelledby="headingprice">
<div class="panel-body">
<div class="form-group">
<select class="form-control" name="PriceFrom">
<option value="">From</option>
<option value="1000" <?php echo ($PriceFrom == '1000' ? 'selected' : '');?>>€ 1.000</option>
<option value="2000" <?php echo ($PriceFrom == '2000' ? 'selected' : '');?>>€ 2.000</option>
<option value="3000" <?php echo ($PriceFrom == '3000' ? 'selected' : '');?>>€ 3.000</option>
<option value="4000" <?php echo ($PriceFrom == '4000' ? 'selected' : '');?>>€ 4.000</option>
<option value="5000" <?php echo ($PriceFrom == '5000' ? 'selected' : '');?>>€ 5.000</option>
<option value="6000" <?php echo ($PriceFrom == '6000' ? 'selected' : '');?>>€ 6.000</option>
<option value="7000" <?php echo ($PriceFrom == '7000' ? 'selected' : '');?>>€ 7.000</option>
<option value="8000" <?php echo ($PriceFrom == '8000' ? 'selected' : '');?>>€ 8.000</option>
<option value="9000" <?php echo ($PriceFrom == '9000' ? 'selected' : '');?>>€ 9.000</option>
<option value="10000" <?php echo ($PriceFrom == '10000' ? 'selected' : '');?>>€ 10.000</option>
<option value="11000" <?php echo ($PriceFrom == '11000' ? 'selected' : '');?>>€ 11.000</option>
<option value="12000" <?php echo ($PriceFrom == '12000' ? 'selected' : '');?>>€ 12.000</option>
<option value="13000" <?php echo ($PriceFrom == '13000' ? 'selected' : '');?>>€ 13.000</option>
<option value="14000" <?php echo ($PriceFrom == '14000' ? 'selected' : '');?>>€ 14.000</option>
<option value="15000" <?php echo ($PriceFrom == '15000' ? 'selected' : '');?>>€ 15.000</option>
<option value="16000" <?php echo ($PriceFrom == '16000' ? 'selected' : '');?>>€ 16.000</option>
<option value="17000" <?php echo ($PriceFrom == '17000' ? 'selected' : '');?>>€ 17.000</option>
<option value="18000" <?php echo ($PriceFrom == '18000' ? 'selected' : '');?>>€ 18.000</option>
<option value="19000" <?php echo ($PriceFrom == '19000' ? 'selected' : '');?>>€ 19.000</option>
<option value="20000" <?php echo ($PriceFrom == '20000' ? 'selected' : '');?>>€ 20.000</option>
<option value="25000" <?php echo ($PriceFrom == '25000' ? 'selected' : '');?>>€ 25.000</option>
<option value="30000" <?php echo ($PriceFrom == '30000' ? 'selected' : '');?>>€ 30.000</option>
<option value="35000" <?php echo ($PriceFrom == '35000' ? 'selected' : '');?>>€ 35.000</option>
<option value="40000" <?php echo ($PriceFrom == '40000' ? 'selected' : '');?>>€ 40.000</option>
<option value="45000" <?php echo ($PriceFrom == '45000' ? 'selected' : '');?>>€ 45.000</option>
<option value="50000" <?php echo ($PriceFrom == '50000' ? 'selected' : '');?>>€ 50.000</option>
</select>
</div>
<div class="form-group">
<select class="form-control" name="PriceTo">
<option value="">To</option>
<option value="1000" <?php echo ($PriceTo == '1000' ? 'selected' : '');?>>€ 1.000</option>
<option value="2000" <?php echo ($PriceTo == '2000' ? 'selected' : '');?>>€ 2.000</option>
<option value="3000" <?php echo ($PriceTo == '3000' ? 'selected' : '');?>>€ 3.000</option>
<option value="4000" <?php echo ($PriceTo == '4000' ? 'selected' : '');?>>€ 4.000</option>
<option value="5000" <?php echo ($PriceTo == '5000' ? 'selected' : '');?>>€ 5.000</option>
<option value="6000" <?php echo ($PriceTo == '6000' ? 'selected' : '');?>>€ 6.000</option>
<option value="7000" <?php echo ($PriceTo == '7000' ? 'selected' : '');?>>€ 7.000</option>
<option value="8000" <?php echo ($PriceTo == '8000' ? 'selected' : '');?>>€ 8.000</option>
<option value="9000" <?php echo ($PriceTo == '9000' ? 'selected' : '');?>>€ 9.000</option>
<option value="10000" <?php echo ($PriceTo == '10000' ? 'selected' : '');?>>€ 10.000</option>
<option value="11000" <?php echo ($PriceTo == '11000' ? 'selected' : '');?>>€ 11.000</option>
<option value="12000" <?php echo ($PriceTo == '12000' ? 'selected' : '');?>>€ 12.000</option>
<option value="13000" <?php echo ($PriceTo == '13000' ? 'selected' : '');?>>€ 13.000</option>
<option value="14000" <?php echo ($PriceTo == '14000' ? 'selected' : '');?>>€ 14.000</option>
<option value="15000" <?php echo ($PriceTo == '15000' ? 'selected' : '');?>>€ 15.000</option>
<option value="16000" <?php echo ($PriceTo == '16000' ? 'selected' : '');?>>€ 16.000</option>
<option value="17000" <?php echo ($PriceTo == '17000' ? 'selected' : '');?>>€ 17.000</option>
<option value="18000" <?php echo ($PriceTo == '18000' ? 'selected' : '');?>>€ 18.000</option>
<option value="19000" <?php echo ($PriceTo == '19000' ? 'selected' : '');?>>€ 19.000</option>
<option value="20000" <?php echo ($PriceTo == '20000' ? 'selected' : '');?>>€ 20.000</option>
<option value="25000" <?php echo ($PriceTo == '25000' ? 'selected' : '');?>>€ 25.000</option>
<option value="30000" <?php echo ($PriceTo == '30000' ? 'selected' : '');?>>€ 30.000</option>
<option value="35000" <?php echo ($PriceTo == '35000' ? 'selected' : '');?>>€ 35.000</option>
<option value="40000" <?php echo ($PriceTo == '40000' ? 'selected' : '');?>>€ 40.000</option>
<option value="45000" <?php echo ($PriceTo == '45000' ? 'selected' : '');?>>€ 45.000</option>
<option value="50000" <?php echo ($PriceTo == '50000' ? 'selected' : '');?>>€ 50.000</option>
</select>
</div>
</div>
</div>
</div>
<!-- Year Panel End -->

<div class="panel panel-default">
<!-- Heading -->
<div class="panel-heading" role="tab" id="heading8">
<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8"> <i class="more-less glyphicon glyphicon-plus"></i> Fuel type </a> </h4>
</div>
<!-- Content -->
<div id="collapse8" class="panel-collapse collapse <?php echo ($Fuel_type != '' ? 'in' : ''); ?>" role="tabpanel" aria-labelledby="heading8">
<div class="panel-body">
<!-- Year List -->
<div class="skin-minimal">
<ul class="list">
<li>
<?php
	if(strpos($Fuel_type, 'Petrol') !== false)
	{
?>
<input  type="checkbox" id="Petrol" name="Petrol" checked="">
<?php
	}
	else
	{
?>
<input  type="checkbox" id="Petrol" name="Petrol">
<?php
	}
?>
<label for="Petrol">Petrol </label>
<?php $t_Petrolproducts=$conn->prepare("select count(id) as total_Petrol  from tbl_products where Fuel_type='Petrol'");
$t_Petrolproducts->execute();
$rowPetrolProducts=$t_Petrolproducts->fetch(PDO::FETCH_OBJ);
$total_Petrolproduct=$rowPetrolProducts->total_Petrol;
?>
<span class="count"><?php echo $total_Petrolproduct; ?></span> </li>
<li>
<?php
	if(strpos($Fuel_type, 'CNG') !== false)
	{
?>
<input  type="checkbox" id="CNG" name="CNG" checked="">
<?php
	}
	else
	{
?>
<input  type="checkbox" id="CNG" name="CNG">
<?php
	}
?>
<label for="CNG">CNG </label>
<?php $t_CNGproducts=$conn->prepare("select count(id) as total_CNG  from tbl_products where Fuel_type='CNG'");
$t_CNGproducts->execute();
$rowCNGProducts=$t_CNGproducts->fetch(PDO::FETCH_OBJ);
$total_CNGproduct=$rowCNGProducts->total_CNG;
?>
<span class="count"><?php echo $total_CNGproduct; ?></span> </li>
<li>
<?php
	if(strpos($Fuel_type, 'Diesel') !== false)
	{
?>
<input  type="checkbox" id="Diesel" name="Diesel" checked="">
<?php
	}
	else
	{
?>
<input  type="checkbox" id="Diesel" name="Diesel">
<?php
	}
?>
<label for="Diesel">Diesel </label>
<?php $t_Dieselproducts=$conn->prepare("select count(id) as total_Diesel  from tbl_products where Fuel_type='Diesel'");
$t_Dieselproducts->execute();
$rowDieselProducts=$t_Dieselproducts->fetch(PDO::FETCH_OBJ);
$total_Dieselproduct=$rowDieselProducts->total_Diesel;
?>
<span class="count"><?php echo $total_Dieselproduct; ?></span> </li>
<li>
<?php
	if(strpos($Fuel_type, 'Electric') !== false)
	{
?>
<input  type="checkbox" id="Electric" name="Electric" checked="">
<?php
	}
	else
	{
?>
<input  type="checkbox" id="Electric" name="Electric">
<?php
	}
?>
<label for="Electric">Electric </label>
<?php $t_Electricproducts=$conn->prepare("select count(id) as total_Electric  from tbl_products where Fuel_type='Electric'");
$t_Electricproducts->execute();
$rowElectricProducts=$t_Electricproducts->fetch(PDO::FETCH_OBJ);
$total_Electricproduct=$rowElectricProducts->total_Electric;
?>
<span class="count"><?php echo $total_Electricproduct; ?></span> </li>
<li>
<?php
	if(strpos($Fuel_type, 'Hybrid') !== false)
	{
?>
<input  type="checkbox" id="Hybrid" name="Hybrid" checked="">
<?php
	}
	else
	{
?>
<input  type="checkbox" id="Hybrid" name="Hybrid">
<?php
	}
?>
<label for="Hybrid">Hybrid </label>
<?php $t_Hybridproducts=$conn->prepare("select count(id) as total_Hybrid  from tbl_products where Fuel_type='Hybrid'");
$t_Hybridproducts->execute();
$rowHybridProducts=$t_Hybridproducts->fetch(PDO::FETCH_OBJ);
$total_Hybridproduct=$rowHybridProducts->total_Hybrid;
?>
<span class="count"><?php echo $total_Hybridproduct; ?></span> </li>
<li>
<?php
	if(strpos($Fuel_type, 'LPG') !== false)
	{
?>
<input  type="checkbox" id="LPG" name="LPG" checked="">
<?php
	}
	else
	{
?>
<input  type="checkbox" id="LPG" name="LPG">
<?php
	}
?>
<label for="LPG">LPG </label>
<?php $t_LPGproducts=$conn->prepare("select count(id) as total_LPG  from tbl_products where Fuel_type='LPG'");
$t_LPGproducts->execute();
$rowLPGProducts=$t_LPGproducts->fetch(PDO::FETCH_OBJ);
$total_LPGproduct=$rowLPGProducts->total_LPG;
?>
<span class="count"><?php echo $total_LPGproduct; ?></span> </li>
</ul>
</div>
<!-- Year List End -->
</div>
</div>
</div>



<!-- Year Panel End -->
</div>

<button class="cotw-btn secondary positive uitest-search-btn" name="srchBtn" id="srchBtn"><span>Search</span></button>
<!-- panel-group end -->
</div>
<!-- Sidebar Widgets End -->
</form>
</div>
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
<?php include('common/config.php');
$errorArr = [];

$Transmission_type='';
$Fuel_type='';
$make='';
$model='';
$whereClause = 'category = 1';

$orderType = 0;
if (isset($_GET['orderType'])) {
    $orderType = $_GET['orderType'];
}

$orderBy = 'name asc';

if($orderType == 1)
    $orderBy = 'name desc';
else if($orderType == 2)
    $orderBy = 'Buy_Price asc';
else if($orderType == 3)
    $orderBy = 'Buy_Price desc';
else if($orderType == 4)
    $orderBy = 'Mileage asc';
else if($orderType == 5)
    $orderBy = 'Mileage desc';
else if($orderType == 6)
    $orderBy = 'STR_TO_DATE(Production_date, "%d/%m/%Y") asc';
else if($orderType == 7)
    $orderBy = 'STR_TO_DATE(Production_date, "%d/%m/%Y") desc';

if (isset($_GET['sbmtBtn'])) {
    $make=$_GET['make'];
    $model=$_GET['model'];

    if($model == 'None')
        $model = '';

    $Fuel_type=$_GET['Fuel_type'];
    $Transmission_type=$_GET['Transmission_type'];

    if($make!='')
    {
        if($model == '')
        {
            if($Fuel_type !='' && $Transmission_type != '')
                $whereClause = $whereClause.' and (make = '.$make.' and Fuel_type = "'.$Fuel_type.'") and Transmission_type = "'.$Transmission_type.'"';
            else if($Fuel_type !='' && $Transmission_type == '')
            {
                $whereClause = $whereClause.' and (make = '.$make.' and Fuel_type = "'.$Fuel_type.'")';
            }
            else if($Fuel_type =='' && $Transmission_type != '')
            {
                $whereClause = $whereClause.' and make = '.$make.' and Transmission_type = "'.$Transmission_type.'"';
            }
            else
            {
                $whereClause = $whereClause.' and make = '.$make;
            }
        }
        else
        {
            if($Fuel_type !='' && $Transmission_type != '')
                $whereClause = $whereClause.' and ((make = '.$make.' and model = '.$model.') and Fuel_type = "'.$Fuel_type.'") and Transmission_type = "'.$Transmission_type.'"';
            else if($Fuel_type !='' && $Transmission_type == '')
            {
                $whereClause = $whereClause.' and (make = '.$make.' and model = '.$model.' and Fuel_type = "'.$Fuel_type.'")';
            }
            else if($Fuel_type =='' && $Transmission_type != '')
            {
                $whereClause = $whereClause.' and (make = '.$make.' and model = '.$model.') and Transmission_type = "'.$Transmission_type.'"';
            }
            else
            {
                $whereClause = $whereClause.' and (make = '.$make.' and model = '.$model.')';
            }
            
        }
    }
    else
    {
        if($model == '')
        {
            if($Fuel_type !='' && $Transmission_type != '')
                $whereClause = $whereClause.' and (Fuel_type = "'.$Fuel_type.'") and Transmission_type = "'.$Transmission_type.'"';
            else if($Fuel_type !='' && $Transmission_type == '')
            {
                $whereClause = $whereClause.' and (Fuel_type = "'.$Fuel_type.'")';
            }
            else if($Fuel_type =='' && $Transmission_type != '')
            {
                $whereClause = $whereClause.' and Transmission_type = "'.$Transmission_type.'"';
            }
            
        }
        else
        {
            if($Fuel_type !='' && $Transmission_type != '')
                $whereClause = $whereClause.' and (model = '.$model.' and Fuel_type = "'.$Fuel_type.'") and Transmission_type = "'.$Transmission_type.'"';
            else if($Fuel_type !='' && $Transmission_type == '')
            {
                $whereClause = $whereClause.' and (model = '.$model.' and Fuel_type = "'.$Fuel_type.'")';
            }
            else if($Fuel_type =='' && $Transmission_type != '')
            {
                $whereClause = $whereClause.' and model = '.$model.' and Transmission_type = "'.$Transmission_type.'"';
            }
            else
            {
                $whereClause = $whereClause.' and model = '.$model;
            }
            
        }
    }

//$whereClause= make='$make' OR model='$model' OR Fuel_type='$Fuel_type' AND Transmission_type='$Transmission_type';
} else if (isset($_GET['sbmtSrch'])) {
$reffNo=$_GET['reffNo'];

if($reffNo != '')
    $whereClause = $whereClause.' and reffNo = "'.$reffNo.'"';

//$whereClause= reffNo='$reffNo';
} else if (isset($_GET['srchBtn'])) {

if(isset($_GET['country']) && $_GET['country']!='')
{
    $country=$_GET['country'];
}   else
{
    $country='';
}

if(isset($_GET['make']) && $_GET['make']!='')
{
    $make=$_GET['make'];
}   else
{
    $make='';
}


if(isset($_GET['model']) && ($_GET['model']!='' || $_GET['model']!='None'))
{
    $model=$_GET['model'];
}   else
{
    $model='';
}


if(isset($_GET['Automatic']) && $_GET['Automatic']!='')
{
    $Transmission_type='Automatic';
}   
if(isset($_GET['Manual']) && $_GET['Manual']!='')
{
    if($Transmission_type != '')
        $Transmission_type.=',Manual';
    else
        $Transmission_type='Manual';
}

$Transmission_typeList = explode(',', $Transmission_type);

if(isset($_GET['Petrol'])  && $_GET['Petrol']!='' )
{
    $Fuel_type='Petrol';
}  
if(isset($_GET['CNG']) && $_GET['CNG']!='')
{
    if($Fuel_type != '')
        $Fuel_type.=',CNG';
    else
        $Fuel_type='CNG';
}
if(isset($_GET['Diesel']) && $_GET['Diesel']!='')
{
    if($Fuel_type != '')
        $Fuel_type.=',Diesel';
    else
        $Fuel_type='Diesel';
}
if(isset($_GET['Electric']) && $_GET['Electric']!='')
{
    if($Fuel_type != '')
        $Fuel_type.=',Electric';
    else
        $Fuel_type='Electric';
}
if(isset($_GET['Hybrid']) && $_GET['Hybrid']!='')
{
    if($Fuel_type != '')
        $Fuel_type.=',Hybrid';
    else
        $Fuel_type='Hybrid';
}
if(isset($_GET['LPG']) && $_GET['LPG']!='')
{
    if($Fuel_type != '')
        $Fuel_type.=',LPG';
    else
        $Fuel_type='LPG';
}

$Fuel_typeList = explode(',', $Fuel_type);
    

if($country!='')
{
  $whereClause = $whereClause.' and (Origin_country = '.$country.')';  
} 
if($Transmission_type!='' && count($Transmission_typeList) < 2)
{
  $whereClause = $whereClause.' and (Transmission_type = "'.$Transmission_type.'")';  
} 
if($Fuel_type != '' && count($Fuel_typeList) < 6)
{
  $whereClause = $whereClause.' and (Fuel_type = "'.$Fuel_typeList[0].'"';  

  for($i=1; $i<count($Fuel_typeList); $i++)
  {
    $whereClause .= ' and Fuel_type = "'.$Fuel_typeList[$i].'"';  
  }
  $whereClause .= ')';
} 

if($make!='')
{
    if($model!='')
        $whereClause = $whereClause.' and (make = '.$make.' and model='.$model.')'; 
    else
        $whereClause = $whereClause.' and make = '.$make; 
}


}

$MileageFrom = '';
$MileageTo = '';
$PriceFrom = '';
$PriceTo = '';
$YearFrom = '';
$YearTo = '';

if(isset($_GET['MileageFrom']))
    $MileageFrom=$_GET['MileageFrom'];
if(isset($_GET['MileageTo']))
    $MileageTo=$_GET['MileageTo'];
if(isset($_GET['PriceFrom']))
    $PriceFrom=$_GET['PriceFrom'];
if(isset($_GET['PriceTo']))
    $PriceTo=$_GET['PriceTo'];
if(isset($_GET['YearFrom']))
    $YearFrom=$_GET['YearFrom'];
if(isset($_GET['YearTo']))
    $YearTo=$_GET['YearTo'];


if(isset($_GET['Mileage_type'])  && $_GET['Mileage_type']!='' )
{
    $Mileage_type = $_GET['Mileage_type'];
    if($Mileage_type == 1)
    {
        $MileageTo=20000;
    }
    else if($Mileage_type == 2)
    {
        $MileageFrom=20000;
        $MileageTo=80000;
    }
    else if($Mileage_type == 3)
    {
        $MileageFrom=80000;
        $MileageTo=140000;
    }
    else if($Mileage_type == 4)
    {
        $MileageFrom=140000;
        $MileageTo=200000;
    }
    else if($Mileage_type == 5)
    {
        $MileageFrom=200000;
    }
}   

if(isset($_GET['Price_type'])  && $_GET['Price_type']!='' )
{
    $Price_type = $_GET['Price_type'];
    if($Price_type == 1)
    {
        $PriceTo=3000;
    }
    else if($Price_type == 2)
    {
        $PriceFrom=3000;
        $PriceTo=6000;
    }
    else if($Price_type == 3)
    {
        $PriceFrom=6000;
        $PriceTo=6000;
    }
    else if($Price_type == 4)
    {
        $PriceFrom=6000;
        $PriceTo=10000;
    }
    else if($Price_type == 5)
    {
        $PriceFrom=10000;
        $PriceTo=20000;
    }
    else if($Price_type == 6)
    {
        $PriceFrom=20000;
    }
}

if($MileageFrom && $MileageTo)
    $whereClause = $whereClause.' and (Mileage BETWEEN  '.$MileageFrom.' AND '.$MileageTo.')';  
else if($MileageFrom && $MileageTo == '')
    $whereClause = $whereClause.' and (Mileage >= '.$MileageFrom.')';  
else if($MileageFrom == '' && $MileageTo)
    $whereClause = $whereClause.' and (Mileage <= '.$MileageTo.')';  

if($PriceFrom && $PriceTo)
    $whereClause = $whereClause.' and (Buy_Price BETWEEN  '.$PriceFrom.' AND '.$PriceTo.')';  
else if($PriceFrom && $PriceTo == '')
    $whereClause = $whereClause.' and (Buy_Price >= '.$PriceFrom.')';  
else if($PriceFrom == '' && $PriceTo)
    $whereClause = $whereClause.' and (Buy_Price <= '.$PriceTo.')';  

if($YearFrom && $YearTo)
    $whereClause = $whereClause.' and (STR_TO_DATE("01/01/'.$YearFrom.'", "%d/%m/%Y") <= STR_TO_DATE(Production_date, "%d/%m/%Y") AND STR_TO_DATE(Production_date, "%d/%m/%Y") <= STR_TO_DATE("31/12/'.$YearTo.'", "%d/%m/%Y"))';  
else if($YearFrom && $YearTo == '')
    $whereClause = $whereClause.' and (STR_TO_DATE("01/01/'.$YearFrom.'", "%d/%m/%Y") <= STR_TO_DATE(Production_date, "%d/%m/%Y"))';  
else if($YearFrom == '' && $YearTo)
    $whereClause = $whereClause.' and (STR_TO_DATE(Production_date, "%d/%m/%Y") <= STR_TO_DATE("31/12/'.$YearTo.'", "%d/%m/%Y"))';  


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
<title>Find used vehicles all over Europe | CARSLOTER</title>
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
<script src="js/modernizr.js"></script>
</head>
<body> 
<!-- =-=-=-=-=-=-=  Header =-=-=-=-=-=-= -->
<?php include('common/header.php'); ?>
<div class="clearfix"></div>
<!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix ">
<!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
<section class="section-padding no-top gray padding-top-30">
<!-- Main Container -->
<div class="container">
<!-- Row -->
<div class="row">
<!-- Left Sidebar -->
<?php include('sidebar.php'); ?>

<div class="col-md-9 col-lg-9 col-sx-12">
<!-- Row -->
<div class="row">

<?php
$stmtCount=$conn->prepare("select * from tbl_products WHERE $whereClause and status > 0");
$stmtCount->execute();
$total_records=$stmtCount->rowCount();

if($total_records == 0)
{
?>
<div class="col-md-12 col-xs-12 col-xs-12">
    <div class="posts-masonry list-item-display for-mobile-view">
        <div class="ads-list-archive">
            <div class="main">
                <div class="headline">
                    <h3 class="title" style="color: #dc4405;">No results found</h3>
                </div>
            </div>

        </div>
    </div>

</div>
<?php
}
else
{
?>
<div class="col-md-12 col-xs-12 col-xs-12">
    <div class="posts-masonry list-item-display for-mobile-view">
        <div class="ads-list-archive">
            <div class="main">
                <div class="headline">
                    <h3 class="title" style="color: #84bd00;font-size: 129%;font-weight: bold;text-transform: lowercase;"><?php echo $total_records; ?> results</h3>
                    <button class="cotw-btn secondary ghost-blue mobile-filter-button" style="width: auto;" onclick="filter();">Filter</button>
                </div>
                <div class="chips-container"><span class="notification">Please use filters to refine the results.</span></div>
            </div>

        </div>
    </div>

</div>
<?php
}
?>
<!-- Sorting Filters -->
<div class="clearfix"></div>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
<div class="clearfix"></div>
<div class="col-md-12 col-xs-12 col-sm-12 no-padding">
<div class="header-listing">
<div class="custom-select-box pull-right">
<select name="order" class=" form-control" onchange="orderChange(event)">
<option value="0" <?php echo ($orderType == 0 ? 'selected' : ''); ?>>A - Z</option>
<option value="1" <?php echo ($orderType == 1 ? 'selected' : ''); ?>>Z - A</option>
<option value="2" <?php echo ($orderType == 2 ? 'selected' : ''); ?>>Price - Ascending</option>
<option value="3" <?php echo ($orderType == 3 ? 'selected' : ''); ?>>Price - Descending</option>
<option value="4" <?php echo ($orderType == 4 ? 'selected' : ''); ?>>Mileage - Ascending</option>
<option value="5" <?php echo ($orderType == 5 ? 'selected' : ''); ?>>Mileage - Descending</option>
<option value="6" <?php echo ($orderType == 6 ? 'selected' : ''); ?>>Year - Ascending</option>
<option value="7" <?php echo ($orderType == 7 ? 'selected' : ''); ?>>Year - Descending</option>
</select>
</div>
</div>
</div>
</div>
<!-- Sorting Filters End-->
<div class="clearfix"></div>
<!-- Ads Archive -->

<?php

if (isset($_SESSION['USER']) && $_SESSION['USER']!='') { 
$uid=$_SESSION['USER'];
$checkUserId=$conn->prepare("select * from tbl_users WHERE u_id='$uid'");
$checkUserId->execute();
$rowUserId=$checkUserId->fetch(PDO::FETCH_OBJ);
$getIdProof=$rowUserId->u_document;
if($getIdProof=='')
{
?>
<div class="accunt-auction-messages">
<div class="row">
<div class="col-md-12">
<p><i class="fa fa-info-circle p-r-2"></i>Your account is still limited to a maximum number of auctions.<a href="idupload.php" style="text-decoration:underline;">Upload your documents</a> to get full access.</p>
</div>
</div>
</div>
<?php } } ?>

<div class="col-md-12 col-xs-12 col-xs-12">
<?php
$stmtCount=$conn->prepare("select * from tbl_products WHERE $whereClause and status > 0");
$stmtCount->execute();
$total_records=$stmtCount->rowCount();

if($total_records == 0)
{
?>
    <div class="posts-masonry list-item-display for-desktop-view">
        <div class="ads-list-archive">
            <div class="main">
                <div class="headline">
                    <h3 class="title" style="color: #dc4405;">No results found</h3>
                </div>
            </div>

        </div>
    </div>

<?php
}
else
{
?>
    <div class="posts-masonry list-item-display for-desktop-view">
        <div class="ads-list-archive">
            <div class="main">
                <div class="headline">
                    <h3 class="title" style="color: #84bd00;font-size: 129%;font-weight: bold;text-transform: lowercase;"><?php echo $total_records; ?> results</h3>
                </div>
                <div class="chips-container"><span class="notification">Please use filters to refine the results.</span></div>
            </div>

        </div>
    </div>

<?php
}
?>
<div class="posts-masonry list-item-display for-desktop-view">
<?php

$limit = 10;  
if (isset($_GET["page"])) {
    $page  = $_GET["page"]; 
} 
else{ 
    $page=1;
};  
$start_from = ($page-1) * $limit;

$stmt=$conn->prepare("select * from tbl_products WHERE $whereClause and status > 0 order by $orderBy LIMIT $start_from, $limit");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_OBJ))
{
$id=$row->id;
$getImage=$conn->prepare("select * from productimages WHERE pid='$id'");
$getImage->execute();
$rowImg=$getImage->fetch(PDO::FETCH_OBJ);
$order_status = 0;
if (isset($_SESSION['USER']) && $_SESSION['USER']!='') {
    $userid=$_SESSION['USER'];
    $userOrder=$conn->prepare("select * from tbl_order where order_cid='$userid' AND order_pid='$id'");
    $userOrder->execute();
    $rowOrder=$userOrder->fetch(PDO::FETCH_OBJ);
    if($userOrder->rowCount() == 1)
        $order_status = $rowOrder->order_status;
}
?>
<div class="ads-list-archive">
<div class="main">
<div class="headline">
<h3 class="title"><a href="details.php?pid=<?php echo $id; ?>"><span class="strong"><?php echo $row->name; ?></span> - <?php echo $row->Fuel_type; ?> - <?php echo $row->Transmission_type; ?> - <?php echo number_format($row->Mileage); ?> KM</a></h3></div>
<h4>Buy now auction</h4>
<div class="cols">
<div class="first-col"><a href="details.php?pid=<?php echo $id; ?>">
<?php $CountImg=$conn->prepare("select count(id) as total_img  from productimages WHERE pid='$id'");
$CountImg->execute();
$rowImgs=$CountImg->fetch(PDO::FETCH_OBJ);
$total_img=$rowImgs->total_img;
?>



<div class="thumbnail"><img src="<?php echo $rowImg->image; ?>"><span class="pictures-count-icon"><i class="fa fa-camera"></i> <?php echo $total_img; ?></span></div>
</a>

<?php
$today = date("Y-m-d H:i:s");  
$pdate=$row->pdate; 

if($today < $pdate)
{
$startdatetime=($pdate);
} else
{
$pdate = date('Y-m-d H:i:s', strtotime($today. "+4 days"));

$stmtPdate=$conn->prepare("UPDATE tbl_products SET pdate='$pdate' WHERE id='$id'");


$result=$stmtPdate->execute();

$startdatetime=($pdate);
}


$date1 = new DateTime($today);
$date2 = new DateTime($startdatetime);

$diff = $date2->getTimestamp() - $date1->getTimestamp();

?>

<div class="remaining-time"> <span>Ends:</span> 
<?php
    if($order_status != 3 && $row->status != 2) {
?>
    <span class="time">
        <span class="auction-countdown-days uitest-countdown-timer">
            <span class="time">
                <span class="auction-countdown-days uitest-countdown-timer remain-time" data-time="<?php echo $diff; ?>"></span>
            </span> 
        </span>
    </span> 
<?php
    }else {
?>
    <span class="time"> Ended </span>
<?php
    }
?>
</div>
</div>
<div class="auction-details">

<div class="columns">
<div class="column">
    <b style="color: black;font-weight: bold;text-transform: uppercase;font-size: 86%;">Current price</b>
</div>
<div class="column">
    <b style="color: black;font-weight: bold;text-transform: uppercase;font-size: 86%;">Buy Now</b>
</div>
<div class="column"></div>
</div>
<div class="columns">
<div class="column"><span class="strong" style="color: black;font-size: 129%;font-weight: bold;line-height: 35px;margin-bottom: 20px;display: block;"><?php echo $row->p_currency; ?> <?php echo number_format($row->Current_Price); ?></span>
</div>
<div class="column">
    <span class="strong" style="color: black;font-size: 129%;font-weight: bold;line-height: 35px;margin-bottom: 20px;display: block;"><?php echo $row->p_currency; ?> <?php echo number_format($row->Buy_Price); ?></span>
</div>
<div class="column"></div>
</div>



<div class="columns">
<div class="column"><span class="data" style="margin-bottom: 12px;display: block;"><?php echo $row->Production_date;?></span></div>
<div class="column"><span class="data" style="margin-bottom: 12px;display: block;"><?php echo $row->CO2_emission_standard;?></span></div>
<div class="column"><span class="data" style="margin-bottom: 12px;display: block;"><?php echo $row->CO2_emission;?></span></div>
</div>
<div class="columns">
<div class="column"><span class="data" style="margin-bottom: 12px;display: block;"><?php echo $row->Body_type;?></span></div>
<div class="column"><span class="data" style="margin-bottom: 12px;display: block;">VAT included
<svg style="vertical-align: middle;" class="vat-non-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<g fill="none" fill-rule="evenodd" opacity="1">
<path fill="#FFF" d="M0 0h24v24H0z"></path>
<circle cx="12" cy="12" r="8.25" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="1.5"></circle>
<text fill="#000" font-family="Arial" font-size="11" font-weight="bold">
<tspan x="7.011" y="16">M</tspan>
</text>
</g>
</svg>
</span></div>


<?php
$Pickup_location=$row->Pickup_location;
$getFlag=$conn->prepare("select * from tbl_countries WHERE country_id='$Pickup_location'");
$getFlag->execute();
$rowFlag=$getFlag->fetch(PDO::FETCH_OBJ);
?>
<div class="column"><span class="data" style="margin-bottom: 12px;display: block;"><?php echo $rowFlag->country_name; ?>&nbsp;&nbsp; <img src="newadm/uploaded_file/flag/<?php echo $rowFlag->country_flag_image; ?>" style="height: 15px;"></span></div>
</div>
<hr>
<span id="premium-offer-44238780">Highest win chance</span>

</div>
</div>
</div>
<a class="show-detail-arrow uitest-show-auction-link" href="details.php?pid=<?php echo $id; ?>"><i class="fa fa-chevron-right"></i></a>
</div>
<?php  } ?>

</div>
<div class="result-list-mobile for-mobile-view">
	<?php

$limit = 10;  
if (isset($_GET["page"])) {
    $page  = $_GET["page"]; 
    } 
    else{ 
    $page=1;
    };  
$start_from = ($page-1) * $limit;

$stmt=$conn->prepare("select * from tbl_products WHERE $whereClause and status > 0 order by $orderBy LIMIT $start_from, $limit");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_OBJ))
{
$id=$row->id;
$getImage=$conn->prepare("select * from productimages WHERE pid='$id'");
$getImage->execute();
$rowImg=$getImage->fetch(PDO::FETCH_OBJ);
$order_status = 0;
if (isset($_SESSION['USER']) && $_SESSION['USER']!='') {
    $userid=$_SESSION['USER'];
    $userOrder=$conn->prepare("select * from tbl_order where order_cid='$userid' AND order_pid='$id'");
    $userOrder->execute();
    $rowOrder=$userOrder->fetch(PDO::FETCH_OBJ);
    if($userOrder->rowCount() == 1)
        $order_status = $rowOrder->order_status;
}
?>
<div class="list-mobile-result">
<div class="carlistmobile-box">
<div class="header">
<div class="headline">
<h3 class="title"><a href="details.php?pid=<?php echo $id; ?>"><span class="strong"><?php echo $row->name; ?></span> - <?php echo $row->Fuel_type; ?> - <?php echo $row->Transmission_type; ?> - <?php echo number_format($row->Mileage); ?> KM</a></h3>
<div class="follow-icon-container"></div>
</div>
<h4>Dynamic auction</h4>
</div>
<?php $CountImg=$conn->prepare("select count(id) as total_img  from productimages WHERE pid='$id'");
$CountImg->execute();
$rowImgs=$CountImg->fetch(PDO::FETCH_OBJ);
$total_img=$rowImgs->total_img;
?>
<div class="thumbnail"><img src="<?php echo $rowImg->image; ?>" style="display: block; width: 100%;"><span class="pictures-count-icon"><i class="fa fa-camera"></i> <?php echo $total_img; ?></span></div>
<div class="cols prices">
<div class="details"><span class="strong"><?php echo $row->p_currency; ?> <?php echo number_format($row->Current_Price); ?> <i>Estimated price</i></span></div>
</div>
<div class="cols">
<div class="details"><span class="data"><?php echo $row->Production_date;?></span><span class="data">VAT included
<svg class="vat-non-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<g fill="none" fill-rule="evenodd" opacity="1">
<path fill="#FFF" d="M0 0h24v24H0z"></path>
<circle cx="12" cy="12" r="8.25" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="1.5"></circle>
<text fill="#000" font-family="Arial" font-size="11" font-weight="bold">
<tspan x="7.011" y="16">M</tspan>
</text>
</g>
</svg>
</span><span class="data"><?php echo $row->Body_type;?></span></div>
<div class="details">
    <span class="data"><?php echo $row->CO2_emission;?> (<?php echo $row->CO2_emission_standard;?>)</span>
    <span class="data"><?php echo $row->Power;?></span>
<?php
$Pickup_location=$row->Pickup_location;
$getFlag=$conn->prepare("select * from tbl_countries WHERE country_id='$Pickup_location'");
$getFlag->execute();
$rowFlag=$getFlag->fetch(PDO::FETCH_OBJ);
?>
    <span class="data"><?php echo $rowFlag->country_name; ?>&nbsp;&nbsp; <img src="newadm/uploaded_file/flag/<?php echo $rowFlag->country_flag_image; ?>" style="height: 15px;"></span>
</div>
</div>

<?php
$today = date("Y-m-d H:i:s");  
$pdate=$row->pdate; 

if($today < $pdate)
{
$startdatetime=($pdate);
} else
{
$pdate = date('Y-m-d H:i:s', strtotime($today. "+4 days"));

$stmtPdate=$conn->prepare("UPDATE tbl_products SET pdate='$pdate' WHERE id='$id'");


$result=$stmtPdate->execute();

$startdatetime=($pdate);
}

$date1 = new DateTime($today);
$date2 = new DateTime($startdatetime);

$diff = $date2->getTimestamp() - $date1->getTimestamp();

?>
<div class="remaining-time">
<label>Time left</label>
&nbsp;<?php echo ($order_status == 3 || $row->status == 2) ? 'Ended' : '<span class="auction-countdown-days uitest-countdown-timer remain-time" data-time="'.$diff.'"></span>'; ?>
</div>
<button class="cotw-btn secondary ghost-blue"><a href="details.php?pid=<?php echo $id; ?>">View details</a></button>
</div>
</div>
<?php  } ?>
</div>
<!-- Ads Archive End -->
</div>
<div class="clearfix"></div>
<!-- Pagination -->
<?php
$stmtCount=$conn->prepare("select * from tbl_products WHERE $whereClause and status > 0");
$stmtCount->execute();
$total_records=$stmtCount->rowCount();
$row=$stmtCount->fetch(PDO::FETCH_OBJ);
$total_pages = ceil($total_records / $limit); 

if($total_pages > 0)
{
?>
<div class="text-center margin-top-30 hidden-xs hidden-sm">
<?php

$url = $_SERVER['REQUEST_URI'];    

if($url == '/listing.php')
    $url .= '?';
else
{
    if(strpos($url, '?page') !== false)
    {
        $arr = explode('?page', $url);
        $url = $arr[0].'?';
    }
    else
    {
        $arr = explode('&page', $url);
        $url = $arr[0].'&';
    }
    
}

$pagLink = "<ul class='pagination'>";

if($page == 1)
    $pagLink .= '<li class="disabled"><a class="page-link"><</a></li>';
else
    $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($page-1).'"><</a></li>';

if($total_pages < 6)
{
    for ($i=1; $i<=$total_pages; $i++) {
        $pagLink .= "<li class='page-item ".($page == $i ? "active" : "")."'><a class='page-link' href='".$url."page=".$i."'>".$i."</a></li>";   
    }
}
else
{
    if($page == 1 || $page == 2)
    {
        for ($i=1; $i<=3; $i++) {
            $pagLink .= "<li class='page-item ".($page == $i ? "active" : "")."'><a class='page-link' href='".$url."page=".$i."'>".$i."</a></li>";   
        }

        $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($page+3).'">...</a></li>';
        $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($total_pages).'">'.($total_pages).'</a></li>';
    }
    else if($page == 3)
    {
        for ($i=1; $i<=4; $i++) {
            $pagLink .= "<li class='page-item ".($page == $i ? "active" : "")."'><a class='page-link' href='".$url."page=".$i."'>".$i."</a></li>";   
        }

        $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($page+3).'">...</a></li>';
        $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($total_pages).'">'.($total_pages).'</a></li>';
    }
    else if($page == $total_pages-2)
    {
        $pagLink .= '<li><a class="page-link" href="'.$url.'page=1">1</a></li>';
        $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($page-2).'">...</a></li>';        

        for ($i=$total_pages-2; $i<=$total_pages; $i++) {
            $pagLink .= "<li class='page-item ".($page == $i ? "active" : "")."'><a class='page-link' href='".$url."page=".$i."'>".$i."</a></li>";   
        }
        
    }
    else if($page == 3)
    {
        for ($i=1; $i<=4; $i++) {
            $pagLink .= "<li class='page-item ".($page == $i ? "active" : "")."'><a class='page-link' href='".$url."page=".$i."'>".$i."</a></li>";   
        }

        $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($page+3).'">...</a></li>';
        $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($total_pages).'">'.($total_pages).'</a></li>';
    }
    else
    {
        $pagLink .= '<li><a class="page-link" href="'.$url.'page=1">1</a></li>';
        $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($page-3).'">...</a></li>';        

        for ($i=$page-1; $i<=$page+1; $i++) {
            $pagLink .= "<li class='page-item ".($page == $i ? "active" : "")."'><a class='page-link' href='".$url."page=".$i."'>".$i."</a></li>";   
        }

        $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($page+3).'">...</a></li>';
        $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($total_pages).'">'.($total_pages).'</a></li>';
    }
}



if($page == $total_pages)
    $pagLink .= '<li class="disabled"><a class="page-link">></a></li>';
else
    $pagLink .= '<li><a class="page-link" href="'.$url.'page='.($page+1).'">></a></li>';

echo $pagLink . "</ul>"; 

?>
</div>
<div class="text-center margin-top-30 hidden-lg hidden-md">
<?php

$pagLink = "<ul class='pagination' style='display: flex;flex-direction: row;justify-content: space-between;align-items: center;padding: 0 15px;'>";

if($page == 1)
    $pagLink .= '<li class="disabled" style="margin: 0;"><a class="page-link"><</a></li>';
else
    $pagLink .= '<li style="margin: 0;"><a class="page-link" href="'.$url.'page='.($page-1).'"><</a></li>';

$pagLink .= '<li>'.(($page-1)*$limit+1).' - '.($total_records > $page*$limit ? $page*$limit : $total_records).' of '.($total_records).' results</li>';

if($page == $total_pages)
    $pagLink .= '<li class="disabled" style="margin: 0;"><a class="page-link">></a></li>';
else
    $pagLink .= '<li style="margin: 0;"><a class="page-link" href="'.$url.'page='.($page+1).'">></a></li>';

echo $pagLink . "</ul>"; 

}
?>
<!-- <ul class="pagination ">
<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
<li><a href="#">1</a></li>
<li class="active"><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
</ul> -->


</div>
<!-- Pagination End -->
</div>
<!-- Row End -->
</div>
<!-- Left Sidebar End -->
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

<script type="text/javascript">
    function showRemainTime() {
        var list = document.getElementsByClassName("remain-time");
        for (var i=0; i<list.length; i++) {

            var remainTime = list[i].dataset.time;
            if(remainTime > 0)
            {
                var days = parseInt(remainTime/60/60/24);
                var hours = parseInt((remainTime-days*24*60*60)/60/60);
                var mins = parseInt((remainTime-days*24*60*60-hours*60*60)/60);
                var seconds = remainTime-days*24*60*60-hours*60*60-mins*60;

                if(days > 0)
                    list[i].innerHTML = days + "D " + (hours < 10 ? "0"+hours : hours) + ":" + (mins < 10 ? "0"+mins : mins) + ":" + (seconds < 10 ? "0"+seconds : seconds);
                else if(hours >= 5)
                    list[i].innerHTML = (hours < 10 ? "0"+hours : hours) + ":" + (mins < 10 ? "0"+mins : mins) + ":" + (seconds < 10 ? "0"+seconds : seconds);
                else
                    list[i].innerHTML = "<span style='color: #dc4405'>" + (hours < 10 ? "0"+hours : hours) + ":" + (mins < 10 ? "0"+mins : mins) + ":" + (seconds < 10 ? "0"+seconds : seconds) + "</span>";
                list[i].dataset.time--;
            }
            
        }
    }

    showRemainTime();

    setInterval(showRemainTime, 1000);

    function filter() {
        $("body").attr("style", "overflow: hidden;");
        $("#filter-body").attr("style", "display: block !important;position: fixed;height: 100vh;z-index: 1001;background: white;width: 100%;top: 0;");
        $(".sidebar").attr("style", "margin-top: 95px;");
        $("#accordion").attr("style", "overflow: scroll;height: calc(100vh - 210px);");
        $("#srchBtn").attr("style", "position: fixed;left: 15px;bottom: 20px;width: calc(100vw - 30px);");
    }

    function orderChange(e) {
        $("#orderType").val(e.target.value);
        $("#srchBtn").click();
    }
    
</script>
</body>
</html>

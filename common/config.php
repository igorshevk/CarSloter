<?php
session_start();
define("SITE_NAME","CarSloter");
define("SITE_PHONE","#");
define("SITE_MOBILE","+xx xxxxxxxxxx");
define("SITE_EMAIL","info@CarSloter.eu");
define("SITE_URL","https://CarSloter.eu");
define("ADMIN_PATH","newadm");
define("BASE_URL", "https://CarSloter.eu");
date_default_timezone_set("America/New_York");
define("PRICE_FORMAT", "$");

$hostname="localhost";
$dbuser="carscpum_user";
$dbname="carscpum_database";
$dbpassword="Dadadaxx901!!";
try{
	$conn=new PDO("mysql:host=$hostname;dbname=$dbname",$dbuser,$dbpassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	///echo "connect successfully";
}catch(PDOException $e)
{
	echo 'eonnection failed ' . $e->getMessage();
}

function convert_seconds($seconds) 
{
	$dt1 = new DateTime("@0");
	$dt2 = new DateTime("@$seconds");
	///return $dt1->diff($dt2)->format('%a days, %h hours, %i minutes and %s seconds');
	return $dt1->diff($dt2)->format('%a days, %h hours, %i min');
}

function getRealIPAddr()
{
   //check ip from share internet
   if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
   {
       $ip=$_SERVER['HTTP_CLIENT_IP'];
   }
   //to check ip is pass from proxy
   elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
   {
       $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
   }
   else
   {
       $ip=$_SERVER['REMOTE_ADDR'];
   }
   return $ip;
}


$ip_address = getRealIPAddr();

$ipdata = @json_decode(file_get_contents("http://ip-api.com/json/" . $ip_address));

$page = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$country = $ipdata->country;
$country_code = $ipdata->countryCode;
$city = $ipdata->city;
$created_at = date('Y-m-d H:i:s');

$stmt=$conn->prepare("insert into tbl_log(page,ip_address,country_code,country,city,created_at)values(:page,:ip_address,:country_code,:country,:city,:created_at)");



$stmt->bindParam(':page',$page, PDO::PARAM_STR);
$stmt->bindParam(':ip_address',$ip_address, PDO::PARAM_STR);
$stmt->bindParam(':country_code',$country_code, PDO::PARAM_STR);
$stmt->bindParam(':country',$country, PDO::PARAM_STR);
$stmt->bindParam(':city',$city, PDO::PARAM_STR);
$stmt->bindParam(':created_at',$created_at, PDO::PARAM_STR);

$result=$stmt->execute();

?>
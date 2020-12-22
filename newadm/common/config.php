<?php
session_start();

define("SITE_NAME","CarSloter");
define("SITE_PHONE","#");
define("SITE_MOBILE","+xx xxxxxxxxxx");
define("SITE_EMAIL","info@CarSloter.com/");
define("SITE_URL","https://CarSloter.eu");
define("ADMIN_PATH","newadm");
define("BASE_URL", "https://CarSloter.eu");
define("PRICE_FORMAT", "$");
date_default_timezone_set("America/New_York");

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

?>
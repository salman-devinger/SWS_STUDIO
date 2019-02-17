<?php

//load.php

//include connection file
include_once('../config.php');

$data = array();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 00:00:00 GMT");

$ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('cannot connect to the server');

$idn = $_REQUEST;

//$fp = fopen('resultsevent.json', 'w');
//fwrite($fp, json_encode($idn, JSON_PRETTY_PRINT));   //here it will print the array pretty
//fclose($fp);

$sql = "CALL ATT_UI_GET_CALENDER_CLASSES(".$idn['id'].");";

$queryRecords = mysqli_query($ser_con, $sql) or die("error to fetch employees data");

while( $row = mysqli_fetch_array($queryRecords) ) {
  $data[] = array(
  'id'   => $row["IN_ID"],
  'title'   => $row["TITLE"],
  'start'   => $row["START_DT"],
  'end'   => $row["END_DT"],
  'backgroundColor' => $row["COLOUR"], //red
  'borderColor'    => $row["COLOUR"] //red
 );
}

echo json_encode($data);

?>

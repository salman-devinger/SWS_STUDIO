<?php
include '../config.php';

$ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('cannot connect to the server');

// Getting the received JSON into $json variable.
$json = file_get_contents('php://input');

// decoding the received JSON and store into $obj variable.
$obj = json_decode($json,true);
 
// Populate User email from JSON $obj array and store into $email.
$id = $obj['id'];
 
// Populate Password from JSON $obj array and store into $password.
$pass = $obj['pass'];

$sql= "CALL ATT_UI_VALIDATE_USER($id,'$pass')";

$res=mysqli_query($ser_con,$sql);
while($data[] = $res->fetch_assoc()){
    $json = json_encode($data);
}

mysqli_close($ser_con);

echo $json;
?>
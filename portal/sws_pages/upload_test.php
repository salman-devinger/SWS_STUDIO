<?php
include '../config.php';

if(isset($_POST['categoryId'])) {
$categoryId = $_POST['categoryId'];
$ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('cannot connect to the server');
echo "<option>Sub-Category</option>";
$sql = 'CALL ATT_UI_GET_CATEGORY_SUB_CATEGORY('. $categoryId.')';
//$sql = 'CALL ATT_UI_GET_CATEGORY_SUB_CATEGORY(2)';
$res=mysqli_query($ser_con,$sql);
        while($data=mysqli_fetch_array($res))
        {
        echo "<option value='".$data['SUB_CATEGORY_ID']."'>".$data['SUB_CATEGORY_NAME']."</option>";
        }
}

if(!empty($_FILES)) {
  $dir_base = "uploads/";
  //filter extentions
  $fileExt = explode('.', $_FILES['up_file']['name']);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('gif','jpg','png','svg','mp4','mov','mp3');

	//if (in_array($fileActualExt, $allowed)) {
  if (true) {
       if(is_uploaded_file($_FILES['up_file']['tmp_name'])) {
         if(move_uploaded_file($_FILES['up_file']['tmp_name'],$dir_base.$_FILES['up_file']['name'])) {
            // return path
           //echo '<img src="'.$dir_base.$_FILES['up_file']['name'].'" width="100%"  />';
           //echo '<span style="color:red">You cannot upload files of this type!</span>';
           //$message = $_FILES['up_file']['name']."Uploaded Sucesfully";
           //echo "<script type='text/javascript'>alert('$message');</script>";
           //error_log("Here!");
           echo'<script language="javascript">document.getElementById("test").innerHTML  = "Johny";</script>';
          }
        }
	} else {
		echo '<span style="color:red">You cannot upload files of this type!</span>';

	}
}

?>

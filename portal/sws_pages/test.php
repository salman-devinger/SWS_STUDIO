<?php
/*
$string='asdad    s$%@__.j.jff@@&&%%-////assdd';
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
$string = preg_replace('/[^A-Za-z0-9\-._]/', '', $string); // Removes special chars
echo(strtoupper($string));
*/

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
  $file = $_FILES['up_file']['name'];
  $file_loc = $_FILES['up_file']['tmp_name'];
	$file_size = $_FILES['up_file']['size'];
	$file_type = $_FILES['up_file']['type'];
	$name = $_POST['song_name'];
  $artist = $_POST['teacher_name'];
  $level= $_POST['level'];
  $category = $_POST['cat'];
  $subcategory = $_POST['sub_cat'];
  $dir_base = "uploads/";

  if(($file_type == "image/png") || ($file_type == "image/jpg") || ($file_type == "image/jpeg")|| ($file_type == "application/pdf")|| ($file_type == "application/pdf"))
  {
     $ftype="notes";
  }

  else if(($file_type == "video/mp4") || ($file_type == "video/mov"))
  {
     $ftype="video";
  }
  else if(($file_type == "audio/mp3") || ($file_type == "audio/wav"))
  {
     $ftype="audio";
  }
 	// new file size in KB
 	$new_size = round(($file_size/1024),2);
 	// new file size in KB

  $file = preg_replace('/[^A-Za-z0-9\._-]/', '', $file); // Removes special chars
  $file = str_replace(' ', '_', $file); // Replaces all spaces with hyphens.
  $file = str_replace('-', '_', $file); // Replaces all spaces with hyphens.

  $final_file='SWS_'.strtoupper($file);

  $validextensions = array("jpeg", "jpg", "png", "mp3", "wav", "mp4", "mov", "pdf", "docs", "docx");
  $temporary = explode(".", $_FILES["up_file"]["name"]);
  $file_extension = strtolower(end($temporary));

  if (($_FILES["up_file"]["size"] < 100000000000)//Approx. 100kb files can be uploaded.
      && in_array($file_extension, $validextensions))
  {

    if ($_FILES["up_file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["up_file"]["error"] . "<br/><br/>";
    }
    else
    {
      if (file_exists($dir_base . $final_file))
      {
        //echo $_FILES["file"]["name"] . " <span id='invalid'>Already exists.<br/><b>Uploaed  with new name.</b></span> ";
        $sourcePath = $_FILES['up_file']['tmp_name']; // Storing source path of the file in a variable

        $file_rename = explode(".", $final_file);
        $file_rename = strtoupper(($file_rename[0]))."_".rand(1000,100000).".".strtoupper(end($file_rename));

        //$file_rename = $final_file."_".rand(1000,100000);
        $targetPath = $dir_base.$file_rename; // Target path where file is to be stored
        if(move_uploaded_file($sourcePath,$targetPath))
        {

          $ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
          or die('cannot connect to the server');
          //$sql="INSERT INTO tbl_uploads1(file,type,size,name,artist,category,subcategory,ftype)
          //VALUES('$file_rename','$file_type','$new_size','$name','$artist','$category','$subcategory','$ftype')";
          $sql = "CALL ATT_UI_INSERT_EXERCISE_DETAILS('$name','$artist','$ftype','$level','$category','$subcategory','$file_rename','$file_type','$new_size');";
          mysqli_query($ser_con,$sql)
              or die("Unable to connect ");

          $msg='Upload Successfull Rename';
          $final_fl_sz=round(($_FILES["up_file"]["size"] / 1048576),2) . " MB";
          $file_type=strtoupper($file_type);
          echo"<script language='javascript'>document.getElementById('fl_stat').innerHTML  = '$msg';</script>";
          echo"<script language='javascript'>document.getElementById('fl_name').innerHTML  = '$file_rename';</script>";
          echo"<script language='javascript'>document.getElementById('fl_size').innerHTML  = '$final_fl_sz';</script>";
          echo"<script language='javascript'>document.getElementById('fl_type').innerHTML  = '$file_type';</script>";
          echo"<script language='javascript'>document.getElementById('fl_artist').innerHTML  = '$artist';</script>";

        }
      }
      else
      {
        //$final_file = explode(".", $final_file);
        //$final_file = strtoupper(($final_file[0])).".".strtolower(end($final_file));
        $sourcePath = $_FILES['up_file']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = $dir_base.$final_file; // Target path where file is to be stored
        if(move_uploaded_file($sourcePath,$targetPath))
        {
          $ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
          or die('cannot connect to the server');
          //$sql="INSERT INTO tbl_uploads1(file,type,size,name,artist,category,subcategory,ftype) VALUES('$final_file','$file_type','$new_size','$name','$artist','$category','$subcategory','$ftype')";
          $sql = "CALL ATT_UI_INSERT_EXERCISE_DETAILS('$name','$artist','$ftype','$level','$category','$subcategory','$file_rename','$file_type','$new_size');";
          mysqli_query($ser_con,$sql)
              or die("Unable to connect ");
          $msg='Upload Successfull';
          $final_fl_sz=round(($_FILES["up_file"]["size"] / 1048576),2) . " MB";
          $file_type=strtoupper($file_type);
          echo"<script language='javascript'>document.getElementById('fl_stat').innerHTML  = '$msg';</script>";
          echo"<script language='javascript'>document.getElementById('fl_name').innerHTML  = '$final_file';</script>";
          echo"<script language='javascript'>document.getElementById('fl_size').innerHTML  = '$final_fl_sz';</script>";
          echo"<script language='javascript'>document.getElementById('fl_type').innerHTML  = '$file_type';</script>";
          echo"<script language='javascript'>document.getElementById('fl_artist').innerHTML  = '$artist';</script>";
          /*echo "<span id='success'><b>File Uploaded Successfully...!!</b></span><br/>";
          echo "<br/><b>File Name:</b> " . $final_file . "<br>";
          echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
          echo "<b>Size:</b> " . round(($_FILES["file"]["size"] / 1048576),2) . " MB<br>";
          echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
          echo "<b>Song Name:</b> " . $name . "<br>";
          echo "<b>Artist Name:</b> " . $artist . "<br>";
          echo "<b>Category:</b> " . $category . "<br>";
          echo "<b>Sub Category:</b> " . $subcategory . "<br>";*/

        }

      }
    }

  }
  /*$dir_base = "uploads/";

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
*/
}
?>

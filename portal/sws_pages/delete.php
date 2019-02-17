<?php


if(isset($_REQUEST['filename']))
{
 $file_path='uploads/'.$_REQUEST['filename'];
 if(file_exists($file_path)){
   if(unlink($file_path)){
     $msg='File Deleted Sucessfully!!!';
     echo "<script type='text/javascript'>alert('$msg');</script>";
   }
   else{
     $msg='Something Went Wrong!!!';
     echo "<script type='text/javascript'>alert('$msg');</script>";
   }
 }
 else{
   $msg='File Not Found!!!';
   echo "<script type='text/javascript'>alert('$msg');</script>";
 }
}

?>

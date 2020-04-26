<?php


if(isset($_REQUEST['filename']))
{
 $file_path='../uploads/'.$_REQUEST['filename'];
 if(file_exists($file_path)){
   if(unlink($file_path)){
     $msg='File Deleted Sucessfully!!!';
     echo "<script type='text/javascript'; window.location ='view_exercise.php';>alert('$msg');</script>";
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
elseif(isset($_REQUEST['filename_gallery']))
{
 $file_path = $_REQUEST['filename_gallery'];
 if(file_exists($file_path)){
   if(unlink($file_path)){
     $msg='File Deleted Sucessfully!!!';
     echo "<script type='text/javascript'>alert('$msg'); window.location ='app_gallery.php';</script>";
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

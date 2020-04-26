<?php

    $type = $_GET['IMG_TYPE']; 
    $dir = '../../img/app/' . $type. '/';
    $dir_app = 'http://swsstudio.in/img/app/' . $type. '/';

    if (is_dir($dir)){
        
        $img_arr= array();
        if ($dh = scandir($dir)){
            // Read files
            $count = 0;
            foreach ($dh as $value){
                //code to be executed;
                if($value != "." && $value != ".."){
                    
                    $img_arr[] = array("ID" => $count, "IMG_CODE" => $type, "IMG_LOC" => $dir_app.$value);
                    $count ++;

                }
            }

            $json = json_encode($img_arr);
            echo $json;          
        }
            
    }

?>
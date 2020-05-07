<?php

    $type = $_GET['IMG_TYPE']; 
    $dir = '../../img/app/' . $type. '/';
    $dir_app = 'http://swsstudio.in/img/app/' . $type. '/';

    if($type == 'SOCIAL'){
        $social = new StdClass();
        $social->{"URL_FB"} = 'https://www.facebook.com/swsstudio/';
        $social->{"URL_INSTA"} = 'https://www.facebook.com/swsstudio/';
        $social->{"URL_YOUTUBE"} = 'https://www.youtube.com/channel/UCiOOud4zM0_SZUKnQe3BaRw';
        $json = json_encode($social);
        echo $json;
    }

    elseif (is_dir($dir)){
        
        $img_arr= array();
        if ($dh = scandir($dir)){
            // Read files
            $count = 0;
            foreach ($dh as $value){
                //code to be executed;
                if($value != "." && $value != ".."){
                    
                    $img_arr[] = array("ID" => $count, "IMG_CODE" => $type, "url" => $dir_app.$value);
                    $count ++;

                }
            }

            $json = json_encode($img_arr);
            echo $json;          
        }
            
    }

?>
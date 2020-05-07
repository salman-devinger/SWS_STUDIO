<?php

    $type = $_GET['TYPE']; 
    
    if($type == 'ABOUT'){
        header("Location: https://www.youtube.com/user/studiosws");
        exit();
    }

    elseif($type == 'TUTORIAL'){
        header("Location: https://www.youtube.com/user/studiosws");
        exit();
    }

    else{
        header("Location: https://swsstudio.in");
        exit();
    }
    

?>
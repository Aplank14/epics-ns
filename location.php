<?php

function location($ip){
    
    $locations = array("::1" => "Hartford Hub", 
    "123..." => "Other Place");

    foreach($locations as $key => $value){
        if($key == $ip){
            return $value;
        }
    }
    return "Unknown Location";
    
}

?>
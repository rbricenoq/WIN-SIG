<?php
 
function session_timeout($time, $name){
    if( !isset($_SESSION["$name"]) ){
        $_SESSION["$name"] = time() + $time;
    }
 
    if( time() > $_SESSION["$name"] ){
        session_unset();
        session_destroy();
        session_start();
    }
}
 
?>
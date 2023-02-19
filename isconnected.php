<?php

if ($_SERVER['PHP_SELF']!="login.php") {
    
    if (!isset($_SESSION["token"])) {
        header("location:login.php?error1");
    }
    if  (!checkToken($_SESSION["token"])) {
        header("location:login.php?error2");
    }
 
}
?>
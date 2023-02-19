<?php

require "bdd.php";

/** processing of connection request */
if (isset($_POST["connexion"])) {
    $pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
    $password=htmlspecialchars($_POST['password'], ENT_QUOTES); 
    if (checkLogin($pseudo,$password)) {
        header("location:mescrypto.php");
    }
}
?>
<?php

require "head.php";
require "bdd.php";

$error="";
/** processing of connection request */
if (isset($_POST["connexion"])) {
    $pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
    $password=htmlspecialchars($_POST['password'], ENT_QUOTES); 
    if (checkLogin($pseudo,$password)) {
        header("location:mescrypto.php");
    }
    else {
        $error="identifiants non reconnus";
    }
}

require "header.html";
?>

<main>
        <img class="logo"  src="image/logo.png" width="250px" height="250px"/>
        <div class="formulaire">
            <form  method="post">
                <div class="red">
                    <?php echo $error; ?>
                </div>
                <div class="element">
                    <label for="pseudo">Pseudo     : </label>
                    <input  type="text" id="pseudo" name="pseudo" required/>
                </div>
                <div class="element">
                    <label for="password">Password :</label>
                    <input type="password" id="password" name="password" required/>
                </div>
                <div class="element">
                    <button type="submit" id="connexion" name="connexion">Connexion</button>
                </div>
            </form>  
        </div>
       
        <p class="textcenter">
            Pas encore inscrit ?
        </p>
        <button  type="submit" onclick="window.location.href='inscrire.php';" methode="post">s'inscrire</button>

    </main>
<?php
require "footer.html";
?>
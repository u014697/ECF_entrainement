<?php
require "head.php";
require "header.html";
require "bdd.php";

if (isset ($_POST["inscrire"])) {
    if (createUser ($_POST["nom"],$_POST["prenom"],$_POST["date"],$_POST["email"],$_POST["pseudo"],$_POST["password"],$_POST["repeter"])) {
        header ("location:login.php");
    }
}

$required="required";
$button="s'inscrire";
$action="inscrire";
$type="placeholder";
$nom="votre nom";
$prenom="votre prénom";
$date="JJ/MM/AAA";
$email="votre email";

if (isset($_SESSION["token"])) {
    if  (checkToken($_SESSION["token"])) {
        if (isset ($_POST["modifier"])) {
            if (isset ($_POST['nom'])) setName($_POST['nom']);
            if (isset ($_POST['prenom'])) setFirstName($_POST['prenom']);
            if (isset ($_POST['date'])) setBirthDate($_POST['date']);
            if (isset ($_POST['email'])) setEmail($_POST['email']);
            if (isset ($_POST['avatar'])) setAvatar($_POST['avatar']);
            header ("location:mescrypto.php");
        }
    }
    /* modification des parametres d'abonné  */
    $required ="";
    $button="modifier";
    $action="modifier";
    $type="value";
    $nom=getName();
    $prenom=getFirstName();
    $date=getBirthDate();
    $email=getEmail();
}


?>
    <main>
        <img class="logo" src="image/logo.png" height="250px" width="250px"/>

        <div class="formulaire">
            <form  method="post">
            <div class="element">
                    <label for="nom">nom : </label>
                    <input  type="text" id="nom" name="nom" <?php echo $type.'="'.$nom.'"' ?> <?php echo $required ?>/>
                </div>
                <div class="element">
                    <label for="prenom">Prénom     : </label>
                    <input  type="text" id="prenom" name="prenom" <?php echo $type.'="'.$prenom.'"' ?> <?php echo $required ?>/>
                </div>
                <div class="element">
                    <label for="naissance">date     : </label>
                    <input  type="date" id="date" name="date" <?php echo $type.'="'.$date.'"' ?> <?php echo $required ?>/>
                </div>
                <div class="element">
                    <label for="email">Email    : </label>
                    <input  type="email" id="mail" name="email" <?php echo $type.'="'.$email.'"' ?> <?php echo $required ?>/>
                </div>
                <?php
                if ($button=="s'inscrire") {   /* pas possible de modifier le pseudo */
                ?>
                    <div class="element">
                    <label for="pseudo">Pseudo     : </label>
                    <input  type="text" id="pseudo" name="pseudo" placeholder="votre pseudo" <?php echo $required ?>/>
                </div>
                <?php } ?>

                <div class="element">
                    <label for="password">Password :</label>
                    <input type="password" id="password" name="password" <?php echo $required ?>/>
                </div>
                <div class="element">
                    <label for="repeter">répéter :</label>
                    <input type="password" id="repeter" name="repeter" <?php echo $required ?>/>
                </div>
                <div class="element">
                    <label for="photo"> photo : </label>
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                </div>
                <div class="element">
                    <button type="submit" id="inscrire" name="<?php echo $action ?>"><?php echo $button; ?></button>
                </div>
            </form>  
        </div>

    </main>
<?php
require "footer.html";
?>
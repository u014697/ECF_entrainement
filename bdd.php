<?php

function checkLogin($user,$pass) {
    $_SESSION["token"] = "abcdef";
    return true;
}

function checkToken () {
    if (isset($_SESSION["token"])) {
       return true; 
    }
    return false;
}

function createUser ($nom,$prenom,$date,$email,$pseudo,$pass,$passbis) {
    try {
        if($pass!=$passbis) return false; // verification de la verification du mdp

        $pdo = new PDO('mysql:host=localhost;dbname=MyCrypto', 'root', '');
        $statement = $pdo->prepare("INSERT INTO userID(name,firstname,birthdate,email,pseudo,hashpass,hashtoken,expirationtoken,role) VALUES(:nom,:prenom,:date,:email,:pseudo,:hashpass,:hashtoken,:expirationToken,:role)");
        $statement->bindValue(':nom', $nom, PDO::PARAM_STR);
        $statement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindValue(':date', date("Y/m/d",strtotime($date)), PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':role', 1, PDO::PARAM_INT);
        $statement->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
        $statement->bindValue(':hashpass', password_hash($pass,PASSWORD_BCRYPT), PDO::PARAM_STR);
        $token = bin2hex(random_bytes(16));
        $statement->bindValue(':hashtoken', hash('md5', $token), PDO::PARAM_STR);
        $expiration = date("Y/m/d",strtotime('+1 day'));
        $statement->bindValue(':expirationToken', $expiration, PDO::PARAM_STR);
        $statement->execute();
        $_SESSION["token"] = $token;
        $pdo = null; //Déconnexion
        return true;
    }
    catch (PDOException $e) {
        printf("Échec de la connexion : %s\n");
        return false;
    }
}

function cancelUser () {
    /* the token will be used to know which account is to be deleted */
    unset($_SESSION['token']);
    return true;
}

function getName() {
    return "name";
}

function getFirstName() {
    return "firstname";
}

function getBirthDate() {
    $date = "25-06-1996";
    return date("Y-m-d", strtotime($date));   
}

function getEmail() {
    return "monemail@chezmoi.com";
}

function setName($a) {
    return;
}
function setFirstName($a) {
    return;
}
function setBirthDate($a) {
    return;
}
function setEmail($a) {
    return;
}
function setAvatar($a) {
    return;
}
?>

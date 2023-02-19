<?php
require "head.php";
require "bdd.php";
require "isconnected.php";
require "header.html";
?>

<?php
if (isset ($_GET["cancel"])) {
    if (cancelUser ()) {
        header ("location:login.php");
    }
}
?>
<?php
    $pseudo="mon pseudo";
    $prenom="prénom";
    $nom="nom";
    $date="18/12/1961";
    $email="monemail@fv.org";
    $photo="image/exemplephoto.png";

    $nbCrypto=10;
    $nomCrypto="bitcoin";
    $coursCrypto=2110.53;
    $variationCrypto=2.53;
    $intradayCrypto="image/exempleintraday.png"

?>

    <main>
        <div class="cadre">
           <h2 class="textcenter"><?php echo $pseudo; ?></h2>
           <div class="formulaire">
                <div>
                      <img src="<?php echo $photo; ?>" width="100px">
                </div>
                <div>
                    <p class="marginleft"><?php echo $prenom.' '.$nom; ?></p>
                    <p class="marginleft"><?php echo $date; ?></p>
                    <p class="marginleft"><?php echo $email; ?></p>
                </div>
            </div>
            <div class="formulaire">
                    <button type="submit" name="cancel"  onclick="window.location.href='mescrypto.php?cancel';" methode="get">se désinscrire</button>
                    <button  type="submit" name="modify"  onclick="window.location.href='inscrire.php';" methode="post" >modifier</button>
            </div>
       </div>

        <div class="cadre">
            <h2 class="textcenter">mes cryptos</h2>
            <table>
                <tr>
                    <th>crypto</th>
                    <th>cours</th>
                    <th>variation</th>
                    <th>intraday</th>
                    <th>supp.</th>
                </tr>
                <?php for ($i=0; $i<=$nbCrypto; $i++) {?>
                <tr>
                    <th><a href="detailcrypto.php"><?php echo $nomCrypto ?></a></th>
                    <th><?php echo $coursCrypto ?></th>
                    <th><?php echo $variationCrypto ?></th>
                    <th><?php echo "<img src='$intradayCrypto' width='80%' height='25px'>" ?></th>
                    <th><?php echo "<img src='image/trash.png' width='16px'>" ?></th>
                </tr>
                <?php } ?>
            </table>
        </div>


        <button  type="submit"  methode="post">Ajouter</button>

    </main>
<?php
require "footer.html";
?>
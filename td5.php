<?php
$lang_selected = "fr";
$title = "TD 5";
require ("include/header.inc.php");
include ("include/functions.inc.php"); // Inclusion des fonctions 
?>

<h1>TD 5 - PHP - introduction aux pages dynamiques</h1>
<section>
    <h2>Exercice 1 : </h2>
    <?php
    //Affichage de l'heure
/*Style locale*/
    echo '<p style="font-size: 16px; margin-top: 10px;">Date d\'ouverture de cette page :</p>';
    $today = date("H:i:s");
    echo "Heure local: " . $today;
    ?>
</section>
<section>
    <h2>Exercice 2 : </h2>
    <?php
    //Construction de la liste
    $liste_html = construire_liste_html();
    echo $liste_html;
    ?>
</section>
<section>
    <h2>Exercice 3 :</h2>

    <?php
    // Conversion de 0x41 en décimal et caractère ASCII
    $decimal_1 = hexdec('41');
    $caractere_1 = chr($decimal_1);

    // Conversion de 0x2B en décimal et caractère ASCII
    $decimal_2 = hexdec('2B');
    $caractere_2 = chr($decimal_2);

    // Affichage des résultats
    echo "<p>" . hexToAscii('41') . "</p>";
    echo "<p>" . hexToAscii('2B') . "</p>";

    // Conversion inverse
    echo "<p>" . asciiToHex($caractere_1) . "</p>";
    echo "<p>" . asciiToHex($caractere_2) . "</p>";
    ?>
</section>
<section>
    <h2>Exercice 5 : </h2>
    <?php
    //generation du tableau
    $tableau_html = tableau_bases();
    echo $tableau_html;
    ?>
</section>

<?php include ("include/footer.inc.php"); ?>
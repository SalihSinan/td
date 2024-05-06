<?php
$lang_selected = "fr";
$title = "TD 6";
require_once ("include/header.inc.php");
include ("include/functions.inc.php"); // Inclusion des fonctions      

?>

<h1>TD6 - XHTML5 & PHP (tests, boucles et fonctions)</h1>

<section>
    <h2>Exercice 1</h2>
    <?php echo multiplicationTable(); // Affiche la table par défaut               
    ?>
    <?php echo multiplicationTable(3, 5); // Affiche une table de taille que l'on veut               
    ?>
</section>

<section>
    <h2>Exercice 2</h2>
    <div class="ascii-table-container">
        <?php echo asciiTable(); ?>
    </div>
</section>

<?php include ("include/footer.inc.php"); ?>
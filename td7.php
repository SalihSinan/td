<?php
$lang_selected = "fr";
$title = "TD 7";
require_once ("include/header.inc.php");
include ("include/functions.inc.php"); // Inclusion des fonctions 
?>
<h1>TD7 - PHP - fonctions, constantes, tableaux et constructions multi-fichiers</h1>

<section>
    <h2>Ex. 3 : Régions de France</h2>
    <?php
    $regions = array(
        "Guadeloupe",
        "Martinique",
        "Guyane",
        "La Réunion",
        "Mayotte",
        "Île-de-France",
        "Centre-Val de Loire",
        "Bourgogne-Franche-Comté",
        "Normandie",
        "Hauts-de-France",
        "Grand Est",
        "Pays de la Loire",
        "Bretagne",
        "Nouvelle-Aquitaine",
        "Occitanie",
        "Auvergne-Rhône-Alpes",
        "Provence-Alpes-Côte d'Azur",
        "Corse"
    );

    echo listeRegions($regions);
    ?>
</section>

<section>
    <h2>Ex. 3 : Liste numérotée</h2>
    <?php
    echo listeRegions($regions, 'ol');
    ?>
</section>

<section>
    <h2>Ex. 4 : Origines étymologiques</h2>
    <?php
    $origines = originesDate();

    echo "<p>Jour : {$origines['Jour']}</p>";
    echo "<p>Mois : {$origines['Mois']}</p>";
    ?>
</section>

<?php require_once ("include/footer.inc.php"); ?>
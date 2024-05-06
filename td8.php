<?php
$lang_selected = "fr";
$title = "TD 8";
require_once ("include/header.inc.php");
include ("include/functions.inc.php"); // Inclusion des fonctions   
?>

<h1>TD8 - PHP - tableaux,fonctions & liens paramétrés</h1>

<section>
    <h2>Exercice 1</h2>
    <?php
    // URL à traiter
    $url = "https://www.cyu.fr";

    // Appel de la fonction pour extraire les informations de l'URL
    $resultat = extraireInformationsURL($url);

    // Affichage des résultats
    echo "<h2>Informations extraites de l'URL</h2>";
    echo "<div><strong>URL :</strong> $url</div>";
    echo "<div><strong>Protocole :</strong> " . $resultat['protocol'] . "</div>";
    echo "<div><strong>Domaine :</strong> " . $resultat['domain'] . "</div>";
    if (isset($resultat['tld'])) {
        echo "<div><strong>TLD :</strong> " . $resultat['tld'] . "</div>";
    }
    if (isset($resultat['host'])) {
        echo "<div><strong>Organisme / Sous-domaine :</strong> " . $resultat['host'] . "</div>";
    }
    ?>

</section>

<section>
    <h2>Exercice 2</h2>
    <?php
    echo "<p>400 => \"" . convertirOctalEnPermissions(400) . "\"</p>";
    echo "<p>640 => \"" . convertirOctalEnPermissions(640) . "\"</p>";
    echo "<p>755 => \"" . convertirOctalEnPermissions(755) . "\"</p>";
    ?>
</section>

<section>
    <h2>Exercice 3</h2>
    <?php
    $size = isset($_GET["size"]) ? intval($_GET["size"]) : DEFAULT_LIGNE;
    $table = multiplicationTableTaille($size, $size);
    echo $table;
    ?>
</section>

<?php include ("include/footer.inc.php"); ?>
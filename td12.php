<?php
$lang_selected = "fr";
$title = "TD 12";
include ("include/header.inc.php");
include ("include/functions.inc.php"); // Inclusion des fonctions
?>
<h1>TD12 - Images</h1>

<section>
    <h2>Exercice 1 : Images vectorielle SVG (pour le projet)</h2>

    <?php
    // Nom du fichier CSV contenant les données
    $csvFile = 'donnees.txt';

    // Lecture des données à partir du fichier CSV
    $data = readCSV($csvFile);

    // Dimensions du graphique
    $width = 400;
    $height = 300;
    $barWidth = 40;
    $padding = 10;
    $totalBars = count($data);

    // Calcul de l'échelle pour ajuster les valeurs au graphique
    $scale = getScale($data, $height);

    // Création de l'élément SVG
    echo '<svg width="' . $width . '" height="' . $height . '">';

    // Parcours des données pour créer les barres
    for ($i = 0; $i < $totalBars; $i++) {
        // Coordonnées pour le rectangle représentant la barre
        $x1 = $padding + ($i * ($barWidth + $padding));
        $y1 = $height - ($data[$i][1] * $scale);
        $x2 = $x1 + $barWidth;
        $y2 = $height;

        // Couleur aléatoire pour chaque barre
        $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));

        // Création de la barre
        echo '<rect x="' . $x1 . '" y="' . $y1 . '" width="' . $barWidth . '" height="' . ($height - $y1) . '" fill="' . $color . '"/>';

        // Affichage de la valeur au-dessus de la barre
        echo '<text x="' . ($x1 + $barWidth / 2) . '" y="' . ($y1 - 5) . '" text-anchor="middle">' . $data[$i][1] . '</text>';
    }

    echo '</svg>';
    ?>

</section>

<section>
    <h2>Exercice 2 : Image bitmap avec data et base64 (pour le projet)</h2>
    <?php echo $image_embedded; ?>
</section>

<?php include ("include/footer.inc.php"); ?>
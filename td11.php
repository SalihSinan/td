<?php
$lang_selected = "fr";
$title = "TD 11";
require ("include/header.inc.php");
include ("include/functions.inc.php"); // Inclusion des fonctions 
?>

<h1>TD11 - Cookies, Assertions</h1>

<section>
    <h2>Exercice 2 : Assertions</h2>

    <div>
        <p>L'objectif de cet exercice est de vérifier la validité de la formule permettant de calculer la somme des
            carrés des premiers entiers. Nous voulons confirmer que la formule donnée,
            <strong>(n*(n+1)*(2n+1))/6</strong>, produit le résultat attendu pour la somme des carrés des <em>n</em>
            premiers entiers. En d'autres termes, nous souhaitons nous assurer que la somme des carrés des <em>n</em>
            premiers entiers, où
            <em>n</em> est un nombre entier positif donné, correspond bien au résultat fourni par la formule
            susmentionnée. Cet exercice nous permettra de comprendre et de tester la précision de la formule dans le
            calcul de la somme des carrés des premiers entiers.
        </p>
        <div>Quel est votre nombre à tester ?</div>
        <form method="post">
            <input type="number" name="nombre" min="0" />
            <button type="submit">Tester</button>
        </form>
    </div>

    <?php
    // Vérifier si un nombre est soumis via le formulaire
    if (isset ($_POST['nombre'])) {
        $nombre = intval($_POST['nombre']);
        verifierAssertion($nombre);
        $somme_des_carres = sommeCarres($nombre);
        // Affichage des résultats
        echo "<div>Valeur calculée pour le nombre $nombre : (";
        for ($i = 0; $i <= $nombre; $i++) {
            echo "$i^2";
            if ($i < $nombre) {
                echo " + ";
            }
        }
        echo ") = $somme_des_carres</div>";

        echo "<div>Valeur attendue selon la formule : ";
        echo "$nombre * ($nombre + 1) * (2 * $nombre + 1) / 6 = " . ($nombre * ($nombre + 1) * (2 * $nombre + 1) / 6) . ", ";
        echo "</div>";

        echo "<div>L'assertion a réussi ! La somme des carrés des $nombre premiers entiers est correcte.</div>";
    }
    ?>

</section>

<?php include ("include/footer.inc.php"); ?>
<?php
$lang_selected = "fr";
$title = "Projet";
include ("include/header.inc.php");
include ("include/functions.inc.php"); // Inclusion des fonctions
?>
<h1>Projet</h1>
<section class="td11">
    <div class="isolate">
        <div style="display:flex; align-items: center; flex-direction: column;" class="noise">
            <h2>Nous arrivons très bientôt.</h2>
            <img src="images/page_en_construction.png" alt="Page en construction" />
            <p>Cette page en construction, a été crée dans le but explicatif du projet final de l'anée, vous y trouverez
                bientot un lien dirigeant vers le site du projet, et son explication sur cette page. Nous travaillons
                actuellement sur notre site pour l'améliorer. Veuillez nous excuser pour la gêne
                occasionnée.
                Nous avons hâte de vous retrouver dès que possible !</p>
            <div id="chronometer">
                <?php chronometre("2024-05-13 00:00:00"); // Appel de la fonction de chronomètre                                                                                            ?>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
</section>

<?php include ("include/footer.inc.php"); ?>
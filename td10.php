<?php
$lang_selected = "fr";
$title = "TD 10";
require ("include/header.inc.php");
include ("include/functions.inc.php"); // Inclusion des fonctions 
// Chemins des fichiers CSV
$departments_file = 'https://www.insee.fr/fr/statistiques/fichier/7766585/v_departement_2024.csv';
$regions_file = 'https://www.insee.fr/fr/statistiques/fichier/7766585/v_region_2024.csv';

// Extraire les régions et les départements
$regions_with_departments = extract_regions_and_departments($departments_file, $regions_file);
?>

<h1>TD10 - Gestion des Régions et Départements</h1>

<section>
    <h2>Exercice 3 : Image différente formes</h2>

    <div>Voici des illustrations du développement Durable sous différente formes (JPEG, PNG, WebP) :</div>

    <figure>
        <img src="images/developpement_durable.png" alt="Développement Web en PNG" />
        <figcaption>Développement Durable (PNG)</figcaption>
    </figure>
    <figure>
        <img src="images/developpement_durable.webp" alt="Développement Web en WebP" />
        <figcaption>Développement Durable (WebP)</figcaption>
    </figure>
    <figure>
        <img src="images/developpement_durable.jpeg" alt="Développement Web en JPEG" />
        <figcaption>Développement Durable (JPEG)</figcaption>
    </figure>

</section>

<section>
    <h2>Liste des régions de France avec leurs départements</h2>
    <ul>
        <?php foreach ($regions_with_departments as $region => $departments): ?>
            <li><strong>Région:
                    <?php echo $region; ?>
                </strong>
                <ul>
                    <li><em>Départements:</em></li>
                    <?php foreach ($departments as $dept): ?>
                        <li>
                            <?php echo $dept['name'] . ' - ' . $dept['code']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<?php include ("include/footer.inc.php"); ?>
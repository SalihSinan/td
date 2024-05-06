<?php
$lang_selected = "fr";
$title = "TD 9";
require_once ("include/header.inc.php");
include ("include/functions.inc.php"); // Inclusion des fonctions 
?>

<h1>TD 9 - Formulaires HTML et traitement PHP</h1>
<section>
    <h2>Exercice 1 : Formulaire de Recherche</h2>
    <form action="https://fr.search.yahoo.com/search" method="get" target="_blank">
        <fieldset>
            <legend>Yahoo</legend>
            <label for="searchQuery">Rechercher sur Yahoo :</label>
            <input type="search" id="searchQuery" name="q" placeholder="Entrez votre recherche..." />
            <button style="background: linear-gradient(to right, #800080, #6495ED);" type="submit">Rechercher</button>
        </fieldset>
    </form>

    <form action="https://www.google.fr/search" method="get" target="_blank">
        <fieldset>
            <legend>Google</legend>
            <label for="searchQuery2">Rechercher sur Google :</label>
            <input type="search" id="searchQuery2" name="q" placeholder="Entrez votre recherche..." />
            <button style="background: linear-gradient(to right, #DB4437, #F4B400);" type="submit">Rechercher</button>
        </fieldset>
    </form>

    <form action="https://www.bing.com/search" method="get" target="_blank">
        <fieldset>
            <legend>Bing</legend>
            <label for="searchQuery3">Rechercher sur Bing :</label>
            <input type="search" id="searchQuery3" name="q" placeholder="Entrez votre recherche..." />
            <button style="background: linear-gradient(to right, #0044CC, #DB4437);" type="submit">Rechercher</button>
        </fieldset>
    </form>

</section>

<section>
    <h2>Exercice 2 :</h2>
    <form action="#exercice2" method="post" id="exercice2">
        <fieldset>
            <legend>Formulaire et traitement sur la même page</legend>
            <label for="chaine">Saisissez une chaîne de caractères en minuscules :</label>
            <input type="text" id="chaine" name="chaine" placeholder="Entrez votre chaîne de caractères..."
                value="<?php echo isset($_POST['chaine']) ? $_POST['chaine'] : ''; ?>" />

            <label for="valeurDecimale">Saisissez une valeur décimale :</label>
            <input type="number" id="valeurDecimale" name="valeurDecimale" placeholder="Entrez une valeur décimale..."
                value="<?php echo isset($_POST['valeurDecimale']) ? $_POST['valeurDecimale'] : ''; ?>" />

            <button type="submit">Valider</button>
        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si les paramètres "chaine" et "valeurDecimale" ont été envoyés via la méthode POST
        if (isset($_POST['chaine']) && isset($_POST['valeurDecimale'])) {
            // Récupérer la chaîne de caractères saisie et la valeur décimale
            $chaine = $_POST['chaine'];
            $valeurDecimale = intval($_POST['valeurDecimale']); // Convertir en entier
    
            // Convertir la chaîne de caractères en majuscules
            $chaineMajuscules = convertirEnMajuscules($chaine);

            // Convertir la valeur décimale en hexadécimal
            $valeurHexadecimale = convertirDecimalEnHexadecimal($valeurDecimale);

            // Afficher les résultats
            echo "<p>La chaîne en majuscules : $chaineMajuscules</p>";
            echo "<p>La valeur décimale : $valeurDecimale</p>";
            echo "<p>La valeur hexadécimale : $valeurHexadecimale</p>";
        } else {
            // Si les paramètres ne sont pas définis, afficher un message d'erreur
            echo "<p>Erreur : Les paramètres ne sont pas définis.</p>";
        }
    }
    ?>
</section>

<section>
    <h2>Exercice 3 :</h2>
    <?php
    // Traitement de la recherche
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['q']) && isset($_GET['engine'])) {
        try {
            traiterRecherche();
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" target="_blank">
        <fieldset>
            <legend>Bouton-radio et redirection PHP</legend>
            <label for="searchQuery1">Rechercher :</label>
            <input type="search" id="searchQuery1" name="q" placeholder="Entrez votre recherche..." />

            <div style="display: flex; align-items:center; flex-direction: column">
                <p>Choisissez un moteur de recherche :</p>
                <div>
                    <div class="custom-radio">
                        <input type="radio" id="yahoo" name="engine" value="https://fr.search.yahoo.com/search" />
                        <label for="yahoo">Yahoo</label>
                    </div>
                    <div class="custom-radio">
                        <input type="radio" id="google" name="engine" value="https://www.google.fr/search" />
                        <label for="google">Google</label>
                    </div>
                    <div class="custom-radio">
                        <input type="radio" id="bing" name="engine" value="https://www.bing.com/search" />
                        <label for="bing">Bing</label>
                    </div>
                </div>

                <button type="submit">Rechercher</button>
            </div>
        </fieldset>
    </form>
</section>


<section>
    <h2>Exercice 4 :</h2>
    <form action="#exercice3" method="post" id="exercice3">
        <fieldset>
            <legend>Formulaire de saisie d'URL</legend>
            <label for="urlInput">URL :</label>
            <input type="url" id="urlInput" name="url" placeholder="Entrez votre URL..." />
            <button type="submit">Extraire informations</button>
        </fieldset>
    </form>

    <?php
    // Traitement du formulaire et affichage des résultats
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['url'])) {
        $url = $_POST['url'];
        $resultat = extraireInformationsURLComplexe($url);

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
        if (isset($resultat['ip_address'])) {
            echo "<div><strong>Adresse IP :</strong> " . $resultat['ip_address'] . "</div>";
        }
    }
    ?>
</section>

<section>
    <h2>Exercice 5 :</h2>
    <form action="#exercice5" method="post" id="exercice5">
        <fieldset>
            <legend>Contrôle des données en provenance d'un formulaire</legend>
            <label for="valeur">Saisir une valeur entre 2 et 16 :</label>
            <input type="number" id="valeur" name="valeur" min="2" max="16" placeholder="Entrez votre valeurs..." />
            <button type="submit">Afficher la table de multiplication</button>
        </fieldset>
    </form>

    <?php
    // Traitement de la saisie
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['valeur']) && validerValeur($_POST['valeur'])) {
            $valeur = intval($_POST['valeur']);
            echo "<h3>Table de multiplication pour $valeur :</h3>";
            echo "<table border='1'>";
            for ($i = 1; $i <= 10; $i++) {
                echo "<tr><td>$valeur x $i</td><td>" . ($valeur * $i) . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>La valeur saisie n'est pas valide.</p>";
        }
    }
    ?>
</section>

<section>
    <h2>Exercice 6 :</h2>
    <form action="#exercice6" method="post" id="exercice6">
        <fieldset>
            <legend>Formulaire avec cases à cocher</legend>
            <div class="checkboxes-container">
                <table>
                    <tr>
                        <td></td>
                        <td>r</td>
                        <td>w</td>
                        <td>x</td>
                    </tr>
                    <tr>
                        <td id="user_label">user</td>
                        <td><input type="checkbox" id="user_read" name="user_read" value="4"
                                aria-labelledby="user_label" />
                        </td>
                        <td><input type="checkbox" id="user_write" name="user_write" value="2"
                                aria-labelledby="user_label" /></td>
                        <td><input type="checkbox" id="user_execute" name="user_execute" value="1"
                                aria-labelledby="user_label" /></td>
                    </tr>
                    <tr>
                        <td id="group_label">group</td>
                        <td><input type="checkbox" id="group_read" name="group_read" value="4"
                                aria-labelledby="group_label" /></td>
                        <td><input type="checkbox" id="group_write" name="group_write" value="2"
                                aria-labelledby="group_label" /></td>
                        <td><input type="checkbox" id="group_execute" name="group_execute" value="1"
                                aria-labelledby="group_label" /></td>
                    </tr>
                    <tr>
                        <td id="others_label">others</td>
                        <td><input type="checkbox" id="others_read" name="others_read" value="4"
                                aria-labelledby="others_label" /></td>
                        <td><input type="checkbox" id="others_write" name="others_write" value="2"
                                aria-labelledby="others_label" /></td>
                        <td><input type="checkbox" id="others_execute" name="others_execute" value="1"
                                aria-labelledby="others_label" /></td>
                    </tr>
                </table>
            </div>
            <button type="submit">Submit</button>

        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $octal_permissions = calculateChmodOctal();
        echo "La valeur octale de la commande chmod est : $octal_permissions";
    }
    ?>
</section>

<section>
    <h2>Exercice 7 :</h2>
    <form action="#exercice7" method="post" id="exercice7">
        <fieldset>
            <legend>Formulaire avec bouton radio</legend>
            <label for="octalValue">Valeur octale de chmod :</label>
            <input type="text" id="octalValue" name="octalValue"
                value="<?php echo isset($_POST['octalValue']) ? htmlspecialchars($_POST['octalValue']) : ''; ?>"
                placeholder="Entrez votre valeur..." />

            <div style="display: flex; align-items:center; flex-direction: column">
                <p>Sélectionnez le type d'élément :</p>
                <div>
                    <div class="custom-radio">
                        <input type="radio" id="file" name="elementType" value="file" <?php echo (isset($_POST['elementType']) && $_POST['elementType'] === 'file') ? 'checked="checked"' : ''; ?> />
                        <label for="file" class="demo2">Fichier</label>
                    </div>
                    <div class="custom-radio">
                        <input type="radio" id="directory" name="elementType" value="directory" <?php echo (isset($_POST['elementType']) && $_POST['elementType'] === 'directory') ? 'checked="checked"' : ''; ?> />
                        <label for="directory" class="demo2">Répertoire</label>
                    </div>
                </div>


                <button type="submit">Afficher les permissions</button>
            </div>
        </fieldset>
    </form>

    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si les clés sont définies dans le tableau $_POST
        if (isset($_POST['octalValue']) && isset($_POST['elementType'])) {
            // Récupérer les valeurs octales et le type d'élément
            $octalValue = $_POST['octalValue'];
            $elementType = $_POST['elementType'];

            // Afficher les permissions en fonction du type d'élément
            echo "<h3>Résultat :</h3>";
            echo "<p>Valeur octale de chmod : $octalValue \n";
            echo "Type d'élément : $elementType \n";
            echo "Permissions : " . calculatePermissions($octalValue, $elementType) . "</p>";
        } else {
            // Afficher un message d'erreur si les clés ne sont pas définies
            echo "Erreur : Les clés du formulaire ne sont pas définies.";
        }
    }
    ?>
</section>


<section>
    <h2>Exercice 8 :</h2>
    <form action="#exercice8" method="post" id="exercice8">
        <fieldset>
            <legend>Formulaire avec liste d'options générée par des boucles PHP</legend>
            <label for="year">Choisissez une année :</label>
            <select id="year" name="year">
                <?php
                // Générer les options de l'année à partir de 1950 jusqu'à 2050
                for ($year = 1950; $year <= 2050; $year++) {
                    echo "<option value='$year'>$year</option>";
                }
                ?>
            </select>
            <button type="submit">Vérifier</button>
        </fieldset>
    </form>

    <?php
    // Traitement de la sélection de l'année
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['year'])) {
        $selectedYear = $_POST['year'];

        // Vérifier si l'année est bissextile
        if (isLeapYear($selectedYear)) {
            echo "<p>L'année $selectedYear est bissextile.</p>";
        } else {
            echo "<p>L'année $selectedYear n'est pas bissextile.</p>";
        }

        // Récupérer le jour de la semaine du 1er janvier
        $dayOfWeek = getDayOfWeek($selectedYear);
        echo "<p>Le 1er janvier de l'année $selectedYear est un $dayOfWeek.</p>";
    }
    ?>
</section>


<?php require_once ("include/footer.inc.php"); ?>
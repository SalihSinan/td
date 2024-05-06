<?php declare(strict_types=1);

/**
 * @brief Convertit une valeur hexadécimale en caractère ASCII.
 *
 * @param string $hex La valeur hexadécimale à convertir.
 *
 * @return string Le caractère ASCII correspondant à la valeur hexadécimale.
 *
 * @throws Exception Si la chaîne hexadécimale fournie n'est pas valide.
 */
function hexToAscii($hex): string
{
    if (!ctype_xdigit($hex)) {
        throw new Exception("La chaîne hexadécimale fournie n'est pas valide : $hex");
    }

    $decimal = hexdec($hex);
    $caractere = chr($decimal);
    return "0x$hex = $decimal = '$caractere'";
}

/**
 * @brief Convertit un caractère ASCII en valeur hexadécimale.
 *
 * @param string $caractere Le caractère ASCII à convertir.
 *
 * @return string La valeur hexadécimale correspondant au caractère ASCII.
 *
 * @throws Exception Si la chaîne de caractère fournie n'a pas une longueur de 1.
 */
function asciiToHex($caractere): string
{
    if (strlen($caractere) !== 1) {
        throw new Exception("La chaîne de caractère fournie doit avoir une longueur de 1 : $caractere");
    }

    $hex = dechex(ord($caractere));
    return "'$caractere' = 0x$hex = " . hexdec($hex);
}

/**
 * @brief Construit une liste HTML avec des éléments <li> contenant des numéros de 1 à 20.
 *
 * @return string La liste HTML générée.
 *
 * @throws Exception Si la génération de la liste HTML échoue.
 */
function construire_liste_html()
{
    $liste = '<ul>';
    for ($i = 1; $i <= 20; $i++) {
        $element = '<li>hello numéro : ' . $i . '</li>';
        if ($element === false) {
            throw new Exception("Erreur lors de la génération de la liste HTML pour le numéro $i.");
        }
        $liste .= $element;
    }
    $liste .= '</ul>';
    return $liste;
}

/**
 * @brief Génère une liste HTML avec des valeurs hexadécimales de 0 à 15.
 *
 * @return string La liste HTML générée.
 *
 * @throws Exception Si la génération de la liste HTML échoue.
 */
function generer_liste_hexadecimale()
{
    $liste = '<ul class="hex-list">';
    for ($i = 0; $i <= 15; $i++) {
        $hex = dechex($i);
        if ($hex === false) {
            throw new Exception("Erreur lors de la génération de la liste HTML pour la valeur $i.");
        }
        $liste .= '<li class="hex-item">' . strtoupper($hex) . '</li>';
    }
    $liste .= '</ul>';
    return $liste;
}

/**
 * @brief Génère un tableau HTML affichant les valeurs binaires, octales, décimales et hexadécimales de 0 à 17.
 *
 * @return string Le tableau HTML généré.
 */
function tableau_bases()
{
    $tableau = '<table>';
    $tableau .= '<tr><th>Binaire</th><th>Octal</th><th>Décimal</th><th>Hexadécimal</th></tr>';
    for ($i = 0; $i <= 17; $i++) {
        $decimal = sprintf("%02d", $i);
        $octal = sprintf("%02o", $i);
        $hexadecimal = sprintf("%02X", $i);
        $binaire = sprintf("%08b", $i);
        $tableau .= "<tr><td>$binaire</td><td>$octal</td><td>$decimal</td><td>$hexadecimal</td></tr>";
    }
    $tableau .= '</table>';
    return $tableau;
}


/**
 * @brief Génère une table de multiplication HTML jusqu'à la valeur spécifiée de x et y.
 *
 * @param int $x Le nombre de lignes.
 * @param int $y Le nombre de colonnes.
 *
 * @return string La table de multiplication HTML générée.
 */
const DEFAULT_LIGNE = 10;
const DEFAULT_COLONNE = 10;

function multiplicationTable(int $x = DEFAULT_LIGNE, int $y = DEFAULT_COLONNE): string
{
    // Filtrer les paramètres d'entrée
    $x = filterParameter($x);
    $y = filterParameter($y);
    $html = "<table class='table'>";
    $html .= "<caption>Table de multiplication jusqu'à $x x $y</caption>";
    $html .= "<thead><tr><th>x</th>";
    for ($i = 1; $i <= $x; $i++) {
        $html .= "<th>$i</th>";
    }
    $html .= "</tr></thead><tbody>";
    for ($i = 1; $i <= $y; $i++) {
        $html .= "<tr><th>$i</th>";
        for ($j = 1; $j <= $x; $j++) {
            $html .= "<td>" . ($i * $j) . "</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</tbody></table>";
    return $html;
}


/**
 * @brief Filtre une valeur pour qu'elle soit comprise entre une valeur minimale et maximale.
 *
 * Cette fonction prend une valeur en entrée et la filtre pour s'assurer qu'elle est comprise
 * entre une valeur minimale et une valeur maximale. Si la valeur est inférieure à la valeur
 * minimale, elle est ajustée à la valeur minimale. Si elle est supérieure à la valeur maximale,
 * elle est ajustée à la valeur maximale.
 *
 * @param mixed $value La valeur à filtrer.
 * @param mixed $min La valeur minimale autorisée (par défaut: 1).
 * @param mixed $max La valeur maximale autorisée (par défaut: le double de la constante DEFAULT_LIGNE).
 *
 * @return mixed La valeur filtrée qui est comprise entre la valeur minimale et maximale spécifiée.
 */
function filterParameter($value, $min = 1, $max = DEFAULT_LIGNE * 2)
{
    return min(max($value, $min), $max);
}

/**
 * @brief Génère une table ASCII avec des styles CSS.
 *
 * @return string La table ASCII générée.
 */
function asciiTable(): string
{
    $html = "<table class='table_ascii'>";
    $html .= "<caption>Table ASCII</caption>";
    $html .= "<tbody>";

    // Génération de la première ligne avec les titres de colonnes
    $html .= "<tr>";
    $html .= "<td> </td>";
    for ($i = 0; $i < 16; $i++) {
        $html .= "<td class='colonne'>" . strtoupper(dechex($i)) . "</td>";
    }
    $html .= "</tr>";

    // Génération des lignes avec les caractères ASCII
    $count = 2;
    for ($i = 32; $i < 128; $i++) {
        // Si on atteint une nouvelle colonne, ouvrir une nouvelle ligne
        if ($i % 16 == 0) {
            $html .= "<tr>";
            // Générer la cellule avec le numéro de ligne
            $html .= "<td class='colonne'> $count </td>";
            $count++;
        }

        // Générer la cellule avec le caractère ASCII
        if ($i >= 48 && $i <= 57) {
            $html .= "<td class='red " . (ctype_digit(chr($i)) ? "numbers" : "") . "'>";
        } else if ($i >= 65 && $i <= 90) {
            $html .= "<td class='green " . (ctype_upper(chr($i)) ? "uppercase" : "") . "'>";
        } else if ($i >= 97 && $i <= 122) {
            $html .= "<td class='blue " . (ctype_lower(chr($i)) ? "lowercase" : "") . "'>";
        } else {
            $html .= "<td>";
        }

        // Générer le contenu de la cellule
        if ($i == 127) {
            $html .= "&#x00A0;";
            $html .= "&#x25AF;";
        } else {
            $html .= htmlspecialchars(chr($i));
        }
        $html .= "</td>";

        // Si on atteint la fin d'une ligne, fermer la ligne
        if ($i % 16 == 15) {
            $html .= "</tr>";
        }
    }

    $html .= "</tbody></table>";
    return $html;
}

/**
 * @brief Génère une liste HTML (ul ou ol) des régions à partir d'un tableau de régions.
 *
 * @param array $regions Le tableau des régions.
 * @param string $typeListe Le type de liste ('ul' pour non ordonnée, 'ol' pour ordonnée).
 *
 * @return string La liste HTML générée.
 */
function listeRegions($regions, $typeListe = 'ul')
{
    $html = '';
    if ($typeListe == 'ul') {
        $html .= '<ul>';
        foreach ($regions as $region) {
            $html .= '<li>' . $region . '</li>';
        }
        $html .= '</ul>';
    } elseif ($typeListe == 'ol') {
        $html .= '<ol>';
        foreach ($regions as $region) {
            $html .= '<li>' . $region . '</li>';
        }
        $html .= '</ol>';
    } else {
        $html = 'Type de liste non valide';
    }
    return $html;
}

/**
 * @brief Affiche un chronomètre indiquant le temps restant jusqu'à une date spécifiée.
 *
 * @param string $dateFin La date de fin du chronomètre (au format YYYY-MM-DD HH:MM:SS).
 *
 * @return void
 */
function chronometre($dateFin)
{
    $maintenant = time();
    $fin = strtotime($dateFin);
    $diff = $fin - $maintenant;

    if ($diff < 0) {
        echo "Le chronomètre est terminé !";
    } else {
        $jours = floor($diff / (60 * 60 * 24));
        $heures = floor(($diff % (60 * 60 * 24)) / (60 * 60));
        $minutes = floor(($diff % (60 * 60)) / 60);

        echo "<p style='font-size: 16px; text-align: center;'>Temps restant : </p>";
        echo "<div class='chrono-container'>";
        echo "<div class='circle'>Jour : $jours</div>";
        echo "<div class='circle'>Heure : $heures</div>";
        echo "<div class='circle'>Minute : $minutes</div>";
        echo "</div>";
    }
}

/**
 * @brief Retourne les origines étymologiques du jour de la semaine et du mois actuel.
 *
 * @return array Un tableau associatif avec les origines étymologiques du jour et du mois.
 */
function originesDate()
{
    // Tableau associatif pour les jours de la semaine
    $joursSemaine = array(
        "Monday" => "Lune",
        "Tuesday" => "Mars",
        "Wednesday" => "Mercure",
        "Thursday" => "Jupiter",
        "Friday" => "Vénus",
        "Saturday" => "Saturne",
        "Sunday" => "Soleil"
    );

    // Tableau associatif pour les mois de l'année
    $moisAnnee = array(
        1 => "Janvier : provient du nom du dieu Janus, dieu des portes (de janua, « porte » en latin, selon Tertullien), des passages et des commencements dans la mythologie romaine, représenté avec deux visages opposés, car il regarde l'entrée et la sortie, la fin et le début d'une année.",
        2 => "Février : du latin populaire febrarius, dérivé du latin classique februarius, issu du verbe februare « purifier ». Février est donc le mois des purifications",
        3 => "Mars : provient du dieu de la guerre Mars (le retour de la période permise pour entamer une guerre).",
        4 => "Avril : du latin aprilis « avril » qui peut avoir la signification d'« ouvrir », car c'est le mois où les fleurs s'ouvrent. Aprilis (avril) était le deuxième mois du calendrier romain. Ce mois était dédié à la déesse grecque Aphrodite. Il devient graduellement, selon les pays, le quatrième mois de l'année lorsque, en 532, l'Église de Rome décida que l'année commence le 1er janvier ; voir Denys le Petit;",
        5 => "Mai : du latin Maius (mensis) « le mois de mai », provient de la déesse Maïa, l'une des Pléiades et mère de Mercure.",
        6 => "Juin : vient du latin junius. Ce nom fut probablement donné en l'honneur de la déesse romaine Junon. À l'époque antique, c'était le quatrième mois du calendrier romain.",
        7 => "Juillet : deux interprétations possibles : altération de l'ancien français juignet « juillet » proprement « petit juin » et du latin julius (mensis), nom du septième mois de l'année (proprement « mois de Jules, en l'honneur de Jules César, né dans ce mois, réformateur du calendrier romain) », le gn de juignet passant alors en ll de juillet.",
        8 => "Août : du latin augustus, « consacré par les augures », substitué en l'honneur de l'empereur Auguste à Sextilis (mensis) (qui est le sixième mois après le printemps).",
        9 => "Septembre : septem (mensis).",
        10 => "octobre : latin october (mensis) « octobre, huitième mois de l'année romaine » (dérivé de octo : « huit »), qui peut également faire référence à l'empereur romain Octave",
        11 => "Novembre : (novem : « neuf »)",
        12 => "Décembre : (latin classique december, dérivé de decem : « dix », décembre étant le dixième mois de l'année romaine)",
    );

    // Obtention du jour de la semaine
    $jourCourant = date("l", strtotime("today"));
    // Obtention du numéro du mois
    $moisCourant = date("n");

    // Récupération des origines étymologiques
    $origineJour = $joursSemaine[$jourCourant];
    $origineMois = $moisAnnee[$moisCourant];

    return array("Jour" => $origineJour, "Mois" => $origineMois);
}

/**
 * @brief Extrait les informations d'une URL, y compris le protocole, le domaine, le TLD, et l'adresse IP.
 *
 * @param string $url L'URL à analyser.
 *
 * @return array Un tableau associatif contenant les informations extraites de l'URL.
 */
function extraireInformationsURL($url)
{
    // Tableau associatif pour les TLD
    $tlds = array(
        "com" => "Commercial",
        "org" => "Organisation",
        "net" => "Network",
        "fr" => "France"
    );

    // Initialisation du tableau résultat
    $resultat = array();

    // Extraire le protocole
    $resultat['protocol'] = parse_url($url, PHP_URL_SCHEME);

    // Extraire l'hôte (domaine)
    $hote = parse_url($url, PHP_URL_HOST);

    // Vérifier si l'URL est dans le bon format
    if (preg_match('/^[a-z0-9-]+(\.[a-z0-9-]+)*\.[a-z]{2,}$/i', $hote)) {
        // Extraire le domaine
        $resultat['domain'] = $hote;

        // Diviser le domaine en sous-domaine et TLD
        $parties = explode('.', $hote);
        $nbParties = count($parties);

        // Extraire le TLD (si disponible)
        if ($nbParties >= 2 && array_key_exists($parties[$nbParties - 1], $tlds)) {
            $resultat['tld'] = $tlds[$parties[$nbParties - 1]];
            // Extraire l'organisme / sous-domaine
            if ($nbParties > 2) {
                $resultat['host'] = $parties[$nbParties - 2];
            }
        }
    }

    return $resultat;
}

/**
 * @brief Convertit une valeur octale en permissions de fichier.
 *
 * @param int $octal La valeur octale à convertir.
 *
 * @return string Les permissions de fichier correspondant à la valeur octale.
 */
function convertirOctalEnPermissions($octal)
{
    $permissions = array(
        '0' => '---',
        '1' => '--x',
        '2' => '-w-',
        '3' => '-wx',
        '4' => 'r--',
        '5' => 'r-x',
        '6' => 'rw-',
        '7' => 'rwx'
    );

    // Vérifier si la valeur octale est valide
    if ($octal < 0 || $octal > 777) {
        return "Valeur octale invalide";
    }

    // Extraire les chiffres de l'octal
    $owner = $permissions[intval($octal / 100)];
    $group = $permissions[intval(($octal % 100) / 10)];
    $others = $permissions[intval($octal % 10)];

    return $owner . " " . $group . " " . $others;
}

/**
 * @brief Obtient la langue sélectionnée à partir des paramètres de l'URL.
 *
 * Cette fonction vérifie si le paramètre 'lang' est défini dans l'URL. Si c'est le cas, elle retourne
 * la valeur de ce paramètre. Sinon, elle retourne 'fr' par défaut, ce qui signifie que la langue
 * française est sélectionnée.
 *
 * @return string La langue sélectionnée, ou 'fr' par défaut si aucun paramètre 'lang' n'est spécifié dans l'URL.
 */
function getSelectedLanguage()
{
    return isset($_GET['lang']) ? $_GET['lang'] : 'fr'; // Par défaut, la langue est le français (fr)
}

/**
 * @brief Génère une table de multiplication avec une taille spécifiée.
 *
 * Cette fonction génère une table de multiplication avec une taille spécifiée en fonction des
 * paramètres fournis. Par défaut, la taille est déterminée par les constantes DEFAULT_LIGNE et
 * DEFAULT_COLONNE. Les paramètres d'entrée sont filtrés pour s'assurer qu'ils sont valides.
 *
 * @param int $x Le nombre de lignes de la table (par défaut: la valeur de la constante DEFAULT_LIGNE).
 * @param int $y Le nombre de colonnes de la table (par défaut: la valeur de la constante DEFAULT_COLONNE).
 *
 * @return string Le code HTML représentant la table de multiplication avec la taille spécifiée.
 */
function multiplicationTableTaille($x = DEFAULT_LIGNE, $y = DEFAULT_COLONNE)
{
    // Filtrer les paramètres d'entrée
    $x = filterParameter($x);
    $y = filterParameter($y);
    $html = "<table class='table'>";
    $html .= "<caption>Table de multiplication jusqu'à $x x $y</caption>";
    $html .= "<thead><tr><th>x</th>";
    for ($i = 1; $i <= $x; $i++) {
        $html .= "<th>$i</th>";
    }
    $html .= "</tr></thead><tbody>";
    for ($i = 1; $i <= $y; $i++) {
        $html .= "<tr><th>$i</th>";
        for ($j = 1; $j <= $x; $j++) {
            $html .= "<td>" . ($i * $j) . "</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</tbody></table>";
    return $html;
}

/**
 * @brief Convertit une chaîne de caractères en majuscules.
 *
 * Cette fonction prend une chaîne de caractères en entrée et la convertit en majuscules.
 * Elle utilise la fonction PHP strtoupper() pour effectuer cette conversion.
 *
 * @param string $chaine La chaîne de caractères à convertir en majuscules.
 *
 * @return string La chaîne de caractères convertie en majuscules.
 */
function convertirEnMajuscules(string $chaine): string
{
    return strtoupper($chaine);
}

/**
 * @brief Convertit une valeur décimale en hexadécimal.
 *
 * Cette fonction prend une valeur décimale en entrée et la convertit en sa représentation
 * hexadécimale. Elle utilise la fonction PHP dechex() pour effectuer cette conversion.
 *
 * @param int $decimal La valeur décimale à convertir en hexadécimal.
 *
 * @return string La représentation hexadécimale de la valeur décimale.
 */
function convertirDecimalEnHexadecimal(int $decimal): string
{
    return dechex($decimal);
}

/**
 * @brief Extraire les informations avancées d'une URL.
 *
 * Cette fonction prend une URL en entrée et extrait des informations avancées telles que le protocole,
 * le domaine, le TLD (Top-Level Domain), l'organisme/sous-domaine et l'adresse IP du domaine.
 *
 * @param string $url L'URL à partir de laquelle extraire les informations.
 *
 * @return array Un tableau associatif contenant les informations extraites de l'URL.
 * Les clés du tableau sont les suivantes :
 * - 'protocol' : Le protocole utilisé dans l'URL (ex: http, https, ftp).
 * - 'domain' : Le domaine de l'URL.
 * - 'tld' : Le TLD (Top-Level Domain) de l'URL, avec une signification si possible (ex: com, org, net, fr).
 * - 'host' : L'organisme ou le sous-domaine de l'URL.
 * - 'ip_address' : L'adresse IP associée au domaine de l'URL, obtenue à l'aide de dns_get_record.
 */
function extraireInformationsURLComplexe($url)
{
    // Tableau associatif pour les TLD
    $tlds = array(
        "com" => "Commercial",
        "org" => "Organisation",
        "net" => "Network",
        "fr" => "France"
    );

    // Initialisation du tableau résultat
    $resultat = array();

    // Extraire le protocole
    $resultat['protocol'] = parse_url($url, PHP_URL_SCHEME);

    // Extraire l'hôte (domaine)
    $hote = parse_url($url, PHP_URL_HOST);

    // Vérifier si l'URL est dans le bon format
    if (preg_match('/^[a-z0-9-]+(\.[a-z0-9-]+)*\.[a-z]{2,}$/i', $hote)) {
        // Extraire le domaine
        $resultat['domain'] = $hote;

        // Diviser le domaine en sous-domaine et TLD
        $parties = explode('.', $hote);
        $nbParties = count($parties);

        // Extraire le TLD (si disponible)
        if ($nbParties >= 2 && array_key_exists($parties[$nbParties - 1], $tlds)) {
            $resultat['tld'] = $tlds[$parties[$nbParties - 1]];
            // Extraire l'organisme / sous-domaine
            if ($nbParties > 2) {
                $resultat['host'] = $parties[$nbParties - 2];
            }
        }
    }

    // Utilisation de dns_get_record pour obtenir l'adresse IP du domaine
    $dns_records = dns_get_record($resultat['domain'], DNS_A);
    if (!empty($dns_records)) {
        $resultat['ip_address'] = $dns_records[0]['ip'];
    }

    return $resultat;
}

/**
 * @brief Valider une valeur.
 *
 * Cette fonction vérifie si la valeur fournie est un entier compris entre 2 et 16.
 *
 * @param mixed $valeur La valeur à valider.
 *
 * @return bool Retourne true si la valeur est un entier compris entre 2 et 16, sinon false.
 */
function validerValeur($valeur)
{
    // Vérifie si la valeur est un entier compris entre 2 et 16
    if (filter_var($valeur, FILTER_VALIDATE_INT) && $valeur >= 2 && $valeur <= 16) {
        return true;
    } else {
        return false;
    }
}

/**
 * @brief Calculer les permissions en octal.
 *
 * Cette fonction calcule les permissions en octal à partir des valeurs fournies dans un formulaire.
 * Les valeurs pour les droits de lecture, écriture et exécution sont récupérées à partir des champs
 * du formulaire et sont additionnées pour obtenir la représentation octale.
 *
 * @return string Retourne une chaîne représentant les permissions en octal calculées à partir des valeurs du formulaire.
 */
function calculateChmodOctal()
{
    //Exercice 6 tableau 3*3(TD9)
    $permissions = 0;

    // User
    if (isset($_POST['user_read']))
        $permissions += $_POST['user_read'];
    if (isset($_POST['user_write']))
        $permissions += $_POST['user_write'];
    if (isset($_POST['user_execute']))
        $permissions += $_POST['user_execute'];

    // Group
    if (isset($_POST['group_read']))
        $permissions += $_POST['group_read'];
    if (isset($_POST['group_write']))
        $permissions += $_POST['group_write'];
    if (isset($_POST['group_execute']))
        $permissions += $_POST['group_execute'];

    // Others
    if (isset($_POST['others_read']))
        $permissions += $_POST['others_read'];
    if (isset($_POST['others_write']))
        $permissions += $_POST['others_write'];
    if (isset($_POST['others_execute']))
        $permissions += $_POST['others_execute'];

    // Convert octal
    return decoct($permissions);
}

/**
 * @brief Convertir la valeur octale en format "d/-" et "rwx".
 *
 * Cette fonction prend une valeur octale représentant les permissions d'un fichier ou d'un répertoire,
 * ainsi qu'un type ('file' pour fichier ou 'dir' pour répertoire), et retourne une chaîne de caractères
 * représentant ces permissions sous la forme "d/-" et "rwx".
 *
 * @param int $octal La valeur octale représentant les permissions.
 * @param string $type Le type de fichier ('file' pour fichier, 'dir' pour répertoire).
 * @return string Retourne une chaîne représentant les permissions sous la forme "d/-" et "rwx".
 */
function convertOctalToPermissions($octal, $type)
{
    $permissions = '';
    $permissions .= ($type === 'file') ? '-' : 'd';
    $permissions .= (($octal & 4) ? 'r' : '-');
    $permissions .= (($octal & 2) ? 'w' : '-');
    $permissions .= (($octal & 1) ? 'x' : '-');
    return $permissions;
}


/**
 * @brief Convertir la valeur octale en format "d/-" et "rwx" avec les équivalences textuelles.
 *
 * Cette fonction prend une valeur octale représentant les permissions d'un fichier ou d'un répertoire,
 * ainsi qu'un type ('file' pour fichier ou 'dir' pour répertoire), et retourne une chaîne de caractères
 * représentant ces permissions sous la forme "d/-" et "rwx", avec les équivalences textuelles pour r (lecture),
 * w (écriture) et x (exécution).
 *
 * @param int $octal La valeur octale représentant les permissions.
 * @param string $type Le type de fichier ('file' pour fichier, 'dir' pour répertoire).
 * @return string Retourne une chaîne représentant les permissions sous la forme "d/-" et "rwx",
 * avec les équivalences textuelles pour r (lecture), w (écriture) et x (exécution).
 */
function calculatePermissions($octal, $type)
{
    $permissions = '';

    // Définir les équivalences textuelles pour r (lecture), w (écriture) et x (exécution)
    $read = 'Lecture';
    $write = 'Écriture';
    $execute = ($type === 'file') ? 'Exécution' : 'Traversable';

    // Si la valeur octale est 777, retourner directement "rwx"
    if ($octal == 777) {
        return ($type === 'file') ? 'rwx' : 'rwx (' . $execute . ')';
    }

    // Sinon, calculer les permissions normalement
    $permissions .= ($type === 'file') ? '-' : 'd';
    $permissions .= (($octal & 4) ? 'r (' . $read . ')' : '-');
    $permissions .= (($octal & 2) ? 'w (' . $write . ')' : '-');
    $permissions .= (($octal & 1) ? 'x (' . $execute . ')' : '-');

    return $permissions;
}

/**
 * @brief Vérifie si une année est bissextile.
 *
 * Cette fonction prend une année en paramètre et vérifie si elle est bissextile ou non.
 * Une année est bissextile si elle est divisible par 4, à l'exception des années
 * multiples de 100 qui ne sont pas multiples de 400.
 *
 * @param int $year L'année à vérifier.
 * @return bool Retourne true si l'année est bissextile, sinon false.
 */
function isLeapYear($year)
{
    return ($year % 4 === 0 && ($year % 100 !== 0 || $year % 400 === 0));
}

/**
 * @brief Obtient le jour de la semaine pour le 1er janvier d'une année donnée.
 *
 * Cette fonction prend une année en paramètre et retourne le jour de la semaine
 * correspondant au 1er janvier de cette année.
 *
 * @param int $year L'année pour laquelle on souhaite obtenir le jour de la semaine du 1er janvier.
 * @return string Le jour de la semaine (en anglais) correspondant au 1er janvier de l'année spécifiée.
 */
function getDayOfWeek($year)
{
    $januaryFirst = strtotime("January 1, $year");
    return date("l", $januaryFirst);
}

/**
 * @brief Traite la requête de recherche et redirige vers le moteur de recherche sélectionné.
 *
 * Cette fonction vérifie si la méthode de requête est GET, si les paramètres 'q' (pour la recherche)
 * et 'engine' (pour le moteur de recherche) sont définis dans l'URL. Si c'est le cas, elle encode
 * la requête, récupère le moteur de recherche sélectionné, puis effectue une redirection vers ce moteur
 * avec la requête encodée.
 *
 * @note Cette fonction suppose que les moteurs de recherche prennent en charge les requêtes au format '?q=...' dans l'URL.
 *
 * @exception Exception Si les paramètres requis 'q' ou 'engine' ne sont pas présents dans l'URL.
 */
function traiterRecherche()
{
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['q']) && isset($_GET['engine'])) {
        $query = urlencode($_GET['q']);
        $engine = $_GET['engine'];

        // Vérifier si des en-têtes ont déjà été envoyés
        if (!headers_sent()) {
            // Redirection vers le moteur de recherche sélectionné avec la requête
            header("Location: $engine?q=$query");
            exit();
        } else {
            // Gérer l'erreur si les en-têtes ont déjà été envoyés
            echo "Erreur : Impossible de rediriger, les en-têtes ont déjà été envoyés.";
        }
    } else {
        // Lancer une exception si les paramètres requis ne sont pas présents dans l'URL
        throw new Exception("Paramètres 'q' ou 'engine' manquants dans l'URL.");
    }
}

/**
 * @brief Incrémente le compteur de hits et renvoie sa nouvelle valeur.
 *
 * Cette fonction vérifie si le fichier de compteur de hits existe. Si le fichier n'existe pas,
 * elle le crée avec une valeur initiale de 0. Ensuite, elle lit la valeur actuelle du compteur depuis
 * le fichier, l'incrémente, sauvegarde la nouvelle valeur dans le fichier, et enfin, retourne la nouvelle valeur du compteur.
 *
 * @return int La nouvelle valeur du compteur de hits.
 *
 * @exception Exception Si la lecture ou l'écriture du fichier de compteur de hits échoue.
 */
function incrementHitsCounter()
{
    // Chemin vers le fichier de compteur de hits
    $fichierCompteur = 'compteur_hits.txt';

    try {
        // Vérifier si le fichier existe, sinon le créer avec la valeur initiale à 0
        if (!file_exists($fichierCompteur)) {
            file_put_contents($fichierCompteur, '0');
        }

        // Lire la valeur actuelle du compteur depuis le fichier
        $compteur = file_get_contents($fichierCompteur);

        // Incrémenter le compteur
        $compteur++;

        // Sauvegarder la nouvelle valeur du compteur dans le fichier
        file_put_contents($fichierCompteur, $compteur);

        // Retourner la valeur du compteur pour affichage
        return $compteur;
    } catch (Exception $e) {
        // Lancer une exception si la lecture ou l'écriture du fichier de compteur de hits échoue
        throw new Exception("Erreur lors de la manipulation du fichier de compteur de hits : " . $e->getMessage());
    }
}

/**
 * @brief Fonction pour extraire les régions et les départements à partir de fichiers CSV.
 *
 * Cette fonction prend en entrée les chemins vers deux fichiers CSV contenant des données sur les régions et les départements.
 * Elle extrait les régions et les départements à partir de ces fichiers, les organise dans un tableau associatif où les clés
 * sont les noms des régions et les valeurs sont des tableaux contenant les départements correspondants avec leurs codes et noms.
 * Les départements sont triés par ordre alphabétique pour chaque région, et les régions sont également triées par ordre alphabétique.
 *
 * @param string $departments_file Le chemin vers le fichier CSV contenant les données des départements.
 * @param string $regions_file Le chemin vers le fichier CSV contenant les données des régions.
 * @return array Un tableau associatif contenant les régions et les départements organisés comme décrit ci-dessus.
 */
function extract_regions_and_departments($departments_file, $regions_file)
{
    $regions = [];
    $departments = [];

    // Extraire les régions
    $region_data = file($regions_file);
    foreach ($region_data as $line) {
        $fields = explode(",", $line);
        $region_code = trim($fields[0], '"');
        $region_name = trim($fields[4], '"');
        $regions[$region_code] = $region_name;
    }

    // Extraire les départements
    $dept_data = file($departments_file);
    $is_first_line = true; // Indique si c'est la première ligne
    foreach ($dept_data as $line) {
        if ($is_first_line) {
            $is_first_line = false;
            continue; // Ignorer la première ligne
        }
        $fields = explode(",", $line);
        $dept_code = trim($fields[0], '"');
        $region_code = trim($fields[1], '"');
        $dept_name = trim($fields[4], '"');
        if (isset($regions[$region_code])) {
            if (!isset($departments[$regions[$region_code]])) {
                $departments[$regions[$region_code]] = [];
            }
            $departments[$regions[$region_code]][] = ['code' => $dept_code, 'name' => $dept_name];
        }
    }


    // Trier les départements pour chaque région
    foreach ($departments as &$dept_list) {
        usort($dept_list, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
    }

    // Trier les régions par ordre alphabétique
    ksort($departments);

    return $departments;
}

/**
 * @brief Fonction pour calculer la somme des carrés des n premiers entiers.
 *
 * Cette fonction prend en entrée un entier positif n et calcule la somme des carrés
 * des n premiers entiers. Elle utilise une boucle for pour parcourir chaque entier
 * de 1 à n et ajouter le carré de cet entier à la somme totale.
 *
 * @param int $n Le nombre d'entiers dont on veut calculer la somme des carrés.
 * @return int La somme des carrés des n premiers entiers.
 */
function sommeCarres($n)
{
    $somme = 0;
    for ($i = 1; $i <= $n; $i++) {
        $somme += $i * $i;
    }
    return $somme;
}

/**
 * @brief Mettre en place une assertion pour vérifier la formule de la somme des carrés des n premiers entiers.
 *
 * Cette fonction prend en entrée un entier positif n, calcule la somme des carrés des n premiers entiers
 * en utilisant la fonction sommeCarres, puis calcule également la somme selon la formule mathématique connue.
 * Ensuite, elle utilise une assertion pour vérifier que le résultat obtenu par sommeCarres est égal au résultat
 * calculé selon la formule mathématique. Si l'assertion échoue, cela indique une erreur dans la fonction sommeCarres.
 *
 * @param int $n Le nombre d'entiers dont on veut vérifier la formule de la somme des carrés.
 * @return void Cette fonction ne retourne rien, elle utilise simplement une assertion pour vérifier la formule.
 */
function verifierAssertion($n)
{
    // Calcul de la somme des carrés des n premiers entiers
    $resultat = sommeCarres($n);
    // Calcul de la somme selon la formule donnée
    $sommeFormule = $n * ($n + 1) * (2 * $n + 1) / 6;

    // Assertion
    assert($resultat == $sommeFormule);
}
// Fonction pour lire les données à partir du fichier CSV
function readCSV($filename)
{
    $data = [];
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Ignorer la première ligne
        fgetcsv($handle, 1000, ",");

        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $data[] = $row;
        }
        fclose($handle);
    }
    return $data;
}


/**
 * Fonction pour obtenir l'échelle des données.
 *
 * Cette fonction calcule l'échelle nécessaire pour ajuster les données à une certaine hauteur.
 *
 * @param array $data    Les données à utiliser pour calculer l'échelle.
 * @param int   $height  La hauteur à laquelle les données doivent être ajustées.
 *
 * @return float L'échelle calculée.
 */
function getScale($data, $height)
{
    $maxValue = max(array_column($data, 1)); // La deuxième colonne contient les valeurs
    return $height / $maxValue;
}

/**
 * Fonction pour générer une image encodée en base64.
 *
 * Cette fonction lit le contenu d'un fichier image, le convertit en base64 et retourne une balise img
 * avec l'image encodée en base64.
 *
 * @param string $chemin_logo Le chemin vers le fichier image à encoder.
 *
 * @return string La balise img avec l'image encodée en base64.
 */
function generer_image_base64($chemin_logo)
{
    // Lire le contenu du fichier image
    $contenu_logo = file_get_contents($chemin_logo);

    // Convertir en base64
    $logo_base64 = base64_encode($contenu_logo);

    // Retourner la balise img avec le logo en base64
    return '<img src="data:image/png;base64,' . $logo_base64 . '" alt="Mon logo"/>';
}

// Appel de la fonction avec le chemin vers votre logo PNG ou WebP
$chemin_logo = 'images/site.png';
$image_embedded = generer_image_base64($chemin_logo);
?>
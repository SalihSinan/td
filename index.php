<?php
include ("include/functions.inc.php");
$lang_selected = getSelectedLanguage();
$title = "Acceuil";
include ("include/header.inc.php");
?>


<div style="display: flex; justify-content: center; margin-top: 60px; height: 0">
    <a href="index.php<?php echo isset ($_GET['style']) ? '?style=' . $_GET['style'] . '&amp' : '?'; ?>lang=fr">
        <img src="images/france.png" alt="France" width="50" />
    </a>
    <a href="index.php<?php echo isset ($_GET['style']) ? '?style=' . $_GET['style'] . '&amp' : '?'; ?>lang=en">
        <img src="images/english.png" alt="Anglais" width="50" />
    </a>
</div>

<?php
// Inclure le fichier de langue correspondant en fonction de la langue sélectionnée
$lang = getSelectedLanguage();
if ($lang === 'en') {
    include_once 'include/english.inc.php';
} else {
    include_once 'include/french.inc.php';
}
?>
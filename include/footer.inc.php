<?php
include_once ("util.inc.php");
?>

</main>
<footer>
    <div class="footer-div">2024 Yuksel Sinan L2-ID CY-SUP</div>
    <div class="footer-div">Navigateur actuelle de l'internaute :
        <?php echo get_navigateur(); ?>
    </div>
    <div class="footer-div">Nombre de visites :
        <?php echo incrementHitsCounter(); ?>
    </div>
    <div>
        <a href="plan_du_site.php<?php echo isset ($_GET['style']) ? '?style=' . $_GET['style'] : ''; ?>"
            style="text-decoration: none; color: white; border-bottom: 1px solid white; margin-bottom: 20px;">Plan du
            site</a>
    </div>
    <a href="https://mycy.cyu.fr/" target="_blank">
        <img src="images/cyu.png" alt="Logo CYU" width="100" />
    </a>
</footer>

</body>

</html>
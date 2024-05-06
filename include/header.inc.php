
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style_nuit.css" />
    <link rel="icon" href="images/site.png" />

    <title>
        Acceuil    </title>
</head>

<body>

    <header>

        <nav>
            <a href="index.php?style=alternatif">
                <img src="images/acceuil.png" alt="Image accueil" width="60" />
            </a>

            <form method="get">
                <input type="hidden" name="style"
                    value="" />
                <button type="submit" aria-label="Mode nuit"
                    class="slider-button night-mode">
                    <span class="slider-button-inner"> </span>
                </button>
            </form>

            <ol>
                <li><a href="td5.php?style=alternatif">TD5</a>
                </li>
                <li><a href="td6.php?style=alternatif">TD6</a>
                </li>
                <li><a href="td7.php?style=alternatif">TD7</a>
                </li>
                <li><a href="td8.php?style=alternatif">TD8</a>
                </li>
                <li><a href="td9.php?style=alternatif">TD9</a>
                </li>
                <li><a href="td10.php?style=alternatif">TD10</a>
                </li>
                <li><a href="td11.php?style=alternatif">TD11</a>
                </li>
                <li><a href="td12.php?style=alternatif">TD12</a>
                </li>
            </ol>
        </nav>
    </header>
    <main>

<div style="display: flex; justify-content: center; margin-top: 60px; height: 0">
    <a href="index.php?style=alternatif&amplang=fr">
        <img src="images/france.png" alt="France" width="50" />
    </a>
    <a href="index.php?style=alternatif&amplang=en">
        <img src="images/english.png" alt="Anglais" width="50" />
    </a>
</div>

<h1>Bienvenue sur mon site</h1>

<div style="display: flex;">
    <div style="flex-direction: column">
        <section>
            <h2>Découvrez mes Réalisations en Développement Web !</h2>
            <p>
                Bienvenue sur mon site ! Ici, vous pouvez explorer l'ensemble des travaux pratiques que j'ai réalisés
                tout au long de ma formation en L2 informatique. Plongez dans mes projets de développement web, où j'ai
                utilisé des langages tels que PHP, HTML et XML pour créer des solutions innovantes.

                Pourquoi explorer cette section ?
                Démonstration de Compétences: Découvrez mes compétences en développement web à travers des projets
                concrets et fonctionnels.

                Inspiration pour Vous: Que vous soyez étudiant en informatique ou passionné de développement web, mes
                réalisations peuvent vous inspirer dans vos propres travaux.
            </p>
            <img alt="code" src="images/code.png" width="100" />
        </section>

        <section>
            <h2>Contenu des tds</h2>
            <article>
                <h3>Td 5</h3>
                <p>Cette page présente une série d'exercices sur différents sujets liés au développement web, tels que
                    la manipulation de dates, la création de listes et de tableaux, ainsi que les conversions entre
                    différentes bases numériques et le code ASCII.</p>
            </article>
            <article>
                <h3>Td 6</h3>
                <p>Cette page présente des exercices pratiques sur la génération de tables de multiplication et la
                    présentation stylisée de tables ASCII en utilisant des fonctionnalités du langage PHP et des styles
                    CSS.</p>
            </article>
            <article>
                <h3>Td 7</h3>
                <p>Cette page présente une variété d'exercices liés aux listes, aux informations sur la date, et à la
                    manipulation de couleurs en utilisant des fonctions PHP.</p>
            </article>
            <article>
                <h3>Td 8</h3>
                <p>Cette page présente des exercices sur l'extraction d'informations à partir d'URLs, la conversion de
                    permissions octales, et la génération de tables de multiplication en utilisant des fonctions PHP.
                </p>
            </article>
            <article>
                <h3>Td 9</h3>
                <p>Cette page présente des exercices sur la création de formulaires de recherche avec différents moteurs
                    de recherche, le traitement de données saisies dans un formulaire, la redirection en fonction d'un
                    choix de bouton radio, l'extraction d'informations à partir d'une URL, la validation des données de
                    formulaire, et la génération de listes d'options à partir de boucles PHP.</p>
            </article>
            <article>
                <h3>Td 10</h3>
                <p>Cette page présente une exploration du développement durable à travers l'affichage d'images dans
                    différents formats (PNG, WebP et JPEG), ainsi qu'une liste détaillée des régions de France avec
                    leurs départements associés. De plus, un compteur de hits est intégré pour suivre l'activité de la
                    page.</p>
            </article>
            <article>
                <h3>Td 11</h3>
                <p>Cet page vise à vérifier la précision de la formule de calcul de la somme des carrés des premiers
                    entiers. À l'aide d'un formulaire, vous pouvez tester cette formule en entrant un nombre entier
                    positif et vérifier si la somme des carrés des premiers entiers correspond bien au résultat attendu
                    selon la formule donnée. Une fois soumis, le résultat calculé est affiché ainsi que la valeur
                    attendue selon la formule. Si la vérification réussit, un message confirme la validité de la somme
                    des carrés pour le nombre donné.</p>
            </article>
            <article>
                <h3>Td 12</h3>
                <p>Cette page informe les utilisateurs que le site est en cours de maintenance et leur indique quand
                    sera de nouveau disponible. En espérant de le rendre actif dans les plus brefs délai.</p>
            </article>
        </section>

        <section>
            <h2>Qui je suis?</h2>
            <img alt="codeur" src="images/codeur.png" width="100" />
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Information Personelle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nom</td>
                        <td>YUKSEL</td>
                    </tr>
                    <tr>
                        <td>Prénom</td>
                        <td>Sinan</td>
                    </tr>
                    <tr>
                        <td>Université</td>
                        <td>CY PARIS UNIVERSITE</td>
                    </tr>
                    <tr>
                        <td>Filière</td>
                        <td>L2-Informatique</td>
                    </tr>
                    <tr>
                        <td>Groupe</td>
                        <td>TD D</td>
                    </tr>
                    <tr>
                        <td>Choix</td>
                        <td class="choix">Depuis mon plus jeune âge, j'ai été passionné par le monde numérique. J'ai
                            choisi plus
                            précisement le développement informatique.

                            Dès mon début dans l'informatique, j'ai été attiré par la logique et la créativité pour
                            résoudre des
                            problèmes de notre vie quotidienne en utilisant la programmation. La diversité des
                            langage, pour chaque format d'applications, que ce soit la création de sites web,
                            d'applications mobiles intuitives, m'a profondément attiré.

                            Pour moi, le développement est plus qu'un compétence technique. Coder me permet d'exprimé
                            mes idées, ma créativité. Je vois la programmation comme un langage universel permettant
                            d'atteindre tout le monde de moyen rapide et efficace.

                            En dehors des cours, je suis intérreser dans des projets de développement, explorant de
                            nouveaux langages pour élargir mes compétences. Ma passion pour la technologie ne se limite
                            donc pas à l'éducation formelle.

                            En résumé, je suis cet étudiant en L2 informatique j'ai choisi le développement comme
                            spécialisation en raison de ma fascination pour la puissance créative du code. Ma passion
                            débordante et mon engagement dans des projets variés reflètent mon désir constant
                            d'apprendre et de contribuer à l'évolution rapide du monde numérique.</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

    <section style="height: 250px; width: 100%">
        <h2 style="margin-left: 0">Outils</h2>
        <div>
            <img alt="php" src="images/php.png" width="75" />
        </div>
        <div>
            <img alt="html" src="images/html.png" width="75" />
            <img alt="css" src="images/css.png" width="75" />
        </div>
    </section>
</div>


</main>
<footer>
    <div class="footer-div">2024 Yuksel Sinan L2-ID CY-SUP</div>
    <div class="footer-div">Navigateur actuelle de l'internaute :
        Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36    </div>
    <div class="footer-div">Nombre de visites :
        719    </div>
    <div>
        <a href="plan_du_site.php?style=alternatif"
            style="text-decoration: none; color: white; border-bottom: 1px solid white; margin-bottom: 20px;">Plan du
            site</a>
    </div>
    <a href="https://mycy.cyu.fr/" target="_blank">
        <img src="images/cyu.png" alt="Logo CYU" width="100" />
    </a>
</footer>

</body>

</html>
<?php
$lang_selected = "en";
$title = "Home";
include_once ("include/header.inc.php");
include_once ("include/functions.inc.php");
?>

<h1>Welcome to my website</h1>

<div style="display: flex;">
    <div style="flex-direction: column">
        <section>
            <h2>Discover my Web Development Achievements!</h2>
            <p>
                Welcome to my website! Here, you can explore all the practical work I have done throughout my L2
                computer science training. Dive into my web development projects, where I have used languages
                such as
                PHP, HTML, and XML to create innovative solutions.

                Why explore this section?
                Demonstration of Skills: Discover my web development skills through concrete and functional
                projects.

                Inspiration for You: Whether you are a computer science student or a web development enthusiast,
                my
                achievements can inspire you in your own work.
            </p>
            <img alt="code" src="images/code.png" width="100" />
        </section>

        <section>
            <h2>TD Content</h2>
            <article>
                <h3>Td 5</h3>
                <p>This page presents a series of exercises on various topics related to web development, such
                    as date
                    manipulation, creating lists and tables, as well as conversions between different numerical
                    bases
                    and ASCII code.</p>
            </article>
            <article>
                <h3>Td 6</h3>
                <p>This page presents practical exercises on generating multiplication tables and stylish
                    presentation
                    of ASCII tables using PHP language features and CSS styles.</p>
            </article>
            <article>
                <h3>Td 7</h3>
                <p>This page presents a variety of exercises related to lists, date information, and color
                    manipulation
                    using PHP functions.</p>
            </article>
            <article>
                <h3>TD 8</h3>
                <p>This page presents exercises on extracting information from URLs, converting octal
                    permissions,
                    generating multiplication tables using PHP functions.</p>
            </article>
            <article>
                <h3>TD 9</h3>
                <p>This page presents exercises on creating search forms with different search engines,
                    processing data
                    entered in a form, redirecting based on a radio button choice, extracting information from a
                    URL,
                    validating form data, and generating option lists from PHP loops.</p>
            </article>
            <article>
                <h3>Td 10</h3>
                <p>This page presents an exploration of sustainable development through the display of images in
                    various
                    formats (PNG, WebP, and JPEG), as well as a detailed list of regions in France with their
                    associated
                    departments. Additionally, a hit counter is integrated to track the page activity.</p>
            </article>
            <article>
                <h3>Td 11</h3>
                <p>This page aims to verify the accuracy of the formula for calculating the sum of squares of the first
                    integers. Using a form, you can test this formula by entering a positive integer and checking if the
                    sum of squares of the first integers matches the expected result according to the given formula.
                    Once submitted, the calculated result is displayed along with the expected value according to the
                    formula. If the verification is successful, a message confirms the validity of the sum of squares
                    for the given number.</p>
            </article>
            <article>
                <h3>Td 12</h3>
                <p>This page informs users that the site is under maintenance and indicates when it will be
                    available
                    again. Hoping to make it active again as soon as possible.</p>
            </article>
        </section>

        <section>
            <h2>Who am I?</h2>
            <img alt="codeur" src="images/codeur.png" width="100" />
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Personal Information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Last Name</td>
                        <td>YUKSEL</td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td>Sinan</td>
                    </tr>
                    <tr>
                        <td>University</td>
                        <td>CY PARIS UNIVERSITY</td>
                    </tr>
                    <tr>
                        <td>Major</td>
                        <td>L2-Computer Science</td>
                    </tr>
                    <tr>
                        <td>Group</td>
                        <td>TD D</td>
                    </tr>
                    <tr>
                        <td>Choice</td>
                        <td class="choice">From a young age, I have been passionate about the digital world. I
                            chose
                            computer development more precisely.

                            From the beginning in computer science, I have been attracted to the logic and
                            creativity to
                            solve problems in our daily lives using programming. The diversity of languages, for
                            each
                            application format, whether creating websites, intuitive mobile applications, has
                            deeply
                            attracted me.

                            For me, development is more than a technical skill. Coding allows me to express my
                            ideas,
                            my creativity. I see programming as a universal language that allows reaching
                            everyone
                            quickly and effectively.

                            Outside of classes, I am interested in development projects, exploring new languages
                            to
                            broaden my skills. My passion for technology is not limited to formal education.

                            In summary, I am this L2 computer science student who chose development as a
                            specialization
                            because of my fascination with the creative power of code. My overflowing passion
                            and
                            involvement in various projects reflect my constant desire to learn and contribute
                            to the
                            rapid evolution of the digital world.</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

    <section style="height: 250px; width: 100%">
        <h2 style="margin-left: 0">Tools</h2>
        <div>
            <img alt="php" src="images/php.png" width="75" />
        </div>
        <div>
            <img alt="html" src="images/html.png" width="75" />
            <img alt="css" src="images/css.png" width="75" />
        </div>
    </section>
</div>

<?php include_once ("include/footer.inc.php"); ?>
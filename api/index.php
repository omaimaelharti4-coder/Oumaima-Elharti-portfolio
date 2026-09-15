<?php

/* =========================================================
   OUMAIMA ELHARTI - PORTFOLIO
   Développement Digital - 2ème année
   ========================================================= */
// Les 6 modules
$modules = [
    "m201" => [
        "code" => "M201",
        "title" => "Préparation du projet web",
        "icon" => "🌐",
        "description" => "Conception et préparation des projets web."
    ],

    "m202" => [
        "code" => "M202",
        "title" => "Approche agile",
        "icon" => "⚡",
        "description" => "Méthodes agiles, organisation et gestion de projet."
    ],

    "m203" => [
        "code" => "M203",
        "title" => "Gestion de données",
        "icon" => "🗄️",
        "description" => "Bases de données, SQL et gestion des données."
    ],

    "m204" => [
        "code" => "M204",
        "title" => "Développement front-end",
        "icon" => "💻",
        "description" => "Création d'interfaces web modernes et interactives."
    ],

    "m205" => [
        "code" => "M205",
        "title" => "Développement back-end",
        "icon" => "⚙️",
        "description" => "PHP, programmation serveur et développement back-end."
    ],

    "m206" => [
        "code" => "M206",
        "title" => "Création d'une application Cloud Native",
        "icon" => "☁️",
        "description" => "Découverte des applications Cloud Native et du déploiement."
    ]
];


/* =========================================================
   Récupérer automatiquement les PDF de chaque module
   ========================================================= */

function getDocuments($module)
{
    $folder = __DIR__ . "/../public/docs/" . $module;

    if (!is_dir($folder)) {
        return [];
    }

    $files = scandir($folder);
    $documents = [];

    foreach ($files as $file) {

        if ($file === "." || $file === ".." || $file === ".gitkeep") {
            continue;
        }

        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if ($extension === "pdf") {

            $documents[] = [
                "name" => pathinfo($file, PATHINFO_FILENAME),
                "file" => $file
            ];
        }
    }

    return $documents;
}


/* =========================================================
   Compter les documents
   ========================================================= */

$totalDocuments = 0;

foreach ($modules as $key => $module) {
    $modules[$key]["documents"] = getDocuments($key);
    $modules[$key]["count"] = count($modules[$key]["documents"]);

    $totalDocuments += $modules[$key]["count"];
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="Portfolio professionnel de Oumaima Elharti, étudiante en Développement Digital.">

    <title>Oumaima Elharti | Développeuse Web</title>


    <style>

        /* =====================================================
           RESET
           ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #080b16;
            color: #ffffff;
            overflow-x: hidden;
        }


        a {
            text-decoration: none;
            color: inherit;
        }


        /* =====================================================
           BACKGROUND
           ===================================================== */

        body::before {
            content: "";
            position: fixed;
            width: 500px;
            height: 500px;
            background: #7c3aed;
            filter: blur(180px);
            opacity: .18;
            border-radius: 50%;
            top: -200px;
            left: -150px;
            z-index: -2;
            animation: moveGlow 8s infinite alternate ease-in-out;
        }


        body::after {
            content: "";
            position: fixed;
            width: 450px;
            height: 450px;
            background: #06b6d4;
            filter: blur(180px);
            opacity: .13;
            border-radius: 50%;
            bottom: -150px;
            right: -100px;
            z-index: -2;
            animation: moveGlow2 10s infinite alternate ease-in-out;
        }


        @keyframes moveGlow {

            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(180px, 100px);
            }
        }


        @keyframes moveGlow2 {

            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(-150px, -100px);
            }
        }


        /* =====================================================
           NAVBAR
           ===================================================== */

        nav {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: min(1100px, 92%);
            padding: 15px 25px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            background: rgba(10, 14, 30, .72);
            backdrop-filter: blur(20px);

            border: 1px solid rgba(255,255,255,.1);
            border-radius: 18px;

            z-index: 1000;

            animation: navDown 1s ease;
        }


        @keyframes navDown {

            from {
                opacity: 0;
                transform: translate(-50%, -40px);
            }

            to {
                opacity: 1;
                transform: translate(-50%, 0);
            }
        }


        .logo {
            font-size: 22px;
            font-weight: 800;
        }


        .logo span {
            color: #8b5cf6;
        }


        .nav-links {
            display: flex;
            gap: 25px;
            list-style: none;
        }


        .nav-links a {
            color: #cbd5e1;
            font-size: 14px;
            transition: .3s;
            position: relative;
        }


        .nav-links a::after {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            background: #8b5cf6;
            bottom: -7px;
            left: 50%;
            transition: .3s;
        }


        .nav-links a:hover {
            color: white;
        }


        .nav-links a:hover::after {
            width: 100%;
            left: 0;
        }


        /* =====================================================
           HERO
           ===================================================== */

        .hero {
            min-height: 100vh;
            max-width: 1150px;
            margin: auto;

            padding: 140px 30px 80px;

            display: grid;
            grid-template-columns: 1.1fr .9fr;
            align-items: center;
            gap: 70px;
        }


        .hero-text {
            animation: heroLeft 1s ease forwards;
        }


        @keyframes heroLeft {

            from {
                opacity: 0;
                transform: translateX(-70px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }


        .small-title {
            display: inline-block;
            padding: 8px 15px;

            border: 1px solid rgba(139,92,246,.5);
            background: rgba(139,92,246,.1);

            border-radius: 30px;

            color: #c4b5fd;
            font-size: 13px;
            margin-bottom: 20px;
        }


        h1 {
            font-size: clamp(45px, 7vw, 78px);
            line-height: 1;
            margin-bottom: 20px;
        }


        h1 span {
            color: #8b5cf6;
        }


        .hero-text h2 {
            color: #cbd5e1;
            font-size: 23px;
            margin-bottom: 20px;
        }


        .hero-text p {
            color: #94a3b8;
            max-width: 600px;
            line-height: 1.8;
            font-size: 16px;
        }


        .buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }


        .btn {
            padding: 13px 22px;
            border-radius: 12px;
            font-weight: bold;
            transition: .3s;
        }


        .btn-primary {
            background: #7c3aed;
        }


        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(124,58,237,.35);
        }


        .btn-outline {
            border: 1px solid rgba(255,255,255,.15);
            color: #cbd5e1;
        }


        .btn-outline:hover {
            border-color: #8b5cf6;
            transform: translateY(-5px);
        }


        /* =====================================================
           PHOTO CARD
           ===================================================== */

        .photo-container {
            display: flex;
            justify-content: center;

            animation: heroRight 1.2s ease forwards;
        }


        @keyframes heroRight {

            from {
                opacity: 0;
                transform: translateX(70px) scale(.9);
            }

            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }


        .photo-card {
            width: 360px;
            height: 470px;

            position: relative;

            padding: 10px;

            border-radius: 35px;

            background: linear-gradient(
                135deg,
                #8b5cf6,
                #06b6d4,
                #8b5cf6
            );

            background-size: 300% 300%;

            animation:
                gradientMove 5s ease infinite,
                floating 5s ease-in-out infinite;

            box-shadow:
                0 0 80px rgba(139,92,246,.25);
        }


        @keyframes gradientMove {

            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }


        @keyframes floating {

            0%,100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }


        .photo-inner {
            width: 100%;
            height: 100%;

            overflow: hidden;

            border-radius: 27px;

            background: #111827;
            position: relative;
        }


        .photo-inner img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            object-position: center;

            transition: .7s;
        }


        .photo-card:hover img {
            transform: scale(1.07);
        }


        /* =====================================================
           FLOATING BADGES
           ===================================================== */

        .badge {
            position: absolute;

            padding: 10px 15px;

            background: rgba(15,23,42,.9);
            border: 1px solid rgba(255,255,255,.1);

            backdrop-filter: blur(10px);

            border-radius: 12px;

            font-size: 13px;

            z-index: 5;

            box-shadow: 0 10px 30px rgba(0,0,0,.3);
        }


        .badge-one {
            top: 30px;
            left: -45px;
            animation: badgeFloat 4s infinite ease-in-out;
        }


        .badge-two {
            bottom: 40px;
            right: -45px;
            animation: badgeFloat 4s infinite ease-in-out 1s;
        }


        @keyframes badgeFloat {

            0%,100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }


        /* =====================================================
           SECTIONS
           ===================================================== */

        section {
            max-width: 1150px;
            margin: auto;
            padding: 100px 30px;
        }


        .section-title {
            text-align: center;
            margin-bottom: 55px;
        }


        .section-title small {
            color: #8b5cf6;
            font-weight: bold;
        }


        .section-title h2 {
            font-size: 40px;
            margin-top: 8px;
        }


        .section-title p {
            color: #94a3b8;
            margin-top: 12px;
        }


        /* =====================================================
           ABOUT
           ===================================================== */

        .about-box {
            padding: 40px;

            background: rgba(255,255,255,.035);
            border: 1px solid rgba(255,255,255,.08);

            border-radius: 25px;

            line-height: 1.9;
            color: #cbd5e1;

            transition: .4s;
        }


        .about-box:hover {
            transform: translateY(-7px);
            border-color: rgba(139,92,246,.5);
        }


        .about-box strong {
            color: white;
        }


        /* =====================================================
           MODULES
           ===================================================== */

        .modules-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }


        .module-card {
            padding: 28px;

            min-height: 270px;

            background: rgba(255,255,255,.035);

            border: 1px solid rgba(255,255,255,.08);

            border-radius: 22px;

            position: relative;

            overflow: hidden;

            transition: .4s;
        }


        .module-card::before {
            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            background: #8b5cf6;

            filter: blur(70px);

            opacity: 0;

            right: -20px;
            top: -20px;

            transition: .4s;
        }


        .module-card:hover {
            transform: translateY(-10px);
            border-color: rgba(139,92,246,.6);
        }


        .module-card:hover::before {
            opacity: .4;
        }


        .module-icon {
            font-size: 35px;
            margin-bottom: 18px;
        }


        .module-code {
            color: #8b5cf6;
            font-weight: bold;
            font-size: 13px;
        }


        .module-card h3 {
            margin: 8px 0 12px;
            font-size: 20px;
        }


        .module-card p {
            color: #94a3b8;
            font-size: 14px;
            line-height: 1.6;
        }


        .documents {
            margin-top: 20px;
        }


        .documents-title {
            color: #cbd5e1;
            font-size: 13px;
            margin-bottom: 10px;
        }


        .document {
            display: block;

            padding: 9px 11px;

            margin-bottom: 7px;

            background: rgba(255,255,255,.04);

            border-radius: 8px;

            color: #a5b4fc;

            font-size: 12px;

            transition: .3s;
        }


        .document:hover {
            background: rgba(139,92,246,.15);
            transform: translateX(5px);
        }


        .no-doc {
            color: #64748b;
            font-size: 12px;
        }


        /* =====================================================
           PROJECTS
           ===================================================== */

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }


        .project {
            padding: 30px;

            border-radius: 22px;

            background: rgba(255,255,255,.035);

            border: 1px solid rgba(255,255,255,.08);

            transition: .4s;
        }


        .project:hover {
            transform: translateY(-8px);
            border-color: rgba(139,92,246,.5);
        }


        .project h3 {
            margin-bottom: 12px;
        }


        .project p {
            color: #94a3b8;
            line-height: 1.7;
            font-size: 14px;
        }


        /* =====================================================
           SKILLS
           ===================================================== */

        .skills {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }


        .skill {
            padding: 22px;

            background: rgba(255,255,255,.035);

            border: 1px solid rgba(255,255,255,.08);

            border-radius: 15px;

            transition: .3s;
        }


        .skill:hover {
            transform: scale(1.03);
            border-color: #8b5cf6;
        }


        .skill-top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }


        .skill-top span:last-child {
            color: #8b5cf6;
        }


        .bar {
            height: 6px;
            background: #1e293b;
            border-radius: 20px;
            overflow: hidden;
        }


        .bar span {
            display: block;
            height: 100%;
            background: linear-gradient(90deg,#8b5cf6,#06b6d4);

            animation: loadBar 2s ease;
        }


        @keyframes loadBar {

            from {
                width: 0;
            }
        }


        /* =====================================================
           CONTACT
           ===================================================== */

        .contact-box {
            text-align: center;

            padding: 60px 30px;

            border-radius: 30px;

            background:
                linear-gradient(
                    135deg,
                    rgba(124,58,237,.12),
                    rgba(6,182,212,.08)
                );

            border: 1px solid rgba(255,255,255,.1);
        }


        .contact-box h2 {
            font-size: 35px;
            margin-bottom: 15px;
        }


        .contact-box p {
            color: #94a3b8;
            margin-bottom: 25px;
        }


        /* =====================================================
           FOOTER
           ===================================================== */

        footer {
            text-align: center;

            padding: 30px;

            border-top: 1px solid rgba(255,255,255,.08);

            color: #64748b;

            font-size: 13px;
        }


        /* =====================================================
           RESPONSIVE
           ===================================================== */

        @media (max-width: 900px) {

            .hero {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-text p {
                margin: auto;
            }

            .buttons {
                justify-content: center;
            }

            .modules-grid,
            .projects-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .skills {
                grid-template-columns: repeat(2, 1fr);
            }

            .photo-container {
                margin-top: 30px;
            }
        }


        @media (max-width: 650px) {

            nav {
                padding: 14px 16px;
            }

            .nav-links {
                display: none;
            }

            .hero {
                padding-top: 120px;
            }

            .photo-card {
                width: 280px;
                height: 380px;
            }

            .badge-one {
                left: -10px;
            }

            .badge-two {
                right: -10px;
            }

            .modules-grid,
            .projects-grid,
            .skills {
                grid-template-columns: 1fr;
            }

            section {
                padding: 70px 20px;
            }

            .section-title h2 {
                font-size: 32px;
            }

            .about-box {
                padding: 25px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     NAVBAR
     ===================================================== -->

<nav>

    <a href="#home" class="logo">
        Oumaima<span>.</span>
    </a>

    <ul class="nav-links">

        <li><a href="#about">About</a></li>

        <li><a href="#modules">Modules</a></li>

        <li><a href="#projects">Projects</a></li>

        <li><a href="#skills">Skills</a></li>

        <li><a href="#contact">Contact</a></li>

    </ul>

</nav>



<!-- =====================================================
     HERO
     ===================================================== -->

<header class="hero" id="home">


    <div class="hero-text">

        <span class="small-title">
            👩‍💻 Développement Digital · 2ème année
        </span>


        <h1>
            Hi, I'm <span>Oumaima</span>
        </h1>


        <h2>
            Étudiante en Développement Digital
        </h2>


        <p>
            Je suis une étudiante passionnée par le développement web
            et la création de solutions numériques modernes.
            Découvrez mon parcours, mes compétences et les travaux
            que je réalise durant ma formation.
        </p>


        <div class="buttons">

            <a href="#modules" class="btn btn-primary">
                Voir mes modules →
            </a>

            <a href="#contact" class="btn btn-outline">
                Me contacter
            </a>

        </div>

    </div>



    <!-- PHOTO -->

    <div class="photo-container">

        <div class="photo-card">

            <div class="photo-inner">

                <img
                    src="../public/images/oumi.jpg"
                    alt="Photo de Oumaima Elharti"
                >

            </div>


            <div class="badge badge-one">
                ✨ Web Developer
            </div>


            <div class="badge badge-two">
                💻 HTML · CSS · JS
            </div>

        </div>

    </div>

</header>



<!-- =====================================================
     ABOUT
     ===================================================== -->

<section id="about">

    <div class="section-title">

        <small>ABOUT ME</small>

        <h2>À propos de moi</h2>

        <p>
            Mon parcours et ma passion pour le développement digital
        </p>

    </div>


    <div class="about-box">

        <p>

            Je suis <strong>Oumaima Elharti</strong>, étudiante en
            <strong>2ème année de Développement Digital</strong>.

            <br><br>

            Passionnée par le développement web et la création
            de solutions numériques, je développe progressivement
            mes compétences à travers différents
            <strong>TD et TP</strong> réalisés durant ma formation.

            <br><br>

            Au cours de mon parcours, j'ai travaillé avec plusieurs
            technologies telles que
            <strong>HTML, CSS, JavaScript, PHP, SQL et Python</strong>.

            <br><br>

            Ce portfolio présente mon évolution, mes compétences,
            mes projets ainsi que les différents travaux réalisés
            dans chacun de mes modules.

        </p>

    </div>

</section>



<!-- =====================================================
     MODULES
     ===================================================== -->

<section id="modules">

    <div class="section-title">

        <small>MY LEARNING</small>

        <h2>Mes Modules</h2>

        <p>
            Retrouvez mes TD et TP réalisés dans chaque module.
        </p>

    </div>


    <div class="modules-grid">


        <?php foreach ($modules as $folder => $module): ?>

            <article class="module-card">

                <div class="module-icon">
                    <?= $module["icon"] ?>
                </div>


                <span class="module-code">
                    <?= htmlspecialchars($module["code"]) ?>
                </span>


                <h3>
                    <?= htmlspecialchars($module["title"]) ?>
                </h3>


                <p>
                    <?= htmlspecialchars($module["description"]) ?>
                </p>


                <div class="documents">

                    <div class="documents-title">
                        📁 Travaux :
                    </div>


                    <?php if (!empty($module["documents"])): ?>

                        <?php foreach ($module["documents"] as $document): ?>

                            <?php
                            /*
                             * rawurlencode permet aux espaces
                             * dans les noms PDF de fonctionner.
                             */

                            $url = "/docs/"
                                 . $folder
                                 . "/"
                                 . rawurlencode($document["file"]);
                            ?>


                            <a
                                href="<?= htmlspecialchars($url) ?>"
                                target="_blank"
                                class="document"
                            >

                                📄
                                <?= htmlspecialchars($document["name"]) ?>

                            </a>


                        <?php endforeach; ?>

                    <?php else: ?>

                        <span class="no-doc">
                            Aucun document pour le moment.
                        </span>

                    <?php endif; ?>

                </div>

            </article>

        <?php endforeach; ?>


    </div>

</section>



<!-- =====================================================
     PROJECTS
     ===================================================== -->

<section id="projects">

    <div class="section-title">

        <small>MY WORK</small>

        <h2>Projects</h2>

        <p>
            Quelques exemples de travaux et projets réalisés.
        </p>

    </div>


    <div class="projects-grid">


        <div class="project">

            <h3>🌐 Web Development</h3>

            <p>
                Création de pages web modernes avec HTML et CSS,
                accompagnées d'interactions JavaScript.
            </p>

        </div>


        <div class="project">

            <h3>🗄️ Database</h3>

            <p>
                Création et gestion de bases de données SQL,
                requêtes et manipulation des données.
            </p>

        </div>


        <div class="project">

            <h3>⚙️ PHP Application</h3>

            <p>
                Développement d'applications web dynamiques
                avec PHP et PDO.
            </p>

        </div>


    </div>

</section>



<!-- =====================================================
     SKILLS
     ===================================================== -->

<section id="skills">

    <div class="section-title">

        <small>MY SKILLS</small>

        <h2>Compétences</h2>

        <p>
            Technologies étudiées durant ma formation.
        </p>

    </div>


    <div class="skills">


        <div class="skill">

            <div class="skill-top">
                <span>HTML</span>
                <span>90%</span>
            </div>

            <div class="bar">
                <span style="width:90%"></span>
            </div>

        </div>


        <div class="skill">

            <div class="skill-top">
                <span>CSS</span>
                <span>85%</span>
            </div>

            <div class="bar">
                <span style="width:85%"></span>
            </div>

        </div>


        <div class="skill">

            <div class="skill-top">
                <span>JavaScript</span>
                <span>75%</span>
            </div>

            <div class="bar">
                <span style="width:75%"></span>
            </div>

        </div>


        <div class="skill">

            <div class="skill-top">
                <span>PHP</span>
                <span>80%</span>
            </div>

            <div class="bar">
                <span style="width:80%"></span>
            </div>

        </div>


        <div class="skill">

            <div class="skill-top">
                <span>SQL</span>
                <span>80%</span>
            </div>

            <div class="bar">
                <span style="width:80%"></span>
            </div>

        </div>


        <div class="skill">

            <div class="skill-top">
                <span>Python</span>
                <span>65%</span>
            </div>

            <div class="bar">
                <span style="width:65%"></span>
            </div>

        </div>


    </div>

</section>



<!-- =====================================================
     CONTACT
     ===================================================== -->

<section id="contact">

    <div class="contact-box">

        <h2>Let's work together ✨</h2>

        <p>
            Vous souhaitez découvrir mon travail ou échanger avec moi ?
        </p>


        <a
            href="mailto:oumaima.elharti@example.com"
            class="btn btn-primary"
        >
            ✉ Me contacter
        </a>

    </div>

</section>



<!-- =====================================================
     FOOTER
     ===================================================== -->

<footer>

    © <?= date("Y") ?> Oumaima Elharti · Portfolio

</footer>



<!-- =====================================================
     JAVASCRIPT
     ===================================================== -->

<script>

    /* Animation quand on arrive sur les sections */

    const sections = document.querySelectorAll("section");


    const observer = new IntersectionObserver(

        function(entries) {

            entries.forEach(function(entry) {

                if (entry.isIntersecting) {

                    entry.target.style.opacity = "1";

                    entry.target.style.transform = "translateY(0)";

                }

            });

        },

        {
            threshold: 0.12
        }

    );


    sections.forEach(function(section) {

        section.style.opacity = "0";

        section.style.transform = "translateY(40px)";

        section.style.transition = "opacity .8s ease, transform .8s ease";

        observer.observe(section);

    });


</script>


</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/app/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/app/css/home.css">

</head>
<?php
$page = "home";

?>

<body>
    <?php include "components/header.php" ?>

    <main class="container-fluid">
        <div id="toggler-side-menu" onclick='document.getElementById("side-menu").classList.toggle("open");'>
            <i class="material-icons">menu</i>
        </div>
        <div id="side-menu">
            <?php
            include "components/navbar.php"
            ?>
        </div>
        <div class="content">
        <section>
        <p class="intestazione"> Benvenuti su Quiz Online! </p>
            <p class="lead">Qui troverete informazioni utili per facilitare l'utilizzo del sito e aggiornamenti sui nostri servizi.</p>
        
            <div class="gif-container">
                <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExeG12M3kxZWg0ejBicHNyb3BwNmlrM25zc3kzb2RyNGxleTk3aXgxMSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/8hmpCDQbnOhUe47Raa/giphy.gif" class="img-fluid">
            </div>
        </section>
        <section class="site-structure">
            <div>
                <h2>Esplora il sito</h2>
                <p>Scopri la struttura del sito e come navigare facilmente.</p>
            </div>

            <div class="article-container">
                <article class="site-feature">
                    <div class="feature-icon">
                        <i class="material-icons">home</i>
                        <h3>Home</h3>
                    </div>
                    <div class="feature-content">
                        <p class="description">La pagina principale del sito, ricca di informazioni utili.</p>
                    </div>
                </article>

                <article class="site-feature">
                    <div class="feature-icon">
                        <i class="material-icons">people</i>
                        <h3>Utenti</h3>
                    </div>
                    <div class="feature-content">
                        <p class="description">Esplora tutti gli utenti iscritti e le loro informazioni.</p>
                    </div>
                </article>

                <article class="site-feature">
                    <div class="feature-icon">
                        <i class="material-icons">question_answer</i>
                        <h3>Quiz</h3>
                    </div>
                    <div class="feature-content">
                        <p class="description">Scopri tutti i quiz disponibili e mettiti alla prova!</p>
                    </div>
                </article>

                <article class="site-feature">
                    <div class="feature-icon">
                        <i class="material-icons">comment</i>
                        <h3>Partecipazioni</h3>
                    </div>
                    <div class="feature-content">
                        <p class="description">Consulta le partecipazioni passate e modifica i dettagli.</p>
                    </div>
                </article>

                <article class="sidebar-navigation">
                    <div class="feature-content">
                        <h2>Barra di navigazione laterale</h2>
                        <p>Esplora le sezioni del sito e utilizza il filtro di ricerca.</p>
                    </div>
                </article>
            </div>
        </section>

        <section>
            <h2>Tools utilizzati</h2>
            <p>Qui trovi un elenco dei tools utilizzati per creare questo sito.</p>
            <div class="polaroid-container">
                    <div class="tool-card">
                <i class="fas fa-code tool-icon"></i>
                <img src="https://raw.githubusercontent.com/f-uni/uvette_web1/main/app/assets/vsc.jpg" alt="Visual Studio Code" class="tool-image">
                <div class="tool-name">Visual Studio Code</div>
                <div class="tool-description">Un potente editor di codice sorgente.</div>
                <a href="https://code.visualstudio.com/" class="tool-link" target="_blank">Visita il sito</a>
            </div>
            <div class="tool-card">
                <i class="fab fa-html5 tool-icon"></i>
                <img src="https://raw.githubusercontent.com/f-uni/uvette_web1/main/app/assets/html.jpg" alt="HTML" class="tool-image">
                <div class="tool-name">HTML</div>
                <div class="tool-description">Il linguaggio standard per creare pagine web.</div>
                <a href="https://developer.mozilla.org/en-US/docs/Web/HTML" class="tool-link" target="_blank">Visita il sito</a>
            </div>
            <div class="tool-card">
                <i class="fab fa-css3-alt tool-icon"></i>
                <img src="https://raw.githubusercontent.com/f-uni/uvette_web1/main/app/assets/css.jpg" alt="CSS" class="tool-image">
                <div class="tool-name">CSS</div>
                <div class="tool-description">Utilizzato per descrivere la presentazione di un documento HTML.</div>
                <a href="https://developer.mozilla.org/en-US/docs/Web/CSS" class="tool-link" target="_blank">Visita il sito</a>
            </div>
            <div class="tool-card">
                <i class="fab fa-js tool-icon"></i>
                <img src="https://raw.githubusercontent.com/f-uni/uvette_web1/main/app/assets/JavaScript.png" alt="JavaScript" class="tool-image">
                <div class="tool-name">JavaScript</div>
                <div class="tool-description">Un linguaggio di programmazione che consente di creare contenuti dinamici.</div>
                <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" class="tool-link" target="_blank">Visita il sito</a>
            </div>
            <div class="tool-card">
                <i class="fab fa-php tool-icon"></i>
                <img src="https://raw.githubusercontent.com/f-uni/uvette_web1/main/app/assets/php.png" alt="php" class="tool-image">
                <div class="tool-name">PHP</div>
                <div class="tool-description">Un linguaggio di scripting lato server progettato per lo sviluppo web.</div>
                <a href="https://www.php.net/" class="tool-link" target="_blank">Visita il sito</a>
            </div>
            
            <div class="tool-card">
                <i class="fas fa-server tool-icon"></i>
                <img src="https://raw.githubusercontent.com/f-uni/uvette_web1/main/app/assets/Altervista.png" alt="Altervista" class="tool-image">
                <div class="tool-name">Altervista</div>
                <div class="tool-description">Un servizio di hosting web gratuito per i tuoi progetti.</div>
                <a href="https://it.altervista.org/" class="tool-link" target="_blank">Visita il sito</a>
            </div>
        
        </section>


        <section>
            <h2>Palette di colori</h2>
            <p>Questa sezione mostra la palette di colori utilizzata per il design del sito.</p>
                    

        <div class="polaroid-container">
        <div class="polaroid">
            <div class="color-box" style="background-color: var(--footer-color);"></div>
            <p>Purple pizza</p>
            <p>#FF45D0</p>
        </div>
        <div class="polaroid">
            <div class="color-box" style="background-color: var(--accent-color);"></div>
            <p>Shocking pink</p>
            <p>#FF00BF</p>
        </div>
        <div class="polaroid">
            <div class="color-box" style="background-color: var(--accent-color-soft);"></div>
            <p>Lavander pink</p>
            <p>#FFA3DF</p>
        </div>
        <div class="polaroid">
            <div class="color-box" style="background-color: var(--contrast-color);"></div>
            <p>Maize</p>
            <p>#FFF172</p>
        </div>
        <div class="polaroid">
            <div class="color-box" style="background-color: var(--contrast-color-soft);"></div>
            <p>Lemon ciffon</p>
            <p>#FFFBB8</p>
        </div>
                
    </main>
    <?php
    include "components/footer.html"
    ?>
</body>
<script>
    
</script>
</html>
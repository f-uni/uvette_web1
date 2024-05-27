<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            <p class="lead">Scopri come utilizzare al meglio il nostro sito e rimani aggiornato con le ultime novità!</p>
            <div class="gif-container">
                <img src="/app/assets/giphy.gif" alt="Welcome GIF" class="img-fluid">
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
            
        <section class="features-section">
            <h2>Funzionalità del Sito</h2>
            <div class="features-container">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="material-icons">people</i>
                    </div>
                    <h3>Gestione utenti</h3>
                    <p>Cliccando sul numero di partecipazioni, verrai reindirizzato alla pagina "partecipazioni", dove potrai visualizzare tutte le attività svolte da quell'utente (la barra laterale del nome utente verrà compilata automaticamente). 
                        Nel menu dei filtri laterali, nella barra di ricerca potrai digitare il nome utente desiderato per visualizzare tutti gli utenti che contengono quella stringa nel loro nome.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="material-icons">question_answer</i>
                    </div>
                    <h3>Quiz disponibili</h3>
                    <p>Interagisci con la tabella: clicca sulla riga per aprire una nuova finestra con il quiz corrispondente, sul nome del creatore per visualizzare il suo profilo nella pagina "utenti" e sul numero di partecipazioni per vedere, nella specifica pagina, l'elenco completo di tutte le partecipazioni relative a quel quiz. 
                        <em><br><small>Il codice quiz è disponibile per semplificare le operazioni di modifica e aggiunta nel CRUD delle partecipazioni.</br></small></em></p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="material-icons">comment</i>
                    </div>
                    <h3>Partecipazioni</h3>
                    <p>Clicca su una partecipazione per modificarla, eliminarla o visualizzarne i dettagli. In basso a destra, troverai l'icona "+" per aggiungere facilmente nuove partecipazioni tramite una finestra di dialogo. 
                        Nella visualizzazione del quiz compilato dall'utente, le risposte corrette sono evidenziate con un bordo verde, mentre quelle errate con un bordo rosso.</p>
                </div>
            </div>
        </section>

        <section class="date-filters-section">
            <h2 class="section-title">Filtri sulle Date</h2>
            <ul class="date-filters">
                <li><strong>Solo data di inizio:</strong> Se viene inserita solo la data di inizio, verranno mostrati i quiz che iniziano dopo la data specificata, indipendentemente dalla data di fine.</li>
                <li><strong>Solo data di fine:</strong> Se viene inserita solo la data di fine, verranno visualizzati i quiz che terminano prima della data specificata, indipendentemente dalla data di inizio.</li>
                <li><strong>Entrambe le date:</strong> Se vengono inserite entrambe le date, i quiz visualizzati saranno quelli che iniziano dopo la data di inizio, quelli che terminano prima della data di fine e quelli il cui periodo di svolgimento è compreso tra le due date specificate.</li>
            </ul>
        </section>

        <section>
            <h2>Tools utilizzati</h2>
            <p>Qui trovi un elenco dei tools utilizzati per creare questo sito.</p>
            <div class="polaroid-container">
                    <div class="tool-card">
                <i class="fas fa-code tool-icon"></i>
                <img src="/app/assets/vsc.jpg" alt="Visual Studio Code" class="tool-image">
                <div class="tool-name">Visual Studio Code</div>
                <div class="tool-description">Un potente editor di codice sorgente.</div>
                <a href="https://code.visualstudio.com/" class="tool-link" target="_blank">Visita il sito</a>
            </div>
            <div class="tool-card">
                <i class="fab fa-html5 tool-icon"></i>
                <img src="/app/assets/html.jpg" alt="HTML" class="tool-image">
                <div class="tool-name">HTML</div>
                <div class="tool-description">Il linguaggio standard per creare pagine web.</div>
                <a href="https://developer.mozilla.org/en-US/docs/Web/HTML" class="tool-link" target="_blank">Visita il sito</a>
            </div>
            <div class="tool-card">
                <i class="fab fa-css3-alt tool-icon"></i>
                <img src="/app/assets/css.jpg" alt="CSS" class="tool-image">
                <div class="tool-name">CSS</div>
                <div class="tool-description">Utilizzato per descrivere la presentazione di un documento HTML.</div>
                <a href="https://developer.mozilla.org/en-US/docs/Web/CSS" class="tool-link" target="_blank">Visita il sito</a>
            </div>
            <div class="tool-card">
                <i class="fab fa-js tool-icon"></i>
                <img src="/app/assets/JavaScript.png" alt="JavaScript" class="tool-image">
                <div class="tool-name">JavaScript</div>
                <div class="tool-description">Un linguaggio di programmazione che consente di creare contenuti dinamici.</div>
                <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" class="tool-link" target="_blank">Visita il sito</a>
            </div>
            <div class="tool-card">
                <i class="fab fa-php tool-icon"></i>
                <img src="/app/assets/php.png" alt="php" class="tool-image">
                <div class="tool-name">PHP</div>
                <div class="tool-description">Un linguaggio di scripting lato server progettato per lo sviluppo web.</div>
                <a href="https://www.php.net/" class="tool-link" target="_blank">Visita il sito</a>
            </div>
            
            <div class="tool-card">
                <i class="fas fa-server tool-icon"></i>
                <img src="/app/assets/Altervista.png" alt="Altervista" class="tool-image">
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

</html>
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
                    </section>
                    <div class="gif-container">
                        <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExbGIxdjIzZ3Vhc2U3MjhqZ3g0dXk2dGo1aHdqbHR6emIyYjExMGQwciZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/UJwM7mwAo8IR7VNI2T/giphy.gif" class="img-fluid">
                    </div>
                    <section>
                        <h2>Struttura ed utilizzo del sito</h2>
                        <p>Questa sezione descrive la struttura e come navigare ed utilizzare il sito web.</p>
                        <ol class="list-group">
                            <li class="list-group-item">
                                <i class="material-icons">home</i>
                                <a> Home: </a>
                                <p>La pagina principale del sito.</p>
                            </li>
                            <li class="list-group-item">
                                <i class="material-icons">people</i>
                                <a> Utenti: </a>
                                <p>Informazioni sugli utenti iscritti.</p>
                            </li>
                            <li class="list-group-item">
                                <i class="material-icons">question_answer</i>
                                <a>Quiz:   </a>
                                <p>Elenco di tutti i quiz disponibili.</p>
                            </li>
                            <li class="list-group-item">
                                <i class="material-icons">comment</i>
                                <a>Partecipazioni:   </a>
                                <p>Storico delle partecipazioni ai quiz.</p>
                            </li>
                        </ol>

                        <article>
                            <h3>1. Home</h3>
                            <p>La Home è la pagina principale che si apre all'avvio del sito.</p>
                            <p>In questa sezione abbiamo inserito tutte le informazioni fondamentali.</p>
                        </article>

                        <article>
                            <h3>2. Utenti</h3>
                            <p>La pagina Utenti contiene una tabella con tutti gli utenti iscritti al sito, suddivisi per:</p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome utente</th>
                                        <th>Nome</th>
                                        <th>Cognome</th>
                                        <th>Email</th>
                                        <th>Partecipazioni</th>
                                    </tr>
                                </thead>
                            </table>
                            <p>Cliccando su "Partecipazioni", si aprirà una pagina con l'elenco dei quiz che l'utente ha svolto.</p>
                        </article>
                        <article>
                            <h3>3. Quiz</h3>
                            <p>La pagina Quiz contiene una tabella con tutti i quiz disponibili nel sito, suddivisi per:</p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Codice</th>
                                        <th>Titolo</th>
                                        <th>Creatore</th>
                                        <th>Data Inizio</th>
                                        <th>Data Fine</th>
                                        <th>Partecipazioni</th>
                                    </tr>
                                </thead>
                            </table>
                               
                            <p>Cliccando sulla riga, si aprirà la pagina relativa al quiz selezionato.</p>
                        </article>

                        <article>
                            <h3>4. Partecipazioni</h3>
                            <p>La pagina Partecipazioni contiene una tabella con tutti i quiz disponibili nel sito, suddivisi per:</p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Codice</th>
                                        <th>Utente</th>
                                        <th>Codice Quiz</th>
                                        <th>Quiz</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                            </table>
                        
                            <p>Cliccando sulla riga, si aprirà un pop-up che permette di modificare la partecipazione.</p>
                        </article>

                        <article>
                            <h3>Barra di navigazione laterale</h3>
                            <p>Sulla sinistra è presente una barra di navigazione divisa in due parti:</p>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a>Menù:</a>
                                    <p> presenta le quattro sezioni che rimandano alle rispettive pagine dedicate.</p>
                                </li>
                                <li class="list-group-item">
                                    <a>Filtro di ricerca:</a>
                                    <p> permette di cercare ciò che desideri.</p>
                                </li>
                            </ul>
                            <p>La ricerca effettuata verrà mantenuta in memoria per permetterti di vedere ciò che hai cercato. Se vuoi cancellare la ricerca, premi il tasto "Reset".</p>
                        </article>
                    </section>

                    <section>
                        <h2>Tools utilizzati</h2>
                        <p>Qui trovi un elenco dei tools utilizzati per creare questo sito.</p>
                    </section>

                    <section>
                        <h2>Palette di colori</h2>
                        <p>Questa sezione mostra la palette di colori utilizzata per il design del sito.</p>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <?php
    include "components/footer.html"
    ?>
</body>
<script>
    
</script>
</html>
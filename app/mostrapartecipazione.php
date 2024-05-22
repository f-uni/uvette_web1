<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/app/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/app/css/mostrapartecipazione.css">
</head>
<?php
$codice = $_GET['codice'];
include "util/connect.php";

$sql = 'SELECT domanda.quiz, domanda.numero, domanda.testo as domanda, risposta.testo as risposta, risposta.tipo
FROM `risposta_utente_quiz` JOIN domanda ON domanda.numero=risposta_utente_quiz.domanda AND risposta_utente_quiz.quiz=domanda.quiz 
JOIN risposta ON risposta_utente_quiz.quiz=risposta.quiz AND risposta_utente_quiz.domanda=risposta.domanda AND risposta_utente_quiz.risposta=risposta.numero
WHERE partecipazione=:codice'; //partecipazione=:codice

$stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$stmt->execute(['codice'=>$codice]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT *
        FROM quiz 
        WHERE codice=:quiz';

$stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$stmt->execute(['quiz'=>$result[0]['quiz']]);
$titolo = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["titolo"];

?>

<body>
    <?php include "components/header.php" ?>


    <main>
        <div class="content">
           <p class="intestazione"> Stai guardando il Quiz: <?php echo $titolo; ?> </p>
            <div>
                <div class="domanda">
                    <?php
                    foreach ($result as $row){ ?>
                    <div class="blocco">
                        <p class='testodomanda'> DOMANDA <?php echo $row['numero'].". ".$row['domanda']; ?> </p> 
                        
                        <?php
                        echo "<div class=' " . $row['tipo'] . " '>";
                        
                        echo "<p>".$row['risposta']."</p>";
                        ?>
                        </div>
                    </div>    
                    <?php
                    }
                    ?>
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
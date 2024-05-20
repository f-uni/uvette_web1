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

$sql = 'SELECT *
        FROM quiz 
        WHERE codice=:quiz';

$stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$stmt->execute(['quiz'=>$quiz]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$titolo = $result[0]['titolo'];

/* $sql = 'SELECT *
        FROM domanda 
        WHERE quiz=:quiz';
*/

$sql = 'SELECT domanda.numero, domanda.testo, risposta.testo, risposta.tipo
FROM `risposta_utente_quiz` JOIN domanda ON domanda.numero=risposta_utente_quiz.domanda AND risposta_utente_quiz.quiz=domanda.quiz 
JOIN risposta ON risposta_utente_quiz.quiz=risposta.quiz AND risposta_utente_quiz.domanda=risposta.domanda AND risposta_utente_quiz.risposta=risposta.numero
WHERE partecipazione=1'; //partecipazione=:codice

$stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$stmt->execute(['codice'=>$codice]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                        <p class='testodomanda'> DOMANDA <?php echo $row['domanda.numero'].". ".$row['domanda.testo']; ?> </p> 
                        
                        <?php
                        echo "<div class=' " . $row['risposta.tipo'] . " '>";
                        
                        echo "<p>".$row['risposta.testo']."</p>";
                        ?>
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
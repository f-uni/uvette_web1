<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/app/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/app/css/mostraquiz.css">
</head>
<?php
$quiz = $_GET['quiz'];
include "util/connect.php";

$sql = 'SELECT *
        FROM quiz 
        WHERE codice=:quiz';

$stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$stmt->execute(['quiz'=>$quiz]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$titolo = $result[0]['titolo'];

$sql = 'SELECT *
        FROM domanda 
        WHERE quiz=:quiz';

$stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$stmt->execute(['quiz'=>$quiz]);
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
                        <p class='testodomanda'> DOMANDA <?php echo $row['numero'].". ".$row['testo']; ?> </p> 
                    
                        <div class="risposte">
                        <?php
                        $sql = 'SELECT *
                                FROM risposta 
                                WHERE quiz=:quiz AND domanda=:domanda';
                        
                        $stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
                        $stmt->execute(['quiz'=>$quiz, 'domanda'=>$row['numero']]);
                        $risposte = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        shuffle($risposte);
                        foreach ($risposte as $risp){
                            echo "<p>".$risp['testo']."</p>";
                        }
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
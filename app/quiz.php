<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/app/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
</head>
<?php
include "util/connect.php";
$page = "quiz";

$sql = 'SELECT quiz.codice, quiz.titolo, quiz.creatore, CAST(quiz.data_inizio AS DATE) AS data_inizio, CAST(quiz.data_fine AS DATE) AS data_fine, 
        (CASE 
            WHEN partecipazione.codice IS NULL THEN 0
            ELSE COUNT(partecipazione.codice)
            END) AS partecipazioni
        FROM quiz 
        LEFT JOIN partecipazione ON quiz.codice=partecipazione.quiz
        WHERE 1=1 ';
$params = [];
if (array_key_exists('codice', $_GET) && $_GET["codice"] != "") {
    $sql .= 'AND quiz.codice = :codice ';
    $params["codice"] = $_GET["codice"];
}
if (array_key_exists('titolo', $_GET)) {
    $sql .= 'AND titolo like :titolo ';
    $params["titolo"] = "%" . $_GET["titolo"] . "%";
}
if (array_key_exists('creatore', $_GET)) {
    $sql .= 'AND creatore like :creatore ';
    $params["creatore"] = "%" . $_GET["creatore"] . "%";
}
if (array_key_exists('data_inizio', $_GET) && $_GET["data_inizio"] != "") {
    if (array_key_exists('data_fine', $_GET) && $_GET["data_fine"] != "") {
        //entrambe le date
        $sql .= 'AND ((data_inizio BETWEEN :data_inizio AND :data_fine) AND (data_fine BETWEEN :data_inizio AND :data_fine)) ';
        $params["data_inizio"] = $_GET["data_inizio"] . " 00:00:00";
        $params["data_fine"] = $_GET["data_fine"] . " 23:59:59";
    } else {
        //solo data inizio
        $sql .= 'AND data_inizio >= :data_inizio ORDER BY data_inizio ';
        $params["data_inizio"] = $_GET["data_inizio"] . " 00:00:00";
    }
} else {
    if (array_key_exists('data_fine', $_GET) && $_GET["data_fine"] != "") {
        //solo data fine
        $sql .= 'AND data_fine <= :data_fine ORDER BY data_fine ';
        $params["data_fine"] = $_GET["data_fine"] . " 23:59:59";
    }
}

$sql.= 'GROUP BY quiz.codice';

$stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$stmt->execute($params);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<body>
    <?php include "components/header.php" ?>

    <main>
        <div id="toggler-side-menu" onclick='document.getElementById("side-menu").classList.toggle("open");'>
            <i class="material-icons">menu</i>
        </div>
        <div id="side-menu">
            <?php
            include "components/navbar.php"
            ?>
            <hr>
            <div id="filter">
                <form action="">

                    <label for="codice">Codice</label>
                    <input type="number" placeholder="Codice" name="codice" value="<?php echo $_GET["codice"]; ?>">

                    <label for="titolo">Titolo</label>
                    <input type="text" placeholder="Titolo" name="titolo" value="<?php echo $_GET["titolo"]; ?>">

                    <label for="creatore">Creatore</label>
                    <input type="text" placeholder="Creatore" name="creatore" value="<?php echo $_GET["creatore"]; ?>">

                    <p>Ricerca quiz attivi</p>

                    <label for="data_inizio">Data Inizio</label>
                    <input type="date" name="data_inizio" value="<?php echo $_GET["data_inizio"]; ?>">

                    <label for="data_fine">Data Fine</label>
                    <input type="date" name="data_fine" value="<?php echo $_GET["data_fine"]; ?>">

                    <br>
                    <input type="submit" value="Invia">
                    <input type="reset" value="Reset" onclick="reset()">

                </form>
            </div>

        </div>
        <div class="content">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <th>Codice</th>
                        <th>Titolo</th>
                        <th>Creatore</th>
                        <th>Data Inizio</th>
                        <th>Data Fine</th>
                        <th>Partecipazioni</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            $json = json_encode($row);
                            echo "<tr class='selectable'  onclick='displayQuiz(event, " . $json . ")'>
                                    <td>{$row['codice']}</td>
                                    <td>{$row['titolo']}</td>
                                    <td><a href='/app/utenti.php?nome_utente={$row['creatore']}'>{$row['creatore']}</a></td>
                                    <td>{$row['data_inizio']}</td>
                                    <td>{$row['data_fine']}</td>
                                    <td><a href='/app/partecipazioni.php?titolo={$row['titolo']}'>{$row['partecipazioni']}</a></td>

                                </tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </main>

    


    <?php
    include "components/footer.html"
    ?>

<script src="js/quiz.js"></script>
<script src="js/form.js"></script> 

</body>

</html>
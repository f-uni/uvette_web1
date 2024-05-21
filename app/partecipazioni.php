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
$page = "partecipazioni";

$sql = 'SELECT partecipazione.codice, partecipazione.utente, partecipazione.quiz, CAST(partecipazione.data AS DATE) AS data, quiz.titolo as titolo 
        FROM partecipazione 
        INNER JOIN quiz ON quiz.codice=partecipazione.quiz WHERE 1=1 ';


if (array_key_exists('titolo', $_GET)) {
    $sql .= 'AND titolo like :titolo ';
    $params["titolo"] = "%".$_GET["titolo"]."%";
}
if (array_key_exists('utente', $_GET)) {
    $sql .= 'AND utente like :utente ';
    $params["utente"] = "%".$_GET["utente"]."%";
}
if (array_key_exists('data_inizio', $_GET) && $_GET["data_inizio"]!="") {
    if (array_key_exists('data_fine', $_GET) && $_GET["data_fine"]!="") {
        //entrambe le date
        $sql .= 'AND (data BETWEEN :data_inizio AND :data_fine) ';
        $params["data_inizio"] = $_GET["data_inizio"]." 00:00:00";
        $params["data_fine"] = $_GET["data_fine"]." 23:59:59";
    }else{
        //solo data inizio
        $sql .= 'AND data >= :data_inizio ORDER BY data';
        $params["data_inizio"] = $_GET["data_inizio"]." 00:00:00";
    }
}else{
    if (array_key_exists('data_fine', $_GET) && $_GET["data_fine"]!="") {
        //solo data fine
        $sql .= 'AND data <= :data_fine ORDER BY data';
        $params["data_fine"] = $_GET["data_fine"]." 23:59:59";
    }
}

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
                <form action="#">
                    <label for="utente">Utente</label>
                    <input type="text" placeholder="Utente" name="utente" value="<?php echo $_GET["utente"];?>" >

                    <label for="titolo">Titolo Quiz</label>
                    <input type="text" placeholder="Titolo Quiz" name="titolo" value="<?php echo $_GET["titolo"];?>">

                    <label for="data_inizio">Data Inizio</label>
                    <input type="date"name="data_inizio" value="<?php echo $_GET["data_inizio"];?>">
                    
                    <label for="data_fine">Data Fine</label>
                    <input type="date"name="data_fine" value="<?php echo $_GET["data_fine"];?>">

                    <br>
                    <input type="submit" value="Invia">

                </form>
            </div>

        </div>
        <div class="content">

            <div class="table-wrapper">
                <table>
                    <thead>
                        <th>Codice</th>
                        <th>Utente</th>
                        <th>Codice Quiz</th>
                        <th>Quiz</th>
                        <th>Data</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($result as $row) {
                                $json=json_encode($row);
                                echo "<tr class='selectable' onclick='displayPartecipazione(event, ".$json.")'>
                                    <td>{$row['codice']}</td>
                                    <td>{$row['utente']}</td>
                                    <td>{$row['quiz']}</td>
                                    <td>{$row['titolo']}</td>
                                    <td>{$row['data']}</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
                
                <button class="elevated" id="create-btn"><i class="material-icons">add</i></button>
            </div>
        </div>
    </main>
    <dialog id="UDdialog">
        <div class="actions">
            <button class="elevated" id="viewBtn" value="default"><i class="material-icons">visibility</i>Mostra</button>
            <button class="elevated" id="deleteBtn" value="default"><i class="material-icons">delete</i></button>
        </div>
         
        <form>
            
            <label for="utente">Utente</label>
            <input type="text" placeholder="Utente" name="utente" id="input-utente">

            <label for="quiz">Codice Quiz</label>
            <input type="number" placeholder="Codice Quiz" name="quiz" id="input-quiz">
            
            <label for="titolo">Titolo Quiz</label>
            <input type="text" placeholder="Titolo Quiz" name="titolo" id="input-titolo-quiz" disabled>
            
            <label for="data">Data partecipazione</label>
            <input type="date"name="data" id="input-data" >
            
        </form>
        <div class="actions">
            <button class="elevated" id="updateBtn" value="default"><i class="material-icons">edit</i>Modifica</button>
            <button id="js-close" formmethod="dialog">Annulla</button>
        </div>
    </dialog>

    <dialog id="Cdialog">
        
        <form id="insertForm">
            <label for="utente">Utente</label>
            <input type="text" placeholder="Utente" name="utente" id="input-utente-create">
            
            <label for="quiz">Codice Quiz</label>
            <input type="number" placeholder="Codice Quiz" name="quiz" id="input-quiz-create">
            
            <label for="titolo">Titolo Quiz</label>
            <input type="text" placeholder="Titolo Quiz" name="titolo" id="input-titolo-quiz-create" disabled>
            
            <label for="data">Data partecipazione</label>
            <input type="date"name="data" id="input-data-create" >
            
        </form>
        <div class="actions">
            <button class="elevated" id="confirmBtn" value="default">Salva</button>
            <button id="js-close-create" formmethod="dialog">Annulla</button>
        </div>
    </dialog>
    <?php
    include "components/footer.html"
    ?>

<script src="js/partecipazioni.js"></script> 
</body> 
</html>
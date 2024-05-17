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

$sql = 'SELECT partecipazione.*, quiz.titolo as titolo FROM partecipazione 
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
                                echo "<tr class='selectable' onclick='displayPartecipazione(".$json.")'>
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
            </div>
        </div>
    </main>
    <dialog id="dialog">
        
        <button id="deleteBtn" value="default">Elimina</button>
        <form>
            
            <label for="utente">Utente</label>
            <input type="text" placeholder="Utente" name="utente" id="input-utente">

            <label for="titolo">Titolo Quiz</label>
            <input type="text" placeholder="Titolo Quiz" name="titolo">
            
            <label for="data">Data partecipazione</label>
            <input type="date"name="data" >
            
            <div>
                <button id="js-close" formmethod="dialog">Annulla</button>
                <button id="confirmBtn" value="default">Modifica</button>
            </div>
        </form>
    </dialog>
    <?php
    include "components/footer.html"
    ?>
</body>
<script src="js/partecipazioni.js"></script>  
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/app/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="js/quiz.js"></script>
</head>
<?php
include "util/connect.php";
$page = "quiz";

$sql = 'SELECT * FROM quiz WHERE 1=1 ';
$params=[];
if (array_key_exists('codice', $_GET) && $_GET["codice"]!="") {
    $sql .= 'AND codice = :codice ';
    $params["codice"] = $_GET["codice"];
}
if (array_key_exists('titolo', $_GET)) {
    $sql .= 'AND titolo like :titolo ';
    $params["titolo"] = "%".$_GET["titolo"]."%";
}
if (array_key_exists('creatore', $_GET)) {
    $sql .= 'AND creatore like :creatore ';
    $params["creatore"] = "%".$_GET["creatore"]."%";
}
if (array_key_exists('data_inizio', $_GET) && $_GET["data_inizio"]!="") {
    if (array_key_exists('data_fine', $_GET) && $_GET["data_fine"]!="") {
        //entrambe le date
        $sql .= 'AND ((data_inizio BETWEEN :data_inizio AND :data_fine) AND (data_fine BETWEEN :data_inizio AND :data_fine)) ';
        $params["data_inizio"] = $_GET["data_inizio"]." 00:00:00";
        $params["data_fine"] = $_GET["data_fine"]." 23:59:59";
    }else{
        //solo data inizio
        $sql .= 'AND data_inizio >= :data_inizio ';
        $params["data_inizio"] = $_GET["data_inizio"]." 00:00:00";
    }
}else{
    if (array_key_exists('data_fine', $_GET) && $_GET["data_fine"]!="") {
        //solo data fine
        $sql .= 'AND data_fine <= :data_fine ';
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
                <form action="">
                    
                    <label for="codice">Codice</label>
                    <input type="number" placeholder="Codice" name="codice" value="<?php echo $_GET["codice"];?>">

                    <label for="titolo">Titolo</label>
                    <input type="text" placeholder="Titolo" name="titolo" value="<?php echo $_GET["titolo"];?>">

                    <label for="creatore">Creatore</label>
                    <input type="text" placeholder="Creatore" name="creatore" value="<?php echo $_GET["creatore"];?>">

                    <label for="data_inizio">Data Inizio</label>
                    <input type="date"name="data_inizio" value="<?php echo $_GET["data_inizio"];?>">
                    
                    <label for="data_fine">Data Fine</label>
                    <input type="date"name="data_fine" value="<?php echo $_GET["data_fine"];?>">

                    <br>
                    
                    <input type="reset" value="Reset">
                    <input type="submit" value="Invia">

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
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            $json=json_encode($row);
                            echo "<tr class='selectable'  onclick='displayQuiz(".$json.")'>
                                    <td>{$row['codice']}</td>
                                    <td>{$row['titolo']}</td>
                                    <td>{$row['creatore']}</td>
                                    <td>{$row['data_inizio']}</td>
                                    <td>{$row['data_fine']}</td>
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
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/app/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="js/partecipazioni.js"></script>
</head>
<?php
include "util/connect.php";
$page = "partecipazioni";

$sql = 'SELECT partecipazione.*, quiz.titolo as titolo FROM partecipazione INNER JOIN quiz ON quiz.codice=partecipazione.quiz';
$stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$stmt->execute([]);
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
                    <label for="testo">Testo</label>
                    <input type="text" placeholder="Testo" name="testo">

                    <label for="data">Data</label>
                    <input type="date" placeholder="Data Inizio" name="data">

                    <label for="numero">Numero</label>
                    <input type="number" placeholder="Numero" name="numero">
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
    <?php
    include "components/footer.html"
    ?>
</body>

</html>
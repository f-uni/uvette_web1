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

$sql = 'SELECT * FROM quiz';
$params=[];
if (array_key_exists('nome_utente', $_GET)) {
    $sql .= ' AND nome_utente like :nome_utente ';
    $params["nome_utente"] = "%".$_GET["nome_utente"]."%";
}
if (array_key_exists('nome', $_GET)) {
    $sql .= ' AND nome like :nome ';
    $params["nome"] = "%".$_GET["nome"]."%";
}
if (array_key_exists('cognome', $_GET)) {
    $sql .= ' AND cognome like :cognome ';
    $params["cognome"] = "%".$_GET["cognome"]."%";
}
if (array_key_exists('email', $_GET)) {
    $sql .= ' AND email like :email ';
    $params["email"] = "%".$_GET["email"]."%";
}
$stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$stmt->execute($params);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<body>
    <?php include "components/header.php" ?>

    <main>
        <div class="side-menu">
            <?php
            include "components/navbar.php"
            ?>
            <hr>
            <div id="filter">
                <form action=".">

                    <label for="titolo">Titolo</label>
                    <input type="text" placeholder="Titolo" name="titolo">

                    <label for="creatore">Creatore</label>
                    <input type="text" placeholder="Creatore" name="creatore">

                    <label for="data_inizio">Data Inizio</label>
                    <input type="date"name="data_inizio">
                    
                    <label for="data_fine">Data Fine</label>
                    <input type="date"name="data_fine">

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
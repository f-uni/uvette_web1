<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/app/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<?php
include "util/connect.php";
$page = "utenti";

$sql = 'SELECT utente.*, (CASE 
            WHEN partecipazione.codice IS NULL THEN 0
            ELSE COUNT(partecipazione.codice)
            END) AS partecipazioni
        FROM utente 
        LEFT JOIN partecipazione ON utente.nome_utente=partecipazione.utente
        WHERE 1=1 ';
$params=[];
if (array_key_exists('nome_utente', $_GET)) {
    $sql .= 'AND nome_utente like :nome_utente ';
    $params["nome_utente"] = "%".$_GET["nome_utente"]."%";
}
if (array_key_exists('nome', $_GET)) {
    $sql .= 'AND nome like :nome ';
    $params["nome"] = $_GET["nome"]."%";
}
if (array_key_exists('cognome', $_GET)) {
    $sql .= 'AND cognome like :cognome ';
    $params["cognome"] = $_GET["cognome"]."%";
}
if (array_key_exists('email', $_GET)) {
    $sql .= 'AND email like :email ';
    $params["email"] = "%".$_GET["email"]."%";
}

$sql.= 'GROUP BY utente.nome_utente';

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
                    <label for="nomeutente">Nome utente</label>
                    <input type="text" placeholder="Nome utente" name="nome_utente" value="<?php echo $_GET["nome_utente"];?>">


                    <label for="nome">Nome</label>
                    <input type="text" placeholder="Nome" name="nome" value="<?php echo $_GET["nome"];?>">


                    <label for="cognome">Cognome</label>
                    <input type="text" placeholder="Cognome" name="cognome" value="<?php echo $_GET["cognome"];?>">


                    <label for="email">Email</label>
                    <input type="text" placeholder="Email" name="email" value="<?php echo $_GET["email"];?>">
                    
                    
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
                        <th>Nome utente</th>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Email</th>
                        <th>Partecipazioni</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            echo "<tr>
                                <td>{$row['nome_utente']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$row['cognome']}</td>
                                <td>{$row['email']}</td>
                                <td><a href='/app/partecipazioni.php?utente={$row['nome_utente']}'>{$row['partecipazioni']}</a></td>
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
</body>

</html>
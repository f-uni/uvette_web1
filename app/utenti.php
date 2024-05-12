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

    $sql = 'SELECT * FROM utente';
    $stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $stmt->execute([]);
    $result = $stmt->fetchAll();

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
                <form action="#">
                    <label for="nomeutente">Nome utente</label>
                    <input type="text" placeholder="Nome utente" name="nomeutente">


                    <label for="nome">Nome</label>
                    <input type="text" placeholder="Nome" name="nome">


                    <label for="cognome">Cognome</label>
                    <input type="text" placeholder="Cognome" name="cognome">


                    <label for="email">Email</label>
                    <input type="text" placeholder="Email" name="email">
                    <input type="submit">
                </form>
            </div>

        </div>
        <div class="content">

            <table>
                <thead>
                    <th>Nome utente</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $row){
                            echo "<tr>
                                <td>{$row['nome_utente']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$row['cognome']}</td>
                                <td>{$row['email']}</td>
                                <td>dato</td>
                            </tr>";
                        }
                    ?>
                </tbody>

            </table>
        </div>
    </main>
    <?php
    include "components/footer.html"
    ?>
</body>

</html>
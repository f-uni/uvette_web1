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
    $page="quiz";

    $sql = 'SELECT * FROM quiz';
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

            <table>
                <thead>
                    <th>Codice</th>
                    <th>Creatore</th>
                    <th>Titolo</th>
                    <th>Data Inizio</th>
                    <th>Data Fine</th>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $row){
                            echo "<tr class='selectable'>
                                    <td>{$row['codice']}</td>
                                    <td>{$row['creatore']}</td>
                                    <td>{$row['titolo']}</td>
                                    <td>{$row['data_inizio']}</td>
                                    <td>{$row['data_fine']}</td>
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
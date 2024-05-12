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
                    <tr>
                        <td>1</td>
                        <td>utente</td>
                        <td>titolo bello bello</td>
                        <td>12/12/2012</td>
                        <td>12/12/2013</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </main>
    <?php
    include "components/footer.html"
    ?>
</body>

</html>
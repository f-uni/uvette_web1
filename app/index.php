<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/app/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<?php
$page = "home";

?>

<body>
    <?php include "components/header.php" ?>

    <main>
        <div id="toggler-side-menu">
            <div class="container">
                <i class="material-icons">arrow_right</i>
            </div>
        </div>
        <div class="side-menu">
            <?php
            include "components/navbar.php"
            ?>
            

        </div>
        <div class="content">
            Noi facciamo le cose e le facciamo male
        </div>
    </main>
    <?php
    include "components/footer.html"
    ?>
</body>

</html>
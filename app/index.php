<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/app/css/style.css">
    </head>

    <body>
        <header>
            titolo
        </header>
        <main>
            <div class="side-menu">
                <?php
                    include "components/navbar.html"
                ?>
                <div id="filter">
                    <form>
                        <input type="text">
                        <input type="submit">
                        
                        <input type="text">
                        <input type="submit">
                        
                        <input type="text">
                        <input type="submit">
                        
                        <input type="text">
                        <input type="submit">
                    </form>
                </div>
            </div>
            <div class="content">

            </div>
        </main>
        <?php
            include "components/footer.html"
        ?>
    </body>
    
</html>
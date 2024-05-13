<link rel="stylesheet" href="/app/css/navbar.css">
<nav>
    <a href="/app/">
        <div class="nav-item <?php if($page=="home") echo "active";?>">
            <i class="material-icons">home</i>
            Home
        </div>
    </a>
    <a href="/app/utenti.php">
        <div class="nav-item <?php if($page=="utenti") echo "active";?>">
            <i class="material-icons">people</i>
            Utenti
        </div>
    </a>
    <a href="/app/quiz.php">
        <div class="nav-item <?php if($page=="quiz") echo "active";?>">
            <i class="material-icons">question_answer</i>
            Quiz
        </div>
    </a>
    <a href="/app/partecipazioni.php">
        <div class="nav-item <?php if($page=="partecipazioni") echo "active";?>">
            <i class="material-icons">comment</i>
            Partecipazioni
        </div>
    </a>
</nav>
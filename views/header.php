<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else $username = "login";
?>


<header>
    <h1><a calss='main-title' href="http://localhost/PWA%20projekt/index.php">Newsweek</a></h1>
    <nav>
        <a href="http://localhost/PWA%20projekt/index.php">Home</a>
        <a href="http://localhost/PWA%20projekt/views/kategorija.php?id=sport">Sport</a>
        <a href="http://localhost/PWA%20projekt/views/kategorija.php?id=tech">Tech</a>
        <a href="http://localhost/PWA%20projekt/views/write.html">Write</a>
        <a href="http://localhost/PWA%20projekt/views/administration.php">Administration</a>
        <div class="user">
            <?php
                if ($username == 'login') {
                    echo "<a href='http://localhost/PWA%20projekt/views/login.php'>Login</a>";
                } else {
                    echo $username;
                    echo "<a href='http://localhost/PWA%20projekt/scripts/logout.php'>Log out</a>";
                }
            ?>
        </div>
    </nav>
    <div class="date-time">
        <?php
            echo date("D, M j, Y");
        ?>
    </div>
</header>
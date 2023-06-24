<?php
    include "scripts/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsweek</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script defer src="http://localhost/PWA%20projekt/scripts/componentloader.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="header"></div>
    
    <section class="sport">
        <?php
        $query = "SELECT * FROM posts WHERE ARCHIVE = 0 AND category = 'Sport' LIMIT 3";
        $res = mysqli_query($link, $query);
        $i = 0;
        while ($row = mysqli_fetch_array($res)) {
            if ($i == 0) {
                echo "<h2>$row[category]</h2>
                <div class='content'>";
            } 
                echo "<a href='http://localhost/PWA%20projekt/views/article.php?id=$row[id]' class='item'>
                    <article>
                        <img src='local/$row[image]' width='400px'><h3>$row[title]</h3>
                    </article>
                </a>";
            $i++;
        }
        echo "</div>";
        ?>
    </section>

        


    <section class="tech">
    <?php
        $query = "SELECT * FROM posts WHERE ARCHIVE = 0 AND category = 'Tech' LIMIT 3";
        $res = mysqli_query($link, $query);
        $i = 0;
        while ($row = mysqli_fetch_array($res)) {
            if ($i == 0) {
                echo "<h2>$row[category]</h2>
                <div class='content'>";
            } 
                echo "<a href='http://localhost/PWA%20projekt/views/article.php?id=$row[id]' class='item'>
                    <article>
                        <img src='local/$row[image]' width='400px'><h3>$row[title]</h3>
                    </article>
                </a>";
            $i++;
        }
        echo "</div>";
        ?>
    </section>
    
    <div id="footer"></div>
    </body>
</html>
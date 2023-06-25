<?php

include "../scripts/db.php";

echo "<style>";
    include "../style.css";
echo "</style>";

echo "<body>";
    include("header.php");

    $cat = $_GET["id"];
    $query = "SELECT * FROM posts WHERE category = '$cat'";
    $res = mysqli_query($link, $query);

    echo "<section class='sport'>";
    $i = 0;
        while ($row = mysqli_fetch_array($res)) {
            if ($i == 0) {
                echo "<h2>$row[category]</h2>
                <div class='content cat-content'>";
            } 
                echo "<a href='http://localhost/PWA%20projekt/views/article.php?id=$row[id]' class='item'>
                    <article>
                        <img src='../local/$row[image]' width='400px'><h3>$row[title]</h3>
                    </article>
                </a>";
            $i++;
        }
        echo "</div>";
    echo "</section>";



    include("footer.html");
echo "</body>";
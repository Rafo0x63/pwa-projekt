<style>
    <?php include("../style.css")?>
</style>

<?php
include ("../scripts/db.php");

include("header.html");

$id = $_GET["id"];

$query = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($res)) {

    echo "<div class='article-wrapper'>
        <h3 class='article-cat'>$row[category]</h3>
        <h2 class='article-title'>$row[title]</h2>
        <p class='article-info'>$row[date] - $row[author]</p>
        <div class='article-img'>
        <img src='../local/$row[image]' width='100%'>
        </div>
        <h3 class='article-cat-under'>$row[category]</h3>
        <p class='article-p'>$row[article]</p>
        </div>";
}



include("footer.html");

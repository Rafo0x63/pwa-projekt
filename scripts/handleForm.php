<?php
include("../views/header.php");
include 'db.php';

$picture = $_FILES["photo"]['name'];
$target = "../local/" . $picture;
move_uploaded_file($_FILES["photo"]["tmp_name"], $target);

$category = $_POST['category'];
$title = $_POST['title'];
$author = $_SESSION['username'];
$date = date("Y-m-d H:i:s");
$image = $picture;
$article = $_POST["content"];
$abstract = $_POST["abstract"];

if (isset($_POST["archive"])) $archive = 1;
else $archive = 0;

$query = "INSERT INTO posts(category, title, author, `date`, image, article, abstract, archive) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($link);

if(mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, "sssssssi", $category, $title, $author, $date, $image, $article, $abstract, $archive);
    if (mysqli_stmt_execute($stmt)) {

        echo "<style>";
        include("../style.css");
        echo "</style>";


        echo "<div class='article-wrapper'>
        <h3 class='article-cat'>$category</h3>
        <h2 class='article-title'>$title</h2>
        <p class='article-info'>$date - $author</p>
        <div class='article-img'>
        <img src='$target' width='100%'>
        </div>
        <h3 class='article-cat-under'>$category</h3>
        <p class='article-p'>$article</p>
        </div>";

        include("../views/footer.html");
    }
}


?>


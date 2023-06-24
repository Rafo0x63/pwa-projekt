<?php
include 'db.php';

$picture = $_FILES["photo"]['name'];
$target = "../local/" . $picture;
move_uploaded_file($_FILES["photo"]["tmp_name"], $target);

$category = $_POST['category'];
$title = $_POST['title'];
$author = "temp";
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

        include("../views/header.html");

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

Lorem ipsum dolor sit amet.

Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias, velit!

Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta vitae dolore, beatae laudantium quaerat similique voluptatibus esse, facere quo aliquid sequi officia dolor magnam ducimus aut exercitationem! Doloremque perferendis culpa nam molestias veritatis cupiditate excepturi eligendi, repudiandae ab blanditiis harum mollitia perspiciatis similique laboriosam ipsam explicabo, quod, ex nesciunt magnam! In et unde iste quas, quis cumque enim. Sequi doloremque expedita aliquid nemo, ducimus cupiditate dignissimos neque nobis a iste voluptates maxime. Recusandae veniam quod cupiditate vero dolorum amet aperiam perferendis doloremque? Mollitia modi nisi doloribus quaerat esse repellendus, animi cumque explicabo natus, at quo laudantium distinctio itaque cupiditate eveniet unde dicta eum harum aspernatur architecto! Labore cupiditate quaerat maxime deserunt alias magnam sed quam quae repellat laborum in omnis velit consequuntur, accusamus ab pariatur voluptate quidem odio perferendis nihil quisquam sequi natus? Corrupti, aperiam perspiciatis laborum non saepe debitis illo! Quam, asperiores! Ratione deleniti repellendus eos. Quod molestias neque facilis voluptates provident nostrum consequuntur, modi deleniti ipsum quam debitis eum quae quis magnam, non, eveniet laborum cupiditate officia fuga? Facilis aperiam veniam libero quas aspernatur ipsum deserunt quo mollitia. Quos, aut explicabo rerum neque, dicta unde sint recusandae atque ad incidunt quibusdam, tempora enim doloribus odio nulla inventore libero.

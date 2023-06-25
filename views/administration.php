<style>
    <?php
    include "../style.css"; 
    ?>
</style>

<?php
include "header.php";

include "../scripts/db.php";


if (isset($_SESSION['username']) && $_SESSION['level'] == "1") {


if (isset($_POST['delete'])) {
    $query = "DELETE FROM posts WHERE id=$_POST[id]";
    $res = mysqli_query($link, $query);
}

if (isset($_POST['update'])) {
    if ($_FILES['photo']['name'] != "") {
        $picture = $_FILES['photo']['name'];
        $target = "../local/" . $picture;
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
    } else $picture = $_POST['cur-photo'];
    
    if(isset($_POST['archive'])) $archive = 1;
    else $archive = 0;
    $query = "UPDATE posts SET title='$_POST[title]', abstract='$_POST[abstract]', article='$_POST[article]', image='$picture', category='$_POST[category]', archive=$archive WHERE id=$_POST[id];";
    $res = mysqli_query($link, $query);
}

    
    
    $query = "SELECT * FROM posts";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_array($result)) {
        echo "<div class='form-wrapper'>";
        echo '<form enctype="multipart/form-data" action="administration.php" name="admin-form" method="POST">
        <div class="form-item">
        <label for="title">Title:</label>
        <div class="form-field">
        <input type="text" name="title" class="form-field-textual"
        value="'.$row['title'].'">
        </div>
        </div>
        <div class="form-item">
        <label for="about">Abstract (50 characters):</label>
        <div class="form-field">
        <textarea name="abstract" id="" cols="30" rows="10" class="formfield-textual">'.$row['abstract'].'</textarea>
        </div>
        </div>
        <div class="form-item">
        <label for="content">Article:</label>
        <div class="form-field">
        <textarea name="article" id="" cols="30" rows="10" class="formfield-textual">'.$row['article'].'</textarea>
        </div>
 </div>
 <div class="form-item">
 <label for="photo">Image:</label>
 <div class="form-field">
 <input type="hidden" name="cur-photo" class="form-field-textual"
 value="'.$row['image'].'">
 <input type="file" class="input-text" id="photo"
 value="" name="photo"/> <br><img src="' . '../local/' .
 $row['image'] . '" width=100px>
 </div>
 </div>
 <div class="form-item">
 <label for="category">Category:</label>
 <div class="form-field">
 <select name="category" id="" class="form-field-textual"
 value="'.$row['category'].'">
 <option value="Sport">Sport</option>
 <option value="Tech">Tech</option>
 </select>
 </div>
 </div>
 <div class="form-item">
 <label>Archive:
 <div class="form-field">';
 if($row['archive'] == 0) {
     echo '<input type="checkbox" name="archive" id="archive"/>
     Archive?';
    } else {
        echo '<input type="checkbox" name="archive" id="archive"
        checked/> Archive?';
    }
    echo '</div>
    </label>
    </div>
    <div class="form-item">
    <input type="hidden" name="id" class="form-field-textual"
    value="'.$row['id'].'">
    <button type="reset" value="cancel">Cancel</button>
    <button type="submit" name="update" value="Done">
    Update</button>
 <button type="submit" name="delete" value="Delete">
 Delete</button>
 </div>
 </form>';
 echo "</div>";
}

} else {

    if (isset($_SESSION['username']) && $_SESSION['level'] == 0) {
        echo "<p class='mess'>Hello, $_SESSION[username], you are logged in, but you are not an admin.</p>";
    } 
    else if (!isset($_SESSION['username'])){
    echo "<div class='registration'>";
        echo "<a href='../views/login.php'>Please login</a>";
    echo "</div>";

    include "footer.html";
    }
}




?>
<?php
session_start();

include "db.php";

echo "<style>";
include "../style.css";
echo "</style>";

$username = $_POST['username'];

$login = false;


$query = "SELECT * FROM users WHERE username = ?";

$stmt = mysqli_stmt_init($link);
if(mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
}

if (mysqli_num_rows($res) == 0) {
    echo "<div class='registration'>";
        echo "Username incorrect <br>";
        echo "<a href='../views/login.php'>Try again</a>";
    echo "</div>";
    die();    
}

while ($row = mysqli_fetch_assoc($res)) {
    if (!password_verify($_POST['password'], $row['password'])) {
        echo "<div class='registration'>";
        echo "Password incorrect <br>";
        echo "<a href='../views/login.php'>Try again</a>";
    echo "</div>";
    } else $login = true;
}

echo "<div class='registration'>";
        echo "Login successful <br>";
        echo "<a href='../index.php'>Home</a>";
    echo "</div>";


if ($login) {
    $_SESSION['username'] = $_POST['username'];
    if ($_POST['username'] == "ADMIN") {
        $_SESSION['level'] = 1;
    } else $_SESSION['level'] = 0;
} 
         

 
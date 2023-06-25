<?php

session_start();

include "db.php";
echo "<style>";
include "../style.css";
echo "</style>";


$name = $_POST['name'];
$surname = $_POST['surname'];
$username = $_POST['username'];
$hash = password_hash($_POST['password'], CRYPT_BLOWFISH);
if ($username == "ADMIN") $level = 1;
else $level = 0;

$query = "SELECT * FROM users WHERE username = ?";

$stmt = mysqli_stmt_init($link);
if(mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
}

if (mysqli_num_rows($res) > 0) {
    echo "<div class='registration'>";
        echo "Username already exists <br>";
        echo "<a href='../views/register.php'>Try again</a>";
    echo "</div>";
    die();    
}



$query = "INSERT INTO users(`name`, surname, username, `password`, `level`) VALUES(?, ?, ?, ?, ?);";

$stmt = mysqli_stmt_init($link);
if(mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'ssssi', $name, $surname, $username, $hash, $level);
    $res = mysqli_stmt_execute($stmt);
}

if ($res) {
    echo "<div class='registration'>";
        echo "Registration successful <br>";
        echo "<a href='../views/login.php'>Login</a>";
    echo "</div>";
} else {
    echo "Error";
    echo "<a href='../views/register.php'>Try again</a>";
}

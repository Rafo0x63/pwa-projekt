<?php

echo "<style>";
include "../style.css";
echo "</style>";

session_start();
session_unset();
session_destroy();
$_SESSION = array();

echo "<div class='registration'>";
        echo "Logged out <br>";
        echo "<a href='../views/login.php'>Login</a>";
    echo "</div>";
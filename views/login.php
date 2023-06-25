<?php
include "header.php";
echo "<style>";
include "../style.css";
echo "</style>";

echo '<div class="form-wrapper">
    <form action="../scripts/handleLogin.php" method="POST" name="register-form">
        Username: <br>
        <input type="text" name="username"> <br>
        Password: <br>
        <input type="password" name="password"> <br><br>
        <input type="submit" value="Login">
    </form>
    <a href="register.php">Register</a>
</div>';


include "footer.html";
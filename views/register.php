<?php
include "header.php";
echo "<style>";
include "../style.css";
echo "</style>";

echo '<div class="form-wrapper">
    <form action="../scripts/handleRegister.php" method="POST" name="register-form">
        Name: <br>
        <input type="text" name="name"> <br>
        Surname: <br>
        <input type="text" name="surname"> <br>
        Username: <br>
        <input type="text" name="username"> <br>
        Password: <br>
        <input type="password" name="password"> <br>
        Re-enter password: <br>
        <input type="password" name="re-password"> <br> <br>
        <input type="submit" value="Register">
    </form>
</div>';

include "footer.html";
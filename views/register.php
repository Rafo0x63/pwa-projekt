<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script defer src="http://localhost/PWA%20projekt/scripts/validateFormRegister.js"></script>
</head>

<?php
include "header.php";
echo "<style>";
include "../style.css";
echo "</style>";

echo '<div class="form-wrapper">
    <form action="../scripts/handleRegister.php" method="POST" name="register-form" id="register-form">
        Name: <br>
        <input type="text" name="name"> <br>
        Surname: <br>
        <input type="text" name="surname"> <br>
        Username: <br>
        <input type="text" name="username"> <br>
        Password: <br>
        <input type="password" name="password" id="password"> <br>
        Re-enter password: <br>
        <input type="password" name="re-password"> <br> <br>
        <input type="submit" value="Register">
    </form>
</div>';

include "footer.html";
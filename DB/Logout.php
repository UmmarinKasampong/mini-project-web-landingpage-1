<?php 

    session_start();
    unset($_SESSION['user_login']);
    header('Location: ../Components/SignIn_PAGE/signIn.php');

?>
<?php
    require '../config/function.php';
    if(isset($_SESSION['user-authenticated']))
    {
        unset($_SESSION['user-authenticated']);
        unset($_SESSION['auth_user']);
        redirect('../index.php');
    }
?>
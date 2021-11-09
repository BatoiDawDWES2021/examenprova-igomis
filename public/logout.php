<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['vots']);
    unset($_SESSION['albums']);
    session_destroy();
    header('Location: index.php');
<?php
    use App\Album;

    require('../kernel.php');
    $query = require('../bootstrap.php');
    $menu = require('../config/menu.php');
    $albums = Album::Best();
    $lastMessage = $query->last('users')->message??'';

    if (isPost() && cfsr()){
        $name = trim(htmlspecialchars($_POST['name']));
        $email = trim(htmlspecialchars($_POST['email']));
        $message = trim(htmlspecialchars($_POST['message']));

        $user = $query->selectUnique('users','email',$email);
        if (!$user) {
            $query->insert('users',compact('name','email','message'));
        }
        $_SESSION['user'] = $name;
    }
    loadView('index',compact('menu','albums','lastMessage'));

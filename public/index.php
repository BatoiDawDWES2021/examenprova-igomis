<?php
    use App\Album;

    require('../kernel.php');
    $query = require('../bootstrap.php');
    $menu = require('../config/menu.php');
    $albums = Album::Best();
    $lastMessage = $query->last('user')->message??'';


    loadView('index',compact('menu','albums','lastMessage'));

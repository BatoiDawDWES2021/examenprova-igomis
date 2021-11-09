<?php

require('../kernel.php');
$query = require('../bootstrap.php');

if (!Auth()) {
    header('location:index.php');
    die();
}


try {
    $vots = isset($_SESSION['vots'])?$_SESSION['vots']+1:1 ;
    $albums = isset($_SESSION['albums'])?unserialize($_SESSION['albums']):[];

    if ($vots > 3) {
        throw new Exception('Ja has votat 3 vegades');
    }

    $id = $_GET['id'];
    $albums[] = $id;
    $album = $query->findById('album',$id);
    $votes = $album->votes + 1;
    $query->update('album',compact('votes'),'id',$id);

    $_SESSION['vots'] = $vots;
    $_SESSION['albums'] = serialize($albums);

    header('location:index.php');
    die();

} catch (Exception $e){
    echo $e->getMessage();
}




<?php

require('../kernel.php');
$query = require('../bootstrap.php');

if (!Auth()) {
    header('location:index.php');
    die();
}


$albums = isset($_SESSION['albums'])?unserialize($_SESSION['albums']):[];

foreach ($albums as $idAlbum){
    $album = $query->findById('album',$idAlbum);
    $votes = $album->votes - 1;
    $query->update('album',compact('votes'),'id',$idAlbum);
}
unset($_SESSION['vots']);
unset($_SESSION['albums']);
header('location:index.php');
die();





<?php


namespace App;


class Album
{
    protected $name;
    protected $votes;
    protected $idArtist;

    /**
     * Album constructor.
     * @param $name
     * @param $votes
     * @param $idArtist
     */
    public function __construct($name, $votes, $idArtist)
    {
        $this->name = $name;
        $this->votes = $votes;
        $this->idArtist = $idArtist;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getVotes()
    {
        return $this->votes;
    }

    public function getArtistName(){
        // retorna el nom del Grup Musical
        $query = require('../bootstrap.php');
        return $query->findById('artist',$this->idArtist)->name;

    }

    public function getCompany(){
        // retorna el nom de la productora
        $query = require('../bootstrap.php');
        $idProductora = $query->findById('artist',$this->idArtist)->record_label_id;
        return $query->findById('record_label',$idProductora)->name;
    }

    public static function Best(){
        // retorna un array amb tots el albums
        $allAlbums = [];
        $query = require('../bootstrap.php');
        foreach ($query->selectAll('album',12) as $album){
            $allAlbums[$album['id']] = new Album($album['name'],$album['votes'],$album['artist_id']);
        }
        return $allAlbums;
    }


}
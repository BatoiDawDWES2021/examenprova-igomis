<?php


namespace App;


class Album
{
    protected $id;
    protected $name;
    protected $votes;
    protected $idArtist;

    /**
     * Album constructor.
     * @param $name
     * @param $votes
     * @param $idArtist
     */
    public function __construct($id,$name, $votes, $idArtist)
    {
        $this->id = $id;
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
    public function getId()
    {
        return $this->id;
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
        foreach ($query->selectAllOrder('album',12,'votes') as $album){
            $allAlbums[] = new Album($album['id'],$album['name'],$album['votes'],$album['artist_id']);
        }
        return $allAlbums;
    }


}
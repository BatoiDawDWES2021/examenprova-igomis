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
    }

    public function getCompany(){
        // retorna el nom de la productora
    }

    public static function Best(){
        // retorna un array amb tots el albums
    }


}
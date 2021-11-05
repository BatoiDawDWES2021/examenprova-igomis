<?php


namespace App;

class Connection
{

    public static function make(){
        try {
            return new \PDO("mysql:host=localhost;port=3306;dbname=test", 'batoi', '1234');
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }
}
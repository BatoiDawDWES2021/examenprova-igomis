<?php


namespace App;


class QueryBuilder
{
    protected $conn;

    /**
     * QueryBuilder constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function selectAll($table,$limit){
        $stpdo = $this->conn->prepare("SELECT * FROM {$table} LIMIT $limit");

        $this->execute($stpdo);
        return $stpdo->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectAllOrder($table,$limit,$order){
        $stpdo = $this->conn->prepare("SELECT * FROM {$table}  ORDER BY {$order} DESC LIMIT $limit");
        $this->execute($stpdo);
        return $stpdo->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById($table,$id){
        $stpdo = $this->conn->prepare("SELECT * FROM {$table} WHERE `id` = :id ");
        $stpdo->bindParam(":id",$id);
        $this->execute($stpdo);

        return $stpdo->fetch(\PDO::FETCH_OBJ);
    }

    public function deleteById($table,$primaryKey,$id){
        $stpdo = $this->conn->prepare("DELETE FROM {$table} WHERE `$primaryKey` = :id ");
        $stpdo->bindParam(":id",$id);
        $this->execute($stpdo);
    }
    public function selectWhere($table,$key,$value){
        $stpdo = $this->conn->prepare("SELECT * FROM {$table} WHERE `$key` = :value ");
        $stpdo->bindParam(":value",$value);
        $this->execute($stpdo);

        return $stpdo->fetchAll(\PDO::FETCH_OBJ);
    }

    public function insert($table,$parametres){
        $stpdo = $this->conn->prepare(insert($table,$parametres));
        foreach ($parametres as $key => $value){
            $stpdo->bindValue(":$key",$value);
        }
        $this->execute($stpdo);

    }

    public function update($table,$parametres,$primaryKey,$id){
        $stpdo = $this->conn->prepare(update($table,$parametres,$primaryKey));
        foreach ($parametres as $key => $value){
            $stpdo->bindValue(":$key",$value);
        }
        $stpdo->bindParam(":id",$id);
        $this->execute($stpdo);
    }

    public function execute(&$stpdo){
        try {
            $stpdo->execute();
        } catch (\PDOException $exception){
            echo ('Error amb la base de dades: '.$exception->getMessage());
            die();
        }
    }

    public function last($table){
        // Torna el ultim element d'una taula
    }

}
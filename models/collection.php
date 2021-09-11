<?php

class Collection {
    private $conn;
    private $table_name = 'rubbish_collection';

    
    public $type_;
    public $day_;
    public $hour;



    public function __construct($db)
    {
        $this->conn = $db;
    }


    //read collection

    function read()
    {
        //select all
        $query = "SELECT a.type_, a.day_, a.hour FROM ". $this->table_name . " a ";

        $stmt = $this->conn->prepare($query);
        //execute query

        $stmt->execute();

        return $stmt;
    }

    function create()
    {
        $query = 'INSERT INTO '. $this->table_name . '
        SET
            type_ = :type_,
            day_ = :day_,
            hour = :hour 
            '; 

        //prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data

        $this->type_ = htmlspecialchars(strip_tags($this->type_));
        $this->day_ = htmlspecialchars(strip_tags($this->day_));
        $this->hour = htmlspecialchars(strip_tags($this->hour));

        //bind data

        $stmt->bindParam(':type_', $this->type_);
        $stmt->bindParam(':day_', $this->day_);
        $stmt->bindParam(':hour', $this->hour);
        

        //execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    function update(){
        //query
        $query = 'UPDATE '. $this->table_name. '
        SET
            type_ = :type_,
            day_ = :day_,
            hour = :hour
            WHERE 
            type_ = :type_  
            '; 

        //prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data

        $this->type_ = htmlspecialchars(strip_tags($this->type_));
        $this->day_ = htmlspecialchars(strip_tags($this->day_));
        $this->hour = htmlspecialchars(strip_tags($this->hour));
       

        //bind data

        $stmt->bindParam(':type_', $this->type_);
        $stmt->bindParam(':day_', $this->day_);
        $stmt->bindParam(':hour', $this->hour);

        //execute query
        if($stmt->execute()){
            return true;
        }
        return false;

    }

    function delete(){
        $query = 'DELETE FROM ' . $this->table_name . ' WHERE type_ = ? ';

        $stmt = $this->conn->prepare($query);

        $this->type_ = htmlspecialchars(strip_tags($this->type_));

        $stmt->bindParam(1, $this->type_);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    function read_day(){
        //query
        $query = 'SELECT
        *
        FROM '
        .$this->table_name .'
        WHERE 
        day_= ?
        ';

        //PREPARED Statement
        $stmt = $this->conn->prepare($query);

        // bind day_
        $stmt->bindParam(1,$this->day_);

        // Execute query
        $stmt->execute();
         return $stmt;
    }
}
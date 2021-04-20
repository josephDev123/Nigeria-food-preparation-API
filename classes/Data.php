<?php

Class Content{
    private $conn ="";

    public function __construct($conn){
        $this->conn= $conn;
    }

    public function getAllContent(){
        //statement
        $sql = "SELECT * FROM naija_food_prep";
       //prepare statement
       $stmt = $this->conn->prepare($sql);
       //execute statement   
        $stmt->execute();    
            return $stmt;
         }
      

         public function getDataById($id){
            //query
            $sql = "SELECT * FROM naija_food_prep WHERE id = ?";
            //prepare statement
            $stmt = $this->conn->prepare($sql);
                 //bind parameter to query
                 $stmt->bindParam(1, $id);
                 //execute query
                 $stmt->execute();
                 $count = $stmt->rowCount();
                 if($count > 0){
                     $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                     return $row;
                 }else{
                     return array('message'=> 'No result');
                 }
           

         }
    }
    
    



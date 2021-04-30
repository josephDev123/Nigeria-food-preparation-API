<?php

Class Content{
    private $conn ="";
    public $id ='';
    public $food_name ='';
    public $food_introduction = ""; 
    public $food_procedure ='';
    public $food_ingredient ='';
    public $food_image ='';
    public $food_equipment ='';

    public function __construct($conn){
        $this->conn= $conn;
    }

    public function getAllContent(){
        //query
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




         public function post_data(){
            // query
            $sql = "INSERT INTO naija_food_prep(food_name, food_introduction, food_procedure, food_ingredient, food_image, food_equipment) VALUES(?, ?, ?,?,?,?)";
              //prepare statement
              $stmt = $this->conn->prepare($sql);
              //escape characters
              $this->food_name = htmlspecialchars(strip_tags($this->food_name));
              $this->food_introduction = htmlspecialchars(strip_tags($this->food_introduction));
              $this->food_procedure = htmlspecialchars(strip_tags($this->food_procedure));
              $this->food_ingredient = htmlspecialchars(strip_tags($this->food_ingredient));
              $this->food_image = htmlspecialchars(strip_tags($this->food_image));
              $this->food_equipment = htmlspecialchars(strip_tags($this->food_equipment));
              //bind parameter to query
              $stmt->bindParam(1, $this->food_name);
              $stmt->bindParam(2, $this->food_introduction);
              $stmt->bindParam(3, $this->food_procedure);
              $stmt->bindParam(4, $this->food_ingredient);
              $stmt->bindParam(5, $this->food_image);
              $stmt->bindParam(6, $this->food_equipment);
               // execute query
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                } 
                
            }


            public function delete(){
                //query
                $sql = "DELETE FROM naija_food_prep WHERE id = ?";
                //prepare statement
                $stmt =$this->conn->prepare($sql);
                //bind to the query
                $stmt->bindParam(1, $this->id);
                
                if ($stmt->execute()) {
                   return true;
                }else{
                    return false;
                }

            }

            public function update($id){
                //query
                $sql= "UPDATE naija_food_prep SET food_name = ?, food_introduction =?, food_procedure =?, food_ingredient =?, food_image =?, food_equipment=? WHERE id = '{$id}'";
                //prepare statement
                $stmt = $this->conn->prepare($sql);
                //bind value to query
                $stmt->bindParam(1, $this->food_name);
                $stmt->bindParam(2, $this->food_introduction);
                $stmt->bindParam(3, $this->food_procedure);
                $stmt->bindParam(4, $this->food_ingredient);
                $stmt->bindParam(5, $this->food_image);
                $stmt->bindParam(6, $this->food_equipment);
                
                if($stmt->execute()){
                    return true;
                   
                }else{
                    return false;
                  
                }

            }
         
    }
    
    
// $food_name, $food_introduction, $food_procedure, $food_ingredient, $food_image, $food_equipment


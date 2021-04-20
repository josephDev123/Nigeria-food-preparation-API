
<?php
    $host = 'localhost';
    $db_name = 'naija_food';
    $username ='root';
    $password = '';
    
    try{
        $conn= new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo ("Connected successfully") ;
    }catch(PDOException $e){
        echo 'connection failed: '.$e->getMessage();

    }
        
    
?>
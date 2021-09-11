<?php

use Dotenv\Dotenv;
require_once('vendor/autoload.php');

$dotenv = Dotenv::createImmutable(__DIR__,'../.env');
$dotenv->load();
        


class Database{  

    
        //database connection

        function getConnection(){
            
            try{
                $host = $_ENV['HOST'];
                $db_name = $_ENV['DATABASE'];
                $username = $_ENV['USER'];
                $password = $_ENV['PASSWORD'];
                $conn = new PDO('mysql:host=' . $host . ';dbname=' . $db_name , $username, $password);
            }

            catch(PDOException $e){
                echo 'error : ' . $e->getMessage();
            }
            return  $conn;
             
        }


}
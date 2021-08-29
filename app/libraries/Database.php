<?php
    class Database {
        private $dbHost = DB_HOST;
        private $dbUsername = DB_USERNAME;
        private $dbName = DB_NAME;
        private $dbPassword = DB_PASSWORD;

        private $statement;
        private $dbHandler;
        private $err;

        public function __construct(){
            $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try{
                $this->dbHandler = new PDO($conn , $this->dbUsername , $this->dbPassword , $options);
            } catch (PDOException $e) {
                $this->err = $e->getMessage();
                echo $this->err;
            }
        }

        //allow to write queries
        public function query($sql){
            $this->statement = $this->dbHandler->prepare($sql);
        }

        //bind the values
        public function bind($parmaeter , $value ,  $type = null){
            switch (is_null($type)){
                case is_int($type):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($type):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($type):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            $this->statement->bindValue($parmaeter , $value , $type);
        }

        //execute prepared statements 
        public function execute(){
            return $this->statement->execute();
        }

        //return as array]
        public function resultSet(){
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        //return single row
        public function single(){
            $this->execute();
            $this->statement->fetch(PDO::FETCH_OBJ);
        }

        //get the row count
        public function rowCount(){
            $this->statement->rowCount();
        }

    }
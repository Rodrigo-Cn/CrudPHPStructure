<?php

    require(dirname(__FILE__,2).'/src/config/config.php');

    class Member implements Crud{

        private static $connectdatabase;

        public function __construct()
        {
            $this->connectdatabase = DataBase::getConnection();
        }

        public function createObject(...$parameter){
            $query = 'INSERT INTO member (name, phonenumber) VALUES (?, ?)';
            $stmt = $this->connectdatabase->prepare($query);
            $stmt->bind_param("ss", $parameter['name'], $parameter['phonenumber']);
            return $stmt->execute();
        }

        public function editObject($id, ...$parameter){
            $query = 'UPDATE member SET name = ?, phonenumber = ? WHERE id = ?';
            $stmt = $this->connectdatabase->prepare($query);
            $stmt->bind_param("ss", $parameter['name'], $parameter['phonenumber'], $id);
            return $stmt->execute();
        }

        public function getListObjects(){
            $query = 'SELECT * FROM member';
            $stmt = $this->connectdatabase->prepare($query);
            return $stmt->get_result()->fetch_assoc();
        }

        public function getDetailObject($id){
            $query = 'SELECT * FROM member WHERE id = ?';
            $stmt = $this->connectdatabase->prepare($query);
            $stmt->bind_param("i", $id);
            return $stmt->get_result()->fetch_assoc();
        }

        public function deleteObject($id){
            $query = 'DELETE FROM member WHERE id = ?';
            $stmt = $this->connectdatabase->prepare($query);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }


    }

?>
<?php

    interface Crud{
        public function createObject();
        public function editObject($id);
        public function getListObjects();
        public function getDetailObject($id);
        public function deleteObject($id);
    }


?>
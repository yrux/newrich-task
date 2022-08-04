<?php
class Connection{
    public $connection;
    public function getConnection(){
        include __DIR__.'/../connection.php';
        $this->connection = $mysqli;
        return $this->connection;
    }
}
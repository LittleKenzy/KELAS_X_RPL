<?php

class DB
{
    // property
    public $host = '127.0.0.1   ';
    private $user = 'root';
    private $pass = '';
    private $db = 'dbrestoran';

    public function __construct()
    {
        echo 'function construct';
    }

    // method
    public function selectData()
    {
        echo 'select data';
    }
    public function getDatabase()
    {
        echo $this->db;
    }
    public function tampil()
    {
        $this->selectData();
    }
    public static function insertData()
    {
        echo 'static function';
    }
}

DB::insertData();
echo '<br>';
$db = new DB();
// echo '<br>';
// $db->selectData();
// echo '<br>';
// echo $db->host;
// echo '<br>';
// echo $db->getDatabase();
// echo '<br>';
// $db->tampil();


?>
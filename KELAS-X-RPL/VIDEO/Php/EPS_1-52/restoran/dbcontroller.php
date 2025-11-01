<?php

class DB
{
    private $host = '127.0.0.1';
    private $user = 'root';
    private $password = '';
    private $dbname = 'dbrestoran';
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = $this->koneksiDB();
    }

    public function koneksiDB()
    {
        return new mysqli($this->host, $this->user, $this->password, $this->dbname);
    }


    public function getAll($sql)
    {
        $result = mysqli_query($this->koneksiDB(), $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getItem($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function rowCount($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        $count = mysqli_num_rows($result);

        return $count;
    }

    public function runSql($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        
    }
    public function pesan($text="")
    {
        echo $text;
    }
}

?>
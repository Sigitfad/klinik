<?php

//KONEKSI KE DATABASE/ LOCALHOST
class Database { //class open
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'db_klinik';
    public $conn;
    public $error;


    // FUNGSI CONSTRUCT UNTUK CEK KONEKSI TERHUBUNG KE DATABASE/TIDAK
    function __construct() { //construct open
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            echo 'Connetion Failed';
        } else {
            return $this->conn;
        }
    } //function construct close
    
} //class close

?>
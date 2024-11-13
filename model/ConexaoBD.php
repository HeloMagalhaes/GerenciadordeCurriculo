-- Active: 1729339099680@@127.0.0.1@3306@projeto_final
<?php
class ConexaoBD{
private $serverName = "localhost";
private $userName = "root";
private $password = "teamomaeepai";
private $dbName = "projeto_final";


public function conectar()
{
    $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
    return $conn;
}
}




?>
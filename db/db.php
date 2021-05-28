<?php

class DBConnection
{
  private $pdo;

  public function __construct($data)
  {
    $host = $data['host'];
    $port = $data['port'];
    $db_name = $data['db_name'];
    $db_user = $data['db_user'];
    $db_password = $data['db_password'];

    $this->pdo = new PDO("mysql:host=$host;port=$port;dbname=$db_name", $db_user, $db_password);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  public function getInstance()
  {
    return $this->pdo;
  }
}

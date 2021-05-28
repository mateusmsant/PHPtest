<?php

class DBConnection
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=cd2tec', 'root', '');
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  public function getInstance()
  {
    return $this->pdo;
  }
}

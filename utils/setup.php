<?php

require_once('db/db.php');
require_once('db_data.php');

$db_data = getDBConnectionData();
$host = $db_data['host'];
$port = $db_data['port'];
$db_user = $db_data['db_user'];
$db_name = $db_data['db_name'];
$db_password = $db_data['db_password'];
$table_name = $db_data['table_name'];

$pdo = new PDO("mysql:host=$host;port=$port;", $db_user, $db_password);
try {
  $query = "CREATE DATABASE IF NOT EXISTS `$db_name`";
  $pdo->exec($query);
} catch (PDOException $e) {
  echo $e->getMessage();
}

$db = new DBConnection($db_data);
$pdo = $db->getInstance();

try {
  $query = "CREATE TABLE IF NOT EXISTS `$table_name` ( 
  `id` INT NOT NULL AUTO_INCREMENT,
  `cep` VARCHAR(8) NOT NULL, 
  `logradouro` TEXT NOT NULL, 
  `complemento` TEXT NOT NULL, 
  `bairro` TEXT NOT NULL, 
  `localidade` TEXT NOT NULL, 
  `uf` VARCHAR(2) NOT NULL, 
  `ibge` TEXT NOT NULL, 
  `gia` TEXT NOT NULL, 
  `ddd` VARCHAR(2) NOT NULL, 
  `siafi` TEXT NOT NULL,
  PRIMARY KEY (`id`)) 
  ENGINE = InnoDB;";
  $pdo->exec($query);
} catch (PDOException $e) {
  echo $e->getMessage();
}

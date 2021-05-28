<?php

require_once('db/db.php');
require_once('db_data.php');

$db_data = getDBConnectionData();

$db = new DBConnection($db_data);
$pdo = $db->getInstance();

try {
  $query = "CREATE TABLE IF NOT EXISTS `ceps` ( 
  `id` INT NOT NULL AUTO_INCREMENT,
  `cep` VARCHAR(8) NOT NULL , 
  `logradouro` TEXT NOT NULL , 
  `complemento` TEXT NOT NULL , 
  `bairro` TEXT NOT NULL , 
  `localidade` TEXT NOT NULL , 
  `uf` VARCHAR(2) NOT NULL , 
  `ibge` TEXT NOT NULL , 
  `gia` TEXT NOT NULL , 
  `ddd` TEXT NOT NULL , 
  `siafi` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
  $pdo->exec($query);
} catch (PDOException $e) {
  echo $e->getMessage();
}

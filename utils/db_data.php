<?php

function getDBConnectionData()
{
  $host = 'localhost';
  $port = '3306';
  $db_user = 'root';
  $db_name = 'cd2tec';
  $db_password = '';
  $table_name = 'ceps';

  return ['host' => $host, 'port' => $port, 'db_name' => $db_name, 'db_user' => $db_user, 'db_password' => $db_password, 'table_name' => $table_name];
}

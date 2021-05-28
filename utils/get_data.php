<?php

require_once('controller/CepController.php');
require_once('db/db.php');
require_once('utils/db_data.php');

function getData($data)
{
  $db_data = getDBConnectionData();
  $db = new DBConnection($db_data);
  $pdo = $db->getInstance();
  $cep_controller = new CEPController($db_data['table_name']);

  if (!empty($data)) {
    $cep = normalizeCEP($data['cep']);

    if ($cep) {
      $exists = $cep_controller->checkCEPExistence($pdo, $cep);

      if (empty($exists)) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://viacep.com.br/ws/$cep/xml/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $parsed_data = simplexml_load_string($output);

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200 && !isset($parsed_data->erro)) {
          $cep_controller->addCEP($pdo, $parsed_data, $cep);
          return ['api_data' => $parsed_data, 'alert_type' => 'success'];
        } else {
          if (isset($parsed_data->erro)) {
            return ['error' => true, 'alert_type' => 'warning', 'alert_msg' => 'CEP válido, mas não existe na nossa base de dados'];
          } else {
            return ['error' => true, 'alert_type' => 'danger', 'alert_msg' => 'CEP inválido'];
          }
        }
        curl_close($ch);

        $cep_controller->addCEP($pdo, $parsed_data, $cep);
      } else {
        $data = $cep_controller->getCEP($pdo, $cep);
        return ['db_data' => $data, 'alert_type' => 'success'];
      }
    } else {
      return ['error' => true, 'alert_type' => 'danger', 'alert_msg' => 'O campo de CEP está vazio'];
    }
  }
}

function normalizeCEP($cep)
{
  if (strpos($cep, '-')) {
    return str_replace('-', '', $cep);
  }

  return $cep;
}

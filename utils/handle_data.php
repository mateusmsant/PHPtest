<?php

$not_found = false;

if (!empty($_POST)) {
  $data = getData($_POST);
  if ($data) {
    $alert_type = $data['alert_type'];
    switch ($data['alert_type']) {
      case 'success':
        $alert_bg = "#66bb6a";
        break;
      case 'danger':
        $alert_bg = "#ef5350";
        break;
      case 'warning':
        $alert_bg = "#f9a825";
        $not_found = true;
        break;
    }
    if (!isset($data['error'])) {
      $response = true;
      $alert_msg = 'Consulta feita com sucesso';
      if (isset($data['db_data'])) {
        $cep_info = $data['db_data'];
        $cep = $cep_info['cep'];
        $logradouro = $cep_info['logradouro'];
        $complemento = $cep_info['complemento'];
        $bairro = $cep_info['bairro'];
        $localidade = $cep_info['localidade'];
        $uf = $cep_info['uf'];
        $ibge = $cep_info['ibge'];
        $gia = $cep_info['gia'];
        $ddd = $cep_info['ddd'];
        $siafi = $cep_info['siafi'];
      } else {
        $cep_info = $data['api_data'];
        $cep = $cep_info->cep;
        $logradouro = $cep_info->logradouro;
        $complemento = $cep_info->complemento;
        $bairro = $cep_info->bairro;
        $localidade = $cep_info->localidade;
        $uf = $cep_info->uf;
        $ibge = $cep_info->ibge;
        $gia = $cep_info->gia;
        $ddd = $cep_info->ddd;
        $siafi = $cep_info->siafi;
      }

      $cep = normalizeCEP($cep);
    } else {
      $alert_msg = $data['alert_msg'];
      $response = false;
    }

    $alert = true;
    $alert_style = "background-color: $alert_bg; color: #e9eaec; border: none;";
  }
}

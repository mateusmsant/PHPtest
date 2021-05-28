<?php

$not_found = false;

if (!empty($_POST)) {
  $data = getData($_POST);
  if ($data) {
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
      if ($data['frombd']) { // From database
        $cep_info = $data['data'];
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
      } else if (!$data['frombd']) { // From api
        $cep_info = $data['data'];
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
    }
    $response = $data['response'];
    $alert = $data['alert'];
    $alert_type = $data['alert_type'];
    $alert_msg = $data['alert_msg'];
    $alert_style = "background-color: $alert_bg; color: #e9eaec; border: none; opacity: 1";
  }
}

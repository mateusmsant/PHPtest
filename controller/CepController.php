<?php

class CEPController
{
  public $table_name;

  public function __construct(string $table_name)
  {
    $this->table_name = $table_name;
  }
  public function addCEP(PDO $pdo, SimpleXMLElement $data, string $cep): void
  {
    $logradouro = $data->logradouro;
    $complemento = $data->complemento;
    $bairro = $data->bairro;
    $localidade = $data->localidade;
    $uf = $data->uf;
    $ibge = $data->ibge;
    $gia = $data->gia;
    $ddd = $data->ddd;
    $siafi = $data->siafi;

    if (!$uf) {
      return;
    }

    $query = "INSERT INTO $this->table_name (cep, logradouro, complemento, bairro, localidade, uf, ibge, gia, ddd, siafi) 
    VALUES (:cep, :logradouro, :complemento, :bairro, :localidade, :uf, :ibge, :gia, :ddd, :siafi)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':cep', $cep);
    $statement->bindValue(':logradouro', $logradouro);
    $statement->bindValue(':complemento', $complemento);
    $statement->bindValue(':bairro', $bairro);
    $statement->bindValue(':localidade', $localidade);
    $statement->bindValue(':uf', $uf);
    $statement->bindValue(':ibge', $ibge);
    $statement->bindValue(':gia', $gia);
    $statement->bindValue(':ddd', $ddd);
    $statement->bindValue(':siafi', $siafi);
    $statement->execute();
  }

  public function checkCEPExistence(PDO $pdo, string $cep): array
  {
    $query = "SELECT * FROM $this->table_name WHERE cep = :cep";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':cep', $cep);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCEP(PDO $pdo, string $cep): array
  {
    $query = "SELECT * FROM $this->table_name WHERE cep = :cep";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':cep', $cep);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
}

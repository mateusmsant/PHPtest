<?php
function stringInsert($str, $insertstr, $pos)
{
  $str = substr($str, 0, $pos) . $insertstr . substr($str, $pos);
  return $str;
}
?>

<div class="result">
  <?php if (isset($cep)) { ?>
    <p class="cep"><?php echo stringInsert($cep, '-', 5); ?></p>
  <?php } ?>
  <?php if (isset($logradouro) && $logradouro != '') { ?>
    <p><span>Rua:</span> <?php echo $logradouro; ?></p>
  <?php } ?>
  <?php if (isset($complemento) && $complemento != '') { ?>
    <p><span>Complemento:</span> <?php echo $complemento; ?></p>
  <?php } ?>
  <?php if (isset($bairro) && $bairro != '') { ?>
    <p><span>Bairro:</span> <?php echo $bairro; ?></p>
  <?php } ?>
  <?php if (isset($localidade) && $localidade != '') { ?>
    <p><span>Cidade:</span> <?php echo $localidade; ?></p>
  <?php } ?>
  <?php if (isset($uf) && $uf != '') { ?>
    <p><span>UF:</span> <?php echo $uf; ?></p>
  <?php } ?>
  <?php if (isset($ibge) && $ibge != '') { ?>
    <p><span>Código IBGE:</span> <?php echo $ibge; ?></p>
  <?php } ?>
  <?php if (isset($gia) &&  $gia != '') { ?>
    <p><span>Código GIA:</span> <?php echo $gia; ?></p>
  <?php } ?>
  <?php if (isset($ddd) && $ddd != '') { ?>
    <p><span>DDD:</span> <?php echo $ddd; ?></p>
  <?php } ?>
  <?php if (isset($siafi) && $siafi != '') { ?>
    <p><span>Código SIAFI:</span> <?php echo $siafi; ?></p>
  <?php } ?>
</div>
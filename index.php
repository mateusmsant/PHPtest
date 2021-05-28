<?php

session_start();
if (!empty($_POST)) {
  $_SESSION['input'] = $_POST['cep'];
}

$title = 'Consulta de CEP';
require_once('utils/setup.php');
require_once('utils/get_data.php');
require_once('utils/handle_data.php')


?>

<?php require_once('components/header.php'); ?>

<body>
  <?php require_once('components/form.php'); ?>
  <?php if (isset($response) && $response) { ?>
    <?php require_once('components/result.php'); ?>
  <?php } else if ($not_found) { ?>
    <?php require_once('components/empty.php') ?>
  <?php } ?>
  <?php require_once('components/alert.php'); ?>
</body>

</html>
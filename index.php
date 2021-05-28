<?php

$title = 'Consulta de CEP';

require_once('utils/get_data.php');
require_once('utils/handle_data.php')

?>

<?php require_once('components/header.php'); ?>

<body>
  <?php require_once('components/form.php'); ?>
  <?php if (isset($response) && $response) { ?>
    <?php require_once('components/result.php'); ?>
  <?php } else if ($not_found) { ?>
    <div class="empty">
      <object data="img/undraw_empty.svg" width="300" height="300"></object>
    </div>
  <?php } ?>
  <?php require_once('components/alert.php'); ?>
</body>

</html>
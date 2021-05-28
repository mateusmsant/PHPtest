<?php if (isset($alert) && $alert) { ?>
  <div class="alert alert-<?php echo $alert_type; ?>" role="alert" style="<?php echo $alert_style ?>">
    <?php echo $alert_msg; ?>
  </div>
<?php
  echo "<script>fadeAlertOut();</script>";
} ?>
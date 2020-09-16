<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-flud text-center">
  <div class="container">
  <hi class="display-3"><?php echo $data['title']; ?></hi>
  <p class="lead"><?php echo $data['description']; ?></p>
  <p class="lead">Version: <strong><?php echo APPVERSION; ?><strong></p>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php function errorToast($errors) { ?>

  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Ошибка</strong> <?php echo array_shift($errors); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php } ?>
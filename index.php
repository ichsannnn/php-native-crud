<?php
  require_once 'config/config.php';
  require_once 'controllers/SiswaController.php';
  $siswa = new SiswaController($conn);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Crud PHP</title>
  </head>
  <body>
    <?php

      if (!isset($_GET['p'])) {
        include_once 'views/index.php';
      } else {
        if ($_GET['p'] == "create") {
          require_once 'views/create.php';
        } elseif ($_GET['p'] == "edit") {
          require_once 'views/edit.php';
        } elseif ($_GET['p'] == "delete") {
          $siswa->delete($_GET['id']);
        } else {
          require_once 'views/404.php';
        }
      }

    ?>
  </body>
</html>

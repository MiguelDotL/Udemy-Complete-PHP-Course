<?php
  require 'auth.php';

  if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    header('Location: select.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP FORM</title>
  </head>
  <body>
    <?php
      readfile('nav.tmpl.html');

      $db = mysqli_connect('localhost', 'root', '', 'php');
      $sql = "DELETE FROM users WHERE id=$id";
      mysqli_query($db, $sql);
      echo '<p>User Deleted</p>';
      mysqli_close($db);
    ?>
</body>
</html>

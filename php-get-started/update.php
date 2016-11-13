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

    $name = '';
    $gender = '';
    $color = '';


    if (isset($_POST['submit'])) {
      // process form
      $ok = true;

      // Form Validation
      // Name Field Rules
      if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
      } else {
        $name = $_POST['name'];
      }

      // Gender Radio Rules
      if (!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
      } else {
        $gender = $_POST['gender'];
      }

      // Favorite Color Select Rules
      if (!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
      } else {
        $color = $_POST['color'];
      }

      if ($ok) {
        $db = mysqli_connect('localhost', 'root', '', 'php');
        $sql = sprintf("UPDATE users SET name='%s', gender='%s', color='%s'
          WHERE id=%s",
          mysqli_real_escape_string($db, $name),
          mysqli_real_escape_string($db, $gender),
          mysqli_real_escape_string($db, $color),
          $id
        );

        mysqli_query($db, $sql);
        echo '<p>User updated.</p>';
        mysqli_close($db);
      }
    } else {
        $db = mysqli_connect('localhost', 'root', '', 'php');
        $sql = sprintf('SELECT * FROM users WHERE id=%s', $id);

        $result = mysqli_query($db, $sql);

        foreach ($result as $row) {
            $name = $row['name'];
            $gender = $row['gender'];
            $color = $row['color'];
        }
        mysqli_close($db);
    }
  ?>
    <form method="post" action="">
      Username: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name);
      ?>"><br>

      Gender:
        <input type="radio" name="gender" value="f"  <?php
          if ($gender === 'f') {
            echo ' checked';
          }
         ?>>female
        <input type="radio" name="gender" value="m"  <?php
          if ($gender === 'm') {
            echo ' checked';
          }
         ?>>male <br>

      Favorite Color:
        <select name="color" id="">
          <option value="">Select One</option>
          <option value="#f00" <?php
            if ($color === '#f00') {
              echo ' selected';
            }
           ?>>Red</option>
          <option value="#0f0" <?php
            if ($color === '#0f0') {
              echo ' selected';
            }
           ?>>Green</option>
          <option value="#00f" <?php
            if ($color === '#00f') {
              echo ' selected';
            }
           ?>>Blue</option>
        </select><br>

      <input type="submit" name="submit" value="Submit">
    </form>

  </body>
</html>

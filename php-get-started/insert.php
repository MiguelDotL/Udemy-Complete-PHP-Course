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

      // Form POST Formatting
      if ($ok) {
        // mysqli_connect(host:string, user:string, password:string, database:string, socket:string);
        $db = mysqli_connect('localhost', 'root', '', 'php');
        $sql = sprintf(
          "INSERT INTO users(name, gender, color)
          VALUES ('%s', '%s', '%s')",
          mysqli_real_escape_string($db, $name),
          mysqli_real_escape_string($db, $gender),
          mysqli_real_escape_string($db, $color)
        );
        mysqli_query($db, $sql);
        mysqli_close($db);
        echo '<p>User Added</p>';

        // printf('Username: %s<br>
        //         Password: %s<br>
        //         Gender: %s<br>
        //         Favorite Color: %s<br>
        //         Language(s): %s<br>
        //         Comments: %s<br>
        //         T&amp;C: %s',
        //         htmlspecialchars($name),
        //         htmlspecialchars($password),
        //         htmlspecialchars($gender),
        //         htmlspecialchars($color),
        //         htmlspecialchars(implode($languages, ' ')),
        //         htmlspecialchars($comments),
        //         htmlspecialchars($tc)
        // );
      }
    }
  ?>
    <form method="post" action="">
      Username: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name);
      ?>"><br>

      Gender:
        <input type="radio" name="gender" value="f"  <?php
          if ($gender === 'f') {
            echo ' selected';
          }
         ?>>female
        <input type="radio" name="gender" value="m"  <?php
          if ($gender === 'm') {
            echo ' selected';
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

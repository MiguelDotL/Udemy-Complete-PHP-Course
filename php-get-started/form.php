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
    $password = '';
    $comments = '';
    $gender = '';
    $tc = '';
    $color = '';
    $languages = array();

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

      // Password Field Rules
      if (!isset($_POST['password']) || $_POST['password'] === '') {
        $name = $_POST['name'];
        $ok = false;
      } else {
        $password = $_POST['password'];
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

      // Languages Select Rules
      if (!isset($_POST['languages']) || !is_array($_POST['languages']) || count($_POST['languages'] === 0)) {
        $ok = false;
      } else {
        $languages = $_POST['languages'];
      }

      // Comments Textarea Rules
      if (!isset($_POST['comments']) || $_POST['comments'] === '') {
        $ok = false;
      } else {
        $comments = $_POST['comments'];
      }

      // Terms and Conditions Checkbox Rules
      if (!isset($_POST['tc']) || $_POST['tc'] === '') {
        $ok = false;
      } else {
        $tc = $_POST['tc'];
      }

      // Form POST Formatting
      if ($ok) {
        printf('Username: %s<br>
                Password: %s<br>
                Gender: %s<br>
                Favorite Color: %s<br>
                Language(s): %s<br>
                Comments: %s<br>
                T&amp;C: %s',
                htmlspecialchars($name),
                htmlspecialchars($password),
                htmlspecialchars($gender),
                htmlspecialchars($color),
                htmlspecialchars(implode($languages, ' ')),
                htmlspecialchars($comments),
                htmlspecialchars($tc)
        );
      }
    }
  ?>
    <form method="post" action="">
      Username: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name);
      ?>"><br>
      Password: <input type="password" name="password" value="<?php
        echo htmlspecialchars($password);
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
      Languages Spoken:
        <select name="languages[]" multiple size="3">
          <option value="en" <?php
            if (in_array('en', $languages)) {
              echo ' selected';
            }
           ?>>English</option>
          <option value="de" <?php
            if (in_array('de', $languages)) {
              echo ' selected';
            }
           ?>>German</option>
          <option value="es" <?php
            if (in_array('es', $languages)) {
              echo ' selected';
            }
           ?>>Spanish</option>
          <option value="fr" <?php
            if (in_array('fr', $languages)) {
              echo ' selected';
            }
           ?>>French</option>
        </select><br>
      Comments:<br>
          <textarea name="comments" rows="8" cols="40"  value="<?php
            echo htmlspecialchars($comments);
          ?>"></textarea><br>
      <input type="checkbox" name="tc" value="ok" <?php
        if ($tc === 'ok') {
          echo ' checked';
        }
       ?>>I accept the Terms and Conditions<br>
      <input type="submit" name="submit" value="Submit">
    </form>

  </body>
</html>

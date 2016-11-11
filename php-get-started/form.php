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

    $ name = '';
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
      if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
      } else {
        $name = $_POST['name'];
      }
      if (!isset($_POST['password']) || $_POST['password'] === '') {
        $name = $_POST['name'];
        $ok = false;
      } else {
        $password = $_POST['password'];
      }
      if (!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
      } else {
        $gender = $_POST['gender'];
      }
      if (!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
      }

      if (!isset($_POST['languages']) || !is_array($_POST['languages']) || count($_POST['languages'] === 0)) {
        $ok = false;
      }

      if (!isset($_POST['comments']) || $_POST['comments'] === '') {
        $ok = false;
      }
      if (!isset($_POST['tc']) || $_POST['tc'] === '') {
        $ok = false;
      }
      if ($ok) {
        printf('Username: %s<br>
                Password: %s<br>
                Gender: %s<br>
                Favorite Color: %s<br>
                Language(s): %s<br>
                Comments: %s<br>
                T&amp;C: %s',
                htmlspecialchars($_POST['name']),
                htmlspecialchars($_POST['password']),
                htmlspecialchars($_POST['gender']),
                htmlspecialchars($_POST['color']),
                htmlspecialchars(implode($_POST['languages'], ' ')),
                htmlspecialchars($_POST['comments']),
                htmlspecialchars($_POST['tc'])
        );
      }
    }
  ?>
    <form method="post" action="">
      Username: <input type="text" name="name"><br>
      Password: <input type="password" name="password"><br>
      Gender:
        <input type="radio" name="gender" value="f">female
        <input type="radio" name="gender" value="m">male <br>
      Favorite Color:
        <select name="color" id="">
          <option value="">Select One</option>
          <option value="#f00">Red</option>
          <option value="#0f0">Green</option>
          <option value="#00f">Blue</option>
        </select><br>
      Languages Spoken:
        <select name="languages[]" multiple size="3">
          <option value="en">English</option>
          <option value="de">German</option>
          <option value="es">Spanish</option>
          <option value="fr">French</option>
        </select><br>
      Comments:<br>
          <textarea name="comments" rows="8" cols="40"></textarea><br>
      <input type="checkbox" name="tc" value="ok">I accept the Terms and Conditions<br>
      <input type="submit" name="submit" value="Submit">
    </form>

  </body>
</html>

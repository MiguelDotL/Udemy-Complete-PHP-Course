<?php
  session_start();

  $message = '';

  if(isset($_POST['name']) && isset($_POST['password'])) {
    $db = mysqli_connect('localhost', 'root', '', 'php');
    $sql = sprintf("SELECT * FROM users WHERE name='%s'",
    mysqli_real_escape_string($db, $_POST['name'])
  );
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);
  if($row) {
    $hash = $row['password'];
    $isAdmin  = $row['isAdmin'];

    if(password_verify($_POST['password'], $hash)) {
      $message = 'Login Successful!';

      $_SESSION['user'] = $row['name'];
      $_SESSION['isAdmin'] = $isAdmin;

    } else {
      $message = 'Login Failed.';
    }

  } else {
    $message = 'Login Failed.';
  }
  mysqli_close($db);
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
      echo "<p>$message</p>";
    ?>

    <form method="post">
      Username: <input type="text" name="name"><br>
      Password: <input type="password" name="password"><br>
      <input type="submit" value="Sign In">
    </form>

  </body>
</html>

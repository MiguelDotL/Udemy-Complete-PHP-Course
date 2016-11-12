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
    <ul>
      <?php

        $db = mysqli_connect('localhost', 'root', '', 'php');
        $sql = 'SELECT * FROM users';
        $result = mysqli_query($db, $sql );

        foreach ($result as $row)  {
          printf('<li><span style="color: %s;">%s (%s)</span>
            <a href="update.php?id=%s">edit</a></li>',
            htmlspecialchars($row['color']),
            htmlspecialchars($row['name']),
            htmlspecialchars($row['gender']),
            htmlspecialchars($row['id'])
          );
        }

        mysqli_close($db);
      ?>
    </ul>
  </body>
</html>

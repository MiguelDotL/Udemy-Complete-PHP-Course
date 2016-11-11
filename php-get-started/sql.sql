$sql = sprintf(
  "INSERT INTO table (col1, col2)
  VALUES ('s%', 's%')",
  mysqli_real_escape_string($db, 'value1'),
  mysqli_real_escape_string($db, 'value2')
);
mysqli_query($db, $sql);

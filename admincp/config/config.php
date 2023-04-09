<?php
$mysqli = new mysqli("localhost","root","12345678","Hades_Shop");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Kết nối MYSQLi lỗi: " . $mysqli -> connect_error;
  exit();
}

?>
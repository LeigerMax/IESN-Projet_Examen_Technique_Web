<?php
  session_start();
  include 'database.php';
  global $connect;
  $examThemeID = $_SESSION['examThemeID'];

  $connect->query("DELETE FROM examTheme WHERE examThemeID = '$examThemeID' ");
  header("Location: index.php");
?>

<?php
session_start();
if(isset($_POST['button'])) {
  include 'mysql.php';
  $fname = strip_tags($_POST['ees']);
  $lname = strip_tags($_POST['pere']);
  $idnum = strip_tags($_POST['idnum']);
  $fname = stripslashes($_POST['ees']);
  $lname = stripslashes($_POST['pere']);
  $idnum = stripslashes($_POST['idnum']);
  $fname = mysqli_real_escape_string($link, $_POST['ees']);
  $lname = mysqli_real_escape_string($link, $_POST['pere']);
  $idnum = mysqli_real_escape_string($link, $_POST['idnum']);
  $idnumString = "$idnum";
  // If connection fails
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $sql = "INSERT INTO kasutajad (eesnimi, perenimi, isikukood) VALUES ('$fname','$lname','$idnumString')";
  // If connection successful
  mysqli_query($link, $sql);
  mysqli_close();
  $userId = $_POST['idnum'];
  $_SESSION['currentUser'] = $userId;

  if(isset($_SESSION['currentUser'])){
    header("Location: kys.php");
  } else {
    header("Location: pea.php");
  }

} else {
  echo "viga";
}
?>

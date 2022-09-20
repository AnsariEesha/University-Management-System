
<?php
 include 'connect.php';


if (isset($_POST['insert'])) {

  $societyid = mysqli_real_escape_string($db, $_POST['societyid']);
  $societyname = mysqli_real_escape_string($db, $_POST['societyname']);



  $query = "INSERT INTO Societies (SOCIETY_ID, NAME) VALUES('$societyid', '$societyname')";
  mysqli_query($db, $query);
  header('location: societies.php');

}

if (isset($_POST['update'])) {

    $societyid = mysqli_real_escape_string($db, $_POST['societyid']);
    $societyname = mysqli_real_escape_string($db, $_POST['societyname']);
  
  $query = "UPDATE Societies SET
              SOCIETY_ID = '$societyid',
              NAME = '$societyname'

            WHERE SOCIETY_ID = '$societyid'";

  mysqli_query($db, $query);
  header('location: societies.php');

}

if (isset($_POST['delete'])) {

  
  $societyid = mysqli_real_escape_string($db, $_POST["societyid"]);

  $query = "delete from STUDENT_SOCIETIES where SOCIETY_ID='$societyid'";
  mysqli_query($db, $query);

  $query = "delete from Societies where SOCIETY_ID='$societyid'";
  mysqli_query($db, $query);
  header('location: societies.php');
}

mysqli_close($db);
?>

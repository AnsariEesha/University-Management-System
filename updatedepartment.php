
<?php
 include 'connect.php';


if (isset($_POST['insert'])) {

  $deptid = mysqli_real_escape_string($db, $_POST['deptid']);
  $deptname = mysqli_real_escape_string($db, $_POST['deptname']);



  $query = "INSERT INTO Department (DEPT_ID, NAME) VALUES('$deptid', '$deptname')";
  mysqli_query($db, $query);
  header('location: departments.php');

}

if (isset($_POST['update'])) {

    $deptid = mysqli_real_escape_string($db, $_POST['deptid']);
    $deptname = mysqli_real_escape_string($db, $_POST['deptname']);
  
  $query = "UPDATE DEPARTMENT SET
              DEPT_ID = '$deptid',
              NAME = '$deptname'

            WHERE DEPT_ID = '$deptid'";

  mysqli_query($db, $query);
  header('location: departments.php');

}

if (isset($_POST['delete'])) {
  
  $deptid = mysqli_real_escape_string($db, $_POST["deptid"]);
  $query = "delete from Department where DEPT_ID='$deptid'";
  mysqli_query($db, $query);
  header('location: departments.php');
}

mysqli_close($db);
?>















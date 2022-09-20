
<?php
 include 'connect.php';


if (isset($_POST['insert'])) {

    $rollno = mysqli_real_escape_string($db, $_POST["rollno"]);
    $batch = mysqli_real_escape_string($db, $_POST["batch"]);
    $society1 = mysqli_real_escape_string($db, $_POST["id1"]);
    $society2 = mysqli_real_escape_string($db, $_POST["id2"]);

  $query = "INSERT INTO STUDENT_SOCIETIES (ROLL_NO, BATCH, SOCIETY_ID) VALUES('$rollno', '$batch', '$society1')";
  mysqli_query($db, $query);

  if ($society2 != "") {
    $query = "INSERT INTO STUDENT_SOCIETIES (ROLL_NO, BATCH, SOCIETY_ID) VALUES('$rollno', '$batch', '$society2')";
    mysqli_query($db, $query);
  }

header('location: studentsocieties.php');

}

if (isset($_POST['update'])) {

    $rollno = mysqli_real_escape_string($db, $_POST["rollno"]);
    $batch = mysqli_real_escape_string($db, $_POST["batch"]);
    $society1 = mysqli_real_escape_string($db, $_POST["id1"]);
    $society2 = mysqli_real_escape_string($db, $_POST["id2"]);
     
  
  $query = "UPDATE STUDENT_SOCIETIES SET
              ROLL_NO = '$rollno',
              BATCH = '$batch',
              SOCIETY_ID = '$society2'

            WHERE ROLL_NO = '$rollno' AND BATCH = '$batch' AND SOCIETY_ID = '$society1'";
    
    mysqli_query($db, $query);
    header('location: studentsocieties.php');
}

if (isset($_POST['delete'])) {
  
  $rollno = mysqli_real_escape_string($db, $_POST["rollno"]);
  $batch = mysqli_real_escape_string($db, $_POST["batch"]);
  $societyid = mysqli_real_escape_string($db, $_POST["societyid"]);

  $query = "DELETE FROM STUDENT_SOCIETIES WHERE ROLL_NO='$rollno' AND BATCH='$batch' AND SOCIETY_ID='$societyid'";
  mysqli_query($db, $query);
  header('location: studentsocieties.php');
}

mysqli_close($db);
?>















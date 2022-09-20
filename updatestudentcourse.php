
<?php
 include 'connect.php';


if (isset($_POST['insert'])) {

    $rollno = mysqli_real_escape_string($db, $_POST["rollno"]);
    $batch = mysqli_real_escape_string($db, $_POST["batch"]);
    $course1 = mysqli_real_escape_string($db, $_POST["id1"]);
    $course2 = mysqli_real_escape_string($db, $_POST["id2"]);
    $course3 = mysqli_real_escape_string($db, $_POST["id3"]);

  $query = "INSERT INTO STUDENT_COURSES (ROLL_NO, BATCH, COURSE_ID) VALUES('$rollno', '$batch', '$course1')";
  mysqli_query($db, $query);

  if ($course2 != "") {
    $query = "INSERT INTO STUDENT_COURSES (ROLL_NO, BATCH, COURSE_ID) VALUES('$rollno', '$batch', '$course2')";
    mysqli_query($db, $query);
  }

  if ($course3 != "") {
    $query = "INSERT INTO STUDENT_COURSES (ROLL_NO, BATCH, COURSE_ID) VALUES('$rollno', '$batch', '$course3')";
    mysqli_query($db, $query);
}
header('location: studentcourses.php');

}

if (isset($_POST['update'])) {

    $rollno = mysqli_real_escape_string($db, $_POST["rollno"]);
    $batch = mysqli_real_escape_string($db, $_POST["batch"]);
    $course1 = mysqli_real_escape_string($db, $_POST["id1"]);
    $course2 = mysqli_real_escape_string($db, $_POST["id2"]);
     
  
  $query = "UPDATE STUDENT_COURSES SET
              ROLL_NO = '$rollno',
              BATCH = '$batch',
              COURSE_ID = '$course2'

            WHERE ROLL_NO = '$rollno' AND BATCH = '$batch' AND COURSE_ID = '$course1'";

    echo "<script>alert('$query');</script>";
    
    mysqli_query($db, $query);
    header('location: studentcourses.php');

}

if (isset($_POST['delete'])) {
  
  $rollno = mysqli_real_escape_string($db, $_POST["rollno"]);
  $batch = mysqli_real_escape_string($db, $_POST["batch"]);
  $courseid = mysqli_real_escape_string($db, $_POST["courseid"]);

  $query = "DELETE FROM STUDENT_COURSES WHERE ROLL_NO='$rollno' AND BATCH='$batch' AND COURSE_ID='$courseid'";
  mysqli_query($db, $query);
  header('location: studentcourses.php');
}

mysqli_close($db);
?>















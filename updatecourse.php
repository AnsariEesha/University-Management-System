<?php
 include 'connect.php';

 if (isset($_POST['insert'])) {

    $courseid = mysqli_real_escape_string($db, $_POST['courseid']);
    $coursename = mysqli_real_escape_string($db, $_POST['coursename']);
    $deptid = mysqli_real_escape_string($db, $_POST['deptid']);
  
    $query = "INSERT INTO COURSES (COURSE_ID, NAME) VALUES('$courseid', '$coursename')";
    mysqli_query($db, $query);

    $query = "INSERT INTO DEPARTMENT_COURSES (COURSE_ID, DEPT_ID) VALUES('$courseid', '$deptid')";
    mysqli_query($db, $query);

    header('location: courses.php');
  
  }

  if (isset($_POST['update'])) {

    $courseid = mysqli_real_escape_string($db, $_POST['courseid']);
    $coursename = mysqli_real_escape_string($db, $_POST['coursename']);
    $deptid = mysqli_real_escape_string($db, $_POST['deptid']);
  
  $query = "UPDATE COURSES SET
              NAME = '$coursename'
            WHERE COURSE_ID = '$courseid'";

  mysqli_query($db, $query);

  $query = "UPDATE DEPARTMENT_COURSES SET
            DEPT_ID = '$deptid'
            WHERE COURSE_ID = '$courseid'";


  mysqli_query($db, $query);

  header('location: courses.php');

}





 if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($db, $_POST["courseid"]);

    $query = "delete from STUDENT_COURSES where COURSE_ID='$id'";
    mysqli_query($db, $query);

    $query = "delete from COURSES where COURSE_ID='$id'";
    mysqli_query($db, $query);

    $query = "delete from DEPARTMENT_COURSES where COURSE_ID='$id'";
    mysqli_query($db, $query);

    header('location: courses.php');
  
  }
  
  mysqli_close($db);
  ?>
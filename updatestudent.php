
<?php
 include 'connect.php';


if (isset($_POST['insert'])) {

  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $dateOfBirth = mysqli_real_escape_string($db, $_POST['dateOfBirth']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $rollNo = mysqli_real_escape_string($db, $_POST['rollNo']);
  $departID = mysqli_real_escape_string($db, $_POST['departID']);
  $batch = mysqli_real_escape_string($db, $_POST['batch']);
  $acc_no = mysqli_real_escape_string($db, $_POST['acc_no']);

  $fee = mysqli_real_escape_string($db, $_POST['fee']);
  $status = mysqli_real_escape_string($db, $_POST['status']);

  $query = "INSERT INTO FINANCE (ACC_NO, FEE, STATUS) VALUES('$acc_no', '$fee', '$status')";
  mysqli_query($db, $query);

  $query = "INSERT INTO Student (FNAME, LNAME, DOB, GENDER, ROLL_NO, DEPT_ID, BATCH, ACC_NO) 
  VALUES('$firstName', '$lastName', '$dateOfBirth', '$gender', '$rollNo', '$departID', '$batch', '$acc_no')";
  mysqli_query($db, $query);
  header('location: students.php');

}

if (isset($_POST['update'])) {

  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $dateOfBirth = mysqli_real_escape_string($db, $_POST['dateOfBirth']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $rollNo = mysqli_real_escape_string($db, $_POST['rollNo']);
  $departID = mysqli_real_escape_string($db, $_POST['departID']);
  $batch = mysqli_real_escape_string($db, $_POST['batch']);

  $query = "UPDATE Student SET
              FNAME = '$firstName',
              LNAME = '$lastName',
              DOB   =  '$dateOfBirth',
              GENDER=  '$gender',
              ROLL_NO=  '$rollNo',
              DEPT_ID=  '$departID',
              BATCH  = '$batch' 
            WHERE ROLL_NO = '$rollNo'";

  mysqli_query($db, $query);
  header('location: students.php');

}

if (isset($_POST['delete'])) {
  $rollNo = mysqli_real_escape_string($db, $_POST["rollNo"]);
  $batch = mysqli_real_escape_string($db, $_POST["batch"]);
  $accno = mysqli_real_escape_string($db, $_POST["accno"]);

  $query = "delete from FINANCE where ACC_NO='$accno'";
  mysqli_query($db, $query);

  $query = "delete from STUDENT_COURSES where ROLL_NO='$rollNo' AND BATCH='$batch'";
  mysqli_query($db, $query);

  $query = "delete from STUDENT_COURSES where ROLL_NO='$rollNo' AND BATCH='$batch'";
  mysqli_query($db, $query);

  $query = "delete from STUDENT_SOCIETIES where ROLL_NO='$rollNo' AND BATCH='$batch'";
  mysqli_query($db, $query);

  $query = "delete from Student where ROLL_NO='$rollNo' AND BATCH='$batch'";
  mysqli_query($db, $query);
  header('location: students.php');

}

mysqli_close($db);
?>















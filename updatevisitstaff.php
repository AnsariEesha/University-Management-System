<?php
 include 'connect.php';


if (isset($_POST['insert'])) {

  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $Designation = mysqli_real_escape_string($db, $_POST['Designation']);
  $Staffid = mysqli_real_escape_string($db, $_POST['Staffid']);
  $departid = mysqli_real_escape_string($db, $_POST['departID']);
  $Qualification = mysqli_real_escape_string($db, $_POST['Qualification']);
  $uniname= mysqli_real_escape_string($db, $_POST['University_name']);
  $phoneno1= mysqli_real_escape_string($db,$_POST['phone_number1']);
  $phoneno2= mysqli_real_escape_string($db,$_POST['phone_number2']);


  $query = "INSERT INTO VISITINGSTAFF (FNAME, LNAME, EMAIL, DESIGNATION, STAFF_ID, DEPT_ID, QUALIFICATION, UNI_NAME) 
  VALUES('$firstName', '$lastName', '$Email','$Designation','$Staffid','$departid','$Qualification', '$uniname')";
  mysqli_query($db, $query);

  $query= "INSERT INTO STAFF_CONTACTS (STAFF_ID,PHONE_NO) VALUES ('$Staffid','$phoneno1')";
  mysqli_query($db,$query);

  if ($phoneno2 != "") {
    $query= "INSERT INTO STAFF_CONTACTS (STAFF_ID,PHONE_NO) VALUES ('$Staffid','$phoneno2')";
    mysqli_query($db,$query);
  }

  header('location: visitingstaff.php');

}

if (isset($_POST['update'])) {

  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $Designation = mysqli_real_escape_string($db, $_POST['Designation']);
  $Staffid = mysqli_real_escape_string($db, $_POST['Staffid']);
  $departid = mysqli_real_escape_string($db, $_POST['departID']);
  $Qualification = mysqli_real_escape_string($db, $_POST['Qualification']);
  $uniname= mysqli_real_escape_string($db, $_POST['University_name']);

  $query = "UPDATE visitingstaff SET
              FNAME = '$firstName',
              LNAME = '$lastName',
              EMAIL = '$Email',
              DESIGNATION= '$Designation',
              STAFF_ID= '$Staffid',
              DEPT_ID= '$departid',
              QUALIFICATION= '$Qualification',
              UNI_NAME = '$uniname'
            WHERE STAFF_ID= '$Staffid'";

  mysqli_query($db, $query);
  header('location: visitingstaff.php');

}

if (isset($_POST['delete'])) {
  $Staffid = mysqli_real_escape_string($db, $_POST["Staffid"]);

  $query = "delete from VISITINGSTAFF where STAFF_ID='$Staffid'";
  mysqli_query($db, $query);

  $query = "delete from STAFF_CONTACTS where STAFF_ID='$Staffid'";
  mysqli_query($db, $query);

  header('location: visitingstaff.php');

}

mysqli_close($db);
?>
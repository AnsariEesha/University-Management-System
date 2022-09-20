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
  $phoneno1= mysqli_real_escape_string($db,$_POST['phone_number1']);
  $phoneno2= mysqli_real_escape_string($db,$_POST['phone_number2']);

  $query = "INSERT INTO REGULARSTAFF (FNAME, LNAME, EMAIL, DESIGNATION, STAFF_ID, DEPT_ID, QUALIFICATION) 
  VALUES('$firstName', '$lastName', '$Email','$Designation','$Staffid','$departid','$Qualification')";
  mysqli_query($db, $query);

  $query= "INSERT INTO STAFF_CONTACTS (STAFF_ID,PHONE_NO) VALUES ('$Staffid','$phoneno1')";
  mysqli_query($db,$query);
  
  if ($phoneno2 != "") {
    $query= "INSERT INTO STAFF_CONTACTS (STAFF_ID,PHONE_NO) VALUES ('$Staffid','$phoneno2')";
    mysqli_query($db,$query);
  }

  header('location: regstaff.php');

}

if (isset($_POST['update'])) {

  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $Designation = mysqli_real_escape_string($db, $_POST['Designation']);
  $Staffid = mysqli_real_escape_string($db, $_POST['Staffid']);
  $departid = mysqli_real_escape_string($db, $_POST['departID']);
  $Qualification = mysqli_real_escape_string($db, $_POST['Qualification']);

  $query = "UPDATE regularstaff SET
              FNAME = '$firstName',
              LNAME = '$lastName',
              EMAIL = '$Email',
              DESIGNATION= '$Designation',
              STAFF_ID= '$Staffid',
              DEPT_ID= '$departid',
              QUALIFICATION= '$Qualification'
            WHERE STAFF_ID= '$Staffid'";

  mysqli_query($db, $query);
  header('location: regstaff.php');

}

if (isset($_POST['delete'])) {
  $Staffid = mysqli_real_escape_string($db, $_POST["Staffid"]);

  $query = "delete from regularstaff where STAFF_ID='$Staffid'";
  mysqli_query($db, $query);

  $query = "delete from STAFF_CONTACTS where STAFF_ID='$Staffid'";
  mysqli_query($db, $query);
  header('location: regstaff.php');

}

mysqli_close($db);
?>
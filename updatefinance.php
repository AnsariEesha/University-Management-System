
<?php
 include 'connect.php';

if (isset($_POST['update'])) {

    $accno = mysqli_real_escape_string($db, $_POST['acc_no']);
  $fee = mysqli_real_escape_string($db, $_POST['fee']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  
  $query = "UPDATE FINANCE SET
              FEE = '$fee',
              STATUS = '$status'

            WHERE ACC_NO = '$accno'";

  mysqli_query($db, $query);
  header('location: finance.php');

}

mysqli_close($db);
?>















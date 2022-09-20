
<?php
 include 'connect.php';
 

if (isset($_POST['update'])) {

    $id = mysqli_real_escape_string($db, $_POST['id']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password1 = md5($password1);
    
    $query = "SELECT * FROM USERS WHERE ID='$id' AND PASSWORD='$password1'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password1 = mysqli_real_escape_string($db, $_POST['password1']);
      $password2 = mysqli_real_escape_string($db, $_POST['password2']);
      $password2 = md5($password2);

      $query = "UPDATE USERS SET
                ID = '$id',
                USERNAME = '$username',
                EMAIL   =  '$email',
                PASSWORD = '$password2'
                WHERE ID = '$id'";

      mysqli_query($db, $query);
      header('location: admin.php');
      
    } else {
      echo '<script>alert("Wrong Password")</script>';
      header('location: admin.php');
    }
}

if (isset($_POST['delete'])) {
  $id = mysqli_real_escape_string($db, $_POST["id"]);

  $query = "delete from USERS where ID='$id'";
  mysqli_query($db, $query);
  header('location: admin.php');

}

mysqli_close($db);
?>
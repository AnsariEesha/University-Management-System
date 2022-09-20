<?php include 'session.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University DBMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    h1{
        font-family: 'Anton', sans-serif;
        color:white;
    }
</style>

<?php include 'connect.php';?>

        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <?php 
                unset($_SESSION['success']);
            ?>
        <?php endif ?>
    

<body>

    

    <div
     class="bg-image d-flex justify-content-center align-items-center"
     style="
            background-image: url('assets/bg.jpg');
            height: 100vh;
            background-position: center;
            text-align:center;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: rgba(0,0,0,.5);
        background-blend-mode: multiply;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
            "
     >
     <?php include 'navigation.php' ?>  
     <h1><br><br><br><br><br><br>Welcome<br> To <br> UDBMS</h1>
     
</div>
<footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>© 2020–2021 All Rights Reserved, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
</footer>
   
</body>

</html>
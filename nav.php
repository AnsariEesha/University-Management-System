<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="index.php">UDBMS</a>
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Collapsible wrapper -->
    <div
      class="collapse navbar-collapse justify-content-center"
      id="navbarCenteredExample"
    >
      <!-- Left links -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
        <!-- Navbar dropdown 1-->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Student
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="students.php">Student Information</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="studentcourses.php">Student Courses</a>
          <a class="dropdown-item" href="studentsocieties.php">Student Societies</a>
        </div>
      </li>

                <!-- Navbar dropdown2 -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Staff
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="regstaff.php">Regular Staff</a>
          <a class="dropdown-item" href="visitingstaff.php">Visiting Staff</a>
        </div>
      </li>

        <li class="nav-item"><a class="nav-link" href="department.php">Departments</a></li>
        <li class="nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="finance.php">Finance</a></li>
        <li class="nav-item"><a class="nav-link" href="societies.php">Societies</a></li>
        <li class="nav-item"><a class="nav-link" href="admin.php">Administrators</a></li>
        
        
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

    <!-- <?php  if (isset($_SESSION['username'])) :
                echo'<li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Welcome <strong>'.ucfirst($_SESSION['username']).'</strong></hr></li>';
                echo'<li class="nav-item"><a href="index.php?logout=\'1\'"><span class="glyphicon glyphicon-log-in"></span><strong">Logout</strong></a></li>';
                ?>
     <?php endif ?> -->
    </ul>

  </div>
  <!-- Container wrapper -->
</nav>
</body>
</html>

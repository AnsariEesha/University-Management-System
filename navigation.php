<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" style="margin-right: 100px" href="index.php">UDBMS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Students <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="students.php">Student Information</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="studentcourses.php">Student Courses</a></li>
            <li><a href="studentsocieties.php">Student Societies</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Staff <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="regstaff.php">Regular Staff</a></li>
            <li><a href="visitingstaff.php">Visiting Staff</a></li>
          </ul>
        </li>

       
        <li class="nav-item"><a class="nav-link" href="departments.php">Departments</a></li>
        <li class="nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="finance.php">Finance</a></li>
        <li class="nav-item"><a class="nav-link" href="societies.php">Societies</a></li>
        <li class="nav-item"><a class="nav-link" href="admin.php">Administrators</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        
        <?php  if (isset($_SESSION['username'])) :
                
        echo'<li><a href="">Welcome '.ucfirst($_SESSION['username']).'</a></li>';
        echo'<li><a href="index.php?logout=\'1\'">Logout</a></li>';
        ?>
        <?php endif ?>

        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
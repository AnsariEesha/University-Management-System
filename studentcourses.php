<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Student Courses</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<style>

.content {margin:2em;}
td:last-child {text-align:center;}

</style>

<body>
<?php include 'session.php';?>
<?php include 'navigation.php' ?>
<div class="content">
<h1>Student Courses</h1>
<!-- partial:index.partial.html -->
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Roll No</th>
			<th>Batch</th>
            <th>Course ID</th>
            <th>Course Name</th>

			<th style="text-align:center;width:100px;">Add Student Course <button type="button"  class="btn btn-success btn-xs" data-toggle="modal" data-target="#addModal">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				</button></th>
		</tr>
	</thead>
	<tbody>
	<?php   
			include 'connect.php';
			$sql = "SELECT * FROM STUDENT_COURSES";
			$result = $db->query($sql);

			if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				
				echo "<tr>"; 
				echo "<td>".$row["ROLL_NO"]."</td>";
				echo "<td>".$row["BATCH"]."</td>";
                echo "<td>".$row["COURSE_ID"]."</td>";
                $id = $row["COURSE_ID"];
                $q = "SELECT NAME FROM COURSES WHERE COURSE_ID='$id'";
                $course = $db->query($q);
                $course = $course->fetch_assoc();
                echo "<td>".$course["NAME"]."</td>";
				echo 
					'<td>
					<div class="row">
					<div class="col-xs-6 text-left">
					  <div class="previous">
								<button id="editbtn" type="button" class="editbtn btn btn-primary btn-xs" data-toggle="modal" data-target="editModal">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
					</div>
				  </div>
				  <div class="col-xs-6 text-right">   
				<div class="next">
					<form method="post" action="updatestudentcourse.php" class="inline">
					<input type="hidden" name="rollno" value="'.$row["ROLL_NO"].'">
					<input type="hidden" name="batch" value="'.$row["BATCH"].'">
					<input type="hidden" name="courseid" value="'.$row["COURSE_ID"].'">
					<button type="submit" name="delete" class="btn btn-danger btn-xs dt-delete" onclick="clicked(event)">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</button>
					</form>
					</div>
					</div>
				</div>
					</td>';
					
				echo "</tr>";
			}

			} else {
				echo "0 results";
			}
			mysqli_close($db);
		?>

	</tbody>
</table>
</div>

<div class="container">
  <!-- Add Modal -->
  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
            <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Add Student Course</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="updatestudentcourse.php">
        <div class='form-row'>
                <div class="col">
                    <label class="form-label">Roll No</label>
                    <input type="text" class="form-control" name="rollno" required>
                </div>
                <div class="col">
                    <label class="form-label">Batch</label>
                    <input type="text" class="form-control" name="batch" required>
                </div>
                <div class="col">
                    <label class="form-label">Course 1</label>
                    <input type="text" class="form-control" name="id1" required>
                </div>
                <div class="col">
                    <label class="form-label">Course 2</label>
                    <input type="text" class="form-control" name="id2">
                </div>
                <div class="col">
                    <label class="form-label">Course 3</label>
                    <input type="text" class="form-control" name="id3">
                </div>
        </div>
         <br />
         
         <center><input type="submit" name="insert" class="btn btn-success" /></center>
    
        </form>
       </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      	
        </div>
      </div>
    </div>

	  <!-- Edit Modal -->
	  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
            <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Edit Course</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="updatestudentcourse.php">
      <div class='form-row'>
                <div class="col">
                    <label class="form-label">Roll No</label>
                    <input type="text" id="ROLLNO" class="form-control" name="rollno" required>
                </div>
                <div class="col">
                    <label class="form-label">Batch</label>
                    <input type="text" id="BATCH" class="form-control" name="batch" required>
                </div>
                <div class="col">
                    <label class="form-label">Previous Course ID</label>
                    <input type="text" id="ID" class="form-control" name="id1" required>
                </div>
                <div class="col">
                    <label class="form-label">New Course ID</label>
                    <input type="text" class="form-control" name="id2" required>
                </div>
        </div>
         <br />
         
         <center><input type="submit" name="update" class="btn btn-success" /></center>
    
        </form>
       </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      	
        </div>
      </div>
    </div>
  </div>


<!-- partial -->
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>

<script>

  function clicked(e)
{
    if(!confirm('Are you sure?')) {
        e.preventDefault();
    }
}

	$(document).ready(function() {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title='Student Courses';
	// DataTable initialisation
	$('#example').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": false,
			"autoWidth": true,
			"columnDefs": [
				{ "orderable": false, "targets": 4 }
			],
			"buttons": [
				'colvis',
				'copyHtml5',
        'csvHtml5',
				'excelHtml5',
        'pdfHtml5',
				'print'
			]
		}
	);
	
	$('#myModal').on('hidden.bs.modal', function (evt) {
		$('.modal .modal-body').empty();
	});
});

$(document).ready(function(){
    $(".editbtn").click(function(){
        $("#editModal").modal("show");

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);
        $('#ROLLNO').val(data[0]);
        $('#BATCH').val(data[1]);
        $('#ID').val(data[2]);
    });
});

</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en" >
<head>
  <script>
    $(".nav .nav-link").on("click", function(){
    $(".nav").find(".active").removeClass("active");
    $(this).addClass("active");
  });
</script>
  <meta charset="UTF-8">
  <title>Students</title>

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
<?php include 'session.php';?>
<?php include 'navigation.php' ?>

<body>
<!-- partial:index.partial.html -->
<div id="main" class="content">
<h1>Students</h1>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
    <th>Roll No</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date of Birth</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Batch</th>
    <th>Dept ID</th>
    <th>Department</th>
			<th style="text-align:center;width:100px;">Add Student <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addModal">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				</button></th>
		</tr>
	</thead>
	<tbody>
	<?php   
			include 'connect.php';
      $sql = "SELECT * FROM STUDENT";
      $result = $db->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>"; 
          echo "<td>".$row["ROLL_NO"]."</td>";
          echo "<td>".$row["FNAME"]."</td>";
          echo "<td>".$row["LNAME"]."</td>";
          echo "<td>".$row["DOB"]."</td>";
          $age = date_diff(date_create($row["DOB"]), date_create('now'))->y;
          echo "<td>".$age."</td>";
          echo "<td>".$row["GENDER"]."</td>";
          echo "<td>".$row["BATCH"]."</td>";
          echo "<td>".$row["DEPT_ID"]."</td>";
          $id = $row["DEPT_ID"];
          $q = "SELECT NAME FROM DEPARTMENT WHERE DEPT_ID='$id'";
          $dept = $db->query($q);
          $dept = $dept->fetch_assoc();
          echo "<td>".$dept["NAME"]."</td>";
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
            <form method="post" action="updatestudent.php" class="inline">
            <input type="hidden" name="rollNo" value="'.$row["ROLL_NO"].'">
            <input type="hidden" name="batch" value="'.$row["BATCH"].'">
            <input type="hidden" name="accno" value="'.$row["ACC_NO"].'">
            
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
      <h4 class="modal-title" id="myModalLabel">Add Student</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="updatestudent.php">
        <div class='form-row'>
                <div class="col">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstName" required>
                </div>
                <div class="col">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastName" required>
                </div>
        </div>
         <br />
         <div class='form-row'>
         <div class="col">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" name="dateOfBirth" required>
                </div>
                <br />
                <div class="col">
                    <label class="form-label">Gender</label>
                    <select class="form-select" name="gender" required>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                
         <br />  
         <div class='form-row'>
         <div class="col">
                    <label class="form-label">Roll No</label>
                    <input type="text" class="form-control" name="rollNo" required>
                </div>
    
                <div class="col">
                    <label class="form-label">Department ID</label>
                    <input type="text" class="form-control" name="departID" required>
                </div>
          </div>
          <div class='form-row'>
                <div class="col">
                    <label class="form-label">Batch</label>
                    <input type="text" class="form-control" name="batch" required>
                </div>
                <div class="col">
                    <label class="form-label">Account Number</label>
                    <input type="number" class="form-control" name="acc_no" required>
                </div>
          </div>
          <div class="col">
                    <label class="form-label">Fee</label>
                    <input type="text" class="form-control" name="fee" required>
                </div>
    </br>
                <div class="col">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" required>
                        <option value="PAID">PAID</option>
                        <option value="NOT PAID">NOT PAID</option>
                    </select>
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
  </div>


 <!-- EDIT MODAL-->
 <div class="modal fade editModal" id="editModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
            <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Edit Student</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="updatestudent.php">
        <div class='form-row'>
                <div class="col">
                    <label class="form-label">First Name</label>
                    <input type="text" id="FNAME" class="form-control" name="firstName" required>
                </div>
                <div class="col">
                    <label class="form-label">Last Name</label>
                    <input type="text" id="LNAME" class="form-control" name="lastName" required>
                </div>
        </div>
         <br />
         <div class='form-row'>
         <div class="col">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" id="DOB" class="form-control" name="dateOfBirth" required>
                </div>
                <br />
                <div class="col">
                    <label class="form-label">Gender</label>
                    <select id="GENDER" class="form-select" name="gender" required>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                
         <br />  
         <div class='form-row'>
         <div class="col">
                    <label class="form-label">Roll No</label>
                    <input type="text" id="ROLL_NO" class="form-control" name="rollNo" readonly>
                </div>
    
                <div class="col">
                    <label class="form-label">Department ID</label>
                    <input type="text" id="DEPT_ID" class="form-control" name="departID" required>
                </div>
          </div>
          <div class='form-row'>
                <div class="col">
                    <label class="form-label">Batch</label>
                    <input type="text" id="BATCH" class="form-control" name="batch" readonly>
                </div>
                <!-- <div class="col">
                    <label class="form-label">Account Number</label>
                    <input type="number" id="ACC_NO" class="form-control" name="acc_no" required>
                </div> -->
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

$(".nav .nav-link").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).addClass("active");
});

  function clicked(e)
{
    if(!confirm('Are you sure?')) {
        e.preventDefault();
    }
}

	$(document).ready(function() {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title='Student Data';
	// DataTable initialisation
	$('#example').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": false,
			"autoWidth": true,
			"columnDefs": [
				{ "orderable": false, "targets": 9 }
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
		$('.modal1 .modal-body').empty();
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
        $('#ROLL_NO').val(data[0]);
        $('#FNAME').val(data[1]);
        $('#LNAME').val(data[2]);
        $('#DOB').val(data[3]);
        $('#GENDER').val(data[5]);
        $('#BATCH').val(data[6]);
        $('#DEPT_ID').val(data[7]);
    });
});

</script>

</body>
</html>




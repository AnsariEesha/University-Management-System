<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Regular Staff</title>

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
<h1>Regular Staff</h1>
<p><a href="staffcontacts.php">Staff Contacts</a></p>
<!-- partial:index.partial.html -->
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
        <th>Staff ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Designation</th>
        <th>Qualification</th>
        <th>Dept ID</th>
        <th>Department</th>
        <th style="text-align:center;width:100px;">Add Staff <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addModal">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button></th>
		</tr>
	</thead>
	<tbody>
    <?php
        include 'connect.php';
        $sql = "SELECT * FROM REGULARSTAFF";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>"; 
              echo "<td>".$row["STAFF_ID"]."</td>";
              echo "<td>".$row["FNAME"]."</td>";
              echo "<td>".$row["LNAME"]."</td>";
              echo "<td>".$row["EMAIL"]."</td>";
              echo "<td>".$row["DESIGNATION"]."</td>";
              echo "<td>".$row["QUALIFICATION"]."</td>";
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
              <form method="post" action="updateregstaff.php" class="inline">
              <input type="hidden" name="Staffid" value="'.$row["STAFF_ID"].'">
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
        }
        else {
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
      <h4 class="modal-title" id="myModalLabel">Add Regular Staff</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="updateregstaff.php">
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
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="Email" required>
                </div>
                <br />
                <div class="col">
                    <label class="form-label">Designation</label>
                    <input type="text" class="form-control" name="Designation" required>
                    
                </div>
                
         <br />  
         <div class='form-row'>
         <div class="col">
                    <label class="form-label">Staff ID</label>
                    <input type="text" class="form-control" name="Staffid" required>
                </div>
    
                <div class="col">
                    <label class="form-label">Department</label>
                    <input type="text" class="form-control" name="departID" required>
                </div>
          </div>
          <div class='form-row'>
                <div class="col">
                    <label class="form-label">Qualfication</label>
                    <input type="text" class="form-control" name="Qualification" required>
                </div>
                <div class="col">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control" name="phone_number1" required>
                </div>
          </div>
          <div class="col">
                    <label class="form-label">Emergency Phone Number</label>
                    <input type="number" class="form-control" name="phone_number2">
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
      <h4 class="modal-title" id="myModalLabel">Edit Regular Staff</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="updateregstaff.php">
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
                    <label class="form-label">Email</label>
                    <input type="text" id="EMAIL" class="form-control" name="Email" required>
                </div>
                <br />
                <div class="col">
                    <label class="form-label">Designation</label>
                    <input type="text" id="DESIGNATION" class="form-control" name="Designation" required>
                    
                </div>
                
         <br />  
         <div class='form-row'>
         <div class="col">
                    <label class="form-label">Staff id</label>
                    <input type="text" id="STAFF_ID" class="form-control" name="Staffid" readonly>
                </div>
    
                <div class="col">
                    <label class="form-label">Department</label>
                    <input type="text" id="DEPT_ID" class="form-control" name="departID" required>
                </div>
          </div>
          <div class='form-row'>
                <div class="col">
                    <label class="form-label">Qualification</label>
                    <input type="text" id="QUALIFICATION" class="form-control" name="Qualification" required>
                </div>
          </div>
          <div class="col">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control" name="phone_number1" required>
                </div>
          </div>
          <div class="col">
                    <label class="form-label">Emergency Phone Number</label>
                    <input type="number" class="form-control" name="phone_number2">
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
  function clicked(e)
{
    if(!confirm('Are you sure?')) {
        e.preventDefault();
    }
}

	$(document).ready(function() {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title='Regular Staff Information';
	// DataTable initialisation
	$('#example').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": false,
			"autoWidth": true,
			"columnDefs": [
				{ "orderable": false, "targets": 8}
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
        $('#STAFF_ID').val(data[0]);
        $('#FNAME').val(data[1]);
        $('#LNAME').val(data[2]);
        $('#EMAIL').val(data[3]);
        $('#DESIGNATION').val(data[4]);
        $('#QUALIFICATION').val(data[5]);
        $('#DEPT_ID').val(data[6]);
    });
});

</script>
    
</body>
</html>
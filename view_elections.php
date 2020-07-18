<?php
//Connects you to the Database
include '_dbconnect.php';
//Delete the Candidate that we have to remove from the election.
$delete = false;
$update=false;
if(isset($_GET['delete'])){
	$electionid = $_GET['delete'];
	$delete = true;
	$sql = "DELETE FROM `candidates` WHERE `electionid`= '$electionid'";
	$result = mysqli_query($conn,$sql);
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"
		integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <title>View Elections</title>
	<style type='text/css'>
		.h1{
			font-size: 200%;
		}
		
		.nav-link{
			font-size: 125%;
		}
	</style>
  </head>
  <body>
  <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <span class="navbar-brand mb-0 h1">Pollex</span>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
				</li>
			<li class="nav-item active">
				<a class="nav-link active" href="#">Admin<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Voter</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
		  <a href="logout.php" class="btn btn-danger">Log Out</a>
		</form>
		
	  </div>
	</nav>
	<?php 
	  // If candidate is deleted this popup will appear.
      if($delete){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Candidate has been removed Successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }
      ?>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="admin_main_page.php">Admin</a></li>
		<li class="breadcrumb-item active" aria-current="page">View Elections<li>
	  </ol>
	</nav>
	<div class="container my-4">
	<!-- Table in which all the current candidates with their details will show -->

		<table class="table" id="myTable">
			<thead>
				<tr>
					<th scope="col">S.No </th>
					<th scope="col">E.ID</th>
					<th scope="col">Election </th>
					<th scope="col">Date</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Gender</th>
					<th scope="col">Branch</th>
					<th scope="col">Year</th>
					
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php
			// Will fetch the data from the candidate table to display in the above table.
			$sql = "SELECT * FROM `candidates`";
			$result = mysqli_query($conn, $sql);
			$sno = 0;
			while($row = mysqli_fetch_assoc($result)){
				$sno = $sno+1;
				echo "<tr>
				<th scope='row'>". $sno ."</th>
				<td>". $row['electionid'] ."</td>
				<td>". $row['election'] ."</td>
				<td>". $row['dateofelection'] ."</td>
				<td>". $row['fname'] ."</td>
				<td>". $row['lname'] ."</td>
				<td>". $row['gender'] ."</td>
				<td>". $row['branch'] ."</td>
				<td>". $row['year'] ."</td>
				<td><button class='edit btn btn-sm btn-primary' id =".$row['electionid']." >Edit</button> <button class='delete btn btn-sm btn-primary' id =".$row['electionid'].">Delete</button> </td>
			</tr>";
			}
		   
          
          ?>

			</tbody>
		</table>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#myTable').DataTable();
		});
	</script>
	<script>
		// An event listener has been added that will confirm about the deletion.
		deletes = document.getElementsByClassName('delete');
		Array.from(deletes).forEach((element) => {
			element.addEventListener("click", (e) => {
				console.log("edit",);
				sno = e.target.id.substr();
				if (confirm("Are you sure you want to Remove this Candidate?")) {
					console.log("yes");
					window.location = `/onlinevotingsystem/view_elections.php?delete=${sno}`;
				}
				else {
					console.log("no");
				}
			})
		})
	</script>
  </body>
</html>
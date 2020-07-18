<?php
//Connects you to the Database
include '_dbconnect.php';

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
	
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="admin_main_page.php">Admin</a></li>
		<li class="breadcrumb-item active" aria-current="page">View Elections<li>
	  </ol>
	</nav>
	<div class="container my-4">
<!-- Table in result of the candidates in election will show -->
		<table class="table" id="myTable">
			<thead>
				<tr>
					<th scope="col">S.No </th>
					<th scope="col">Election </th>
					<th scope="col">E.ID</th>
                    <th scope="col">First Name</th>
					<th scope="col">Votes</th>
					
				</tr>
			</thead>
			<tbody>
			<?php
			//Count the number of votes that each candidate has obtained.
			$sql = "SELECT `election`, `electionid`, `fname`, COUNT(`username`) AS Votes FROM votes GROUP BY `election`,`electionid`,`fname`";
			$result = mysqli_query($conn, $sql);
			$sno = 0;
			while($row = mysqli_fetch_assoc($result)){
				$sno = $sno+1;
				echo "<tr>
				<th scope='row'>". $sno ."</th>
				<td>". $row['election'] ."</td>
				<td>". $row['electionid'] ."</td>
				<td>". $row['fname'] ."</td>
				<td>". $row['Votes'] ."</td>
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
  </body>
</html>
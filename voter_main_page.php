<?php
//The login username and password that we have used in the voter login page if the credentials are true Session will start.
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header ("location: login.php");
    exit;
}
?>
<?php include '_dbconnect.php';
$showAlert = false;
$showError = false;
	
	$a = $_SESSION['username'];
	if(isset($_GET['vote'])){
		$electionid = $_GET['vote'];
	

		// $election = $_POST["election"];
		// $fname = $_POST["fname"];
		// $electionid=$_POST["electionid"];
		// $username = $_POST["username"];
		$existSql = "SELECT * FROM `votes` WHERE `username` = '$a'";
		$result = mysqli_query($conn, $existSql);
		$numExistRows = mysqli_num_rows($result);
		if($numExistRows > 0){
			$showError = "You already Voted.";
		}
		else{
			// $exists=false;
				$as = "SELECT `election` FROM `candidates` WHERE `electionid`='$electionid'";
				$as1 = mysqli_query($conn,$as);
				$as2 = mysqli_fetch_assoc($as1);
				$as3 = $as2["election"];
				$ak = "SELECT `fname` FROM `candidates` WHERE `electionid`='$electionid'";
				
				$ak1 = mysqli_query($conn,$ak);
				$ak2 = mysqli_fetch_assoc($ak1);
				$ak3 = $ak2["fname"];
				$sql = "INSERT INTO `votes` (`election`, `fname`, `electionid`, `username`) VALUES ('$as3','$ak3','$electionid', '$a')";
				$result = mysqli_query($conn, $sql);
				if($result){
					$showAlert = true;
				}
			}	
		
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
    <title>Voter-<?php echo $_SESSION['username']?></title>
	<style type='text/css'>
		body{
			background-color:  #f0f2f5;
		}
		
		.card{
			float: left;
			margin: 24px;
			margin-top: 100px;
			background-color:  #f8f9fa;
		}
		
		.h1{
			font-size: 200%;
		}
		
		.nav-link{
			font-size: 125%;
		}
	</style>
	<script type = "text/javascript" > 
	history.pushState(null, null, location.href); history.back(); history.forward(); window.onpopstate = function () { history.go(1); }; 
	</script>
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
			<li class="nav-item ">
				<a class="nav-link" href="#">Admin<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="#">Voter</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
		  <a href="logout.php" class="btn btn-danger">Log Out</a>
		</form>
		
	  </div>
	</nav>
	<?php
	  // If Login is true this will show an success popup
		if($showAlert){
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> Your Vote has been Registered.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>';
		}
		// If there is any error this will show an error popup.
		if($showError){
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Error!</strong> '. $showError.'
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>';
		}
		?>
	<div class="container my-4">
	  	<!-- Table in which all the Live Election with the vote button, when you cilc that button your vote will be registered. -->
		<table class="table" id="myTable">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">Election Name</th>
					<th scope="col">Election ID</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php
			// Will fetch the data from the Candidate table to display in the above table.
			$sql = "SELECT * FROM `candidates`";
			$result = mysqli_query($conn, $sql);
			$sno = 0;
			while($row = mysqli_fetch_assoc($result)){
				$sno = $sno+1;
				echo "<tr>
				<th scope='row'>". $sno ."</th>
				<td>". $row['election'] ."</td>
				<td>". $row['electionid'] ."</td>
				<td>". $row['fname'] ."</td>
				<td>". $row['lname'] ."</td>
				<td><button class='vote btn btn-sm btn-primary' id =".$row['electionid'].">Vote</button> 
			</tr>";
			}
		   ?>
	

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
	// An event listener has been added that will confirm about your Vote for the candidate selected.
	votes = document.getElementsByClassName("vote");
		Array.from(votes).forEach((element) => {
			element.addEventListener("click", (e) => {
				console.log("edit",);
				sno = e.target.id;
				if (confirm("Are you sure you want to Vote this Candidate?")) {
					console.log("yes");
					window.location = `/onlinevotingsystem/voter_main_page.php?vote=${sno}`;
					console.log("Hello")
				}
				else {
					console.log("no");
				}
			})
		})
	</script>
  </body>
</html>
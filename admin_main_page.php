<?php
//The login username and password that we have used in the admin login page if the credentials are true Session will start.
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header ("location: login.php");
    exit;
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

    <title>Admin-<?php echo $_SESSION['username']?></title>
	<style type='text/css'>
		body{
			background-color:  #5c6670;
		}
		
		.card{
			float: left;
			margin: 29px;
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
			<li class="nav-item active">
				<a class="nav-link" href="#">Admin<span class="sr-only">(current)</span></a>
			</li> 
			<li class="nav-item">
				<a class="nav-link" href="#">Voter</a>
			</li>
		</ul>
		<form class="form-inline my-10 my-lg-0">
		  <a href="logout.php" class="btn btn-danger">Log Out</a>
		</form>
	  </div>
	</nav>
	<!-- Displays cards where you will click will direct you to respective pages. -->
	<div class="card" style="width: 18rem;">
		<img src="images/admin_card1.png" class="card-img-top" alt="..." width='200px' height='200px' >
		<div class="card-body">
			<h5 class="card-title">View Voters</h5>
			<p class="card-text">Edit the details of or delete an existing voter.</p>
			<a href="view_voters.php" class="btn btn-primary">Proceed</a>
		</div>
	</div>
	<div class="card" style="width: 18rem;">
		<img src="images/admin_card2.png" class="card-img-top" alt="..." width='200px' height='200px'>
		<div class="card-body">
			<h5 class="card-title">Add Voter</h5>
			<p class="card-text">Register a new voter and fill in his/her details.</p>
			<a href="add_voter.php" class="btn btn-primary">Proceed</a>
		</div>
	</div>
	<div class="card" style="width: 18rem;">
		<img src="images/admin_card3.jpg" class="card-img-top" alt="..."width='200px' height='200px'>
		<div class="card-body">
			<h5 class="card-title">View Elections</h5>
			<p class="card-text">Get details of the ongoing elections.</p>
			<a href="view_elections.php" class="btn btn-primary">Proceed</a>
		</div>
	</div>
	<div class="card" style="width: 18rem;">
		<img src="images/admin_card4.png" class="card-img-top" alt="..."width='200px' height='200px'>
		<div class="card-body">
			<h5 class="card-title">Add Election</h5>
			<p class="card-text">Schedule a new election and add its details.</p>
			<a href="add_election.php" class="btn btn-primary">Proceed</a>
		</div>
	</div>
	<div class="card" style="width: 18rem;">
		<img src="images/admin_card5.png" class="card-img-top" alt="..."width='200px' height='200px'>
		<div class="card-body">
			<h5 class="card-title">Election Results
			</h5>
			<p class="card-text">Get results of the ongoing elections.</p>
			<a href="view_results.php" class="btn btn-primary">Proceed</a>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
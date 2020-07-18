<!-- Home Page -->
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Pollex - Online Voting System</title>
	<style type='text/css'>
		.card{
			float:left;
			margin: 24px;
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
 
  <body style="background-color: grey;">
	<!-- Nav Bar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <span class="navbar-brand mb-0 h1">Pollex</span>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
			<li class="nav-item">
				<a class="nav-link" href="admin.php">Admin<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="voter.php">Voter</a>
			</li>
		</ul>
		
	  </div>
	</nav>
	<div style='width:600px; height:420px; margin: 0 auto;'>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img src="images/1.png" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			  <img src="images/2.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			  <img src="images/3.png" class="d-block w-100" alt="...">
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
	<!-- Data that we have showd in our Home Page -->
	<div class="jumbotron">
	  <h1 class="display-4">Hello, Users!</h1>
	  <p class="lead">Pollex is a web-development based voting system that will help you to manage your election effortlessly and reliably.</p>
	  <hr class="my-4">
	  <p>Elections are the essential part of every democratic society, entity, institution, organization, etc. Hence it is very important to hold up as many elections as possible. Unfortunately, elections come with big administrative efforts and costs. In order to circumvent the drawbacks of conventional “physical elections”, we  suggest the use of cheaper online voting system: <b>Pollex</b>.
	  </p>
	</div>
	<div class="card left"  style="width: 18rem;">
		<img src="images/card1.jpg" class="card-img-top" alt="..." width='200px' height= '200px'>
		<div class="card-body">
		<h3>Increasing the level of participation </h3>
		<p class="card-text">The Online voting system tends to maximize user participation, by allowing them to vote from anywhere and allowing access from different computer systems and from any device that has an internet connection.</p>
		</div>
    </div>
	<div class="card right"  style="width: 18rem;">
		<img src="images/card2.jpg" class="card-img-top" alt="..." width='200px' height= '200px'>
		<div class="card-body">
		<h3>Environmentally friendly</h3>
		<p class="card-text">Paper-based elections are burdensome for the environment. One of the benefits of online elections is that they don’t require many resources: compared to postal elections, online elections reduce CO2 emissions by 98%</p>
		</div>
	</div>
	<div class="card left" style="width: 18rem;">
		<img src="images/card3.jpg" class="card-img-top" alt="..." width='200px' height= '200px'>
		 <div class="card-body">
		<h3>Less physical infrastructure</h3>
		<p class="card-text">When running a voting online, you avoid the need for all the physical infrastructure usually required on a traditional voting. No need of paper, printing, physical urns or staff may, therefore, lead to a lower monetary investment.</p>
		 </div>
	</div>
	<div class="card right" style="width: 18rem;">
		<img src="images/card4.jpg" class="card-img-top" alt="..." width='200px' height= '200px'>
		<div class="card-body">
		<h3>Fast and easy votes tally</h3>
		<p class="card-text">The tally in online voting is run by machines, you can assure that it will not have human counting errors and that it will in most cases run faster than a count carried out by persons, so the results of your election will be available sooner.</p>
		 </div>
	</div>
	
	
	
	
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>


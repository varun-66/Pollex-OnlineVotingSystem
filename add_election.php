<?php
//Data that we put in the form will going to check in the database if same ElectionId exist they will tell ElectionID alreay exists.
// If the ElectionID is not present the data will going to add in a candidate table. 
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Connect you to the database
	include '_dbconnect.php';
	//Post the values that we get in the form
	$name = $_POST["name"];
	$date = $_POST["date"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$electionid = $_POST["electionid"];
    $gender = $_POST["gender"];
    $branch = $_POST["branch"];
    $year = $_POST["year"];
    // Check the ElectionID already exist or not.
    $existSql = "SELECT * FROM `candidates` WHERE electionid = '$electionid'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "ElectionID Already exists.";
    }else{
        if($numExistRows==0){
            $sql = "INSERT INTO `candidates` (`election`, `dateofelection`, `fname`, `lname`, `gender`, `branch`, `year`, `electionid`) VALUES ('$name', '$date', '$firstname', '$lastname', '$gender', '$branch', '$year', '$electionid')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Candidate Not Registered";
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
	
    <title>Add Election</title>
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
				<a class="nav-link" href="#">Admin<span class="sr-only">(current)</span></a>
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
		<li class="breadcrumb-item active" aria-current="page">Add Election<li>
	  </ol>
	</nav>
	<?php
	// If a data is inserted into the database this popup will appear.
	if($showAlert){
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success!</strong> Candidate is Registered.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>';
	}
	//If there is any error this popup will appear.
	if($showError){
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Error!</strong> '. $showError.'
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>';
	}
	?>
	<div id="login">
        <!-- Form that will take the data that we have to insert in the database. -->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Registration Form</h3>
                            <div class="form-group">
                                <label for="name" >Name Of Election:</label><br>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="date" >Date Of election:</label><br>
                                <input type="date" id="date" name="date"  class="form-control" required>
                            </div>
                            <div class="form-group">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
								Add Candidate
								</button>

								<!-- Modal -->
								<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="ModalLabel">Fill Candidate Details</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												  <span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div id="login">
													<div class="container">
														<div id="login-row" class="row justify-content-center align-items-center">
															<div id="login-column" class="col-md-6">
																<div id="login-box" class="col-md-12">
																	<form id="login-form" class="form" action="add_election.php" method="post">
																		<div class="form-group">
																		<label for="firstname">First name:</label>
																		<input type="text" name="firstname" id="firstname" class="form-control" required>
																		</div>
																		<div class="form-group">
																			<label for="lastname">Last name:</label>
																			<input type="text" name="lastname" id="lastname" class="form-control" required>
																		</div>
																		<div class="form-group">
																			<label for="electionid">Election ID:</label>
																			<input type="text" name="electionid" id="electionid" class="form-control" required>
																		</div>
																		<div class="form-group">
																			<label for="gender">Gender:</label>
																			<select class="form-control" id="gender" name="gender" required>
																				<option hidden disabled selected value> -- select an option -- </option>
																				<option>Male</option>
																				<option>Female</option>
																				<option>Transgender</option>
																			</select>
																		</div>
																		<div class="form-group">
																			<label for="branch">Branch:</label>
																			<select class="form-control" id="branch" name="branch" required>
																				<option hidden disabled selected value> -- select an option -- </option>
																				<option>CSE</option>
																				<option>ECE</option>
																			</select>
																		</div>
																		<div class="form-group">
																			<label for="year">Year:</label>
																			<select class="form-control" id="year" name="year" required>
																				<option hidden disabled selected value> -- select an option -- </option>
																				<option>1</option>
																				<option>2</option>
																				<option>3</option>
																				<option>4</option>
																				<option>5</option>
																			</select>
																		</div>
																		<div class="form-group">
																		<button type="submit" class="btn btn-primary">SignUp</button>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												
												<!-- <button type="button" class="btn btn-primary">Save</button> -->
											</div>
										</div>
									</div>
								</div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	
  </body>
</html>
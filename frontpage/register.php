<?php include("templates/header.php"); ?>

	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/typeahead_fix.css">
	<script language="javascript" type="text/javascript" src="js/datasets.js"></script>

	
	<div class="jumbotron">
		<div class="container">
			<h2>Registration Form</h2>
		</div>
	</div>

	<div class="container">
		
		<div class="row">

			
				<form class="form-horizontal" role="form">
					<div class="col-md-5 box">
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-5">
					      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    </div>
					    <div class="col-sm-5">
					      <input type="email" class="form-control" id="inputEmail3" placeholder="Confirm Email">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-5">
					      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
					    </div>
					    <div class="col-sm-5">
					      <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password	">
					    </div>
					  </div>
				  </div><!--end email and password box-->
				
					<div class="col-md-1"></div>

					<div class="col-md-5 box">
						<div class="form-group">
					    <label for="firstname" class="col-sm-2 control-label">Name</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" id="firstname" placeholder="First Name">
					    </div>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" id="surname" placeholder="Surname">
					    </div>
					  </div>
						<div class="form-group">
					  	<label for="hospital" class="col-sm-2 control-label">Hospital</label>
					  	<div class="col-sm-10">
					  		<input name="hospital" type="text" class="form-control typeahead" id="hospital" placeholder="Search for Hospital">
					  	</div>
						</div>		
						<div class="form-group">
					  	<label for="speciality" class="col-sm-2 control-label">Current Speciality</label>
					  	<div class="col-sm-10">
					  		<input name="speciality" type="text" class="form-control typeahead" id="speciality" placeholder="Search for Speciality">
					  	</div>
						</div>	
						
					</div><!-- end personal details box	-->		
					<div class="row">
						<div class="col-md-2	 col-md-offset-5">
							<br/>
							<button class="btn btn-lg">Register</button>
						</div>
					</div>
				</form><!-- end form -->
		</div><!--end row-->

	</div><!--end container-->


<?php include("templates/footer.php"); ?>
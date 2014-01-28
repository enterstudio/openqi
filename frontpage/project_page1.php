<?php include("templates/header.php"); ?>

<link rel="stylesheet" type="text/css" href="css/project-registration.css">

	<div class="jumbotron">
		<div class="container">
			<h1>Project Registration</h1>
			<br/>
			<h2>What is your project?</h2>
		</div>
	</div>

	<div class="container">

	
		<div class="page-navigation">
			<img src="img/bubbles1.jpg">
		</div>
			
		<form>
			<div style="display:visible" class="page1 project-description">
				<div class="heading">Describe your projects aims</div>
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron description">
							<h2>What are you trying to improve? Make it SMART (specific, measurable, achievable, relevant and timed) For example, <i> Reducing falls in frail elderly on the ward by 10% in 3 months</i></h2>
						</div>
					</div>
				</div>

				<textarea class="form-control project-description" rows="10"></textarea>

			</div>

			<div style="display:none" class="page2 project-builder">
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron description">
							<h2>What are the baseline measures? Process measures track whether the guideline is being followed. Outcome measures track whether the patient is safer / healthier or has a better experience. Balancing measures highlight unintended consequences</h2>
						</div>
					</div>
				</div>
				<div class="col-md-6 outcomes">
					<h3>Outcome Measures</h3>
					<textarea class="form-control" rows="1"></textarea>
				</div>
				<div class="col-md-6 interventions">
					<h3>Interventions</h3>
					<textarea class="form-control" rows="1"></textarea>
				</div>
			</div>

			<div  style="display:none" class="page3 team-builder">
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron description">
							<h2>Who will be in the team? Consider including different clinicians, managers, a quality improvement advisor and one or more patients</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Project Lead</h2>
						  <div class="form-group">
						    <input type="text" class="form-control" placeholder="Enter Project Lead">
						  </div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<h2>Other Members</h2>
							 <div class="form-group">
						    <input type="text" class="form-control" placeholder="Search for users">
						  </div>
					</div>

					<div class="col-md-6">
						<h2>Role</h2>
							<div class="form-group">
						    <input type="text" class="form-control" placeholder="">
						  </div>
					</div>
				</div>
			</div>
			
			
			<button href="project_page2.php" type="button" class="btn btn-primary btn-lg">Next Page</button>
		</form>
	

	</div>





<?php include("templates/footer.php"); ?>
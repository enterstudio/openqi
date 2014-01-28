<?php include("templates/header.php"); ?>

<link href="css/new_audit.css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="js/new_audit.js"></script>

<div class="row header">
			<div class="col-md-1 title">Title: </div>
			<input class="col-md-7 title" type="text"></input>
				<div class="col-md-2">
					<div class="dropdowns">
						<select class="form-control">
							<option>Select a speciality</option>
							<option>Trauma and Orthopaedics</option>
							<option>Critical Care</option>
							<option>Gastroenterology</option>
							<option>Cardiology</option>
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="dropdowns">
						<select class="form-control">
							<option>Select a hospital</option>
							<option>Queen Alexandra Hospital</option>
							<option>Brighton Hospital</option>
						</select>
					</div>
				</div>
			</div>

	
			
<div class="my-fluid-container">
	<form role="form">
		
		<div class="row content">
			<div class="col-md-4 main">
				<p><div class="main-headings">Aims</div></p>
					<textarea class="form-control"></textarea>
		
				<p><div class="main-headings">Standards / guidelines / outcomes </div></p>
					<textarea class="form-control"></textarea>

				
				
				<p><div> Re-audit? </div>
				<form>
				<input type="radio" name="reaudit" value="yes">Yes<br>
				<input type="radio" name="reaudit" value="no">No<br>
				</form>
				
				<p><div class="main-headings form-group">
				Data set start 
					<input type="text" class="form-control" placeholder="DD/MM/YYYY">
				</div></p>
				
				<p><div class="main-headings form-group">
				Data set end 
					<input type="text" class="form-control" placeholder="DD/MM/YYYY">
				</div></p>
					
				<p><div> Patient involvement? </div>
				<form>
				<input type="radio" name="involvement" value="yes">Yes<br>
				<input type="radio" name="involvement" value="no">No<br>
				</form>
				
				<p><div class="main-headings form-group">
				Project start date
					<input type="text" class="form-control">
				</div></p>	
				
				<p><div class="main-headings form-group">
				Estimated date of completion
					<input type="text" class="form-control">
				</div></p>	
				<div class="end">
					<input type="checkbox">I agree to the <a href id="terms">Terms of Agreement</a></input>
					<p><button class="btn-lg btn-success">Submit</button></p>
				</div>
			</div>


			<div class="col-md-4">
				<h2> Methodology </h2>

				
				<label for="auditLead">Patient Group</label>
					<input type="text" class="form-control"</span>
					
				<div><b>Other Members</b></div>
					<input type="text" class="form-control"</span>
				
				<p><div> Type </div>
				<div class="dropdowns">
						<select class="form-control">
							<option>Retrospective</option>
							<option>Concurrent</option>
							<option>Prospective</option>
						</select>
					</div>
			</div>


			<div class="col-md-4">
				
					<h2>Members</h2>
					<div class="members">
						<div class="form-group">
							<label for="auditLead">Project Lead</label>
							<input type="text" class="form-control" placeholder="Enter audit lead">
						</div>
						<div><b>Other Members</b></div>
						<div id="otherMember" class="input-group">
							<input type="text" class="form-control">
							<span class="input-group-addon add">+</span>
						</div>

					</div>
					<div class="form-group">
						<div class="checkbox"><label><input type="checkbox">Public</label></div>
						<div class="checkbox"><label><input type="checkbox">Allow invites</label></div>
					</div>
			</div>




		</div>

	</form>

	<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Terms of Agreement</h4>
      </div>
      <div class="modal-body">
        <ol>
        	<li>It is understood and agreed that a copy of the signed Clinical Audit Registration Form will be sent to the Associate Medical Director, General Manager of the relevant Division.  The audit will be presented to the appropriate Division / Clinical Governance / Team meeting by the Proposer (or representative) </li>
        	<li>It is understood and agreed that should the aims and objectives of the audit set out in the Clinical Audit Registration Form change significantly after the pilot phase has been completed, the Clinical Audit Department reserve their right to withdraw their support from the audit</li>
        	<li>It is understood that, no matter what the outcome of the audit, the Audit Proposer will provide the Clinical Audit Department with an audit report to include: methodology, findings, recommendations and any changes in practice.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

<?php include("templates/footer.php"); ?>


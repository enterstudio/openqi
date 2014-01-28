<?php include("templates/header.php"); ?>

	<div class="login">
		<a class="btn btn-info" href="http://app.openqi/">Login</a>
		<a class="btn btn-info" href="register.php">Register</a>
		<a class="btn btn-info" href="project_page1.php">Start New Audit</a>
	</div>
		<div class="jumbotron">
		  <div class="container">

		  	
		    <h1 class="inset-text">Open QI<img src="/img/QI.png"></h1>
		    <h4>A Quality Improvement Collaboration Tool</h4>
		    
		    <form id="target" class="form-inline" role="form" action="search.php" action="get">
		    	<div class="form-group">
		    		<input type="text" name="input" class="input-lg form-control" placeholder="Type in keywords here">
		   		</div>
		   		
		   		<div class="form-group">
		   			<a id="search_button" class="btn btn-primary btn-lg">Search &raquo;</a> or <a href="new_audit.php" id="new_button" class="btn btn-success btn-lg">Browse by Speciality</a>
		   		</div>
		   	</form>
		   	<div><a class="login_non_button" href="http://app.openqi/"><h4>Log in</a> to start a new project</div>
		  </div></h4>
		</div>

<!--NAV BAR -->
<div class="bar">
	<a href="about.php">About | </a>
	<a href="resources.php">Resources | </a> 
	<a href="resources.php">Help | </a>
	<a href="resources.php">Contact</a>
</div>


	<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-thumbnail" src="http://www.colourbox.com/preview/5543961-329591-icon-magnifying-glass-black.jpg" data-src="holder.js/140x140" alt="search">
          <h2>Search</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-thumbnail" src="http://cdn3.iconfinder.com/data/icons/objects/512/jigsaw_A-512.png" data-src="holder.js/140x140" alt="Generic placeholder image">
          <h2>Collaborate</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-thumbnail" src="http://www.clker.com/cliparts/s/1/v/q/p/N/black-check-mark-hi.png" data-src="holder.js/140x140" alt="Generic placeholder image">
          <h2>Change Practice</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->




    <!--LOG IN MODAL-->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    </div><!-- /.container -->




	
<?php include("templates/footer.php"); ?>
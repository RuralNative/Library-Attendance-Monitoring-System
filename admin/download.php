<!-- PHP Script providing interactive UI for importing student data to the database through a customized CSV compatible for the system. 
  -- Uses 'import.php' to process CSV for data storage -->

<!-- Import necessary PHP scripts for session/dependencies -->
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Import necessary PHP scripts for display -->
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- CONTENT WRAPPER (START) -->
  <div class="content-wrapper">

    <section class="content-header">
      <!-- Main Header --> 
      <h1>
        Students List
      </h1>
      <!-- Navigation Buttons (Right Corner) -->
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="1index.php">Students</a></li>
        <li class="active">Students List</li>
      </ol>
    </section>

    
    <section class="content">
      
      <!-- DO NOT MODIFY (START) -->
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- DO NOT MODIFY (END) -->
      
      <!-- CSV Importation Panel -->
      <div class="panel-body">
        <div class="table-responsive">
          <div class="span6" id="form-login">
				    <form class="form-horizontal well" action="includes/import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					    <fieldset>
						    <legend>Bulk Import Students</legend>
						    <div class="control-group">
                  <label>CSV/Excel File:</label>
                  <div class="controls">
								    <input type="file" multiple name="filename" id="filename" class="input-large">
							    </div>
						    </div>
						    <br/>	
						    <div class="control-group">
							    <div class="controls">
							      <button type="submit" id="submit" name="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							    </div>
						    </div>
					    </fieldset>
				    </form>
			    </div>
        </div>
      </div>
    </section>   
  </div>
  <!-- CONTENT WRAPPER (END) -->
  <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>

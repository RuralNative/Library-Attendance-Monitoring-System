<!-- DO NOT MODIFY (START) -->
<?php session_start(); ?>
<?php include 'header.php'; ?>
<body class="hold-transition register-page">
<!-- DO NOT MODIFY (END) -->

  <!-- PAGE SCREEN (START) -->
  <div class="login-box">
      <!-- LOGO COMPONENT -->
      <div class="login-logos">
        <img src="images/cpsu_logo.webp" alt="CPSU Logo">
      </div>
    
      <!-- FORM CONTAINER (START) -->  
      <div class="login-box-body">
        <h4 class="login-box-msg" style="font-weight: bold; color: #3D6245; font-size: 20px;">
          <strong>CPSU LIBRARY</strong> <i>Attendance</i>
        </h4>
        <!-- FORM COMPONENT -->
        <form id="attendance">
          <!-- Check In/Check Out COMPONENT -->
          <div class="form-group">
            <select class="form-control" name="status" id="status" onchange="displayDiv('hideValueOnSelect', this)">
              <option value="in">CHECK IN</option>
              <option value="out">CHECK OUT</option>
            </select>
          </div>
          <!-- Student ID COMPONENT -->
          <div class="form-group has-feedback">
            <input type="text" class="form-control input-lg" id="employee" name="employee" placeholder="STUDENT ID" required>
            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
          </div>
          <!-- Purpose/Course COMPONENT (ROW) -->
          <div class="row" id="hideValueOnSelect">
            <!-- Purpose Drop Down -->
            <div class="form-group col-sm-8">
              <select class="form-control" name="temperature" id="temperature"">
                <option value="STUDY">STUDY</option>
                <option value="RESEARCH">RESEARCH</option>
                <option value="BORROW BOOKS">BORROW BOOKS</option>
                <option value="OTHERS">OTHERS</option>
              </select>
            </div>
            <!-- Course Drop Down -->
            <div class="form-group col-sm-4">
              <input type="text" class="form-control input-lg" id="tagno" autocomplete="off" name="tagno" placeholder="GRADE">
            </div>
          </div>
          <!-- Submit BUTTON -->
          <div class="row">
            <div class="col-sm-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> CHECK</button>
            </div>
          </div>
        </form>
      </div>
      <!-- FORM CONTAINER (END) -->

    <!-- DO NOT MODIFY (START) -->
    <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
    <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div>
    <div class="login-logo">
      <p id="date" style="color: white"></p>
      <p id="time" class="bold"></p>
    </div>
    <!-- DO NOT MODIFY (END) -->
  
  </div>
  <!-- PAGE SCREEN (END) -->

  <!-- DO NOT MODIFY (START) -->
  <?php include 'scripts.php' ?>
  <script type="text/javascript">
    $(function() {
      var interval = setInterval(function() {
        var momentNow = moment();
        $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
        $('#time').html(momentNow.format('hh:mm:ss A'));
      }, 100);

      $('#attendance').submit(function(e){
  e.preventDefault();
  var attendance = $(this).serialize();
  $.ajax({
    type: 'POST',
    url: 'attendance.php',
    data: attendance,
    dataType: 'json',
    success: function(response){
      if(response.error){
        $('.alert').hide();
        $('.alert-danger').show();
        $('.message').html(response.message);
      } 
      else{
        $('.alert').hide();
        $('.alert-success').show();
        $('.message').html(response.message);
      }
    }
  });
}); 
    });
  </script>
  <!-- DO NOT MODIFY (END) -->

  <!-- DO NOT MODIFY (START) -->
  <script type="text/javascript">
    function displayDiv(id, elementValue) {
      document.getElementById(id).style.display = elementValue.value === 'in' ? 'block' : 'none'
    }
  </script>
  <!-- DO NOT MODIFY (END) -->

  <!-- DO NOT MODIFY (START) -->
  <script type="text/javascript">
    $(function() {
      $( "#employee" ).autocomplete({
        source: 'search.php',
      });
    });
  </script>
  <!-- DO NOT MODIFY (END) -->

</body>
</html>
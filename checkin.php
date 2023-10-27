<?php session_start(); ?>
<?php include 'header.php'; ?>
<body class="hold-transition register-page">
<div class="login-box">

    <div class="login-logos">
      <img src="images/logo-um.jpg" alt="Avatar">
    </div>
  	
  	<div class="login-box-body">
    	<h4 class="login-box-msg" style="font-weight: bold; color: #3D6245; font-size: 20px;">LIBRARY ATTENDANCE SYSTEM</h4>

      <!-- <style type="text/css">
        #hideValueOnSelect {
          display: none;
        }
      </style> -->

    	<form id="attendance">
          <div class="form-group" style="display: none;">
            <select class="form-control" name="status" id="status" onchange="displayDiv('hideValueOnSelect', this)">
              <option value="in">CHECK IN</option>
            </select>
          </div>
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control input-lg" id="reference" pattern="[A-Za-z0-9]{1,15}" onkeyup="this.value = this.value.toUpperCase();"autocomplete="off" name="reference" placeholder="REFERENCE / INDEX NO." required style=" font-size: 20px;">
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="row" id="hideValueOnSelect">
            <div class="form-group col-sm-8">
                  <input type="text" class="form-control input-lg" id="temperature" autocomplete="off" name="temperature" placeholder="TEMPERATURE" required>
              </div>
              <div class="form-group col-sm-4">
                  <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" class="form-control input-lg" id="tagno" autocomplete="off" name="tagno" placeholder="TAG" required>
              </div>
          </div>
      		<div class="row">
    			<div class="col-sm-6">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> CHECK IN</button>
        		</div>
      		</div>
    	</form>
  	</div>
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
  
  		
</div>
	
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
      url: 'attendance_in.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
          $('#reference').val('');
          $('#temperature').val('');
          $('#tagno').val('');
          setTimeout( function() {location.reload()}, 2000);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#reference').val('');
           $('#temperature').val('');
          $('#tagno').val('');
          setTimeout( function() {location.reload()}, 2000);
        }
      }
    });
  });
    
});

</script>
<script type="text/javascript">
  function displayDiv(id, elementValue) {
    document.getElementById(id).style.display = elementValue.value === 'in' ? 'block' : 'none'
  }
</script>
<script type="text/javascript">
    $(function() {
       $( "#reference" ).autocomplete({
         source: 'search.php',
       });
    });
</script>

</body>
</html>
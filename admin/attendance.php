 <!-- DO NOT MODIFY (START) -->
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
 <!-- DO NOT MODIFY (END) -->

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
     <!-- Standard PHP Dependencies -->
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>
    <!-- Date PHP Script -->
    <?php
      include '../timezone.php';
      $range_to = date('m/d/Y');
      $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
    ?>

    <!-- CONTENT Wrapper -->
    <div class="content-wrapper">      
      
      <!-- CONTENT Header-->
      <section class="content-header">
        <h1>
          Library Attendance
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Attendance</li>
        </ol>
      </section>

      <!-- MAIN Content Wrapper (START) -->
      <section class="content">
        
        <!-- SESSION Success/Error Message Scripts  -->     
        <?php
          if(isset($_SESSION['error'])){
            echo 
              "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                  &times;
                </button>
                <h4>
                  <i class='icon fa fa-warning'></i> 
                  Error!
                </h4>
                ".$_SESSION['error']."
              </div>"
            ;
            unset($_SESSION['error']);
          }
          if(isset($_SESSION['success'])){
            echo 
              "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                  &times;
                </button>
                <h4>
                  <i class='icon fa fa-check'></i> 
                  Success!
                </h4>
                ".$_SESSION['success']."
              </div>"
            ;
            unset($_SESSION['success']);
          }
        ?>

        <!-- MAIN Component Content (START) -->
        <div class="row">
          <div class="col-xs-12">

            <!-- Data Filter/Report Printing Input Component (START) -->
            <div class="box">
              <div class="box-header with-border">
                <div class="pull-right">
                  <form method="POST" class="form-inline" id="payForm">
                    <!-- Date Range Input -->
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input 
                        type = "text" 
                        class = "form-control pull-right col-sm-8" 
                        id = "reservation" 
                        name = "date_range" 
                        value = "<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from.' - '.$range_to; ?>"
                      >
                    </div>
                    <!-- 
                      Report Printout Button 
                      Refer ATTENDANCE_GENERATE.PHP for PRINT FUNCTIONALITY 
                    -->
                    <button type="button" class="btn btn-success btn-sm btn-flat" id="print_attend">
                      <span class="glyphicon glyphicon-print"></span> 
                      Print Data
                    </button>
                  </form>
                </div>
              </div>
            <div class="box-body">
            <!-- Data Filter/Report Printing Input Component (END) -->

            <!-- Table Component (START) -->
            <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>DATE</th>
                  <th>STUDENTS ID</th>
                  <th>FULL NAME</th>
                  <th>PURPOSE</th>
                  <th>PROGRAMME</th>
                  <th>TIME IN</th>
                  <th>TIME OUT</th>
                  <th>TOOLS</th>
                </thead>
                <tbody>
                  <!-- Student Info Query PHP Script (START) -->
                  <?php
                    $sql = 
                      "SELECT *, 
                        students.reference_number AS empid, 
                        attendance.id AS attid 
                        FROM attendance 
                        LEFT JOIN students 
                        ON students.id=attendance.reference_number 
                        ORDER BY attendance.date DESC, attendance.time_in DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $status = ($row['status'])?'<span class="label label-warning pull-right">Out</span>':'<span class="label label-danger pull-right">In</span>';
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M d, Y', strtotime($row['date']))."</td>
                          <td>".$row['empid']."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".$row['temperature']."</td>
                          <td>".$row['tagno']."</td>
                          <td>".date('h:i A', strtotime($row['time_in'])).$status."</td>
                          <td>".date('h:i A', strtotime($row['time_out']))."</td>
                          <td>
                            <button class='btn btn-success btn-sm btn-flat edit' data-id='".$row['attid']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['attid']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                  <!-- Student Info Query PHP Script (END) -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/attendance_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'attendance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#datepicker_edit').val(response.date);
      $('#edit_temperature').val(response.temperature);
      $('#edit_tagno').val(response.tagno);
      $('#attendance_date').val(response.date);
      $('#edit_time_in').val(response.time_in);
      $('#edit_time_out').val(response.time_out);
      $('#attid').val(response.attid);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#del_attid').val(response.attid);
      $('#del_employee_name').html(response.firstname+' '+response.lastname);
    }
  });
}

// $("#reservation").on('change', function(){
//     var range = encodeURI($(this).val());
//     window.location = 'attendance.php?range='+range;
//   });

  $('#print_attend').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'attendance_generate.php');
    $('#payForm').submit();
  });
</script>
</body>
</html>

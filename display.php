

<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Students List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Students</li>
        <li class="active">Students List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
               <a href="download.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Bulk Import</a>
            </div>


<?php 
            $db = mysqli_connect("localhost", "root","", "attendance");

 ?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style1.css">
    <title>Fixed table</title>
</head>
<body>
    <div class="heading">
    <h1>List Students</h1>
</div>
<div class="outer-wrapper">
    <div class="table-wrapper">
    <table>
    <tr>

        <th>S#</th>
        
        <th>LRN</th>
        <th>Name</th>
        <th>Last Name</th>

        


        <th>Date of Aplication</th>
        <th>Action</th>





    </tr>

    <?php  
            $i = 1;
            $qry = "select * from students";
            $run = $db -> query($qry);
            if($run -> num_rows > 0){
                while($row = $run -> fetch_assoc()){
                $id = $row['id'];
    ?>

<tr>

<td> <?php echo $i++; ?></td>
<td> <?php echo $row['reference_number']    ?></td>
<td> <?php echo $row['firstname']     ?></td>
<td> <?php echo $row['email']     ?></td>
<td> <?php echo $row['phone']     ?></td>




<td>

<a href="tryupdate.php?id=<?php echo $id; ?>" >VIEW</a>
<a href="groomsdelete.php?id= <?php echo $id; ?>" onclick="return confirm('Are you sure?')">DELETE</a>


</td>
</tr>


<?php 
}}
 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?>

</script>
</body>
</html>
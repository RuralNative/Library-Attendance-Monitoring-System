<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Member</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">LRN:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="reference_number" value="<?php echo $row['reference_number']; ?>">
					</div>
					</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Full Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>">
					</div>
					</div>

						<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
					</div>
					</div>


					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Phone Number:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>">
					</div>
					</div>

					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Address:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="residence_status" value="<?php echo $row['residence_status']; ?>">
					</div>
					</div>

					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Year:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="residence" value="<?php echo $row['residence']; ?>">
					</div>
					</div>

							<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Section:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="programme" value="<?php echo $row['programme']; ?>">
					</div>
					</div>




            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Member</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['firstname'].' '.$row['lastname']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
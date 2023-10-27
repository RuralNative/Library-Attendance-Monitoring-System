<!-- Modal for Adding Students -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;>
				</button>
                <center>
					<h4 class="modal-title" id="myModalLabel">Add New</h4>
				</center>
            </div>
            <div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="add.php">
						<!-- LRN Input COMPONENT -->
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Student ID:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="reference_number" required>
							</div>
						</div>
						<!-- Full Name Input COMPONENT -->
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Full Name:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="firstname" required>
							</div>
						</div>
						<!-- Residence Input COMPONENT -->
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Address:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="residence" required>
							</div>
						</div>
						<!-- Programme Input COMPONENT -->
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Programme:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="programme" required>
							</div>
						</div>
        				<div class="modal-footer">
            				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            				<button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
						</div>
					</form>
				</div>
    		</div>
		</div>
	</div>
</div>
<!-- Add -->
<div class="modal fade" id="addnew">
	<form class="form-horizontal" method="POST" action="attendance_add.php">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b>Add Attendance</b></h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="student_id" class="col-xs-3 control-label">School ID #</label>

						<div class="col-xs-6">
							<input type="text" class="form-control" id="student_id" name="student_id" required>
						</div>
						<div class="col-xs-3">
							<a class="btn btn-primary" id="check_id" style="width: 100%;">Check</a>
						</div>
					</div>
					<div class="form-group">
						<label for="subject_list" class="col-xs-3 control-label">Subject List</label>

						<div class="col-xs-9">
							<select class="form-control" id="subject_list" name="subject_list">
								<option selected>- Select -</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="datepicker_add" class="col-xs-3 control-label">Date</label>

						<div class="col-xs-9">
							<div class="date">
								<input type="text" class="form-control" id="datepicker_add" name="date" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- Edit -->
<!-- <div class="modal fade" id="edit">
	<form class="form-horizontal" method="POST" action="attendance_edit.php">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="attid" name="id">
					<div class="form-group">
						<label for="datepicker_edit" class="col-xs-3 control-label">Date</label>

						<div class="col-xs-9">
							<div class="date">
								<input type="text" class="form-control" id="datepicker_edit" name="edit_date">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="edit_time_in" class="col-xs-3 control-label">Time In</label>

						<div class="col-xs-9">
							<div class="bootstrap-timepicker">
								<input type="text" class="form-control timepicker" id="edit_time_in" name="edit_time_in">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="edit_time_out" class="col-xs-3 control-label">Time Out</label>

						<div class="col-xs-9">
							<div class="bootstrap-timepicker">
								<input type="text" class="form-control timepicker" id="edit_time_out" name="edit_time_out">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
					<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
				</div>
			</div>
		</div>
	</form>
</div> -->

<!-- Delete -->
<div class="modal fade" id="delete">
	<form class="form-horizontal" method="POST" action="attendance_delete.php">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b><span id="attendance_date"></span></b></h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="del_attid" name="id">
					<div class="text-center">
						<p>DELETE ATTENDANCE</p>
						<h2 id="del_employee_name" class="bold"></h2>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
					<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
				</div>
			</div>
		</div>
	</form>
</div>
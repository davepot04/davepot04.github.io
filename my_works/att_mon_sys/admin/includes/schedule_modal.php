<!-- Add -->
<div class="modal fade" id="addnew">
	<form class="form-horizontal" method="POST" action="schedule_add.php">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b>Add Schedule</b></h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="subject" class="col-sm-3 control-label">Subject</label>

						<div class="col-sm-9">
							<input type="text" class="form-control" id="subject" name="subject" required>
						</div>
					</div>
					<div class="form-group">
						<label for="sched_day" class="col-sm-3 control-label">Day</label>
						<div class="col-sm-9">
							<select class="form-control" name="sched_day" id="sched_day" required>
								<option value="" selected>- Select -</option>
								<option value="Monday" >Monday</option>
								<option value="Teusday" >Teusday</option>
								<option value="Wednesday" >Wednesday</option>
								<option value="Thursday" >Thursday</option>
								<option value="Friday" >Friday</option>
								<option value="Saturday" >Saturday</option>
								<option value="Sunday" >Sunday</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="sched_start" class="col-sm-3 control-label">Sched Start</label>

						<div class="col-sm-9">
							<div class="bootstrap-timepicker">
								<input type="text" class="form-control timepicker" id="sched_start" name="sched_start" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="sched_end" class="col-sm-3 control-label">Sched End</label>

						<div class="col-sm-9">
							<div class="bootstrap-timepicker">
								<input type="text" class="form-control timepicker" id="sched_end" name="sched_end" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="year_section" class="col-sm-3 control-label">Section</label>
						<div class="col-sm-9">
							<select class="form-control" name="year_section" id="year_section" required>
								<option value="" selected>- Select -</option>
								<?php
								$sql = "SELECT * FROM `year_sections`";
								$query = $conn->query($sql);
								while ($row = $query->fetch_assoc()) {
									echo "
										<option value=" . $row['id'] . ">" . $row['year'] ."-". $row['section'] . "</option>
									";
								}
								?>
							</select>
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
<div class="modal fade" id="edit">
	<form class="form-horizontal" method="POST" action="schedule_edit.php">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b>Update Schedule</b></h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="sched_id" name="id">
					<div class="form-group">
						<label for="subject_edit" class="col-sm-3 control-label">Subject</label>

						<div class="col-sm-9">
							<input type="text" class="form-control" id="subject_edit" name="subject_edit" required>
						</div>
					</div>
					<div class="form-group">
						<label for="sched_day_edit" class="col-sm-3 control-label">Day</label>
						<div class="col-sm-9">
							<select class="form-control" name="sched_day_edit" id="sched_day_edit" required>
								<option value="" selected>- Select -</option>
								<option value="Monday" >Monday</option>
								<option value="Teusday" >Teusday</option>
								<option value="Wednesday" >Wednesday</option>
								<option value="Thursday" >Thursday</option>
								<option value="Friday" >Friday</option>
								<option value="Saturday" >Saturday</option>
								<option value="Sunday" >Sunday</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="sched_start_edit" class="col-sm-3 control-label">Sched Start</label>

						<div class="col-sm-9">
							<div class="bootstrap-timepicker">
								<input type="text" class="form-control timepicker" id="sched_start_edit" name="sched_start_edit" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="sched_end_edit" class="col-sm-3 control-label">Sched End</label>

						<div class="col-sm-9">
							<div class="bootstrap-timepicker">
								<input type="text" class="form-control timepicker" id="sched_end_edit" name="sched_end_edit" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="year_section_edit" class="col-sm-3 control-label">Section</label>
						<div class="col-sm-9">
							<select class="form-control" name="year_section_edit" id="year_section_edit" required>
								<option value="" selected>- Select -</option>
								<?php
								$sql = "SELECT * FROM `year_sections`";
								$query = $conn->query($sql);
								while ($row = $query->fetch_assoc()) {
									echo "
										<option value=" . $row['id'] . ">" . $row['year'] ."-". $row['section'] . "</option>
									";
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><b>Deleting...</b></h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="schedule_delete.php">
					<input type="hidden" id="del_sched_id" name="id">
					<div class="text-center">
						<p>DELETE SCHEDULE</p>
						<h2 id="del_schedule" class="bold"></h2>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
				<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
				</form>
			</div>
		</div>
	</div>
</div>
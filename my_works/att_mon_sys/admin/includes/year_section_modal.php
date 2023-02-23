<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add a Year &  Section</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="year_section_add.php">
          		  <div class="form-group">
                  	<label for="yearSelect" class="col-sm-3 control-label">Year</label>

                  	<div class="col-sm-9">
						<select class="form-control" name="yearSelect" id="yearSelect">
							<option value="" selected>- Select -</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="4">5</option>
							<option value="4">6</option>
							<option value="4">7</option>
						</select>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="sectionEnter" class="col-sm-3 control-label">Section</label>

                    <div class="col-sm-9">
					  <input type="text" class="form-control" id="sectionEnter" name="sectionEnter" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Update Year & Section</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="year_section_edit.php">
            		<input type="hidden" id="year_section_id" name="id">
                <div class="form-group">
				<label for="yearSelect_edit" class="col-sm-3 control-label">Year</label>

				<div class="col-sm-9">
					<select class="form-control" name="yearSelect_edit" id="yearSelect_edit">
						<option value="" selected>- Select -</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="4">5</option>
						<option value="4">6</option>
						<option value="4">7</option>
					</select>
				</div>
                </div>
                <div class="form-group">
					<label for="sectionEnter_edit" class="col-sm-3 control-label">Section</label>

					<div class="col-sm-9">
						<input type="text" class="form-control" id="sectionEnter_edit" name="sectionEnter_edit" required>
					</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
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
            	<form class="form-horizontal" method="POST" action="year_section_delete.php">
            		<input type="hidden" id="del_year_section_id" name="id">
            		<div class="text-center">
	                	<p>DELETE YEAR & SECTION</p>
	                	<h2 id="del_year_section" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     
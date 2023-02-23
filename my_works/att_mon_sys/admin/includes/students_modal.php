<!-- Add -->
<div class="modal fade" id="addnew">
  <form class="form-horizontal" method="POST" action="students_add.php" enctype="multipart/form-data">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Add Employee</b></h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="student_id_number" class="col-sm-3 control-label">School ID #</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="student_id_number" name="student_id_number" required>
            </div>
          </div>
          <div class="form-group">
            <label for="student_course" class="col-sm-3 control-label">Course</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="student_course" name="student_course" required>
            </div>
          </div>
          <div class="form-group">
            <label for="year_section" class="col-sm-3 control-label">Year & Section</label>
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
          <div class="form-group">
            <label for="student_firstname" class="col-sm-3 control-label">Firstname</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="student_firstname" name="student_firstname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="student_middlename" class="col-sm-3 control-label">Middlename</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="student_middlename" name="student_middlename">
            </div>
          </div>
          <div class="form-group">
            <label for="student_lastname" class="col-sm-3 control-label">Lastname</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="student_lastname" name="student_lastname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="student_address" class="col-sm-3 control-label">Address</label>

            <div class="col-sm-9">
              <textarea class="form-control" name="student_address" id="student_address"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="datepicker_add" class="col-sm-3 control-label">Birthdate</label>

            <div class="col-sm-9">
              <div class="date">
                <input type="text" class="form-control" id="datepicker_add" name="student_birthdate">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="student_contact" class="col-sm-3 control-label">Contact Info</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="student_contact" name="student_contact">
            </div>
          </div>
          <div class="form-group">
            <label for="student_gender" class="col-sm-3 control-label">Gender</label>

            <div class="col-sm-9">
              <select class="form-control" name="student_gender" id="student_gender" required>
                <option value="" selected>- Select -</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="student_photo" class="col-sm-3 control-label">Photo</label>

            <div class="col-sm-9">
              <input type="file" name="student_photo" id="student_photo">
            </div>
          </div>
          <div class="form-group">
            <label for="student_guardian_name" class="col-sm-3 control-label">Guardian's Name</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="student_guardian_name" name="student_guardian_name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="student_guardian_contact_info" class="col-sm-3 control-label">Guardian's Contact Info</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="student_guardian_contact_info" name="student_guardian_contact_info" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
  <form class="form-horizontal" method="POST" action="students_edit.php">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b><span class="student_details"></span></b></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" class="sid" name="sid">
          <div class="form-group">
            <label for="edit_school_id_num" class="col-sm-3 control-label">School ID #</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_school_id_num" name="edit_school_id_num" required>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_student_course" class="col-sm-3 control-label">Course</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_student_course" name="edit_student_course" required>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_year_section" class="col-sm-3 control-label">Year & Section</label>
            <div class="col-sm-9">
              <select class="form-control" name="edit_year_section" id="edit_year_section" required>
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
          <div class="form-group">
            <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_firstname" name="edit_firstname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_middlename" class="col-sm-3 control-label">Middlename</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_middlename" name="edit_middlename">
            </div>
          </div>
          <div class="form-group">
            <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_lastname" name="edit_lastname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_gender" class="col-sm-3 control-label">Gender</label>

            <div class="col-sm-9">
              <select class="form-control" name="edit_gender" id="edit_gender" required>
                <option selected id="edit_gender_val"></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="datepicker_edit" class="col-sm-3 control-label">Birthdate</label>

            <div class="col-sm-9">
              <div class="date">
                <input type="text" class="form-control" id="datepicker_edit" name="edit_birthdate" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_address" class="col-sm-3 control-label">Address</label>

            <div class="col-sm-9">
              <textarea class="form-control" name="edit_address" id="edit_address" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_contact" class="col-sm-3 control-label">Contact Info</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_contact" name="edit_contact" required>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_guardian_name" class="col-sm-3 control-label">Guardian's Name</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_guardian_name" name="edit_guardian_name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_guardian_contact" class="col-sm-3 control-label">Guardian's Contact Info</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_guardian_contact" name="edit_guardian_contact" required>
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
  <form class="form-horizontal" method="POST" action="students_delete.php">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b><span class="del_student">Delete</span></b></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" class="del_sid" name="del_sid">
          <div class="text-center">
            <p>DELETE STUDENT</p>
            <h2 class="bold del_student_name"></h2>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
  <form class="form-horizontal" method="POST" action="students_edit_photo.php" enctype="multipart/form-data">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b><span class="update_student_photo"></span></b></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" class="update_sid" name="update_sid">
          <div class="form-group">
            <label for="update_photo" class="col-sm-3 control-label">Change Photo</label>

            <div class="col-sm-9">
              <input type="file" id="update_photo" name="update_photo" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- View Student -->
<div class="modal fade" id="view">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b><span class="view_student_info"></span></b></h4>
      </div>
      <div class="modal-body" sty>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>School ID #: </b></h4>
          <h4 class="col-sm-8" id="view_student_school_id"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Course: </b></h4>
          <h4 class="col-sm-8" id="view_student_course"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Year & Section</b></h4>
          <h4 class="col-sm-8" id="view_student_year_section"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Photo</b></h4>
          <div class="col-sm-8"><img id="view_student_photo" alt="Can't Find" height="150px"></div>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>First Name</b></h4>
          <h4 class="col-sm-8" id="view_student_first_name"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Middle Name</b></h4>
          <h4 class="col-sm-8" id="view_student_middle_name"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Last Name</b></h4>
          <h4 class="col-sm-8" id="view_student_last_name"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Gender</b></h4>
          <h4 class="col-sm-8" id="view_student_gender"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Birthdate</b></h4>
          <h4 class="col-sm-8" id="view_student_birthdate"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Address</b></h4>
          <h4 class="col-sm-8" id="view_student_address"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Contact Info</b></h4>
          <h4 class="col-sm-8" id="view_student_contact_info"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Guardian's Name</b></h4>
          <h4 class="col-sm-8" id="view_student_guardian_name"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Guardian's Contact Info</b></h4>
          <h4 class="col-sm-8" id="view_student_guardian_contact_info"></h4>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <h4 class="col-sm-3"><b>Added Since</b></h4>
          <h4 class="col-sm-8" id="view_student_added_since"></h4>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-flat" data-dismiss="modal" aria-label="Close"><i class="fa fa-check-square-o"></i> OK</button>
      </div>
    </div>
  </div>
</div>
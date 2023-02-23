<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Student List
        </h1>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <a href="#addnew" data-toggle="modal" class="btn btn-default"><i class="fa fa-plus"></i> New</a>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>School ID #</th>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Added Since</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT *, s.id AS sid FROM students s LEFT JOIN year_sections ys ON ys.id=s.year_section_id";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                    ?>
                      <tr>
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><?php echo $row['year'] . $row['section']; ?></td>
                        <td><img alt="Can't Find" src="<?php echo (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg'; ?>" width="30px" height="30px"> <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['sid']; ?>"><span class="fa fa-edit"></span></a></td>
                        <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                        <td><?php echo date('M d, Y', strtotime($row['created_on'])) ?></td>
                        <td>
                          <button class="btn btn-success edit" data-id="<?php echo $row['sid']; ?>"><i class="fa fa-edit"></i> Edit</button>
                          <button class="btn btn-danger delete" data-id="<?php echo $row['sid']; ?>"><i class="fa fa-trash"></i> Delete</button>
                          <button class="btn btn-info view" data-id="<?php echo $row['sid']; ?>"><i class="fa fa-trash"></i> View Info</button>
                        </td>
                      </tr>
                    <?php
                    }
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
    <?php include 'includes/students_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {
      $('.edit').click(function(e) {
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        console.log(id);
        getRow(id);
      });

      $('.delete').click(function(e) {
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $('.photo').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
      });

      $('.view').click(function(e) {
        e.preventDefault();
        $('#view').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'students_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          // Edit Info
          $('.sid').val(response.sid);
          $('.student_details').html("Edit " + response.firstname + " " + (response.middlename ? (response.middlename + " ") : '') + response.lastname + "'s Info");
          $('#edit_school_id_num').val(response.student_id);
          $('#edit_student_course').val(response.course);
          $('#edit_year_section').val(response.year_section_id);
          $('#edit_firstname').val(response.firstname);
          $('#edit_middlename').val(response.middlename);
          $('#edit_lastname').val(response.lastname);
          $('#edit_gender_val').val(response.gender).html(response.gender);
          $('#datepicker_edit').val(response.birthdate);
          $('#edit_address').val(response.address);
          $('#edit_contact').val(response.contact_info);
          $('#edit_guardian_name').val(response.guardian_name);
          $('#edit_guardian_contact').val(response.guardian_contact_info);
          // View Info
          $('.view_student_info').html(response.firstname + " " + (response.middlename ? (response.middlename + " ") : '') + response.lastname);
          $('#view_student_school_id').html(response.student_id);
          $('#view_student_course').html(response.course);
          $('#view_student_year_section').html(response.year + "-" + response.section);
          $('#view_student_photo').attr('src', '../images/' + response.photo);
          $('#view_student_first_name').html(response.firstname);
          $('#view_student_middle_name').html(response.middlename);
          $('#view_student_last_name').html(response.lastname);
          $('#view_student_gender').html(response.gender);
          $('#view_student_birthdate').html(moment(response.birthdate, "YYYY-MM-DD").format('MMM D, YYYY').toString());
          $('#view_student_address').html(response.address);
          $('#view_student_contact_info').html(response.contact_info);
          $('#view_student_guardian_name').html(response.guardian_name);
          $('#view_student_guardian_contact_info').html(response.guardian_contact_info);
          $('#view_student_added_since').html(moment(response.created_on, "YYYY-MM-DD").format('MMM D, YYYY').toString());
          // Delete Student
          $('.del_sid').val(response.sid);
          $('.del_student_name').html(response.firstname + " " + (response.middlename ? (response.middlename + " ") : '') + response.lastname);
          // Update Photo
          $('.update_student_photo').html(response.firstname + " " + (response.middlename ? (response.middlename + " ") : '') + response.lastname);
          $('.update_sid').val(response.sid);
        }
      });
    }
  </script>
</body>

</html>
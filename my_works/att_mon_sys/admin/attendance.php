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
          Attendance
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
                    <th class="hidden"></th>
                    <th>Date</th>
                    <th>School ID #</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year & Section</th>
                    <th>Subject</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT *, students.student_id AS stdntid, attendance.id AS attid FROM attendance LEFT JOIN students ON students.student_id=attendance.student_id LEFT JOIN schedules ON schedules.id = attendance.schedule_id LEFT JOIN year_sections ys ON students.year_section_id=ys.id ORDER BY attendance.date DESC, attendance.time_in DESC";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      $status = ($row['status']) == 1 ? '<span class="label label-danger pull-right">late</span>' : (($row['status']) == 5 ? '<span class="label label-info pull-right">added only</span>' : '<span class="label label-success pull-right">ontime</span>');
                      $status2 = ($row['time_out']) == "00:00:00" ? '<span class="label label-warning pull-right">no out</span>' : null;
                      $time_out = ($row['time_out']) == "00:00:00" ? null : date('h:i A', strtotime($row['time_out']));
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>" . date('M d, Y', strtotime($row['date'])) . "</td>
                          <td>" . $row['stdntid'] . "</td>
                          <td>" . $row['firstname'] . ' ' . ($row['middlename'] ? ($row['middlename'] . " ") : '') . $row['lastname'] . "</td>
                          <td>" . $row['course'] . "</td>
                          <td>" . $row['year'] . "-" . $row['section'] . "</td>
                          <td>" . $row['subject'] . "</td>
                          <td>" . date('h:i A', strtotime($row['time_in'])) . $status . "</td>
                          <td>" . $time_out . $status2 . "</td>
                          <td>
                            <button class='btn btn-danger delete' data-id='" . $row['attid'] . "'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
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
    <?php include 'includes/attendance_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>
    $('#check_id').click(function(e) {
      e.preventDefault();
      var studentid = $('#student_id').val();
      $('#subject_list').html("");
      if (studentid) {
        $('#student_id').attr('style', '');
        $.ajax({
          type: 'POST',
          url: 'get_subjects.php',
          data: {
            studentid: studentid
          },
          dataType: 'json',
          success: function(response) {
            response.forEach(data => {
              $('#subject_list').append(
                $('<option/>').val(data['sched_id']).html(data['subject'] + " (" + data['subject_day'] + " " + data['sched_start'] + "-" + data['sched_end'] + ")")
              );
            });
          }
        });
      } else {
        $('#student_id').attr('style', 'box-shadow: 0 0 3px #CC0000;');
        $('#subject_list').append(
          $('<option>').attr('selected', 'true').html('- Select -')
        );
      }
    })

    $(function() {
      $('.edit').click(function(e) {
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $('.delete').click(function(e) {
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });
    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'attendance_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('#datepicker_edit').val(response.date);
          $('#attendance_date').html(response.date);
          $('#edit_time_in').val(response.time_in);
          $('#edit_time_out').val(response.time_out);
          $('#attid').val(response.attid);
          $('#employee_name').html(response.firstname + ' ' + response.lastname);
          $('#del_attid').val(response.attid);
          $('#del_employee_name').html(response.firstname + ' ' + response.lastname);
        }
      });
    }
  </script>
</body>

</html>
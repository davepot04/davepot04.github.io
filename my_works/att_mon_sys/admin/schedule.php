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
          Schedules
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
                <button class='btn btn-default' id="add"><i class='fa fa-plus'></i> New</button>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>Day</th>
                    <th>Sched Start</th>
                    <th>Sched End</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT s.id, s.subject_day, s.subject, s.sched_start, s.sched_end, ys.year, ys.section FROM `schedules` s LEFT JOIN `year_sections` ys ON s.year_section_id = ys.id;";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      echo "
                        <tr>
                          <td>" . $row['year'] ."-". $row['section'] . "</td>
                          <td>" . $row['subject'] . "</td>
                          <td>" . $row['subject_day'] . "</td>
                          <td>" . date('h:i A', strtotime($row['sched_start'])) . "</td>
                          <td>" . date('h:i A', strtotime($row['sched_end'])) . "</td>
                          <td>
                            <button class='btn btn-success edit' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger delete' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
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
    <?php include 'includes/schedule_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>
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

      $('#add').click(function(e) {
        e.preventDefault();
        $('#addnew').modal('show');
      });
    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'schedule_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          console.log(response)
          $('#sched_id').val(response.id);
          $('#subject_edit').val(response.subject);
          $('#sched_day_edit').val(response.subject_day);
          $('#sched_start_edit').val(response.sched_start);
          $('#sched_start_edit').html(response.sched_start);
          $('#sched_end_edit').val(response.sched_end);
          $('#sched_end_edit').html(response.sched_end);
          $('#year_section_edit').val(response.ysid);
          $('#del_sched_id').val(response.id);
          $('#del_schedule').html(response.subject + ' ' + response.year +"-"+ response.section + '<br>' + response.sched_start + ' - ' + response.sched_end);
        }
      });
    }
  </script>
</body>

</html>
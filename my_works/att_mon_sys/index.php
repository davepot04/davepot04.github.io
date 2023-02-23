<?php session_start(); ?>
<?php include 'header.php'; ?>

<body class="hold-transition login-page" style="background-image: url('./images/school_logo.jpg'); background-repeat: no-repeat; background-color: white; background-position: center; background-size: contain;">

  <div class="login-box" style="padding: 20px; width:30vw; border-radius: 25px;background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <br>
    <div class="login-logo">
      <p id="date"></p>
      <p id="time" class="bold"></p>
    </div>

    <div class="login-box-body">
      <div>
        <div class="col-xs-12 text-center" style="margin: 0 auto 35px auto;">
          <img src="./images/profile.png" id="userImage" alt="No Image" height='200px' style='border: 1px solid gray; padding: 7px; border-radius: 5px;'>
        </div>
        <div class="col-xs-12">
          <form id="attendance">
            <div class="form-group">
              <label for="school_id_num" class="control-label">Student ID #</label>
              <div class="row">
                <div class="col-xs-9">
                  <input type="text" class="form-control" id="school_id_num" name="school_id_num">
                </div>
                <div class="col-xs-3">
                  <button class="btn btn-primary" id="check_id" style="width: 100%;">Check</button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <select class="form-control" id="subject_list" name="subject_list">
                <option selected>- Select -</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="log_type" name="log_type">
                <option value="in">Time In</option>
                <option value="out">Time Out</option>
              </select>
            </div>
            <button type="submit" class="col-xs-12 btn btn-primary" name="login"><i class="fa fa-sign-in"></i> LOG</button>
          </form>
        </div>
      </div>
      <div class="text-center" style="margin-top: 450px;">
        <br>
        <a href="./admin/index.php">To Admin Login Page</a>
      </div>
    </div>
    <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
      <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
      <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
    <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
      <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
      <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div>
  </div>

  <?php include 'scripts.php' ?>
  <script type="text/javascript">
    $('#check_id').click(function(e) {
      e.preventDefault();
      var studentid = $('#school_id_num').val();
      $('#subject_list').html("");
      if (studentid) {
        $('.alert').hide();
        $.ajax({
          type: 'POST',
          url: 'get_subjects.php',
          data: {
            studentid: studentid
          },
          dataType: 'json',
          success: function(response) {
            response.forEach(data => {
              $('#userImage').attr('src', './images/' + data.photo);
              $('#subject_list').append(
                $('<option/>').val(data['sched_id']).html(data['subject'] + " (" + data['subject_day'] + " " + data['sched_start'] + "-" + data['sched_end'] + ")")
              );
            });
          }
        });
      } else {
        $('#userImage').attr('src', './images/profile.png');
        $('#subject_list').append(
          $('<option>').attr('selected', 'true').html('- Select -')
        );
        $('.alert').hide();
        $('.alert-danger').show();
        $('.message').html("Enter a Student ID #!");
      }
    })

    $(function() {
      var interval = setInterval(function() {
        var momentNow = moment();
        $('#date').html(momentNow.format('dddd').substring(0, 3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
        $('#time').html(momentNow.format('hh:mm:ss A'));
      }, 100);

      $('#attendance').submit(function(e) {
        e.preventDefault();
        var attendance = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: 'attendance.php',
          data: attendance,
          dataType: 'json',
          success: function(response) {
            if (response.error) {
              $('.alert').hide();
              $('.alert-danger').show();
              $('.message').html(response.message);
            } else {
              $('.alert').hide();
              $('.alert-success').show();
              $('.message').html(response.message);
              $('#employee').val('');
            }
          }
        });
      });

    });
  </script>
</body>

</html>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="height: 85px;">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" height="100px" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <div class="pull-left">
            <a href="#profile" data-toggle="modal" class="btn btn-flat btn-default text-black" id="admin_profile">Update</a>
          </div>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">REPORTS</li> -->
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <!-- <li class="header">MANAGE</li> -->
        
        <li><a href="attendance.php"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="employee.php"><i class="fa fa-circle-o"></i> Student List</a></li>
          </ul>
        </li> -->
        <li><a href="students.php"><i class="fa fa-user"></i> <span>Student List</span></a></li>
        <li><a href="schedule.php"><i class="fa fa-calendar-plus-o"></i> <span>Schedules</span></a></li>
        <li><a href="year_section.php"><i class="fa fa-list"></i> <span>Year & Section</span></a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        <!-- <li><a href="deduction.php"><i class="fa fa-file-text"></i> Deductions</a></li> -->
        <!-- <li><a href="position.php"><i class="fa fa-suitcase"></i> Positions</a></li> -->
        <!-- <li class="header">PRINTABLES</li>
        <li><a href="payroll.php"><i class="fa fa-files-o"></i> <span>Payroll</span></a></li> -->
        <!-- <li><a href="schedule_employee.php"><i class="fa fa-clock-o"></i> <span>Schedule</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php include 'includes/profile_modal.php'; ?>
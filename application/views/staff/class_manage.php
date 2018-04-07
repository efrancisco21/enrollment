<style>
.table.no-border tr td, .table.no-border tr th {
  border-width: 0;
}</style>
</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <p><?php //var_dump($class_info) ?></p>
    <p><?php //echo $this->db->last_query(); exit; ?></p>
    <p><?php //var_dump($section_info) ?></p>
    <p><?php //var_dump($schedule_info) ?></p>
    <h1><?= $section_info->section_name ?></h1>
    <a href="<?= base_url() ?>staff/classes" class="btn btn-secondary">Back</a>
    <hr>
    <section id="datatable_section">
    <button type="button" id="add_student" class="btn btn-info" data-toggle="tooltip"
     data-placement="top" title="Add student to this section">Add student</button>
     
    <button type="button" id="add_schedule" class="btn btn-info" data-toggle="tooltip"
     data-placement="top" title="Add schedule to this section">Add schedules</button>
    <div id="messages">
    <?php 
    if($this->session->flashdata()) {
      echo '<hr>';
      $alerttype;
      $message;

      if ($this->session->flashdata('success_add')) {
        $alerttype = 'alert-success';
        $message = $this->session->flashdata('success_add');
      } else if ($this->session->flashdata('fail_add')) {
        $alerttype = 'alert-danger';
        $message = $this->session->flashdata('fail_add');
      } else if ($this->session->flashdata('success_edit')) {
        $alerttype = 'alert-primary';
        $message = $this->session->flashdata('success_edit');
      } else if ($this->session->flashdata('success_edit')) {
        $alerttype = 'alert-danger';
        $message = $this->session->flashdata('fail_edit');
      }
      ?>
      <div class="alert <?= $alerttype ?>" role="alert">
        <?= $message ?>
      </div>
      <?php } ?>

    </div>
    <hr>

    <h1>Students</h1>
    <div id="data_table_students">
      <table id="table_id_students" class="table" style="width: 100%;">
        <thead>
          <tr>
            <th>Student number</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Level</th>
            <th>Year</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          
          <?php if( $class_info ) { ?>
          <?php foreach ($class_info as $info) { ?>
 
            <tr>
              <td><?= $info->studentnumber ?></td>
              <td><?= $info->lastname ?></td>
              <td><?= $info->firstname ?></td>
              <td><?= $info->middlename ?> </td>
              <td><?= $info->level ?></td>
              <td><?= $info->year ?></td>
              <td> 
                <button type="button" class="btn btn-light btn-sm remove_student" data-section="<?= $section_info->section_id ?>" 
                  data-id="<?= $info->user_id ?>" aria-hidden="true">
                  <i class="fa fa-times" aria-hidden="true"></i>
                </button> 
            </td>
            </tr>
        
         <?php } ?>
         <?php } ?>
        </tbody>
      </table>
    </div>

<hr style="height:2px;border:none;color:#333;background-color:#333;">

    <h1>Schedules</h1>
    <div id="data_table_schedules">
      <table id="table_id_schedules" class="table" style="width: 100%;">
        <thead>
          <tr>
            <th>Subject name</th>
            <th>Days</th>
            <th>Time</th>
            <th>Room</th>
            <th>Teacher</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
           <?php if( $schedule_info ) { ?>
             <?php foreach ($schedule_info as $info) { ?>
                <tr>
                  <td><?= $info->subject_name ?></td>
                  <td><?= $info->days ?></td>
                  <td><?= $info->time ?></td>
                  <td><?= $info->room ?></td>
                  <td><?= $info->lastname . ', ' . $info->firstname . ' ' . $info->middlename ?></td>
                  <td>
                    <button type="button" class="btn btn-light btn-sm remove_schedule" data-section="<?= $section_info->section_id ?>" 
                      data-id="<?= $info->row_id ?>" aria-hidden="true">
                      <i class="fa fa-times" aria-hidden="true"></i>
                    </button> 
                  </td>
                </tr>
              <?php } ?>
          <?php } ?>
            
        </tbody>
      </table>
    </div>

</section>

  <!-- forms schedule -->
  <?php $this->load->view('staff/layouts/classes/add_student'); ?>
  <?php $this->load->view('staff/layouts/classes/add_schedule'); ?>
  <!-- forms -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->
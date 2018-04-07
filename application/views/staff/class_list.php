<style type="text/css">

#data_table,
#classlist {
  max-height: 0;
  opacity: 0;
 -webkit-transition: all ease-in-out 0.2s;
 transition: all ease-in-out 0.2s;
}
#data_table.Active,
#classlist.Active {
  max-height: 1000px;
  opacity: 1;
}

</style>
</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <h1>Section List</h1>

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
    <div id="data_table" class="Active">
      <table id="table_id" class="table" style="width: 100%;">
        <thead>
          <tr>
            <th>Section Name</th>
            <th>Subject Name</th>
            <th>Days</th>
            <th>Time</th>
            <th>Room</th>
            <th>Level</th>
            <th>Year</th>
            <th>School Year</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($class_list as $class) { ?>
          <tr>
            <td>
              <a href="<?= base_url() ?>staff/class_list_view/<?= $class->section_id ?>/<?= $class->subject_id ?>/<?= $class->admin_id ?>"
               id="class_list_view"  class="view_student_list">
               <?= $class->section_name ?>
              </a>
            </td>
            <td><?= $class->subject_name ?></td>
            <td><?= $class->days ?></td>
            <td><?= $class->time ?></td>
            <td><?= $class->room ?></td>
            <td><?= $class->level ?></td>
            <td><?= $class->year ?></td>
            <td><?= $class->schoolyear ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  <!-- forms -->
  <?php //$this->load->view('staff/layouts/classlist/students') ?>
  <!-- end of forms -->

  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

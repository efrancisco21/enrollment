<style>
.table.no-border tr td, .table.no-border tr th {
  border-width: 0;
}</style>
</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <h1>Students</h1>
  
   <button class="btn btn-secondary ml-3" id="goback" style="display: none;">Back</button>
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
    <div id="data_table">
     <button type="button" class="mb-2 btn btn-danger btn-sm modal_trigger_reset_payment_all"
     aria-hidden="true" data-toggle="modal" data-target=".modal_confirmation">
          <i class="fa fa-credit-card" aria-hidden="true"></i> Reset all payment status
     </button>
      <table id="table_id" class="table" style="width: 100%;">
        <thead>
          <tr>
            <th>Student Number</th>
            <th>Name</th>
            <th>Level</th>
            <th>Year</th>
            <th>Payment Status</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($students as $student) { ?>
            <tr>
              <td><?= $student->studentnumber ?></td>
              <td><?= $student->lastname . ' ' . $student->firstname . ' ' . $student->middlename ?></td>
              <td><?= $student->level ?></td>
              <td><?= $student->year ?></td>
              <td><?= $student->is_paid ?></td>
              <td>
                <?php if($student->status == 1){
                  echo '<span class="badge badge-success">Active</span>';
                } else {
                  echo '<span class="badge badge-secondary">Inactive</span>';
                } ?>

              </td>
              <td style="width: 130px;">
                 <button type="button" class="btn btn-light btn-sm view_student" data-id="<?= $student->user_id ?>" aria-hidden="true">
                  <i class="fa fa-eye fa-1"></i>
                </button>

                <button type="button" class="btn btn-light btn-sm edit_student" data-id="<?= $student->user_id ?>" aria-hidden="true">
                  <i class="fa fa-pencil-square-o fa-1"></i>
                </button>

                <?php if($student->status == 1){ ?>
                <button type="button" class="btn btn-light btn-sm modal_trigger_disable" aria-hidden="true" data-status="<?= $student->status ?>" data-id="<?= $student->user_id ?>" data-toggle="modal" data-target=".modal_confirmation">
                  <i class="fa fa-times fa-1"></i>
                </button>
                <?php } else { ?>
                 <button type="button" class="btn btn-light btn-sm modal_trigger_enable" aria-hidden="true" data-status="<?= $student->status ?>"  data-id="<?= $student->user_id ?>" data-toggle="modal" data-target=".modal_confirmation">
                  <i class="fa fa-check fa-1"></i>
                </button>

                <?php } ?>

              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <!-- student profile -->
    <?php $this->load->view('staff/layouts/students/student_profile'); ?>
    <!-- forms -->
    <?php $this->load->view('staff/layouts/students/edit_student'); ?>
    <!-- forms -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade modal_confirmation" id="disableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="enable_disable">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="" type="button" class="btn btn-primary confirm" value="">Confirm</button>
      </div>
    </div>
  </div>
</div>
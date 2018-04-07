</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">

    <h1>Subjects</h1>

    <button type="button" class="btn btn-primary" id="add_subject">Add Subject</button>
    <button type="button" class="btn btn-secondary" id="goback" style="display: none;">Back</button>
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
      <table id="table_id" class="table" style="width: 100%;">
        <thead>
          <tr>
            <th>Subject Name</th>
            <th>Level</th>
            <th>Year</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($subjects as $subject){ ?>
            <tr>
              <td><?= $subject->subject_name ?></td>
              <td><?= $subject->level ?></td>
              <td><?= $subject->year ?></td>
              <td>
                <?php if($subject->status == 1){
                  echo '<span class="badge badge-success">Active</span>';
                } else {
                  echo '<span class="badge badge-secondary">Inactive</span>';
                } ?>

              </td>
              <td>
                <button type="button" class="btn btn-light btn-sm edit_subject" data-id="<?= $subject->subject_id ?>">
                  <i class="fa fa-pencil-square-o fa-1" aria-hidden="true"></i>
                </button>

                <?php if($subject->status == 1){ ?>
                <button type="button" class="btn btn-light btn-sm modal_trigger_disable"
                data-status="<?= $subject->status ?>" data-id="<?= $subject->subject_id ?>" data-toggle="modal" data-target=".modal_confirmation">
                  <i class="fa fa-times fa-1" aria-hidden="true"></i>
                </button>
                <?php } else { ?>
                 <button type="button" class="btn btn-light btn-sm modal_trigger_enable"
                  data-status="<?= $subject->status ?>"  data-id="<?= $subject->subject_id ?>" data-toggle="modal" data-target=".modal_confirmation">
                  <i class="fa fa-check fa-1" aria-hidden="true"></i>
                </button>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <!-- forms -->
    <?php $this->load->view('staff/layouts/subjects/add_subject'); ?>
    <?php $this->load->view('staff/layouts/subjects/edit_subject'); ?>
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

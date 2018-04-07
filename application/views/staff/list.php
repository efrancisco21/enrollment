</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <h1>Staff</h1>
  
    <button type="button" class="btn btn-primary" id="add_staff">Add Staff</button>
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
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($staff as $list) { ?>
          <tr>
            <td><?= $list->lastname ?></td>
            <td><?= $list->firstname ?></td>
            <td><?= $list->middlename ?></td>
            <td><?= $list->username ?></td>
            <td><?= $list->role ?></td>
            <td>
              <?php if($list->status == 1){
                echo '<span class="badge badge-success">Active</span>';
              } else {
                echo '<span class="badge badge-secondary">Inactive</span>';
              } ?>
            </td>
            <td>
              <button type="button" class="btn btn-light btn-sm edit_staff" data-id="<?= $list->admin_id ?>" aria-hidden="true">
                <i class="fa fa-pencil-square-o fa-1"></i>
              </button>

          <?php //if($list->admin_id != $this->session->userdata('admin_id')) { ?>

              <?php if($list->status == 1){ ?>
              <button type="button" class="btn btn-light btn-sm modal_trigger_disable" aria-hidden="true" data-status="<?= $list->status ?>" data-id="<?= $list->admin_id ?>" data-toggle="modal" data-target=".modal_confirmation">
                <i class="fa fa-times fa-1"></i>
              </button>
              <?php } else { ?>
              <button type="button" class="btn btn-light btn-sm modal_trigger_enable" aria-hidden="true" data-status="<?= $list->status ?>"  data-id="<?= $list->admin_id ?>" data-toggle="modal" data-target=".modal_confirmation">
                <i class="fa fa-check fa-1"></i>
              </button>
            </td>
            <?php } ?>

          <?php //} ?>

          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  
    <!-- forms -->
    <?php $this->load->view('staff/layouts/staff/add_staff'); ?>
    <?php $this->load->view('staff/layouts/staff/edit_staff'); ?>
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
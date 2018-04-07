</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <h1>Sections</h1>
  
    <button type="button" class="btn btn-primary" id="add_section">Add Section</button>
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
            <th>Section Name</th>
            <th>Level</th>
            <th>Year</th>
            <th>School Year</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($sections as $section) { ?>
          <tr>
            <td><?= $section->section_name ?></td>
            <td><?= $section->level ?></td>
            <td><?= $section->year ?></td>
            <td><?= $section->schoolyear ?></td>
            <td>
              <?php if($section->status == 1){
                echo '<span class="badge badge-success">Active</span>';
              } else {
                echo '<span class="badge badge-secondary">Inactive</span>';
              } ?>
            </td>
            <td>
              <button type="button" class="btn btn-light btn-sm edit_section" data-id="<?= $section->section_id ?>" aria-hidden="true">
                <i class="fa fa-pencil-square-o fa-1"></i>
              </button>

              <?php if($section->status == 1){ ?>
              <button type="button" class="btn btn-light btn-sm modal_trigger_disable" aria-hidden="true" data-status="<?= $section->status ?>" data-id="<?= $section->section_id ?>" data-toggle="modal" data-target=".modal_confirmation">
                <i class="fa fa-times fa-1"></i>
              </button>
              <?php } else { ?>
              <button type="button" class="btn btn-light btn-sm modal_trigger_enable" aria-hidden="true" data-status="<?= $section->status ?>"  data-id="<?= $section->section_id ?>" data-toggle="modal" data-target=".modal_confirmation">
                <i class="fa fa-check fa-1"></i>
              </button>
            </td>
            <?php } ?>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  
    <!-- forms -->
    <?php $this->load->view('staff/layouts/sections/add_section'); ?>
    <?php $this->load->view('staff/layouts/sections/edit_section'); ?>
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
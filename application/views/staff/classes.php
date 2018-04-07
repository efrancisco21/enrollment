<!-- <style type="text/css">
  
  .modal-xl {
   max-width: 90%;
  }

</style>
 -->
</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <h1>Classes</h1>
  
  <!--   <button type="button" class="btn btn-primary" id="add_class">Add Class</button>
    <button type="button" class="btn btn-secondary" id="goback" style="display: none;">Back</button> -->
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
          </tr>
        </thead>
        <tbody>
          <?php foreach ($sections_activated as $section) {
             ?>
          <tr>
            <td>
             <!--  <a href="javascript:void(0)" class="section_name" data-name="<?= $section->section_name ?>" data-toggle="modal" data-target=".bd-example-modal-lg"> </a>-->
              <a href="<?= base_url() ?>staff/classmanage/<?= $section->section_id ?>">
                 <?= $section->section_name ?>
              </a>
            </td> 
              <!-- section name should be a name that will trigger the page change then crud for setting up the classes -->
            <td><?= $section->level ?></td>
            <td><?= $section->year ?></td>
            <td><?= $section->schoolyear ?></td>
          </tr>

          <?php } ?>
        </tbody>
      </table>
    </div>

  
    <!-- forms -->
    <?php //$this->load->view('staff/layouts/classes/add_class'); ?>
    <?php //$this->load->view('staff/layouts/staff/edit_staff'); ?>
    <!-- forms -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->


<!-- Large modal -->
<!-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
          <div class="row content_area">
        
            <div class="col-md-6">
              <div id="button_area">
                <button type="button" class="btn btn-info" id="add_student">Add Student</button>
                <button type="button" class="btn btn-info" id="add_subject">Add Subject</button>
              </div>
            </div>
        
            <div class="col-md-12"><hr></div>

            <div class="col-md-4" id="students">
                <ol type="1"></ol>
            </div>

            <div class="col-md-4" id="subjects">
             <form class="form-inline">
               <label class="sr-only" for="inlineFormInputName2">Name</label>
               <ol type="1">
            <li> 
                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0 " id="inlineFormInputName2" placeholder="Jane Doe">  
                <button type="submit" class="btn btn-primary">Submit</button>
              </li>
            </ol>
            
          </form>
        </div>

            <div class="col-md-4">
              <ol type="1"></ol>
            </div>

          </div>
        </div>
      </div>

       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div> -->
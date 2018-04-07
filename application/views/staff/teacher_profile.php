</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <h1>Profile</h1>

<div id="teacher_profile" class="ml-auto mx-auto" style="width: 900px;">
  <div id="print_area">
  <table class="table no-border table-sm">
    <tr>
      <td><strong>Full name:</strong> <p style="display:inline" id="full_name"><?= $teacher_profile->lastname ?>,
        <?= $teacher_profile->firstname ?> <?= $teacher_profile->middlename ?> </p> </td>
    </tr>
    <tr>
      <td><strong>Username: </strong>  <p style="display:inline" id="role"><?= $teacher_profile->username ?> </p></td>
    </tr>
    <tr>
      <td><strong>Role: </strong>  <p style="display:inline" id="role"><?= $teacher_profile->role ?> </p></td>
    </tr>
    <tr>
      <td><strong>Status: </strong>  
        <p style="display:inline" id="status">
           <?php if($teacher_profile->status == 1){
                echo '<span class="badge badge-success">Active</span>';
              } else {
                echo '<span class="badge badge-secondary">Inactive</span>';
              } ?>
        </p>
      </td>
    </tr>
  </table>
</div>
  <!-- <hr>
<button class="btn btn-primary" id="print_btn">Print</button> -->
</div>
<br>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
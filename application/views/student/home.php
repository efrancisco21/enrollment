 <div class="container">

 <?php
if($this->session->flashdata()) {
$alerttype;
$message;
  if ($this->session->flashdata('login')) {
      $alerttype = 'alert-success';
      $message = $this->session->flashdata('login');
  }
  ?>

<div class="alert <?= $alerttype ?>" role="alert">
        <?= $message ?>
</div>

<?php } ?>
      <!-- BODY START -->
      <div class="row">
        <div class="col-md-4">
          <h2><?= $this->session->userdata('firstname').' '.$this->session->userdata('lastname'); ?></h2>
          <ul class="list-group">
            <li class="list-group-item"><a href="<?= base_url().'student/accountinfo'; ?>"><i class="fa fa-id-card-o"></i> Account info</a></li>
            <li class="list-group-item"><a href="<?= base_url().'student/viewsched'; ?>"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> View Schedule</a></li>
            <li class="list-group-item"><a href="<?= base_url().'student/viewgrade'; ?>"><i class="fa fa-book" aria-hidden="true"></i> View Grades</a></li>
            <li class="list-group-item"><a href="<?= base_url().'student/safinfo'; ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> SAF</a></li>
          </ul>
        </div>
        <!-- Info Col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Homepage
            </div>
            <div class="card-body">
              <h4 class="card-title">Welcome to Angelicum Student Portal!</h4>
              <p class="card-text">In here you can explore your account infromtion, transaction history, view your grades and view your schedule.</p>
              <a href="#" class="btn btn-primary">Go to schedule</a>
            </div>
          </div>
        </div>
         <!-- END Info Col -->
      </div>

      <!-- BODY END -->

 </div><!-- /.container -->

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
            <li class="list-group-item" style="background-color:#DDDDDD;"><a href="<?= base_url().'student/safinfo'; ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> SAF</a></li>
          </ul>
        </div>
        <!-- Info Col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Financial Information
            </div>
            <div class="card-body">
              <h4 class="card-title">Payment history</h4>
              <?php foreach($payment_history as $key){ ?>
                <!-- per transaction -->
                <p><b>Student Number: </b><?php echo $key->studentnumber; ?> <b>School Year: </b><?php echo $key->schoolyear; ?></p>
                <p><b>Transaction Type: </b><?php echo $key->transaction; ?> <b>Payment Type: </b><?php echo $key->payment_type; ?></p>
                <?php if($key->cash_amount = 'cash'){ ?>
                  <p><b>Cash amount: </b><?php echo $key->cash_amount; ?></p>
                <?php }else if($key->cash_amount = 'credit_card'){ ?>
                  <p><b>Cash amount: </b><?php echo $key->card_amount; ?></p>
                <?php }else if($key->cash_amount = 'cheque'){ ?>
                  <p><b>Cash amount: </b><?php echo $key->check_amount; ?></p>
                <?php } ?>
                <hr>
                <!-- end per transaction -->
              <?php } ?>
            </div>
          </div>
        </div>
         <!-- END Info Col -->
      </div>

      <!-- BODY END -->

 </div><!-- /.container -->

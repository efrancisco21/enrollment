</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <h1>Payment History</h1>
     <hr>
    <div id="data_table">
      <table id="table_id" class="table" style="width: 100%;">
        <thead>
          <tr>
            <th>Student number</th>
            <th>Schoolyear</th>
            <th>Transaction</th>
            <th>Payment type</th>
            <th>Cash amount</th>
            <th>Card amount</th>
            <th>Cheque amount</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($payments as $payment) { ?>
             <tr>
               <td><?= $payment->studentnumber ?></td>
                <td><?= $payment->schoolyear ?></td>
                 <td><?= $payment->transaction ?></td>
                  <td><?= $payment->payment_type ?></td>
                   <td><?= $payment->cash_amount ?></td>
                    <td><?= $payment->card_amount ?></td>
                     <td><?= $payment->check_amount ?></td>
                     <td><?= $payment->timestamp ?></td>
             </tr>
          <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
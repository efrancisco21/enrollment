<style>

.input-group-addon {
    background-color: transparent;
    border-left: 0;
}

.one-card > div {
    height: 150px;
    background-position: center center;
    background-repeat: no-repeat;
}

.visa-mc-cvc-preview {
    background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOYAAACOCAYAAAAlzXSMAAAAAXNSR0IArs4c6QAACrdJREFUeAHt3X1wFHcdx/Hv7uWJNIZE0oJD6wNQ6MBYCJbaqQMqtGO1RMBiaavVGWNmmuk4dvqHMy2txEFHK+OM09YJGijVYSggijx0ZKYyQrCDtSVUaZk+CMRQKEhiHsjD5ZK7dX+rl+aW5HaT3O1vQ947Q/Z2f3u/729fe5/s3V64M2SIqe9UzR1mJHKvYVlLxJDpIkbREJuxCgEERiVgdYol5yzDqE/EEztyZ6476O7GGLwiemr9jXmmVSeG8dnB67mNAAJZFLDkUCweryqYVfPPZJWBYPadrlkSMSN/sBtKk43MEUAgMIHWeMJakTvj+0dURSeYzpkyIq/Yy4QysONAIQSuEGiN9cdvVWdOUzU5T18J5RVKrEAgYIHSvEikTtU01IWeSCTyUsADoBwCCAwjEI8n7jDV1ddh2lmNAAIaBMyIuca0EtZdGmpTEgEEhhGw4om71GvMacO0sxoBBHQIGMY00zSNXB21qYkAAkMLqEw6V2WHbmYtAgjoEiCYuuSpi0AaAYKZBocmBHQJEExd8tRFII0AwUyDQxMCugQIpi556iKQRoBgpsGhCQFdAgRTlzx1EUgjQDDT4NCEgC4BgqlLnroIpBEgmGlwaEJAlwDB1CVPXQTSCBDMNDg0IaBLgGDqkqcuAmkECGYaHJoQ0CVAMHXJUxeBNALq4yutNO00IYCABgHOmBrQKYmAlwDB9BKiHQENAgRTAzolEfASIJheQrQjoEGAYGpApyQCXgIE00uIdgQ0CBBMDeiURMBLgGB6CdGOgAYBgqkBnZIIeAkQTC8h2hHQIEAwNaBTEgEvAYLpJUQ7AhoECKYGdEoi4CVAML2EaEdAgwDB1IBOSQS8BAimlxDtCGgQIJga0CmJgJcAwfQSoh0BDQIEUwM6JRHwEiCYXkK0I6BBgGBqQKckAl4CBNNLiHYENAgQTA3olETAS4BgegnRjoAGAYKpAZ2SCHgJEEwvIdoR0CBAMDWgUxIBLwGC6SVEOwIaBAimBnRKIuAlkJNoXO+1De0IIBCwAGfMgMEph4AfAYLpR4ltEAhYgGAGDE45BPwIEEw/SmyDQMACBDNgcMoh4EeAYPpRYhsEAhYgmAGDUw4BPwIE048S2yAQsADBDBiccgj4ESCYfpTYBoGABQhmwOCUQ8CPAMH0o8Q2CAQsQDADBqccAn4ECKYfJbZBIGABghkwOOUQ8CNAMP0osQ0CAQsQzIDBKYeAHwGC6UeJbRAIWIBgBgxOOQT8CBBMP0psg0DAAgQzYHDKIeBHgGD6UWIbBAIWyMl0PeNjT2S6S/obhwLWv344qlFHTzZLx+53JHaqTeKt0VH1EfSdIqUFkjezRIpXzZaCuWUZKZ/xYGZkVHQyIQXad70lbdtOiljja/fVL5Ce1y5Iz7ELUvLAXJm8+qYx7wBPZcdMSAeZEFBnyvEYypR9t3+hqH1Q+zLWiTPmWAW5f0YE1NPX5JmyYOFUmVJdLjllhRnpO9ud9Dd3S0vtcYk2XHT2Qe3LWJ/ScsbM9lGjf18C6jVlcppSvXDchFKNWf0CUb9IktPgfUmuG+mcYI5UjO2zIjD4Qk9O2aSs1Mhmp4PP7oP3ZbQ1CeZo5bgfAlkUIJhZxKVrBEYrQDBHK8f9EMiiAMHMIi5dIzBaAd4uGa0c9wuVQDTaJxWVWyU/L0f2b3kwZWxH/tYom7Yfk7Pvt8v104ql6v5bZPGtHx/YpqW1W35W97I0vHFeykoLpXLNp+Tzt88YaNdxg2DqUKdmRgUSiYRUP7FPDr58WqZeW5TS9+//+Kasrt7urDNNQxIJS7bu/rvsqr1PvvLFedJxOSqLKmql8b02yckxpb8/Idv2/EO2Pf1Vue/LN6f0FeQCT2WD1KZWxgXU2fCWio3y613Hh+x7/TOHnPU/X/cl6Tz5pDz28BJn+Se1R5z5jv1vOKFcvmyOtJ1YKxse/4KzfsMv/+LMdf3gjKlLnroZEfjOuhflxFsX5Rv3LJDf/O71lD4ty5IHVy2Qpbd3OE9fCwpy5e6lc+THv6gX9fRVTQ+suFkWzJ0m100pksJJeTLdfqqrppLiAmeu6wfB1CVP3YwIrLjzJtn805VSVJh3RTANw5BHqz6TUmenfYZU06fLr3fm19j3WzT/f7cffnKfbN97Qoo/lC/rHlnqtOv6QTB1yVM3IwI/eHSZ08/bpy559rdlZ4M8veWo5OZGpMYVvN7eftm49VVRZ9nyeR+xz565nv1lcwNeY2ZTl75DI/Crba9K5fd2i7oA9NyGVTJ7Rur/m1QXfppff0x+a18UOv7m+7L0/ufk382d2sZPMLXRUzgogboXXpOHHt/rXHVVV1u/tnJ+Sul4POFcrS2dPEnusa/Uzpt9nXR2xaTevrCkayKYuuSpG4jAoaNnpHrtXqfWjmfXyL3LP5lS97s1L0r+jTXyo2cPO+u7e2JyuqnVuT21LPWtl5Q7ZnmB15hZBqZ7vQJrN7zknA3VhaCH7ICqf2pSV13f/vMjot4meeb5v8pTG4/Iu40tdij/Iz32HyvMt6/U3lZ+g7bBc8bURk/hbAs0nWuTow1nnTLqos6llq6Uf6rhzsWzZNNTK6XQfivlBfsPC145/p69bqbs3fR15yJRtsc4XP+cMYeTYf24Epgz81pJNK5PGfNHp5dcsS5lg/8vfMv+E7xvri6XpvPt8mH7deZkze9hqmERzKGOFOsmnEAkYsonbigNzX7zVDY0h4KBIPCBAMH8wIJbCIRGgGCG5lBM7IGoD01OTv3NPcmb42auPikvOQ3el+S6kc4J5kjF2D4rAuqTzJNTS22DDH6gJ9eHdZ78+Mrk+AbvS3LdSOdc/BmpGNtnRUB9vYD6JHP12bLq81nPVR3ISp2sd2qI81UJY63DGXOsgtw/IwLqA5LV1wuI/cAet5M9drUPY/2wZ7X/nDHH7aPg6hu4+s6PfDugfKmQ/fvJflN2nH2Fy9X3gGSPEHAL8FTWLcIyAiEQIJghOAgMAQG3AMF0i7CMQAgECGYIDgJDQMAtQDDdIiwjEAIBghmCg8AQEHALEEy3CMsIhECAYIbgIDAEBNwCBNMtwjICIRAgmCE4CAwBAbcAwXSLsIxACAQIZggOAkNAwC1AMN0iLCMQAgGCGYKDwBAQcAsQTLcIywiEQIBghuAgMAQE3AIE0y3CMgIhECCYITgIDAEBtwDBdIuwjEAIBAhmCA4CQ0DALUAw3SIsIxACAVN9zTUTAgiER0Bl0uzrj4dnRIwEAQREZdLs7u7twwIBBMIjoDJptnV0218YwYQAAmERaOuIXjDbL0cPXO6KhmVMjAOBCS3QaWex/XL3AdOwEjvOnm+Vfi4CTegHBDuvX0BlsMnOon05dqe5sGLzwVhv36EzTZcIp/5jwwgmqIAK5ZmmZonF+g4vWl73J+d9TCueqOrqirW+c/qi8LR2gj4y2G1tAurpq8peV1dvayzRV6UGMvBthMf2f3uxIeYee01p0TX5UlJcKGqemxORSIS/Q9B21Ch81Qmo9ynVWyKdXb1iX3x15vYX9raKEV+58O7N9WqHB4KpFo7tqZxlRMw6MYzPqWUmBBAIQsA6rM6Ut1U8/26yWkowkysb9lUuswxzjR3QJYYl0+34FiXbmCOAwBgFLOm0DDknllWvLvSo15TuHv8Le6VC+7OcoEgAAAAASUVORK5CYII=);

}
</style>

</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <h1>Payments</h1>

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
    <hr><br>

<table class="table table-bordered">
  <tbody>
    <tr>
      <td style="width: 50%;">
        <h4>Student information</h4>
      </td>
      <td style="width: 50%;">
        <h4>Payment slip</h4>
      </td>
    </tr>

    <tr>
      <td style="width: 50%;">
        <div class="form-group row">
          <div class="col-sm-9">
            <input type="text" class="form-control" id="student_number" placeholder="Search student number">
          </div>
          <div class="col-sm-3">
            <button type="button" class="btn btn-primary" id="search_student">Search</button>
          </div>
        </div>
      </td>

      <td style="width: 50%;" rowspan="8">
        <!-- payment forms -->
        <form action="<?= base_url() ?>staff/add_payment" method="post">
          <div class="form-group row">
            <label for="studentnum" class="col-sm-2 col-form-label">Student number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="studentnum" id="studentnum" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="schoolyear" class="col-sm-2 col-form-label">School Year</label>
            <div class="col-md-10">
              <select class="form-control custom-select" name="schoolyear" id="schoolyear"></select>
            </div>
          </div>

            <div class="form-group row">
            <label for="full_down" class="col-sm-2 col-form-label">Payment Type</label>
            <div class="col-sm-10">
              <div id="payment_type_radios">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="payment_type" id="payment_type_full" value="full" required>
                Full &nbsp;&nbsp;&nbsp;&nbsp;
              </label>

              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="payment_type" id="payment_type_down" value="down" required>
                Down Payment &nbsp;&nbsp;&nbsp;&nbsp;
              </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="transaction" class="col-sm-2 col-form-label">Transaction</label>
            <div class="col-sm-10">
              <div id="transaction_radios">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="transaction" id="transaction1" value="cash" required>
                Cash &nbsp;&nbsp;&nbsp;&nbsp;
              </label>

              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="transaction" id="transaction2" value="credit_card" required>
                Credit Card &nbsp;&nbsp;&nbsp;&nbsp;
              </label>

              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="transaction" id="transaction3" value="cheque" required>
                Cheque
              </label>
              </div>
            </div>
          </div>

          <div class="form-group row" id="cash_form" style="display: none;">
              <label for="cash_amount" class="col-sm-2 col-form-label">Amount</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="cash_amount" id="cash_amount" value="0" required>
              </div>
          </div>

          <section id="credit_form" style="display: none;">
            <div class="form-group row">
              <label for="credit_pay_amount" class="col-sm-2 col-form-label">Pay Amount</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="credit_pay_amount" id="credit_pay_amount" value="0" required>
              </div>
            </div>

             <div class="form-group row">
              <label for="credit_name" class="col-sm-2 col-form-label">Name on Card</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="credit_name" id="credit_name" value="0" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="credit_number" class="col-sm-2 col-form-label">Card Number</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="credit_number" id="credit_number" value="0" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="credit_expiry" class="col-sm-2 col-form-label">Expiration</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="credit_expiry" id="credit_expiry" placeholder="MM / YY" value="0" required>
              </div>

              <label for="credit_code" class="col-form-label">Security Code</label>
              <div class="input-group col-sm-3">
                <input type="text" class="form-control" name="credit_code" id="credit_code" value="0" required>
                <div class="input-group-addon">
                  <span class="fa fa-question-circle fa-sm" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code"
                  data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>"
                  data-trigger="hover"></span>
                </div>
              </div>
            </div>
          </section>

          <section id="check_form" style="display: none;">
            <div class="form-group row">
              <label for="check_number" class="col-sm-2 col-form-label">Check Number</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="check_number" id="check_number" value="0" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="check_amount" class="col-sm-2 col-form-label">Check Amount</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="check_amount" id="check_amount" value="0" required>
              </div>
            </div>

             <div class="form-group row">
              <label for="check_phone" class="col-sm-2 col-form-label">Check Phone</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="check_phone" id="check_phone" value="0" required>
              </div>
            </div>
          </section>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </td>
    </tr>

    <tr>
      <td style="width: 50%;">
        <strong>Student number: </strong> <p style="display:inline" id="studentnumber"></p>
      </td>
    </tr>

    <tr>
      <td style="width: 50%;">
        <strong>Lastname: </strong> <p style="display:inline" id="lastname"></p>
      </td>
    </tr>

    <tr>
      <td style="width: 50%;">
        <strong>Firstname: </strong> <p style="display:inline" id="firstname"></p>
      </td>
    </tr>

    <tr>
      <td style="width: 50%;">
        <strong>Middlename: </strong> <p style="display:inline" id="middlename"></p>
      </td>
    </tr>

    <tr>
      <td style="width: 50%;">
        <strong>Level: </strong> <p style="display:inline" id="level"></p>
      </td>
    </tr>

    <tr>
      <td style="width: 50%;">
        <strong>Year: </strong> <p style="display:inline" id="year"></p>
      </td>
    </tr>

    <tr>
      <td style="width: 50%;">
        <strong>Payment status: </strong> <p style="display:inline" id="payment_status"></p>
      </td>
    </tr>
  </tbody>
</table>

  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

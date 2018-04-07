<link rel="stylesheet" href="<?= base_url() ?>public/css/signin.css">
</head>
<body>

 <div class="container">

  <?php
if($this->session->flashdata()) {
$alerttype;
$message;
  if ($this->session->flashdata('login')) {
      $alerttype = 'alert-success';
      $message = $this->session->flashdata('login');
  } else if ($this->session->flashdata('no_user')){
      $alerttype = 'alert-danger';
      $message = $this->session->flashdata('no_user');
  }

  ?>

<div class="alert <?= $alerttype ?>" role="alert">
        <?= $message ?>
</div>

<?php } ?>
      <div class="col-md-12">
        <center>
          <img src="<?php echo base_url().'assets/logosmall.png' ?>" alt="" width="25%">
        </center>
      </div>
      <form class="form-signin" action="<?= base_url() ?>student/authenticate" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputNumber" class="sr-only">Student number</label>
        <input type="text" name="studentnumber" id="inputNumber" class="form-control" placeholder="Student number" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

<link rel="stylesheet" href="<?= base_url() ?>public/css/signin.css">
</head>

<body class="bg-dark">

    <div class="container">

      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
          <form action="<?= base_url() ?>staff/authenticate" method="post">
            <div class="form-group">
              <label for="exampleInputUsername1">Username</label>
              <input name="username" type="text" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" placeholder="Enter username" required autofocus>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</a>
          </form>
        </div>
      </div>
    </div>
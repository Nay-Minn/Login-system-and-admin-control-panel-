<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Index</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
  </head>
  <body>
    <nav class="navbar nav bg-primary">
      <div class="container-fluid">
        <h4 class="text-light">User Login</h4>
      </div>
    </nav>
    <div class="App">
      <div class="vertical-center">
        <div class="inner-block">
          <form action="_actions/login.php" method="post">
            <h3>Login</h3>

            <?php if(isset($_GET['incorrect'])) : ?>
            <div class="alert alert-warning">Incorrect Email or Password!</div>
            <?php endif ?>

            <?php if(isset($_GET['registered'])) : ?>
            <div class="alert alert-success">Account created. Please Login.</div>
            <?php endif ?>

            <?php if(isset($_GET['suspended'])) : ?>
            <div class="alert alert-danger">Can't get login. Your account is suspended!</div>
            <?php endif ?>

            <div class="form-group">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required />
            </div>

            <div class="form-group">
              <label class="form-label">Password</label>
              <input
                type="password"
                name="password"
                class="form-control"
                required
              />
            </div>

            <button
              type="submit"
              class="btn btn-outline-primary btn-lg btn-block mt-4"
              name="login"
            >
              Login
            </button>

            <button class="btn btn-outline-success btn-lg mt-4">
              <a href="register.php" class="text-decoration-none text-dark"
                >Register</a
              >
            </button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

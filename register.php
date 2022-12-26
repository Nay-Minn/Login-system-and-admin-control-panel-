<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Register</title>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="_actions/create.php" method="post">
                    <h3>Register</h3>

                    <?php if ( isset($_GET['error']) ) : ?>
                        <div class="alert alert-warning">
                            Can't create account. Please try again.
                        </div>
                    <?php endif ?>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" require />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" require />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" require/>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" require></textarea>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" require/>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-lg mt-4">
                        Register
                    </button>
                    <button type="submit" class="btn btn-outline-success btn-lg mt-4 ">
                        <a href="index.php"class="text-decoration-none text-black">Login</a>
                    </button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
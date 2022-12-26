<?php

include 'vendor/autoload.php';

use Helpers\Auth;

$auth = Auth::check();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
  </head>
  <body>
    <div class="card" style="width: 500px; margin: 100px auto">
      <div class="card-body">
        <h1 class="card-title">
          <?=$auth->name?>
        </h1>
        <span class=" fw-normal text-muted">
          (<?=$auth->role?>)
        </span>

        <?php if (isset($_GET['error'])): ?>
          <div class="alert alert-warning">
            Can't upload file!
          </div>
        <?php endif?>

        <?php if (file_exists('_actions/photos/profile.jpg')): ?>
          <img src="_actions/photos/profile.jpg" alt="Profile Photo" class=" card-img" width="200" height="400">
        <?php endif?>

        <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
          <div class=" input-group mb-3 mt-3">
            <input type="file" name="photo" class="form-control">
              <button class="btn btn-secondary">Upload</button>
          </div>
        </form>


        <ul class="list-group list-group-flush">
          <li class="list-group-item"><b>Email:</b> <?=$auth->email?> </li>
          <li class="list-group-item"><b>Phone:</b> <?=$auth->phone?> </li>
          <li class="list-group-item">
            <b>Address:</b> <?=$auth->address?>
          </li>
        </ul>
        <br />

          <a href="admin.php" class="btn btn-primary">Manage User</a>

        <a href="_actions/logout.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </body>
</html>

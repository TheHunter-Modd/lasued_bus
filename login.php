<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signin_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Login - LASUED Bus Ticketing</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6 col-lg-4">
      <div class="card shadow-lg rounded-3 p-4">
        <h3 class="ls-heading mb-3">Staff Login Portal</h3>
        <p class="welcome-message">Access the LASUED Staff Bus Ticketing System</p>

        <form class="row g-3" action="includes/signin.inc.php" method="post">
          <div class="col-12">
            <input type="text" name="staff_id" class="form-control" placeholder="Staff ID" required>
          </div>
          <div class="col-12">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </div>
        </form>

        <div class="mt-3 text-center">
          <?php Check_signin_errors(); ?>
        </div>
      </div>
    </div>
  </div>

</body>
</html>

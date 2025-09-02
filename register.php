<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Register | LASUED Staff Bus</title>
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4 rounded-4" style="max-width: 400px; width: 100%;">
            
            <h3 class="ls-heading mb-3 text-primary">Create Account</h3>
            <p class="welcome-message">Register to book your staff bus tickets</p>

            <form action="includes/signup.inc.php" method="post" class="row g-3">
                <div class="col-12">
                    <input type="text" name="staff_id" class="form-control" placeholder="Staff ID" >
                </div>
                <div class="col-12">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" >
                </div>
                <div class="col-12">
                    <input type="email" name="email" class="form-control" placeholder="Email" >
                </div>
                <div class="col-12">
                    <input type="password" name="password" class="form-control" placeholder="Password" >
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary w-100 rounded-3">Register</button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <?php Check_signup_errors(); ?>
            </div>
        </div>
    </div>

</body>
</html>

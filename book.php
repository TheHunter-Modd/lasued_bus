<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/book_view.inc.php';

// Force login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=notloggedin");
    exit();
}

// If form submitted, hand over to processor
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once 'includes/book.inc.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Seat | LASUED Staff Bus</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h3>
    <?php output_staff_id(); 
    ?>
  </h3>

    <div class="container mt-5">
        <h3 class="ls-heading mb-4">Book Your Seat</h3>

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow p-4 rounded-4">
                    <form action="book.php" method="post" class="row g-3">
                        <div class="col-12">
                            <label for="trip_date" class="form-label fw-semibold">Trip Date</label>
                            <input type="date" name="trip_date" id="trip_date" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="seat_number" class="form-label fw-semibold">Seat Number (1–90)</label>
                            <input type="number" name="seat_number" id="seat_number" class="form-control" min="1" max="90" required>
                        </div>
                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                        <div class="col-12 d-grid">
                            <a href="includes/signout.inc.php" class="btn btn-outline-danger">Logout</a>
                        </div>
                    </form>
                </div>

                <div class="mt-4">
                    <?php check_booking_status(); ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

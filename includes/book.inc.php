<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';
require_once 'book_contr.inc.php';

// Ensure only logged-in users can access
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php?error=notloggedin");
    exit();
}

// Ensure this file only handles POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../book.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$trip_date = $_POST['trip_date'] ?? '';
$seat_number = isset($_POST['seat_number']) ? (int) $_POST['seat_number'] : 0;

try {
    // Delegate actual logic to controller
    $result = handleBooking($pdo, $user_id, $trip_date, $seat_number);

    if ($result['status'] === 'success') {
        // Redirect with booking confirmation
        header("Location: ../book.php?booking=success&ticket=" . urlencode($result['ticket']));
        exit();
    } else {
        // Redirect with specific error code (to be handled in view)
        header("Location: ../book.php?error=" . urlencode($result['code']));
        exit();
    }
} catch (PDOException $e) {
    // Log error in real app (optional)
    header("Location: ../book.php?error=server_error");
    exit();
}

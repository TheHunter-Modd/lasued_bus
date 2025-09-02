<?php
declare(strict_types=1);

/**
 * Show booking status messages
 */
function check_booking_status(): void {
    if (isset($_GET['error'])) {
        $error = $_GET['error'];

        $messages = [
            'invalid_seat'   => '❌ Invalid seat number. Please choose between 1 and 82.',
            'seat_taken'     => '⚠️ Sorry, this seat is already booked. Try another one.',
            'notloggedin'    => '🔒 You must log in first.',
            'server_error'   => '🚨 Server error. Please try again later.'
        ];

        if (array_key_exists($error, $messages)) {
            echo "<div class='alert alert-danger'>{$messages[$error]}</div>";
        }
    }

    if (isset($_GET['booking']) && $_GET['booking'] === 'success') {
        $ticket = $_GET['ticket'] ?? '';
        echo "<div class='alert alert-success'>
                ✅ Booking successful!<br>
                Your ticket code: <strong>{$ticket}</strong><br>
                Please proceed to payment.
              </div>";
    }
}

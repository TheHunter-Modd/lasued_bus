<?php
declare(strict_types=1);

require_once 'book_model.inc.php';

/**
 * Controller function for handling seat booking
 * 
 * @param object $pdo        PDO connection
 * @param int    $user_id    Logged-in user ID
 * @param string $trip_date  Date of trip (YYYY-MM-DD)
 * @param int    $seat_number Seat number (1–82)
 * 
 * @return array ['status' => 'success'|'error', 'code' => string, 'ticket' => string]
 */
function handleBooking(object $pdo, int $user_id, string $trip_date, int $seat_number): array {
    // --- Input validation ---
    if (empty($trip_date)) {
        return ['status' => 'error', 'code' => 'missing_date'];
    }

    // Ensure valid date format (YYYY-MM-DD)
    $date_obj = date_create_from_format('Y-m-d', $trip_date);
    if (!$date_obj || $date_obj->format('Y-m-d') !== $trip_date) {
        return ['status' => 'error', 'code' => 'invalid_date'];
    }

    if ($seat_number < 1 || $seat_number > 82) {
        return ['status' => 'error', 'code' => 'invalid_seat'];
    }

    // --- Business rules ---
    if (isSeatTaken($pdo, $trip_date, $seat_number)) {
        return ['status' => 'error', 'code' => 'seat_taken'];
    }

    // --- Database operation ---
    try {
        $ticket_code = createBooking($pdo, $user_id, $trip_date, $seat_number);
    } catch (Exception $e) {
        // Optional: log error somewhere
        return ['status' => 'error', 'code' => 'db_error'];
    }

    return ['status' => 'success', 'ticket' => $ticket_code];
}

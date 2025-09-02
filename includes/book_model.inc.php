<?php
declare(strict_types=1);

/**
 * Check if a seat is already booked for a given trip date
 */
function isSeatTaken(object $pdo, string $trip_date, int $seat_number): bool {
    $sql = "SELECT 1 FROM bookings 
            WHERE trip_date = :trip_date 
              AND seat_number = :seat_number 
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':trip_date'   => $trip_date,
        ':seat_number' => $seat_number
    ]);

    return (bool) $stmt->fetchColumn();
}

/**
 * Create a booking and return generated ticket code
 */
function createBooking(object $pdo, int $user_id, string $trip_date, int $seat_number): string {
    // Generate unique ticket code (retry if collision)
    do {
        $ticket_code = generateTicketCode();
    } while (ticketExists($pdo, $ticket_code));

    $sql = "INSERT INTO bookings 
                (user_id, seat_number, ticket_code, payment_status, created_at, trip_date) 
            VALUES 
                (:user_id, :seat_number, :ticket_code, 'pending', NOW(), :trip_date)";
                
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':user_id'     => $user_id,
        ':seat_number' => $seat_number,
        ':ticket_code' => $ticket_code,
        ':trip_date'   => $trip_date
    ]);

    return $ticket_code;
}

/**
 * Helper: Generate a ticket code
 */
function generateTicketCode(): string {
    // Example: TCK-20250902-AB1234
    return 'TCK-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));
}

/**
 * Helper: Check if a ticket code already exists
 */
function ticketExists(object $pdo, string $ticket_code): bool {
    $sql = "SELECT 1 FROM bookings WHERE ticket_code = :ticket_code LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':ticket_code' => $ticket_code]);
    return (bool) $stmt->fetchColumn();
}

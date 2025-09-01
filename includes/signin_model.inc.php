<?php
declare(strict_types=1);

function get_user(object $pdo, string $staffId) {
    $query = "SELECT * FROM users WHERE staff_id = :staff_id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":staff_id", $staffId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
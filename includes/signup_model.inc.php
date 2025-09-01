<?php
//interact only with db

declare(strict_types=1);


function get_staffid(object $pdo, string $staffId) {
    $query = "SELECT name FROM users WHERE staff_id = :staff_id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":staff_id", $staffId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_name(object $pdo, string $name) {
    $query = "SELECT name FROM users WHERE name = :name;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":name", $name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) {
    $query = "SELECT name FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $staffId, string $name, string $email, string $pwd) {
    $query = "INSERT INTO users (staff_id, name, email, pwd) VALUES (:staff_id, :name, :email, :pwd);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12,
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":staff_id", $staffId);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->execute();
}
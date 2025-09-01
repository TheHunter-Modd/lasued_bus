<?php


declare(strict_types=1);


function is_input_empty(string $staffId, string $name, string $email, string $pwd) {
    if (empty($staffId) || empty($name) || empty($email) || empty($pwd)) {
        return true;
    }
    else {
        return false;
    }
}

function is_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true; 
    }
    else {
        return false;
    }
}

function is_staffid_taken(object $pdo, string $staffId) {
    if (get_staffid( $pdo,  $staffId)) {
        return true; 
    }
    else {
        return false;
    }
}

function is_name_taken(object $pdo, string $name) {
    if (get_name( $pdo,  $name)) {
        return true; 
    }
    else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email) {
    if (get_email( $pdo,  $email)) {
        return true; 
    }
    else {
        return false;
    }
}

function create_user(object $pdo, string $staffId, string $name, string $email, string $pwd) {
    set_user($pdo, $staffId, $name, $email, $pwd);
}




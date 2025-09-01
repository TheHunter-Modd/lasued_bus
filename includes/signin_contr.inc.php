<?php
declare(strict_types=1);

function is_input_empty(string $staffId, string $pwd) {
    if (empty($staffId) || empty($pwd)) {
        return true;
    }
    else {
        return false;
    }
}

function is_staff_id_wrong(bool|array $result) {
    if (!$result) {
        return true; 
    }
    else {
        return false;
    }
}

function is_password_wrong(string $pwd, string $hashedPwd) {
    if (!password_verify($pwd, $hashedPwd)) {
        return true; 
    }
    else {
        return false;
    }
}
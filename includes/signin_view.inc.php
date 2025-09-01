<?php

declare(strict_types=1);


function output_name(): void {
    if (isset($_SESSION['user_id'])) {
        echo '<p class="welcome-message">You are logged in as, ' . $_SESSION['user_username'] . '!</p>';
    }else {
        echo '<p class="welcome-message">You are not logged in!</p>';
    }
}
function Check_signin_errors(): void {
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION['errors_login']);
    }
    elseif (isset($_GET['login']) && $_GET['login'] === 'success') {
        echo '<p class="form-success">Login successful!</p>';
    }
}

<?php 
declare(strict_types=1);

function signup_inputs() {

    if (isset($_SESSION['signup_data']['username']) && isset($_SESSION['errors_signup']['username_taken'])) {
        echo '<input type="text" name="username" class="form-control" placeholder="Username" value="' . htmlspecialchars($_SESSION['signup_data']['username']) . '">';
    } else {
        echo '<input type="text" name="username" class="form-control" placeholder="Username">';
       
    }

    echo '<input type="password" name="password" class="form-control" placeholder="Password">';

        if (isset($_SESSION['signup_data']['email']) && isset($_SESSION['errors_signup']['email_used']) && isset($_SESSION['errors_signup']['invalid_email'])) {
        echo '<input type="email" name="email" class="form-control" placeholder="E-mail"> value="' . htmlspecialchars($_SESSION['signup_data']['email']) . '">';
    } else {
        echo '<input type="email" name="email" class="form-control" placeholder="E-mail">';
       
    }
}

function Check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' .$error . '</p>';
        }

        // Clear errors after displaying them
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
        echo '<br>';
        echo '<p class="form-success">Signup successful!</p>';
    }
}

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $staffId = $_POST["staff_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    

    try {
       require_once 'dbh.inc.php';
       require_once 'signup_model.inc.php';
       require_once 'signup_contr.inc.php';   
       
       
       // ERROR HNADLERS

       $errors = [];

       if (is_input_empty($staffId, $name, $email, $pwd)) {
        $errors["empty_input"] = "Fill in all fields!";
       }

        if (is_staffid_taken($pdo, $staffId)) {
                $errors["staffid_taken"] = "Staff ID taken!";
       }

        if (is_email_invalid($email)) {
                $errors["invalid_email"] = "Invalid email used!";
       }

        if (is_name_taken( $pdo,  $name)) {
                $errors["name_taken"] = "Name already taken!";
       }
           if (is_email_registered( $pdo, $email)) {
                $errors["email_used"] = "Email already registered!";
       }

        require_once 'config_session.inc.php';   

       if ($errors) {
        $_SESSION['errors_signup'] = $errors;

        // Preserve user input except password
        $signupData = [
            'staff_id' => $staffId,
            'name' => $name,
            'email' => $email
        ];
        $_SESSION['signup_data'] = $signupData;

        header("Location: ../register.php");
        die();

       }

       create_user($pdo, $staffId, $name, $email, $pwd);

       header("Location: ../register.php?signup=success");

       $pdo = null;
       $stmt = null;
       die();



    } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../login.php");
    die();
} 
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $staffId = $_POST["staff_id"];
    $pwd = $_POST["password"];
    

    try {
       require_once 'dbh.inc.php';
       require_once 'signin_model.inc.php';
       require_once 'signin_contr.inc.php';

        // ERROR HANDLERS

       $errors = [];

       if (is_input_empty($staffId, $pwd)) {
        $errors["empty_input"] = "Fill in all fields!";
       }

       $results = get_user($pdo, $staffId);

        if (is_staff_id_wrong($results)) {
                $errors["login-incorrect"] = "Incorrect login info!";
       }

        if (!is_staff_id_wrong($results) && is_password_wrong($pwd, $results['pwd'])) {
                $errors["login-incorrect"] = "Incorrect login info!";
       }

        require_once 'config_session.inc.php';   

       if ($errors) {
        $_SESSION['errors_login'] = $errors;



        header("Location: ../login.php");
        die();

       }

       $newSessionId = session_create_id();
       $sessionId = $newSessionId . "_" . $results['id'];
       session_id($sessionId);

       $_SESSION['user_id'] = $results['id'];
       $_SESSION['user_username'] = htmlspecialchars($results['username']);

       $_SESSION['last_regeneration'] = time();

       header("Location: ../login.php?login=success");
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
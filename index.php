<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style.css">
    <title>LASUED Staff Bus Ticketing</title>
</head>
<body>

    <!-- ===== HEADER ===== -->
    <header>
        <nav>
            <div class="logo">
                <h2>LASUED Bus</h2>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="book.php">Book a Seat</a></li>
                <li><a href="tickets.php">My Tickets</a></li>

                <?php if (isset($_SESSION["userid"])): ?>
                    <li><a href="includes/signout.inc.php">Sign Out</a></li>
                <?php else: ?>
                    <li><a href="login.php">Sign In</a></li>
                    <li><a href="register.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- ===== HERO SECTION ===== -->
    <section class="hero">
        <div class="hero-text">
            <h1>Welcome to LASUED Staff Bus Ticketing</h1>
            <p>Book your staff bus seat online, pay ₦400, and get your ticket instantly.</p>
            <a href="book.php" class="btn">Book a Seat Now</a>
        </div>
    </section>

    <!-- ===== HOW IT WORKS ===== -->
    <section class="steps">
        <h2>How It Works</h2>
        <div class="step-container">
            <div class="step">
                <h3>1. Sign In / Sign Up</h3>
                <p>Create an account or log in to continue.</p>
            </div>
            <div class="step">
                <h3>2. Book a Seat</h3>
                <p>Choose your trip and reserve your seat.</p>
            </div>
            <div class="step">
                <h3>3. Pay & Print Ticket</h3>
                <p>Pay securely and get your printable ticket.</p>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> LASUED ICT | Staff Bus Ticketing v1.0</p>
    </footer>

</body>
</html>

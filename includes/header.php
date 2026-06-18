<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Online Transport Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo $base_path; ?>img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Yeseva+One&family=Dancing+Script&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo $base_path; ?>lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo $base_path; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo $base_path; ?>css/style.css" rel="stylesheet">
    
    <style>
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, .5);
        }
    </style>
</head>

<body>
    <!-- Header Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-xl navbar-dark px-lg-5 sticky-top bg-dark shadow-sm">
            <a href="<?php echo $base_path; ?>index.php" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="mb-0 text-primary">TranMS</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto p-4 p-lg-0">
                    <a href="<?php echo $base_path; ?>index.php" class="nav-item nav-link">Home</a>
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'driver'): ?>
                        <a href="<?php echo $base_path; ?>booking/add-service.php" class="nav-item nav-link">Add Service</a>
                        <a href="<?php echo $base_path; ?>booking/list-service.php" class="nav-item nav-link">My Services</a>
                        <a href="<?php echo $base_path; ?>booking/list-book.php" class="nav-item nav-link">My Bookings</a>
                    <?php else: ?>
                        <a href="<?php echo $base_path; ?>about.php" class="nav-item nav-link">About</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                            <div class="dropdown-menu m-0">
                                <a href="#" class="dropdown-item">Our Vehicles</a>
                                <a href="#" class="dropdown-item">Routes & Schedules</a>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'customer'): ?>
                            <a href="<?php echo $base_path; ?>booking/book-service.php" class="nav-item nav-link">Bookings</a>
                        <?php endif; ?>
                        <a href="<?php echo $base_path; ?>contact.php" class="nav-item nav-link">Contact</a>
                    <?php endif; ?>
                </div>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a class="btn btn-success text-white d-none d-lg-flex mx-1" href="<?php echo $base_path; ?>auth/logout.php">Logout</a>
                <?php else: ?>
                    <a class="btn btn-success text-white d-none d-lg-flex mx-1" href="<?php echo $base_path; ?>auth/login.php">Login</a>
                    <a class="btn btn-success text-white d-none d-lg-flex mx-1" href="<?php echo $base_path; ?>auth/register.php">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
    <!-- Header End -->

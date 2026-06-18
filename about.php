<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About Us - TranMS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Yeseva+One&family=Dancing+Script&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, .5);
        }
    </style>
</head>

<body>
<?php
$base_path = '';
include_once('includes/navbar.php');
?>

    <!-- Page Header Start -->
    <div class="container-fluid py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=1920&auto=format&fit=crop') center/cover no-repeat; min-height: 300px;">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white animated slideInDown mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="position-relative h-100">
                        <img class="img-fluid rounded w-100"
                            src="https://images.unsplash.com/photo-1519003722824-194d4455a60c?q=80&w=800&auto=format&fit=crop"
                            style="object-fit: cover; height: 450px;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <p class="fs-3 font-dancing-script text-primary mb-0">Who We Are</p>
                    <h2 class="display-5 mb-4">Your Trusted Transport Partner</h2>
                    <p>The Online Transport Management System (TranMS) is a web-based platform developed to streamline transportation services. We connect passengers with verified transport operators, making travel booking easy, secure, and efficient.</p>
                    <p class="mb-4">Founded with the vision of reducing manual paperwork and providing real-time transport management, our system allows users to search available vehicles, compare options, book rides, and manage their travel all in one place.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-check-circle fa-2x text-primary me-3"></i>
                                <h6 class="mb-0">Verified Transport Providers</h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-check-circle fa-2x text-primary me-3"></i>
                                <h6 class="mb-0">Real-Time Booking System</h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-check-circle fa-2x text-primary me-3"></i>
                                <h6 class="mb-0">Affordable & Transparent Pricing</h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-check-circle fa-2x text-primary me-3"></i>
                                <h6 class="mb-0">24/7 Customer Support</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Mission Start -->
    <div class="container-fluid bg-light py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="text-center bg-white rounded p-5 shadow-sm h-100">
                        <div class="btn-lg-square bg-primary rounded mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-bullseye fa-3x text-white"></i>
                        </div>
                        <h4 class="mb-3">Our Mission</h4>
                        <p class="mb-0">To provide accessible, reliable, and affordable transport solutions through technology, connecting people and goods efficiently across the region.</p>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="text-center bg-white rounded p-5 shadow-sm h-100">
                        <div class="btn-lg-square bg-primary rounded mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-eye fa-3x text-white"></i>
                        </div>
                        <h4 class="mb-3">Our Vision</h4>
                        <p class="mb-0">To become the leading digital transport management platform, setting the standard for safety, convenience, and innovation in the industry.</p>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="text-center bg-white rounded p-5 shadow-sm h-100">
                        <div class="btn-lg-square bg-primary rounded mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-handshake fa-3x text-white"></i>
                        </div>
                        <h4 class="mb-3">Our Values</h4>
                        <p class="mb-0">Integrity, customer focus, innovation, and teamwork drive everything we do. We put safety and satisfaction at the heart of every journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mission End -->

    <!-- Team Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fs-3 font-dancing-script text-primary mb-0">Our Team</p>
                <h2 class="display-5 mb-5">Meet the People Behind TranMS</h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-item rounded bg-light text-center p-4">
                        <img class="img-fluid rounded-circle mb-3" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=300&auto=format&fit=crop" style="width: 150px; height: 150px; object-fit: cover;" alt="">
                        <h5 class="mb-1">Khalil Ahmad</h5>
                        <p class="text-primary mb-0">Founder & Developer</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="team-item rounded bg-light text-center p-4">
                        <img class="img-fluid rounded-circle mb-3" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=300&auto=format&fit=crop" style="width: 150px; height: 150px; object-fit: cover;" alt="">
                        <h5 class="mb-1">Sarah Ahmed</h5>
                        <p class="text-primary mb-0">Operations Manager</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="team-item rounded bg-light text-center p-4">
                        <img class="img-fluid rounded-circle mb-3" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=300&auto=format&fit=crop" style="width: 150px; height: 150px; object-fit: cover;" alt="">
                        <h5 class="mb-1">Usman Khan</h5>
                        <p class="text-primary mb-0">Support Lead</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

<?php include_once('includes/footer.php'); ?>

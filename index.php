<?php
session_start();
include_once('config/connect_db.php');
$base_path = '';
$query = 'SELECT * FROM TRANSPORT';
$result = $connect->query($query);

$icons = [
    "WiFi" => "fa-wifi",
    "Music" => "fa-music",
    "AC" => "fa-fan",
    "Luggage" => "fa-suitcase"
];
?>

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
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Yeseva+One&family=Dancing+Script&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo $base_path; ?>lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo $base_path; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo $base_path; ?>css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

<?php
$base_path = '';
include_once('includes/navbar.php');
?>
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100"
                        src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=1920&auto=format&fit=crop"
                        style="object-fit: cover; height: 100vh;" alt="Image">
                    <div class="carousel-caption">
                        <div class="row h-100 align-items-center justify-content-center">
                            <div class="col-12 col-md-8">
                                <h1 class=" text-white animated slideInDown">Reliable Transport Services</h1>
                                <p class="fs-3 mb-5 animated slideInDown">Book your journey with safety and comfort</p>
                                <a href="" class="btn btn-success text-white py-3 px-4 animated slideInDown">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100"
                        src="https://images.unsplash.com/photo-1494515843206-f3117d3f51b7?q=80&w=1920&auto=format&fit=crop"
                        style="object-fit: cover; height: 100vh;" alt="Image">
                    <div class="carousel-caption">
                        <div class="row h-100 align-items-center justify-content-center">
                            <div class="col-10 col-md-8">
                                <h1 class="display-2 text-white animated slideInDown">Fast & Secure Logistics</h1>
                                <p class="fs-3 mb-5 animated slideInDown">Efficient management of vehicles and routes
                                </p>
                                <a href="" class="btn btn-success text-white py-3 px-4 animated slideInDown">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?php echo $base_path; ?>img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="row h-100 align-items-center justify-content-center">
                            <div class="col-10 col-md-8">
                                <h1 class="display-2 text-white animated slideInDown">Stay In Island Luxury</h1>
                                <p class="fs-3 mb-5 animated slideInDown">Private Villas With Stunning Views</p>
                                <a href="" class="btn btn-success text-white py-3 px-4 animated slideInDown">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid rounded position-absolute w-100 h-100"
                            src="https://images.unsplash.com/photo-1519003722824-194d4455a60c?q=80&w=800&auto=format&fit=crop"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <p class="fs-3 font-dancing-script text-primary mb-0">Welcome to</p>
                    <h2 class="display-5 mb-0">Online Transport System</h2>
                    <h3>Your Journey, Our Priority</h3>
                    <h6 class="mb-4">A fast, secure, and reliable system for transport management</h6>
                    <p>The Online Transport Management System is a web-based application developed to manage
                        transportation services efficiently. This system allows users to book transport online, while
                        the administrator manages vehicles, drivers, routes, and bookings.</p>
                    <p class="mb-4">The main purpose of this project is to reduce manual work and provide a fast,
                        secure, and reliable system for transport management. Users can easily register, log in, search
                        for available transport, and make bookings. The admin can monitor all activities and maintain
                        records.</p>
                    <p class="mb-0 fw-bold">System Administrator</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-fluid fact-counter py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <div class="btn-lg-square bg-primary rounded mx-auto mb-3">
                        <i class="fas fa-bus text-white"></i>
                    </div>
                    <h1 class="display-5 text-white">150+</h1>
                    <h5 class="text-white mb-0">Vehicles</h5>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <div class="btn-lg-square bg-primary rounded mx-auto mb-3">
                        <i class="fas fa-route text-white"></i>
                    </div>
                    <h1 class="display-5 text-white">320</h1>
                    <h5 class="text-white mb-0">Routes Covered</h5>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn-lg-square bg-primary rounded mx-auto mb-3">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <h1 class="display-5 text-white">50k+</h1>
                    <h5 class="text-white mb-0">Happy Passengers</h5>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <div class="btn-lg-square bg-primary rounded mx-auto mb-3">
                        <i class="fas fa-id-card text-white"></i>
                    </div>
                    <h1 class="display-5 text-white">200+</h1>
                    <h5 class="text-white mb-0">Expert Drivers</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Start -->


    <!-- Room Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fs-3 font-dancing-script text-primary mb-0">Our Fleet</p>
                <h2 class="display-5 mb-5">Comfortable Rides for Every Journey</h2>
            </div>
            <div class="row g-4">

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $feature = explode(',', $row['features']);
                        ?>

                        <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="room-item bg-white rounded d-flex h-100 p-4">
                                <div class="bg-light rounded overflow-hidden flex-shrink-0 d-flex flex-column justify-content-between text-center pb-4 me-3"
                                    style="width: 80px">
                                    <div class="bg-primary text-white py-3">
                                        <h5 class="text-white mb-0">$45</h5>
                                        <small>Per Trip</small>
                                    </div>
                                    <div class="text-center mx-auto">
                                        <i class="fa fa-chair text-primary"></i>
                                        <p class="small mb-0"><?php echo $row['seats']; ?> Seats</p>
                                    </div>
                                    <?php
                                    foreach ($feature as $f) {
                                        $icon = $icons[$f] ?? "fa-check"; ?>

                                        <div class="text-center mx-auto">
                                            <i class="fa <?php echo $icon; ?> text-primary"></i>
                                            <p class="small mb-0"><?php echo $f; ?></p>
                                        </div>

                                    <?php } ?>

                                </div>
                                <div class="room-detail">
                                    <div class="position-relative rounded overflow-hidden mb-3">
                                        <img class="img-fluid w-100"
                                            src="img/<?php echo $row['image']; ?>"
                                            style="height: 200px; object-fit: cover;" alt="">
                                        <div class="position-absolute top-0 start-0 text-white small py-1 px-3">Private Taxi
                                        </div>
                                    </div>
                                    <a href="#" class="h5 d-inline-block"><?php echo $row['title'] ?></a>
                                    <p><?php echo $row['description'] ?></p>
                                    <a href="booking/book-service.php?id=<?php echo $row['id'] ?>" class="btn btn-success text-white w-100 py-2">Book Now</a>
                                </div>
                            </div>
                        </div>



                    <?php } ?>
                <?php } ?>

            </div>
        </div>
    </div>
    <!-- Room End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-8 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="p-lg-5 ps-lg-0">
                        <p class="fs-3 font-dancing-script text-primary mb-0">Why Choose Us</p>
                        <h2 class="display-5 mb-4">Safe. Reliable. Fast.</h2>
                        <p class="mb-4 pb-2">We provide a centralized platform connecting passengers with verified
                            transport operators. Enjoy seamless booking, transparent pricing, and real-time tracking for
                            peace of mind.</p>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-shield-alt fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <h5 class="mb-1">Secure Booking</h5>
                                        <span>Encrypted transactions and secure personal data management.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-clock fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <h5 class="mb-1">On-time Departures</h5>
                                        <span>Strict adherence to schedules ensuring you reach on time.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-map-marked-alt fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <h5 class="mb-1">Wide Coverage</h5>
                                        <span>Extensive route network connecting major cities and towns.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-headset fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <h5 class="mb-1">24/7 Support</h5>
                                        <span>Dedicated customer service to assist you at any time.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="https://images.unsplash.com/photo-1464219789935-c2d9d9aba644?q=80&w=800&auto=format&fit=crop"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Service Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fs-3 font-dancing-script text-primary mb-0">Our Services</p>
                <h2 class="display-5 mb-5">Comprehensive Transport Solutions</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-item rounded text-center h-100 px-4 py-5">
                        <i class="fas fa-ticket-alt fa-3x text-primary mb-3"></i>
                        <h5>Online Booking</h5>
                        <hr class="w-25 mx-auto text-primary" style="height: 2px;">
                        <span>Easy and secure online ticket reservation system for all available routes.</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.2s">
                    <div class="service-item rounded text-center h-100 px-4 py-5">
                        <i class="fas fa-shipping-fast fa-3x text-primary mb-3"></i>
                        <h5>Parcel Delivery</h5>
                        <hr class="w-25 mx-auto text-primary" style="height: 2px;">
                        <span>Reliable package and luggage transportation across our established network.</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="service-item rounded text-center h-100 px-4 py-5">
                        <i class="fas fa-car-side fa-3x text-primary mb-3"></i>
                        <h5>Vehicle Charter</h5>
                        <hr class="w-25 mx-auto text-primary" style="height: 2px;">
                        <span>Rent entire vehicles for private events, corporate trips, or family vacations.</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.4s">
                    <div class="service-item rounded text-center h-100 px-4 py-5">
                        <i class="fas fa-cogs fa-3x text-primary mb-3"></i>
                        <h5>Fleet Management</h5>
                        <hr class="w-25 mx-auto text-primary" style="height: 2px;">
                        <span>Advanced administrative tools to monitor vehicles, drivers, and schedules.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


<?php include_once('includes/footer.php'); ?>
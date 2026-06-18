<?php
session_start();
include_once('config/connect_db.php');

$success_msg = '';
$error_msg = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        $success_msg = "Thank you for your message! We'll get back to you soon.";
    } else {
        $error_msg = "Something went wrong. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contact Us - TranMS</title>
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
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1494515843206-f3117d3f51b7?q=80&w=1920&auto=format&fit=crop') center/cover no-repeat; min-height: 300px;">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white animated slideInDown mb-4">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Info Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <p class="fs-3 font-dancing-script text-primary mb-0">Get in Touch</p>
                    <h2 class="display-5 mb-4">We'd Love to Hear From You</h2>
                    <p class="mb-5">Have a question, suggestion, or need assistance? Reach out to us and our team will respond promptly.</p>
                    <div class="d-flex mb-4">
                        <div class="btn-lg-square bg-primary rounded d-flex align-items-center justify-content-center flex-shrink-0" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-1">Office Address</h5>
                            <p class="mb-0 text-muted">Karak, Kpk, Pakistan</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="btn-lg-square bg-primary rounded d-flex align-items-center justify-content-center flex-shrink-0" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-1">Phone</h5>
                            <p class="mb-0 text-muted">+92 344 9478761</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="btn-lg-square bg-primary rounded d-flex align-items-center justify-content-center flex-shrink-0" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope text-white fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-1">Email</h5>
                            <p class="mb-0 text-muted">khalil@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-5 shadow-sm">

                        <?php if ($success_msg): ?>
                            <div class="alert alert-success"><?php echo $success_msg; ?></div>
                        <?php endif; ?>

                        <?php if ($error_msg): ?>
                            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white" id="name" name="name"
                                            placeholder="Your Name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-white" id="email" name="email"
                                            placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white" id="subject" name="subject"
                                            placeholder="Subject" required>
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-white" id="message" name="message"
                                            placeholder="Your Message" style="height: 150px" required></textarea>
                                        <label for="message">Your Message</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button class="btn btn-success text-white w-100 py-3 fw-bold" type="submit" name="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->

<?php include_once('includes/footer.php'); ?>

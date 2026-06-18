<?php
session_start();
require '../vendor/autoload.php';
use Ramsey\Uuid\Uuid;
include_once('../config/connect_db.php');

$success_msg = '';
$error_msg = '';

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$current_transport_id = isset($_GET['id']) ? $_GET['id'] : '';

echo $current_transport_id;
if (isset($_POST['submit'])) {
    $transport_id = $_POST['transport_id'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];
    $pickup_date = $_POST['pickup_date'];
    $pickup_time = $_POST['pickup_time'];
    $passengers = $_POST['passengers'];
    $special_request = $_POST['special_request'];
    
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $id = Uuid::uuid4()->toString();
    
    $query = "INSERT INTO bookings (id, user_id, transport_id, pickup_location, dropoff_location, pickup_date, pickup_time, passengers, special_request) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $connect->prepare($query);
    $statement->bind_param("sssssssis", $id, $user_id, $transport_id, $pickup_location, $dropoff_location, $pickup_date, $pickup_time, $passengers, $special_request);
    
    if ($statement->execute()) {
        $success_msg = "Service booked successfully!";
    } else {
        $error_msg = "An error occurred while booking the service.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Book Service - TranMS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="../img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Yeseva+One&family=Dancing+Script&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <style>
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, .5);
        }
        .booking-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: .3s;
        }
        .booking-card .card-header {
            background: linear-gradient(135deg, #0e2a4a, #1a4a7a);
            padding: 1.5rem;
            border: none;
        }
        .booking-card .card-body {
            padding: 2rem;
        }
        .form-icon {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            color: #0e2a4a;
            z-index: 5;
            font-size: 1.1rem;
        }
        .form-floating>.form-control,
        .form-floating>.form-control-plaintext {
            padding-left: 2.8rem;
        }
        .form-floating>.form-control:focus,
        .form-floating>.form-control:not(:placeholder-shown) {
            padding-left: 2.8rem;
        }
        .form-floating>label {
            padding-left: 2.8rem;
        }
        .summary-card {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid #e9ecef;
        }
        .summary-card .icon-box {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: rgba(14, 42, 74, .1);
            color: #0e2a4a;
            font-size: 1.3rem;
        }
    </style>
</head>

<body>
<?php
$base_path = '../';
include_once('../includes/navbar.php');
?>

    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-4 wow fadeIn" data-wow-delay="0.1s"
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1464219789935-c2d9d9aba644?q=80&w=1920&auto=format&fit=crop') center/cover no-repeat; min-height: 250px;">
        <div class="container text-center py-5">
            <p class="fs-3 font-dancing-script text-primary mb-2">Book Your Ride</p>
            <h1 class="display-4 text-white">Complete Your Booking</h1>
            <p class="fs-5 text-white-50 mb-0">Fill in the details below to confirm your transport reservation</p>
        </div>
    </div>
    <!-- Hero End -->

    <div class="container-fluid pb-6">
        <div class="container">
            <div class="row g-5">

                <!-- Form Column -->
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.2s">

                    <?php if($success_msg): ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fas fa-check-circle me-2"></i> <?php echo $success_msg; ?>
                        </div>
                    <?php endif; ?>

                    <?php if($error_msg): ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i> <?php echo $error_msg; ?>
                        </div>
                    <?php endif; ?>

                    <div class="booking-card shadow-sm bg-white">
                        <div class="card-header">
                            <h4 class="text-white mb-0"><i class="fas fa-edit me-2"></i>Booking Information</h4>
                            <p class="text-white-50 small mb-0 mt-1">All fields marked with * are required</p>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="transport_id" value="<?php echo htmlspecialchars($current_transport_id); ?>">

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-floating position-relative">
                                            <i class="fas fa-map-marker-alt form-icon"></i>
                                            <input type="text" class="form-control bg-white" id="pickup_location" name="pickup_location"
                                                placeholder="Pickup Location" required>
                                            <label for="pickup_location">Pickup Location</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating position-relative">
                                            <i class="fas fa-flag-checkered form-icon"></i>
                                            <input type="text" class="form-control bg-white" id="dropoff_location" name="dropoff_location"
                                                placeholder="Dropoff Location" required>
                                            <label for="dropoff_location">Dropoff Location</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating position-relative">
                                            <i class="fas fa-calendar-alt form-icon"></i>
                                            <input type="date" class="form-control bg-white" id="pickup_date" name="pickup_date"
                                                placeholder="Pickup Date" required>
                                            <label for="pickup_date">Pickup Date</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating position-relative">
                                            <i class="fas fa-clock form-icon"></i>
                                            <input type="time" class="form-control bg-white" id="pickup_time" name="pickup_time"
                                                placeholder="Pickup Time" required>
                                            <label for="pickup_time">Pickup Time</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating position-relative">
                                            <i class="fas fa-users form-icon"></i>
                                            <input type="number" class="form-control bg-white" id="passengers" name="passengers"
                                                placeholder="Number of Passengers" min="1" required>
                                            <label for="passengers">Number of Passengers</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating position-relative">
                                            <i class="fas fa-comment-dots form-icon" style="top: 20px; transform: none;"></i>
                                            <textarea class="form-control bg-white" id="special_request" name="special_request"
                                                placeholder="Special Request" style="height: 110px"></textarea>
                                            <label for="special_request">Special Request (Optional)</label>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <button class="btn btn-success text-white w-100 py-3 fw-bold fs-5" type="submit" name="submit">
                                            <i class="fas fa-check-circle me-2"></i>Confirm Booking
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Summary Sidebar -->
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.4s">
                    <div class="summary-card mb-4">
                        <h5 class="mb-3"><i class="fas fa-info-circle text-primary me-2"></i>Booking Summary</h5>
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box me-3"><i class="fas fa-tag"></i></div>
                            <div>
                                <small class="text-muted d-block">Transport ID</small>
                                <strong><?php echo $current_transport_id ? htmlspecialchars($current_transport_id) : '—'; ?></strong>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box me-3"><i class="fas fa-user"></i></div>
                            <div>
                                <small class="text-muted d-block">Booking For</small>
                                <strong><?php echo htmlspecialchars($_SESSION['username'] ?? 'You'); ?></strong>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="icon-box me-3"><i class="fas fa-shield-alt"></i></div>
                            <div>
                                <small class="text-muted d-block">Secure Booking</small>
                                <strong>Encrypted & Safe</strong>
                            </div>
                        </div>
                    </div>

                    <div class="summary-card">
                        <h5 class="mb-3"><i class="fas fa-life-ring text-primary me-2"></i>Need Help?</h5>
                        <p class="small text-muted mb-2">Having trouble booking? Contact our support team.</p>
                        <p class="mb-1 small"><i class="fas fa-phone-alt text-primary me-2"></i>+92 344 9478761</p>
                        <p class="mb-0 small"><i class="fas fa-envelope text-primary me-2"></i>khalil@gmail.com</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include_once('../includes/footer.php'); ?>

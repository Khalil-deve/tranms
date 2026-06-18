<?php
session_start();
require '../vendor/autoload.php';
use Ramsey\Uuid\Uuid;
include_once('../config/connect_db.php');

if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'driver') {

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $seats = $_POST['seats'];
        $image = $_FILES['image'];
        $file_name = $image['name'];
        $file_tmp = $image['tmp_name'];
        $file_type = $image['type'];

        move_uploaded_file($file_tmp, '../img/' . $file_name);

        $features = isset($_POST['features']) ? implode(', ', $_POST['features']) : '';

        $id = Uuid::uuid4()->toString();
        echo $title. ' '.$description;
        $query = 'INSERT INTO transport (id, title, description, seats, image, features, ownerid) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $statement = $connect->prepare($query);
       $statement->bind_param("sssisss", $id, $title, $description, $seats, $file_name, $features, $_SESSION['user_id']);
        $statement->execute();
        echo "File uploaded successfully";
        header("Location: ../index.php");
    }else{
        echo "Error occured";
    }
}else{
    echo 'Invalid User';
    header("Location: ../auth/login.php");
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Transport - TranMS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Yeseva+One&family=Dancing+Script&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <style>
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, .5);
        }
    </style>
</head>

<body>
<?php
$base_path = '../';
include_once('../includes/navbar.php');
?>

    <!-- Form Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fs-4 font-dancing-script text-primary mb-0">Transport Management</p>
                <h1 class="display-4 mb-5">Add New Transport Vehicle</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-light rounded p-5 shadow-sm">
                        <form  method="POST" enctype="multipart/form-data">
                            <div class="row g-4">
                                <!-- Title -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white" id="title" name="title"
                                            placeholder="Truck Title" required>
                                        <label for="title">Truck Title (e.g., Luxury Coach, Express Minivan)</label>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-white" id="description" name="description"
                                            placeholder="Description" style="height: 150px" required></textarea>
                                        <label for="description">Detailed Description of the Truck</label>
                                    </div>
                                </div>

                                <!-- Seats -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-white" id="seats" name="seats"
                                            placeholder="Number of Seats" min="1" required>
                                        <label for="seats">Number of Seats</label>
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="col-md-4">
                                    <div class="form-control bg-white h-100 d-flex flex-column justify-content-center border-0 p-3"
                                        style="box-shadow: inset 0 0 0 1px #ced4da; border-radius: .375rem;">
                                        <label class="form-label mb-1 text-muted small">Upload Truck Image</label>
                                        <input type="file" class="form-control border-0 p-0" id="image" name="image"
                                            accept="image/*" required>
                                    </div>
                                </div>

                                <!-- Features -->
                                <div class="col-12">
                                    <label class="form-label mb-3 fw-bold text-dark">Available Features:</label>
                                    <div class="d-flex flex-wrap gap-4 bg-white p-3 rounded"
                                        style="border: 1px solid #ced4da;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature_wifi"
                                                name="features[]" value="WiFi">
                                            <label class="form-check-label" for="feature_wifi">
                                                <i class="fa fa-wifi text-primary me-2"></i>WiFi
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature_food"
                                                name="features[]" value="Food">
                                            <label class="form-check-label" for="feature_food">
                                                <i class="fa fa-hamburger text-primary me-2"></i>Food / Snacks
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature_ac"
                                                name="features[]" value="AC">
                                            <label class="form-check-label" for="feature_ac">
                                                <i class="fa fa-fan text-primary me-2"></i>Air Conditioning
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature_luggage"
                                                name="features[]" value="Luggage">
                                            <label class="form-check-label" for="feature_luggage">
                                                <i class="fa fa-suitcase text-primary me-2"></i>Luggage Space
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature_music"
                                                name="features[]" value="Music">
                                            <label class="form-check-label" for="feature_music">
                                                <i class="fa fa-music text-primary me-2"></i>Music System
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="col-12 mt-4">
                                    <button class="btn btn-success text-white w-100 py-3 fw-bold" type="submit" name="submit">Submit Transport
                                        Details</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->

<?php include_once('../includes/footer.php'); ?>
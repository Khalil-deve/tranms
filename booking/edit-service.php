<?php
session_start();
include_once('../config/connect_db.php');

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'driver') {
    header("Location: ../auth/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: list-service.php");
    exit();
}

$transport_id = $_GET['id'];

$query = "SELECT * FROM transport WHERE id = ? AND ownerid = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("si", $transport_id, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: list-service.php");
    exit();
}

$transport = $result->fetch_assoc();
$existing_features = explode(',', $transport['features']);
$existing_features = array_map('trim', $existing_features);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $seats = $_POST['seats'];
    $features = isset($_POST['features']) ? implode(', ', $_POST['features']) : '';

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image'];
        $file_name = $image['name'];
        $file_tmp = $image['tmp_name'];
        move_uploaded_file($file_tmp, '../img/' . $file_name);
        $query = "UPDATE transport SET title = ?, description = ?, seats = ?, image = ?, features = ? WHERE id = ? AND ownerid = ?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("ssissii", $title, $description, $seats, $file_name, $features, $transport_id, $_SESSION['user_id']);
    } else {
        $query = "UPDATE transport SET title = ?, description = ?, seats = ?, features = ? WHERE id = ? AND ownerid = ?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("ssisii", $title, $description, $seats, $features, $transport_id, $_SESSION['user_id']);
    }

    if ($stmt->execute()) {
        header("Location: list-service.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Transport - TranMS</title>
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
    </style>
</head>

<body>
<?php
$base_path = '../';
include_once('../includes/navbar.php');
?>

    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fs-4 font-dancing-script text-primary mb-0">Transport Management</p>
                <h1 class="display-4 mb-5">Edit Transport Vehicle</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-light rounded p-5 shadow-sm">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white" id="title" name="title"
                                            value="<?php echo htmlspecialchars($transport['title']); ?>"
                                            placeholder="Vehicle Title" required>
                                        <label for="title">Vehicle Title (e.g., Luxury Coach, Express Minivan)</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-white" id="description" name="description"
                                            placeholder="Description" style="height: 150px" required><?php echo htmlspecialchars($transport['description']); ?></textarea>
                                        <label for="description">Detailed Description</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-white" id="seats" name="seats"
                                            value="<?php echo htmlspecialchars($transport['seats']); ?>"
                                            placeholder="Number of Seats" min="1" required>
                                        <label for="seats">Number of Seats</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-control bg-white h-100 d-flex flex-column justify-content-center border-0 p-3"
                                        style="box-shadow: inset 0 0 0 1px #ced4da; border-radius: .375rem;">
                                        <label class="form-label mb-1 text-muted small">Current Image: <?php echo htmlspecialchars($transport['image']); ?></label>
                                        <input type="file" class="form-control border-0 p-0" id="image" name="image" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label mb-3 fw-bold text-dark">Available Features:</label>
                                    <div class="d-flex flex-wrap gap-4 bg-white p-3 rounded"
                                        style="border: 1px solid #ced4da;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature_wifi"
                                                name="features[]" value="WiFi" <?php echo in_array('WiFi', $existing_features) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="feature_wifi">
                                                <i class="fa fa-wifi text-primary me-2"></i>WiFi
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature_food"
                                                name="features[]" value="Food" <?php echo in_array('Food', $existing_features) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="feature_food">
                                                <i class="fa fa-hamburger text-primary me-2"></i>Food / Snacks
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature_ac"
                                                name="features[]" value="AC" <?php echo in_array('AC', $existing_features) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="feature_ac">
                                                <i class="fa fa-fan text-primary me-2"></i>Air Conditioning
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature_luggage"
                                                name="features[]" value="Luggage" <?php echo in_array('Luggage', $existing_features) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="feature_luggage">
                                                <i class="fa fa-suitcase text-primary me-2"></i>Luggage Space
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature_music"
                                                name="features[]" value="Music" <?php echo in_array('Music', $existing_features) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="feature_music">
                                                <i class="fa fa-music text-primary me-2"></i>Music System
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button class="btn btn-success text-white w-100 py-3 fw-bold" type="submit" name="submit">Update Transport Details</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once('../includes/footer.php'); ?>

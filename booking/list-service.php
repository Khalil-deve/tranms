<?php 
include_once('../config/connect_db.php');
session_start();

if (!isset($_SESSION['user_id']) && $_SESSION['user_type'] !== 'driver') {
    header("Location: ../auth/login.php");
    exit();
}

$query = "SELECT * FROM transport WHERE ownerid = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Transport - TranMS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Yeseva+One&family=Dancing+Script&display=swap" rel="stylesheet">

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

    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fs-4 font-dancing-script text-primary mb-0">Overview</p>
                <h1 class="display-4 mb-5">Manage My Transports</h1>
            </div>
            
            <div class="text-end mb-4 wow fadeIn" data-wow-delay="0.2s">
                <a href="add-service.php" class="btn btn-success text-white px-4 py-2">Add New Transport</a>
            </div>

            <?php if($result->num_rows > 0) { ?>
            <div class="table-responsive wow fadeIn" data-wow-delay="0.3s">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Vehicle Title</th>
                            <th>Description</th>
                            <th>Features</th>
                            <th>Capacity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $count = 1;
                        while($row = $result->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td>
                                <p class="mb-0 text-muted" style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    <?php echo htmlspecialchars($row['description']); ?>
                                </p>
                            </td>
                            <td><?php echo htmlspecialchars($row['features']); ?></td>
                            <td><?php echo htmlspecialchars($row['seats']); ?> Seats</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="edit-service.php?id=<?php echo $row['id']; ?>" class="btn btn-success text-white btn-sm">Edit</a>
                                    <a href="delete-service.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to delete this transport?')">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } else { ?>
                <div class="text-center wow fadeIn" data-wow-delay="0.3s">
                    <p>No transports found. <a href="add-service.php">Add your first transport</a>.</p>
                </div>
            <?php } ?>
        </div>
    </div>

<?php include_once('../includes/footer.php'); ?>
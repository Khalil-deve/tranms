<?php
session_start();
include_once('../config/connect_db.php');

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'driver') {
    header("Location: ../auth/login.php");
    exit();
}

$query = "SELECT b.id, b.pickup_location, b.dropoff_location, b.pickup_date, b.pickup_time,
                 b.passengers, b.special_request, COALESCE(b.status, 'pending') AS status,
                 t.title AS transport_title, u.name AS customer_name, u.email AS customer_email
          FROM bookings b
          JOIN transport t ON b.transport_id = t.id
          JOIN users u ON b.user_id = u.id
          WHERE t.ownerid = ?
          ORDER BY b.pickup_date DESC";

$stmt = $connect->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My Bookings - TranMS</title>
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
                <p class="fs-4 font-dancing-script text-primary mb-0">Booking Management</p>
                <h1 class="display-4 mb-5">My Bookings</h1>
            </div>

            <?php if ($result->num_rows > 0) { ?>
            <div class="table-responsive wow fadeIn" data-wow-delay="0.3s">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Transport</th>
                            <th>Pickup</th>
                            <th>Dropoff</th>
                            <th>Date / Time</th>
                            <th>Passengers</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            $badge_class = match($row['status']) {
                                'confirmed' => 'bg-success',
                                'cancelled' => 'bg-secondary',
                                'completed' => 'bg-primary',
                                default => 'bg-warning text-dark'
                            };
                        ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td>
                                <strong><?php echo htmlspecialchars($row['customer_name']); ?></strong><br>
                                <small class="text-muted"><?php echo htmlspecialchars($row['customer_email']); ?></small>
                            </td>
                            <td><?php echo htmlspecialchars($row['transport_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['pickup_location']); ?></td>
                            <td><?php echo htmlspecialchars($row['dropoff_location']); ?></td>
                            <td>
                                <?php echo htmlspecialchars($row['pickup_date']); ?><br>
                                <small class="text-muted"><?php echo htmlspecialchars($row['pickup_time']); ?></small>
                            </td>
                            <td><?php echo htmlspecialchars($row['passengers']); ?></td>
                            <td>
                                <span class="badge <?php echo $badge_class; ?>">
                                    <?php echo ucfirst(htmlspecialchars($row['status'])); ?>
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="update-booking-status.php?id=<?php echo $row['id']; ?>&status=confirmed"
                                        class="btn btn-success btn-sm"
                                        onclick="return confirm('Confirm this booking?')">Confirm</a>
                                    <a href="update-booking-status.php?id=<?php echo $row['id']; ?>&status=cancelled"
                                        class="btn btn-secondary btn-sm"
                                        onclick="return confirm('Cancel this booking?')">Cancel</a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } else { ?>
                <div class="text-center wow fadeIn" data-wow-delay="0.3s">
                    <p class="fs-5">No bookings received yet.</p>
                </div>
            <?php } ?>
        </div>
    </div>

<?php include_once('../includes/footer.php'); ?>

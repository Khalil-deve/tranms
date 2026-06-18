<?php

include_once('../config/connect_db.php');

session_start();

if(isset($_GET['id']) && isset($_GET['status']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'driver'){

    $id = $_GET['id'];
    $status = $_GET['status'];

    $query = "UPDATE bookings SET status = ? WHERE id = ?";

    $stmt = $connect->prepare($query);

    $stmt->bind_param("si", $status, $id);

    $stmt->execute();

    header("Location: list-book.php");
}
?>
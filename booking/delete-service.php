<?php

include_once('../config/connect_db.php');

session_start();

if(isset($_GET['id']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'driver'){

    $id = $_GET['id'];
    echo $id;
    
    $query = "DELETE FROM transport WHERE id = ?";

    $stmt = $connect->prepare($query);

    $stmt->bind_param("i", $id);

    $stmt->execute();

    header("Location: list-service.php");
}
?>
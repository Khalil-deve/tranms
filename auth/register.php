<?php 
$error_msg = '';
$success_msg = '';

require_once("../config/connect_db.php");

require '../vendor/autoload.php';
use Ramsey\Uuid\Uuid;

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $usertype = $_POST['usertype'];
    $password = $_POST['password'];
    $my_new_uuid = Uuid::uuid4()->toString();

    $query = 'INSERT INTO users (id, name, email, password, user_type) VALUES (?, ?, ?, ?, ?)';  
    
    $statement = $connect->prepare($query);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $statement->bind_param("sssss", $my_new_uuid, $name, $email, $hashed_password, $usertype);
    
    if($statement->execute()){
        $success_msg = "Account created successfully! You can now sign in.";
        header("refresh:2;url=login.php");
    } else {
        $error_msg = "Registration failed. Email may already be registered.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register - TranMS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Yeseva+One&family=Dancing+Script&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <style>
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, .5);
        }
        .auth-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }
        .auth-card .card-header {
            background: linear-gradient(135deg, #0e2a4a, #1a4a7a);
            padding: 1.5rem;
            border: none;
        }
        .auth-card .card-body {
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
        .form-check-input:checked {
            background-color: #198754;
            border-color: #198754;
        }
    </style>
</head>

<body>
<?php
$base_path = '../';
include_once('../includes/navbar.php');
?>

    <div class="container-fluid py-5 mb-4 wow fadeIn" data-wow-delay="0.1s"
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1494515843206-f3117d3f51b7?q=80&w=1920&auto=format&fit=crop') center/cover no-repeat; min-height: 250px;">
        <div class="container text-center py-5">
            <p class="fs-3 font-dancing-script text-primary mb-2">Join Us Today</p>
            <h1 class="display-4 text-white">Create Your Account</h1>
            <p class="fs-5 text-white-50 mb-0">Start booking rides or offering transport services</p>
        </div>
    </div>

    <div class="container-fluid pb-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 wow fadeIn" data-wow-delay="0.2s">

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

                    <div class="auth-card shadow-sm bg-white">
                        <div class="card-header text-center">
                            <div class="mb-2">
                                <i class="fas fa-user-plus text-white" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-white mb-0">Create Account</h4>
                            <p class="text-white-50 small mb-0 mt-1">Fill in the details to get started</p>
                        </div>
                        <div class="card-body">
                            <form action="register.php" method="post">
                                <div class="form-floating mb-3 position-relative">
                                    <i class="fas fa-user form-icon"></i>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                                    <label for="name">Full Name</label>
                                </div>
                                <div class="form-floating mb-3 position-relative">
                                    <i class="fas fa-envelope form-icon"></i>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                    <label for="email">Email address</label>
                                </div>
                                
                                <div class="mb-3 px-2">
                                    <label class="form-label d-block text-muted mb-2">I want to register as a:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="usertype" id="roleCustomer" value="customer" checked>
                                        <label class="form-check-label" for="roleCustomer">Customer</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="usertype" id="roleDriver" value="driver">
                                        <label class="form-check-label" for="roleDriver">Driver / Owner</label>
                                    </div>
                                </div>

                                <div class="form-floating mb-4 position-relative">
                                    <i class="fas fa-lock form-icon"></i>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                <button class="btn btn-success text-white w-100 py-3 fw-bold fs-5" type="submit" name="submit">
                                    <i class="fas fa-user-check me-2"></i>Register Now
                                </button>
                                <p class="text-center mt-4 mb-0">Already have an account? <a href="login.php" class="text-primary fw-bold">Sign In</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once('../includes/footer.php'); ?>
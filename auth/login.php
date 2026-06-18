<?php
$error_msg = '';

include_once('../config/connect_db.php');

if(isset($_POST['submit'])){
    
    if (!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = 'SELECT * FROM users WHERE email = ?';
        $statement = $connect->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();

        session_start();
    
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])){
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['name'];
                $_SESSION['user_type'] = $user['user_type'];
                if ($user['user_type'] === 'customer') {
                    header("Location: ../index.php");
                } elseif ($user['user_type'] === 'owner') {
                    header("Location: ../booking/list-service.php");
                } else {
                    header("Location: ../index.php");
                }
                exit();
            } else {
                $error_msg = "Invalid email or password.";
            }
        } else {
            $error_msg = "No account found with that email.";
        }
    } else {
        $error_msg = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - TranMS</title>
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
    </style>
</head>

<body>
<?php
$base_path = '../';
include_once('../includes/navbar.php');
?>

    <div class="container-fluid py-5 mb-4 wow fadeIn" data-wow-delay="0.1s"
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=1920&auto=format&fit=crop') center/cover no-repeat; min-height: 250px;">
        <div class="container text-center py-5">
            <p class="fs-3 font-dancing-script text-primary mb-2">Welcome Back</p>
            <h1 class="display-4 text-white">Sign In to Your Account</h1>
            <p class="fs-5 text-white-50 mb-0">Access your bookings and manage your transport services</p>
        </div>
    </div>

    <div class="container-fluid pb-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 wow fadeIn" data-wow-delay="0.2s">

                    <?php if($error_msg): ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i> <?php echo $error_msg; ?>
                        </div>
                    <?php endif; ?>

                    <div class="auth-card shadow-sm bg-white">
                        <div class="card-header text-center">
                            <div class="mb-2">
                                <i class="fas fa-user-circle text-white" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-white mb-0">Sign In</h4>
                            <p class="text-white-50 small mb-0 mt-1">Enter your credentials to continue</p>
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <div class="form-floating mb-3 position-relative">
                                    <i class="fas fa-envelope form-icon"></i>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating mb-4 position-relative">
                                    <i class="fas fa-lock form-icon"></i>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                <button class="btn btn-success text-white w-100 py-3 fw-bold fs-5" type="submit" name="submit">
                                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                </button>
                                <p class="text-center mt-4 mb-0">Don't have an account? <a href="register.php" class="text-primary fw-bold">Register here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once('../includes/footer.php'); ?>
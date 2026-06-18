    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-xl navbar-dark px-lg-5 sticky-top bg-dark shadow-sm">
            <a href="<?php echo $base_path; ?>index.php" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="mb-0 text-success">TranMS</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto p-4 p-lg-0">
                    <a href="<?php echo $base_path; ?>index.php" class="nav-item nav-link">Home</a>
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'driver'): ?>
                        <a href="<?php echo $base_path; ?>booking/add-service.php" class="nav-item nav-link">Add Service</a>
                        <a href="<?php echo $base_path; ?>booking/list-service.php" class="nav-item nav-link">My Services</a>
                        <a href="<?php echo $base_path; ?>booking/list-book.php" class="nav-item nav-link">My Bookings</a>
                    <?php else: ?>
                        <a href="<?php echo $base_path; ?>about.php" class="nav-item nav-link">About</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                            <div class="dropdown-menu m-0">
                                <a href="#" class="dropdown-item">Our Vehicles</a>
                                <a href="#" class="dropdown-item">Routes & Schedules</a>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'customer'): ?>
                            <a href="<?php echo $base_path; ?>booking/book-service.php" class="nav-item nav-link">Bookings</a>
                        <?php endif; ?>
                        <a href="<?php echo $base_path; ?>contact.php" class="nav-item nav-link">Contact</a>
                    <?php endif; ?>
                </div>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a class="btn btn-success text-white d-none d-lg-flex mx-1" href="<?php echo $base_path; ?>auth/logout.php">Logout</a>
                <?php else: ?>
                    <a class="btn btn-success text-white d-none d-lg-flex mx-1" href="<?php echo $base_path; ?>auth/login.php">Login</a>
                    <a class="btn btn-success text-white d-none d-lg-flex mx-1" href="<?php echo $base_path; ?>auth/register.php">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

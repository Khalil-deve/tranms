    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Get in Touch</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Karak, Kpk, Pakistan</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+92 344 9478761</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>khalil@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-success text-white me-2" href=""><i class="bi bi-twitter-x"></i></a>
                        <a class="btn btn-square btn-success text-white me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-success text-white me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-success text-white me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="../index.php">Home</a>
                    <a class="btn btn-link" href="../booking/list-service.php">Our Services</a>
                    <a class="btn btn-link" href="../auth/login.php">Login</a>
                    <a class="btn btn-link" href="../auth/register.php">Register</a>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button"
                            class="btn btn-success text-white py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">TranMS</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Designed By <a href="https://github.com/Khalil-deve/">Khalil-dev</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-success text-white btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $base_path; ?>lib/wow/wow.min.js"></script>
    <script src="<?php echo $base_path; ?>lib/easing/easing.min.js"></script>
    <script src="<?php echo $base_path; ?>lib/waypoints/waypoints.min.js"></script>

    <!-- Inline Template Javascript -->
    <script>
        (function ($) {
            "use strict";
            // Spinner
            var spinner = function () {
                setTimeout(function () {
                    if ($('#spinner').length > 0) {
                        $('#spinner').removeClass('show');
                    }
                }, 1);
            };
            spinner();
            // Initiate the wowjs
            new WOW().init();
            // Back to top button
            $(window).scroll(function () {
                if ($(this).scrollTop() > 300) {
                    $('.back-to-top').fadeIn('slow');
                } else {
                    $('.back-to-top').fadeOut('slow');
                }
            });
            $('.back-to-top').click(function () {
                $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
                return false;
            });
        })(jQuery);
    </script>
</body>
</html>

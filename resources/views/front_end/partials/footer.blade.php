 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold text-primary mb-4">A<span class="text-white">Z</span>T</h5>
                    <p>Association d'aide pour l'éducation à Zowla</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square me-1" href="{{ url('#') }}"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square me-1" href="{{ url('#') }}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square me-1" href="{{ url('#') }}"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square me-0" href="{{ url('#') }}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>70, avenue du 24 janvier</p>
                    <p><i class="fa fa-phone-alt me-3"></i> 22.21.02.27</p>
                    <p><i class="fa fa-envelope me-3"></i>lindermarianne@bluewin.ch</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Liens rapides</h5>
                    <a class="btn btn-link" href="{{ url('/about') }}">A Propos</a>
                    <a class="btn btn-link" href="{{ url('/contact') }}">Contactez-Nous</a>
                    <a class="btn btn-link" href="{{ url('/service') }}">Nos Services</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Bulletin</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Message Ici">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        &copy; <a href="{{ url('#') }}">Association Zowla Togo</a>, 2022.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="{{ url('#') }}" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{ url('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
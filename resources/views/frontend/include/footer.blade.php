    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <!-- <h3>BizLand<span>.</span></h3> -->
                        <img src="{{ asset('assets/img/logo.png') }}" style="width:50px">
                        <p>
                            <br>
                            <p>{{ Helper::getSettings('application_address') }}</p>
                            <br>
                            <strong>Phone:</strong> {{ Helper::getSettings('application_phone') }}<br>
                            <strong>Email:</strong> {{ Helper::getSettings('application_email') }}<br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links f-mid">
                        <h4>Important Links</h4>
                        <ul>
                            <li><a href="https://moedu.gov.bd/" target="_blank">Ministry Of Education</a></li>
                            <li><a href="https://dshe.gov.bd/" target="_blank">Directorate of Secondary and Higher
                                    Education</a></li>
                            <li><a href="https://www.dhakaeducationboard.gov.bd/" target="_blank">Board of
                                    Intermediate & Secondary Education, Dhaka</a></li>
                            <li><a href="http://www.ebook.gov.bd/" target="_blank">Ebook</a></li>
                            <li><a href="http://www.nctb.gov.bd/" target="_blank">National Curriculum & Text Board
                                    (NCTB)</a></li>
                            <li><a href="http://www.nape.gov.bd/" target="_blank">National Academy for Primary
                                    Education (NAPE)</a></li>
                        </ul>
                    </div>



                    <div class="col-lg-4 col-md-6 footer-links">
                        <!-- <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div> -->
                        <h4>Our Location</h4>
                        <img style="width: 400px;" src="{{ asset('assets/img/location.png') }}" alt="">

                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>ABM</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="#">Lincon</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
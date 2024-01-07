    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-phone d-flex align-items-center ms-4"><span> Call : {{ Helper::getSettings('application_phone') }}</span></i>
            </div>
            <div>
                <p class="h-text">“শিক্ষা নিয়ে গড়ব দেশ শেখ হাসিনার বাংলাদেশ”</p>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="{{ Helper::getSettings('twitter_link') }}" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="{{ Helper::getSettings('facebook_link') }}" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="{{ Helper::getSettings('instagram_link') }}" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="{{ Helper::getSettings('linkedin_link') }}" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo d-flex">
                <div>
                    <a href="{{ route('frontend.home') }}"><img src="{{ asset('uploads/settings/'.Helper::getSettings('site_logo')) }}" alt=""></a>
                </div>
            </div>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}" href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('frontend.about.us') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About Us
                        </a>
                        <div class="dropdown-menu d-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('frontend.about.us', ['type' => 'glance']) }}">ABM At a Glance</a>
                            <a class="dropdown-item" href="{{ route('frontend.about.us', ['type' => 'history']) }}">History</a>
                            <a class="dropdown-item" href="{{ route('frontend.about.us', ['type' => 'why']) }}">Why study at ABM</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('frontend.administrations') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrations
                        </a>
                        <div class="dropdown-menu d-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('frontend.administrations', ['type' => 'governing-body']) }}">Governing Body</a>
                            <a class="dropdown-item" href="{{ route('frontend.administrations', ['type' => 'principal-message']) }}">Principal's Message</a>
                            <a class="dropdown-item" href="{{ route('frontend.administrations', ['type' => 'teaching-staff']) }}">Teaching Staff</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('frontend.academics') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Academics
                        </a>
                        <div class="dropdown-menu d-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('frontend.academics', ['type' => 'results']) }}">Results</a>
                            <a class="dropdown-item" href="{{ route('frontend.academics', ['type' => 'rules-and-regulations']) }}">Rules & Regulations</a>
                            <a class="dropdown-item" href="{{ route('frontend.academics', ['type' => 'dress-code']) }}">Dress Code</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('frontend.admission') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admission
                        </a>
                        <div class="dropdown-menu d-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('frontend.admission', ['type' => 'info']) }}">Admission Info</a>
                            <a class="dropdown-item" target="_blank" href="https://gsa.teletalk.com.bd/">Apply
                                Now</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('frontend.facilities') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Facilities
                        </a>
                        <div class="dropdown-menu d-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('frontend.facilities', ['type' => 'science-lab']) }}">Science Lab</a>
                            <a class="dropdown-item" href="{{ route('frontend.facilities', ['type' => 'ict-lab']) }}">ICT Lab</a>
                            <a class="dropdown-item" href="{{ route('frontend.facilities', ['type' => 'library']) }}">Library</a>
                            <a class="dropdown-item" href="{{ route('frontend.facilities', ['type' => 'multi-media-classroom']) }}">Multi-Media Classroom</a>
                            <a class="dropdown-item" href="{{ route('frontend.facilities', ['type' => 'qip-sms-service']) }}">QIP SMS Service</a>
                            <a class="dropdown-item" href="{{ route('frontend.facilities', ['type' => 'common-room']) }}">Common Room</a>
                            <a class="dropdown-item" href="{{ route('frontend.facilities', ['type' => 'prayer-room']) }}">Prayer Room</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('frontend.gallery') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gallery
                        </a>
                        <div class="dropdown-menu d-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('frontend.gallery', ['type' => 'photo']) }}">Photo Gallery</a>
                            <a class="dropdown-item" href="{{ route('frontend.gallery', ['type' => 'video']) }}">Video gallery</a>
                        </div>
                    </li>
                    <li><a class="nav-link {{ request()->routeIs('frontend.notice') ? 'active' : '' }}" href="{{ route('frontend.notice') }}">Notice</a></li>
                    <li><a class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}" href="{{ route('frontend.contact') }}">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
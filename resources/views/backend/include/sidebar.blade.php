<div id="layoutSidenav_nav">

    <div class="user_profile">
        <img class="profile-image" src="{{ asset('assets/img/no-img.jpg') }}" alt="">

        <div class="profile-title">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
        <div class="profile-description">{{ Auth::user()->roles->name }}</div>
    </div>

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">

            <div class="nav">
                @if (Helper::hasRight('setting.view'))
                    <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#settingNav"
                        aria-expanded="@if (Route::is('admin.setting.general') ||
                                Route::is('admin.setting.static.content') ||
                                Route::is('admin.setting.legal.content') ||
                                Route::is('admin.contact') ||
                                Route::is('admin.resource')) true @else false @endif"
                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div> Setup
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse @if (Route::is('admin.setting.general') ||
                            Route::is('admin.setting.static.content') ||
                            Route::is('admin.setting.legal.content') ||
                            Route::is('admin.contact') ||
                            Route::is('admin.resource')) show @endif" id="settingNav"
                        aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav down">
                            @if (Helper::hasRight('setting.general'))
                                <a class="nav-link {{ Route::is('admin.setting.general') ? 'active' : '' }}"
                                    href="{{ route('admin.setting.general') }}"><i
                                        class="fa-solid fa-angles-right ikon"></i> General Setting </a>
                            @endif

                            @if (Helper::hasRight('setting.static-content'))
                                <a class="nav-link {{ Route::is('admin.setting.static.content') ? 'active' : '' }}"
                                    href="{{ route('admin.setting.static.content') }}"><i
                                        class="fa-solid fa-angles-right ikon"></i> Static Content</a>
                            @endif

                            @if (Helper::hasRight('setting.legal-content'))
                                <a class="nav-link {{ Route::is('admin.setting.legal.content') ? 'active' : '' }}"
                                    href="{{ route('admin.setting.legal.content') }}"><i
                                        class="fa-solid fa-angles-right ikon"></i> Legal Content</a>
                            @endif
                        </nav>
                    </div>
                @endif


                {{-- admin  --}}
                @if (Helper::hasRight('setting.view'))
                    <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#setupNav"
                        aria-expanded="@if (Route::is('admin.role') ||
                                Route::is('admin.role.create') ||
                                Route::is('admin.role.edit') ||
                                Route::is('admin.role.right') ||
                                Route::is('admin.partner') ||
                                Route::is('admin.partner.product') ||
                                Route::is('admin.user')) true @else false @endif"
                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-shield"></i></div> Administration
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse @if (Route::is('admin.role') ||
                            Route::is('admin.role.create') ||
                            Route::is('admin.role.edit') ||
                            Route::is('admin.role.right') ||
                            Route::is('admin.partner') ||
                            Route::is('admin.partner.product') ||
                            Route::is('admin.user')) show @endif" id="setupNav"
                        aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav down">
                            @if (Helper::hasRight('role.view'))
                                <a class="nav-link {{ Route::is('admin.role') || Route::is('admin.role.create') || Route::is('admin.role.edit') ? 'active' : '' }}"
                                    href="{{ route('admin.role') }}"><i class="fa-solid fa-angles-right ikon"></i> Role
                                    Management</a>
                            @endif
                            @if (Helper::hasRight('right.view'))
                                <a class="nav-link {{ Route::is('admin.role.right') ? 'active' : '' }}"
                                    href="{{ route('admin.role.right') }}"><i
                                        class="fa-solid fa-angles-right ikon"></i> Right Management</a>
                            @endif
                            {{-- @if (Helper::hasRight('partner.view'))
                                <a class="nav-link {{ Route::is('admin.partner') ? 'active' : '' }}"
                                    href="{{ route('admin.partner') }}"><i class="fa-solid fa-angles-right ikon"></i> Partner Management
                                </a>
                            @endif --}}

                            @if (Helper::hasRight('user.view'))
                                <a class="nav-link {{ Route::is('admin.user') ? 'active' : '' }}"
                                    href="{{ route('admin.user') }}"><i class="fa-solid fa-angles-right ikon"></i> User
                                    Management
                                </a>
                            @endif
                        </nav>
                    </div>
                @endif


                {{-- @if (Helper::hasRight('dashboard.view'))
                    <a class="nav-link {{ Route::is('admin.index') ? 'active' : '' }}"
                        href="{{ route('admin.index') }}" >
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> Dashboard
                    </a>
                @endif

                @if (Helper::hasRight('event.view'))
                    <a class="nav-link {{ Route::is('admin.event') ? 'active' : '' }}"
                        href="{{ route('admin.event') }}">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></div> Event Management
                    </a>
                @endif --}}

                @if (Helper::hasRight('menu.view'))
                    <a class="nav-link {{ Route::is('admin.menu') ? 'active' : '' }}"
                        href="{{ route('admin.menu') }}">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></div> Menu Management
                    </a>
                @endif

                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#homeNav"
                    aria-expanded="@if (Route::is('admin.setting.general') ||
                            Route::is('admin.setting.static.content') ||
                            Route::is('admin.setting.legal.content') ||
                            Route::is('admin.contact') ||
                            Route::is('admin.resource')) true @else false @endif"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div> Home
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse @if (Route::is('admin.home.statistics') || Route::is('admin.home.banner') || Route::is('admin.home.introduction')) show @endif" id="homeNav"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav down">
                        <a class="nav-link {{ Route::is('admin.home.banner') ? 'active' : '' }}"
                            href="{{ route('admin.home.banner') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Banner Setting </a>
                        <a class="nav-link {{ Route::is('admin.home.introduction') ? 'active' : '' }}"
                            href="{{ route('admin.home.introduction') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Introduction</a>
                        <a class="nav-link {{ Route::is('admin.home.statistics') ? 'active' : '' }}"
                            href="{{ route('admin.home.statistics') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Statistics</a>
                    </nav>
                </div>

                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#aboutusNav"
                    aria-expanded="@if (Route::is('admin.setting.general') || Route::is('admin.setting.static.content') || Route::is('admin.about.us.why')) true @else false @endif"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div> About Us
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse @if (Route::is('admin.about.us.glance') || Route::is('admin.about.us.history') || Route::is('admin.about.us.why')) show @endif" id="aboutusNav"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav down">
                        <a class="nav-link {{ Route::is('admin.about.us.glance') ? 'active' : '' }}"
                            href="{{ route('admin.about.us.glance') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Glance </a>
                        <a class="nav-link {{ Route::is('admin.about.us.history') ? 'active' : '' }}"
                            href="{{ route('admin.about.us.history') }}"><i
                                class="fa-solid fa-angles-right ikon"></i> History</a>
                        <a class="nav-link {{ Route::is('admin.about.us.why') ? 'active' : '' }}"
                            href="{{ route('admin.about.us.why') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Why</a>
                    </nav>
                </div>

                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#administrationNav"
                    aria-expanded="@if (Route::is('admin.setting.general') ||
                            Route::is('admin.setting.static.content') ||
                            Route::is('admin.setting.legal.content') ||
                            Route::is('admin.contact') ||
                            Route::is('admin.resource')) true @else false @endif"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div> Administrations
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse @if (Route::is('admin.administrations.governing.body') ||
                        Route::is('admin.administrations.principal.message') ||
                        Route::is('admin.administrations.teaching.staff')) show @endif" id="administrationNav"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav down">
                        <a class="nav-link {{ Route::is('admin.administrations.governing.body') ? 'active' : '' }}"
                            href="{{ route('admin.administrations.governing.body') }}"><i
                                class="fa-solid fa-angles-right ikon"></i> Governing Body </a>
                        {{-- <a class="nav-link {{ Route::is('admin.administrations.principal.message') ? 'active' : '' }}"
                            href="{{ route('admin.administrations.principal.message') }}"><i
                                class="fa-solid fa-angles-right ikon"></i> Principal's Message</a> --}}
                        <a class="nav-link {{ Route::is('admin.administrations.teaching.staff') ? 'active' : '' }}"
                            href="{{ route('admin.administrations.teaching.staff') }}"><i
                                class="fa-solid fa-angles-right ikon"></i> Teaching Staff & Principal's Message</a>
                    </nav>
                </div>

                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#academicsNav"
                    aria-expanded="@if (Route::is('admin.setting.general') || Route::is('admin.resource')) true @else false @endif"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div> Academics
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse @if (Route::is('admin.academics.results') || Route::is('admin.academics.rules') || Route::is('admin.academics.dress')) show @endif" id="academicsNav"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav down">
                        <a class="nav-link {{ Route::is('admin.academics.results') ? 'active' : '' }}"
                            href="{{ route('admin.academics.results') }}"><i
                                class="fa-solid fa-angles-right ikon"></i> Results </a>
                        <a class="nav-link {{ Route::is('admin.academics.rules') ? 'active' : '' }}"
                            href="{{ route('admin.academics.rules') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Rules & Regulations</a>
                        <a class="nav-link {{ Route::is('admin.academics.dress') ? 'active' : '' }}"
                            href="{{ route('admin.academics.dress') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Dress Code</a>
                    </nav>
                </div>

                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#admissionNav"
                    aria-expanded="@if (Route::is('admin.admission.info')) true @else false @endif"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div> Admission
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse @if (Route::is('admin.admission.info')) show @endif" id="admissionNav"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav down">
                        <a class="nav-link {{ Route::is('admin.admission.info') ? 'active' : '' }}"
                            href="{{ route('admin.admission.info') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Admission Info </a>
                    </nav>
                </div>

                {{-- <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#facilitiesNav"
                    aria-expanded="@if (Route::is('admin.facilities.science') || Route::is('admin.facilities.ict') || Route::is('admin.facilities.library') || Route::is('admin.facilities.multimedia') || Route::is('admin.facilities.sms') || Route::is('admin.facilities.commonroom') || Route::is('admin.facilities.prayerroom')) true @else false @endif"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div> Facilities
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>                                                                                                                                        
                </a>
                <div class="collapse @if (Route::is('admin.facilities.science') || Route::is('admin.facilities.ict') || Route::is('admin.facilities.library') || Route::is('admin.facilities.multimedia') || Route::is('admin.facilities.sms') || Route::is('admin.facilities.commonroom') || Route::is('admin.facilities.prayerroom')) show @endif" id="facilitiesNav"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav down">
                        <a class="nav-link {{ Route::is('admin.facilities.science') ? 'active' : '' }}" href="{{ route('admin.facilities.science') }}"><i class="fa-solid fa-angles-right ikon"></i> Science Lab </a>
                        <a class="nav-link {{ Route::is('admin.facilities.ict') ? 'active' : '' }}" href="{{ route('admin.facilities.ict') }}"><i class="fa-solid fa-angles-right ikon"></i> ICT Lab </a>
                        <a class="nav-link {{ Route::is('admin.facilities.library') ? 'active' : '' }}" href="{{ route('admin.facilities.library') }}"><i class="fa-solid fa-angles-right ikon"></i> Library </a>
                        <a class="nav-link {{ Route::is('admin.facilities.multimedia') ? 'active' : '' }}" href="{{ route('admin.facilities.multimedia') }}"><i class="fa-solid fa-angles-right ikon"></i> Multi-Media Classroom </a>
                        <a class="nav-link {{ Route::is('admin.facilities.sms') ? 'active' : '' }}" href="{{ route('admin.facilities.sms') }}"><i class="fa-solid fa-angles-right ikon"></i> QIP SMS Service </a>
                        <a class="nav-link {{ Route::is('admin.facilities.commonroom') ? 'active' : '' }}" href="{{ route('admin.facilities.commonroom') }}"><i class="fa-solid fa-angles-right ikon"></i> Common Room </a>
                        <a class="nav-link {{ Route::is('admin.facilities.prayerroom') ? 'active' : '' }}" href="{{ route('admin.facilities.prayerroom') }}"><i class="fa-solid fa-angles-right ikon"></i> Prayer Room </a>
                    </nav>
                </div> --}}

                <a class="nav-link {{ Route::is('admin.facilities') ? 'active' : '' }}"
                    href="{{ route('admin.facilities') }}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></div> Facilities
                </a>

                <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#galleryNav"
                    aria-expanded="@if (Route::is('admin.setting.general') || Route::is('admin.gallery.event') || Route::is('admin.resource')) true @else false @endif"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div> Gallery
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse @if (Route::is('admin.gallery.photo') || Route::is('admin.gallery.event') || Route::is('admin.gallery.video')) show @endif" id="galleryNav"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav down">
                        <a class="nav-link {{ Route::is('admin.gallery.event') ? 'active' : '' }}"
                            href="{{ route('admin.gallery.event') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Gallery Event </a>
                        <a class="nav-link {{ Route::is('admin.gallery.photo') ? 'active' : '' }}"
                            href="{{ route('admin.gallery.photo') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Photo Gallery </a>
                        <a class="nav-link {{ Route::is('admin.gallery.video') ? 'active' : '' }}"
                            href="{{ route('admin.gallery.video') }}"><i class="fa-solid fa-angles-right ikon"></i>
                            Video gallery </a>
                    </nav>
                </div>

                <a class="nav-link {{ Route::is('admin.notice') ? 'active' : '' }}"
                    href="{{ route('admin.notice') }}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></div> Notice Management
                </a>

                <a class="nav-link {{ Route::is('admin.contact') ? 'active' : '' }}"
                    href="{{ route('admin.contact') }}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></div> Cotnact Management
                </a>
            </div>
        </div>
    </nav>
</div>

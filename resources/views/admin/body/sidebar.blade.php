<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>
    
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-line"></i>
                        <span>Home Slide Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('home.slide') }}">Home Slide</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-box-outline"></i>
                        <span>About Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('about.page') }}">About Setup</a></li>
        
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Skill Setup</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('skill.page') }}">All Skill</a></li>
                                <li><a href="{{ route('skill.add') }}">Add Skill</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Award Setup</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('award.page') }}">All Award</a></li>
                                <li><a href="{{ route('insert.award') }}">Add Award</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Education Setup</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('education.page') }}">All Education</a></li>
                                <li><a href="{{ route('insert.education') }}">Add Education</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Multi Image Setup</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('all.multi.image') }}">Multi Image</a></li>
                                <li><a href="{{ route('about.multi.image') }}">Add Multi Image</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shopping-bag-line"></i>
                        <span>Portfolio Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.portfolio') }}">All Portfolio</a></li>
                        <li><a href="{{ route('add.portfolio') }}">Add Portfolio</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shopping-bag-line"></i>
                        <span>Services Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.services') }}">All Services</a></li>
                        <li><a href="{{ route('add.services') }}">Add Services</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shopping-bag-line"></i>
                        <span>Blog Category Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.blog.category') }}">All Blog Category</a></li>
                        <li><a href="{{ route('add.blog.category') }}">Add Blog Category</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shopping-bag-line"></i>
                        <span>Blog Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.blog') }}">All Blog</a></li>
                        <li><a href="{{ route('add.blog') }}">Add Blog</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shopping-bag-line"></i>
                        <span>Footer Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('footer.setup') }}">Footer Setup</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shopping-bag-line"></i>
                        <span>Contact Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('contact.message') }}">Contact Message</a></li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html">Login</a></li>
                        <li><a href="auth-register.html">Register</a></li>
                        <li><a href="auth-recoverpw.html">Recover Password</a></li>
                        <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-directory.html">Directory</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
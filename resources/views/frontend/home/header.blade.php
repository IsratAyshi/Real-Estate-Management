<header class="main-header">
            <!-- header-top -->
            <div class="header-top">
                <div class="top-inner clearfix">
                    <div class="left-column pull-left">
                        <ul class="info clearfix">
                            <li><i class="far fa-map-marker-alt"></i>Discover St, Dhaka, Bangladesh</li>
                            <li><i class="far fa-clock"></i>Mon - Sat  9.00 - 18.00</li>
                            <li><i class="far fa-phone"></i><a href="tel:0100002023"></a>01000002023</li>
                        </ul>
                    </div>
                    <div class="right-column pull-right">
                        <ul class="social-links clearfix">
                            <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
        @auth
         <div class="sign-box">
                <a href="{{ route('dashboard') }}"><i class="fas fa-user"></i>Dashboard</a>
               <a href="{{ route('user.logout') }}"><i class="fas fa-user"></i>Logout</a>
        </div> 
         @else 
         <div class="sign-box">
         <a href="{{ route('login') }}"><i class="fas fa-user"></i>Sign In</a>
                        </div>
         @endauth
                    </div>
                </div>
            </div>
<!-- header-lower -->
<div class="header-lower">
<div class="outer-box">
<div class="main-box">
<div class="logo-box">
    <figure class="logo"><a href="index.html"><img src="{{ asset('frontend/assets/images/real-estate-logo.png') }}" alt=""></a></figure>
</div>
<div class="menu-area clearfix">
    <!--Mobile Navigation Toggler-->
    <div class="mobile-nav-toggler">
        <i class="icon-bar"></i>
        <i class="icon-bar"></i>
        <i class="icon-bar"></i>
    </div>
    <nav class="main-menu navbar-expand-md navbar-light">
        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
            <ul class="navigation clearfix">
                <li ><a href="{{route('home')}}"><span>Main Home</span></a></li> 

                <li class="dropdown"><a href="{{route('home')}}"><span>Property</span></a>
                    <ul>
                        <li><a href="{{route('buy.property')}}">Buy Property </a></li>
                        <li><a href="{{route('rent.property')}}">Rent Property </a></li>
                    </ul>
                </li>


                <li class="dropdown"><a href="index.html"><span>Agency</span></a>
                    <ul>
                        <li><a href="agency-list.html">Agent List</a></li>
                    </ul>
                </li>


                <li ><a href="{{route('home')}}"><span>About Us</span></a></li>

                <li><a href="{{route('home')}}"><span>Contact</span></a></li>   
            </ul>
        </div>
    </nav>
</div>
<div class="btn-box">
    <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
</div>
</div>
</div>
</div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="index.html"><img src="{{ asset('frontend/assets/images/real-estate-logo.png') }}" alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="btn-box">
                            <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
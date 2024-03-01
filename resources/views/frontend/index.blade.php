@extends('frontend.frontend_dashboard')
@section('main')


<!-- banner-section -->
@include('frontend.home.banner')
<!-- banner-section end -->


<!-- category-section -->
@include('frontend.home.category')
<!-- category-section end -->


        <!-- feature-section -->
        @include('frontend.home.feature')
        <!-- feature-section end -->


        <!-- video-section -->
        @include('frontend.home.video')
        <!-- video-section end -->


        <!-- deals-section -->
        @include('frontend.home.deals')
        <!-- deals-section end -->


        <!-- testimonial-section end -->
        
        <!-- testimonial-section end -->


        <!-- chooseus-section -->
        
        <!-- chooseus-section end -->


        <!-- place-section -->
        @include('frontend.home.place')
        <!-- place-section end -->


        <!-- team-section -->
       
        <!-- team-section end -->


        <!-- cta-section -->
        <section class="cta-section bg-color-2">
            <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png') }});"></div>
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <div class="text pull-left">
                        <h2>Looking to Buy a New Property or <br />Sell an Existing One?</h2>
                    </div>
                    <div class="btn-box pull-right">
                        <a href="property-details.html" class="theme-btn btn-three">Rent Properties</a>
                        <a href="index.html" class="theme-btn btn-one">Buy Properties</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta-section end -->


        <!-- news-section -->
        
        <!-- news-section end -->


        <!-- download-section -->
        
        <!-- download-section end -->

@endsection

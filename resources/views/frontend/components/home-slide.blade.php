<div class="intro-slider-container mb-5">
    <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl"
        data-owl-options='{
                        "dots": true,
                        "nav": false,
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
        @foreach ($homeSilder as $slide)
            <div class="intro-slide"
                style="background-image: url('{{ asset('storage/slideshow/' . $slide->photo) }}');">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <h3 class="intro-subtitle text-third">{{ $slide->category }}</h3>
                            <!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">{{ $slide->title_1 }}</h1>
                            <h1 class="intro-title">{{ $slide->title_2 }}</h1><!-- End .intro-title -->

                            <div class="intro-price">
                                <sup class="intro-old-price">{{ $slide->sub }}</sup>
                                <span class="text-third">
                                    {{-- $279<sup>.99</sup> --}}
                                    {{ $slide->price }}
                                </span>
                            </div><!-- End .intro-price -->

                            <a href="{{ $slide->link }}" class="btn btn-primary btn-round">
                                <span>Shop More</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
        @endforeach

    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->

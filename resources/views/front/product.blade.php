@extends('front.partials.master')
@section('title', 'Ana Sayfa')
@section('content')
    <div class="main-content-wrapper d-flex clearfix">
        <div class="single-product-area section-padding-150 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="{{ route('front.homepage') }}">ANASAYFA</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $list->product_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0"
                                        style="background-image: url({{$list->product_img}});">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1"
                                        style="background-image: url({{$list->detail['0']['product_img']}});">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="2"
                                        style="background-image: url({{$list->detail['1']['product_img']}});">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="3"
                                        style="background-image: url({{$list->detail['2']['product_img']}});">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="#">
                                            <img class="d-block w-100" src="{{$list->product_img}}"
                                                 alt="First slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="#">
                                            <img class="d-block w-100" src="{{$list->detail['0']['product_img']}}"
                                                 alt="Second slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="#">
                                            <img class="d-block w-100" src="{{$list->detail['1']['product_img']}}"
                                                 alt="Third slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="#">
                                            <img class="d-block w-100" src="{{$list->detail['2']['product_img']}}"
                                                 alt="Fourth slide">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <a href="product-details.html">
                                    <h6>{{ $list->product_name }}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="short_overview my-5">
                                <p>{{ $list->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
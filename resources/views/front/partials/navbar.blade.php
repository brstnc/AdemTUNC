<?php
$company = App\Models\Company::first();
?>
<div class="search-close">
    <i class="fa fa-close" aria-hidden="true"></i>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="search-content">
                <form action="#" method="get">
                    <input type="search" name="search" id="search" placeholder="Type your keyword...">
                    <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Search Wrapper Area End -->

<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
        <!-- Navbar Brand -->
        <div class="amado-navbar-brand">
            <a href="index.html"><img src="../img/core-img/logo.png" alt=""></a>
        </div>
        <!-- Navbar Toggler -->
        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>

    <!-- Header Area Start -->
    <header class="header-area clearfix">
        <!-- Close Icon -->
        <div class="nav-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <!-- Logo -->
        <div class="logo">
            <a href="{{ route('front.homepage') }}"><img
                        @if($company->company_img)
                        src="{{$company->company_img}}"
                        @else
                        src="/img/core-img/logo2.png"
                        @endif
                        alt=""></a>
        </div>
        <!-- Amado Nav -->
        <nav class="amado-nav">
            <ul>
                <li class="active"><a href="{{ route('front.homepage') }}">ANASAYFA</a></li>
                <li><a href="{{ route('front.contact') }}">ILETISIM</a></li>
            </ul>
        </nav>
        <br>
        <hr>
        <!-- Social Button -->
        <div class="social-info d-flex justify-content-between">
            <a
                    @if($company->youtube_url)
                    href="{{$company->youtube_url}}"
                    @else
                    href="#"
                    @endif
            ><i class="fa fa-youtube" aria-hidden="true"></i></a>
            <a
                    @if($company->instagram_url)
                    href="{{$company->instagram_url}}"
                    @else
                    href="#"
                    @endif
            ><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a
                    @if($company->facebook_url)
                    href="{{$company->facebook_url}}"
                    @else
                    href="#"
                    @endif
            ><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a
                    @if($company->twitter_url)
                    href="{{$company->twitter_url}}"
                    @else
                    href="#"
                    @endif
            ><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
    </header>
@extends('front.partials.master')
@section('title', 'Ana Sayfa')
@section('content')
    <br>
    <h3>CALISMA ALANLARIMIZ</h3>
    <hr>

    <div class="amado-pro-catagory clearfix">
        @foreach($categories as $category)
            <div class="single-products-catagory clearfix"
                 style="position: absolute; left: 0%; top: 0px; margin-right: 0px">
                <a href="shop.html">
                    <img src="{{ $category->category_img }}" alt="">
                    {{--                    <div class="hover-content">--}}
                    {{--                        Deneme--}}
                    {{--                        <div class="line"></div>--}}
                    {{--                    </div>--}}
                </a>
            </div>
        @endforeach
    </div>
@endsection
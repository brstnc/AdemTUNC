@extends('front.partials.master')
@section('title', 'Ana Sayfa')
@section('content')
    <br>
    <h3>CALISMA ALANLARIMIZ</h3>
    <hr>

    <div class="amado-pro-catagory clearfix">
        @foreach($up_categories as $up_category)
            <div class="single-products-catagory clearfix"
                 style="position: absolute; left: 0%; top: 0px; margin-right: 0px">
                <a href="{{ route('front.categories', $up_category->id) }}">
                    <img src="{{ $up_category->category_img }}" alt="">
                    {{--                    <div class="hover-content">--}}
                    {{--                        Deneme--}}
                    {{--                        <div class="line"></div>--}}
                    {{--                    </div>--}}
                </a>
            </div>
        @endforeach
    </div>
@endsection
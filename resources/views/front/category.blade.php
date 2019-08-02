@extends('front.partials.master')
@section('title', 'Ana Sayfa')
@section('content')
    <br>
    <h3>ALT KATEGORILER</h3>
    <hr>

    <div class="amado-pro-catagory clearfix">
        @foreach($list as $entry)
            @foreach($entry->sub_categories as $category)

                <div class="single-products-catagory clearfix"
                     style="position: absolute; left: 0%; top: 0px; margin-right: 0px">
                    <a href="{{ route('front.products', $category->sub_category->id) }}">
                        <img src="{{ $category->sub_category->category_img }}" alt="">
                        {{--                    <div class="hover-content">--}}
                        {{--                        Deneme--}}
                        {{--                        <div class="line"></div>--}}
                        {{--                    </div>--}}
                    </a>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection
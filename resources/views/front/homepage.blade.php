@extends('front.partials.master')
@section('title', 'Etkin Endustriyel - Ana Sayfa')
@php $company = \App\Models\Company::first(); @endphp
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
                </a>
            </div>
        @endforeach
    </div>

    <div class="media-icons" style="display: none;">
        <a href="tel:{{$company->phone}}"><i class="fa fa-phone-square" aria-hidden="true"></i></a><br>
        <a href="https://wa.me/{{$company->phone}}"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
    </div>

    <style>
        .media-icons i{
            font-size:50px;
        }
        .media-icons{
            position:fixed;
            right: 20px;
            bottom: 20px;
            background-color:white;
            border-radius:10px;
            padding:2px 5px;
            z-index: 9999999999999999;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            if ($( window ).width()<510){
                $('.media-icons').css("display","block");
            }
        })
    </script>
@endsection
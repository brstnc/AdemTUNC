@extends('admin.layouts.master')
@section('title', 'Yönetim Anasayfa')
@section('content')
    <h1 class="page-header">Kontrol Paneli</h1>
    <section class="row text-center placeholders">
        <a href="{{ route('admin.upcategory') }}" style="color: #1b1e21">
            <div class="col-6 col-sm-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Üst Kategoriler</div>
                    <div class="panel-body">
                        <h4>{{ $up_category_count }}</h4>
                        <p>Adet</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.category') }}" style="color: #1b1e21">

            <div class="col-6 col-sm-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Alt Kategoriler</div>
                    <div class="panel-body">
                        <h4>{{ $sub_category_count }}</h4>
                        <p>Adet</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.product') }}" style="color: #1b1e21">
            <div class="col-6 col-sm-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Ürünler</div>
                    <div class="panel-body">
                        <h4>{{ $product_count }}</h4>
                        <p>Adet</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.user') }}" style="color: #1b1e21">
            <div class="col-6 col-sm-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Kullanıcılar</div>
                    <div class="panel-body">
                        <h4>{{ $user_count }}</h4>
                        <p>Kişi</p>
                    </div>
                </div>
            </div>
        </a>
    </section>
@endsection

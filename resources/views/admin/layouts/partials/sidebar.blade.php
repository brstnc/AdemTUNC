@php
    $product_count = \App\Models\Product::all()->count();
    $up_category_count = \App\Models\UpCategory::all()->count();
    $sub_category_count = \App\Models\Category::all()->count();
    $user_count = \App\Models\User::all()->count();
@endphp
<div class="list-group">
    <a href="{{ route('admin.homepage') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Giriş Sayfası</a>
    <a href="{{ route('admin.upcategory') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span>Üst Kategoriler
        <span class="badge badge-dark badge-pill pull-right">{{ $up_category_count }}</span>
    </a>
    <a href="{{ route('admin.category') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span>Alt Kategoriler
        <span class="badge badge-dark badge-pill pull-right">{{ $sub_category_count }}</span>
    </a>
    <a href="{{ route('admin.product') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Ürünler
        <span class="badge badge-dark badge-pill pull-right">{{ $product_count }}</span>
    </a>

    <a href="{{ route('admin.user') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Kullanıcılar
        <span class="badge badge-dark badge-pill pull-right">{{ $user_count }}</span>
    </a>
    <a href="{{ route('admin.company_detail') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Genel Ayarlar
    </a>

</div>

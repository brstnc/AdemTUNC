@extends('admin.layouts.master')
@section('title', 'Ürün Düzenleme')
@section('content')
    @if($entry->id)
        <h1 class="page-header">Ürün Düzenleme</h1>
    @else
        <h1 class="page-header">Ürün Ekleme</h1>
    @endif
    <form method="post" action="{{ route('admin.product.save', $entry->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_name">Ürün Adı</label>
                    <input type="text" class="form-control" width="15px" name="product_name" id="product_name" placeholder="Ürün Adı" value="{{ old('product_name', $entry->product_name)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="comment">Açıklama</label>
                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Açıklama" value="{{ old('comment', $entry->comment)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categories">Kategoriler</label>
                    <select class="form-control" name="categories[]" id="categories" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    {{ collect(old('categories', $product_categories))
                                    ->contains($category->id) ? 'selected': '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            @if ($entry->detail->product_img != null)
                <img src="#" class="thumbnail pull-left" style="height: 100px; margin-right: 20px">
            @endif
            <label for="product_img" >Ürün Resmi</label>
            <input type="file" id="product_img" name="product_img">
        </div>


        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(function () {
            $('#categories').select2({
                placeholder: 'Lütfen kategori seçiniz'
            })
        })
    </script>
@endsection
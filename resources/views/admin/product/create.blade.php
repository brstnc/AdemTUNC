@extends('admin.layouts.master')
@section('title', 'Ürün Ekleme')
@section('content')

        <h1 class="page-header">Ürün Ekleme</h1>
    <form role="form" method="post" action="{{ route('admin.product.create') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_img">Ürün Resmi</label>
                    <input type="file" name="product_img" class="form-control"
                           title="Ürün Resmi">
                </div>
            </div>
        </div>
        @if ($errors->has('product_img'))
            <div class="alert alert-danger nomargin">
                {{ $errors->first('product_img') }}
            </div> <br>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_name">Ürün Adı</label>
                    <input type="text" class="form-control" width="15px" name="product_name" id="product_name"
                           placeholder="Ürün Adı">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Sıralaması</label>
                    <input type="text" class="form-control" name="order" id="order"
                           placeholder="Ürün Sıralaması">
                </div>
            </div>
        </div>
        @if ($errors->has('order'))
            <div class="alert alert-danger nomargin">
                {{ $errors->first('order') }}
            </div> <br>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="content">Açıklama</label>
                    <input type="text" class="form-control" name="content" id="content" placeholder="Açıklama">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categories[]">Kategoriler</label>
                    <select class="form-control" name="categories[]" id="categories" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_imgs[]">Ürün İçerik Resimleri</label>
                        <input multiple maxlength="5" type="file" name="product_imgs[]" class="form-control"
                               title="Ürün Resmi">
                    </div>
                </div>
            </div>
            @if ($errors->has('product_imgs'))
                <div class="alert alert-danger nomargin">
                    {{ $errors->first('product_imgs') }}
                </div> <br>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
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
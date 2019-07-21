@extends('admin.layouts.master')
@section('title', 'Kategori Düzenleme')
@section('content')
    <h1 class="page-header">Kategori Düzenleme</h1>
    <h2 class="sub-header">Form</h2>
    <form role="form" method="post" enctype="multipart/form-data"
          action="{{ route('admin.category.edit', $category->id) }}">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categories[]">Üst Kategoriler</label>
                    <select class="form-control" name="categories[]" id="categories" multiple>
                        @foreach($categories as $categoryy)
                            <option value="{{ $categoryy->id }}">{{ $categoryy->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        @if ($errors->has('categories'))
            <div class="alert alert-danger nomargin">
                {{ $errors->first('categories') }}
            </div> <br>
        @endif
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_name">Kategori Adı</label>
                    <input type="text" class="form-control" name="category_name" id="category_name"
                           placeholder="Kategori Adı" value="{{ $category->category_name }}">
                </div>
            </div>
        </div>
        @if ($errors->has('category_name'))
            <div class="alert alert-danger nomargin">
                {{ $errors->first('category_name') }}
            </div> <br>
        @endif
        <hr />
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Sıralaması</label>
                    <input type="text" class="form-control" name="order" id="order"
                           placeholder="Kategori Sıralaması" value="{{ $category->order }}">
                </div>
            </div>
        </div>
        @if ($errors->has('order'))
            <div class="alert alert-danger nomargin">
                {{ $errors->first('order') }}
            </div> <br>
        @endif
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_img">Mevcut Kategori Fotoğrafı</label>
                    <img src="{{ $category->category_img }}">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="file" name="category_img" class="form-control"
                           title="Kategori Resmi">
                </div>
            </div>
        </div>
        @if ($errors->has('category_img'))
            <div class="alert alert-danger nomargin">
                {{ $errors->first('category_img') }}
            </div> <br>
        @endif
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
@if ($errors->has('upcategories'))
    <div class="alert alert-danger nomargin">
        {{ $errors->first('upcategories') }}
    </div> <br>
@endif



@extends('admin.layouts.master')
@section('title', 'Kategori Düzenleme')
@section('content')
    <h1 class="page-header">Alt Kategori Ekleme</h1>
    <h2 class="sub-header">Form</h2>
    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.category.create') }}">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categories[]">Üst Kategoriler</label>
                    <select class="form-control" name="categories[]" id="categories" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        @if ($errors->has('upcategories'))
            <div class="alert alert-danger nomargin">
                {{ $errors->first('upcategories') }}
            </div> <br>
        @endif
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Adı</label>
                    <input type="text" class="form-control" name="category_name" id="category_name"
                           placeholder="Kategori Adı">
                </div>
            </div>
        </div>
        @if ($errors->has('category_name'))
            <div class="alert alert-danger nomargin">
                {{ $errors->first('category_name') }}
            </div> <br>
        @endif
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Sıralaması</label>
                    <input type="text" class="form-control" name="order" id="order"
                           placeholder="Kategori Sıralaması">
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
                    <label for="exampleInputEmail1">Kategori Resmi</label>
                    <input type="file" name="category_img" class="form-control"
                           title="Kategori Resmi">
                </div>
            </div>
        </div>
        @if ($errors->has('images_url'))
            <div class="alert alert-danger nomargin">
                {{ $errors->first('images_url') }}
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

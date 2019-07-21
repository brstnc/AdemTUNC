@extends('admin.layouts.master')
@section('title', 'Kategori Düzenleme')
@section('content')
    <h1 class="page-header">Üst Kategori Düzenleme</h1>
    <h2 class="sub-header">Form</h2>
    <form role="form" method="post" enctype="multipart/form-data"
          action="{{ route('admin.upcategory.edit', $category->id) }}">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
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
        <hr/>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Üst Kategori Sıralaması</label>
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_img">Mevcut İçerik Fotoğrafı</label>
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


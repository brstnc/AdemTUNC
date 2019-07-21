@extends('admin.layouts.master')
@section('title', 'Kategori Düzenleme')
@section('content')
    <h1 class="page-header">Üst Kategori Ekleme</h1>
    <h2 class="sub-header">Form</h2>
    <form role="form" method="post" enctype="multipart/form-data" action="{{ route('admin.upcategory.create') }}">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Üst Kategori Adı</label>
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

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Üst Kategori Sıralaması</label>
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
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


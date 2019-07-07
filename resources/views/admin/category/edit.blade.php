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
                    <label for="exampleInputPassword1">Üst Kategorisi</label>
                    <select name="up_id" id="up_id" class="form-control">
                        <option value="">Ana Kategori</option>
                        @foreach($up_categories as $up_category)
                            @php ($up_category_name = $category->up_category->category_name)
                            @if($up_category_name == $up_category->category_name )
                                <option selected
                                        value="{{ $up_category->id }}">{{ $up_category->category_name }}</option>
                            @else
                                <option value="{{ $up_category->id }}">{{ $up_category->category_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <p>(Üst kategori seçilmediği durumda kayıt, üst kategori olarak ayarlanır.)</p>
                </div>
            </div>
        </div>
        @if ($errors->has('up_id'))
            <div class="alert alert-danger nomargin">
                {{ $errors->first('up_id') }}
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
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_img">Mevcut İçerik Fotoğrafları</label>
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


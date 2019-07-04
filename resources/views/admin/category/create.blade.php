@extends('admin.layouts.master')
@section('title', 'Kategori Düzenleme')
@section('content')
    <h1 class="page-header">Kategori Ekleme</h1>
    <h2 class="sub-header">Form</h2>
    <form method="post" action="{{ route('admin.category.create') }}">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="up_id">Üst Kategorisi</label>
                    <select name="up_id" id="up_id" class="form-control">
                        <option value="">Ana Kategori</option>
                        @foreach($up_categories as $up_category)
                            <option>{{ $up_category->category_name }}</option>
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_name">Kategori Adı</label>
                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Kategori Adı">
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
                    <label for="category_name">Kategori Resmi</label>

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


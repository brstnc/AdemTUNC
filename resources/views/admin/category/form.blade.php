@extends('admin.layouts.master')
@section('title', 'Kategori Düzenleme')
@section('content')
    <h1 class="page-header">Kategori Düzenleme</h1>
    <h2 class="sub-header">Form</h2>
    <form method="post" action="{{ route('admin.category.save', $entry->id) }}">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="up_id">Türü</label>
                    <select name="up_id" id="up_id" class="form-control">
                        <option value="">Ana Kategori</option>
                        @foreach($categories as $category)
                            <option>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <p>(Üst kategori seçilmediği durumda kayıt, üst kategori olarak ayarlanır.)</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_name">Kategori Adı</label>
                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Kategori Adı" value="{{ old('category_name', $entry->category_name)}}">
                </div>
            </div>
        </div>

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


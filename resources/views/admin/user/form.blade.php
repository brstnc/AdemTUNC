@extends('admin.layouts.master')
@section('title', 'Kullanıcı Düzenleme')
@section('content')
    <h1 class="page-header">Kullanıcı Düzenleme</h1>
    <h1 class="sub-header">Form</h1>
    <form method="post" action="{{route('admin.user.save', $entry->id)}}">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Ad Soyad</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Ad Soyad" value="{{ old('name', $entry->name)}}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emai1">E-mail Adresi</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email',$entry->email)}}" readonly>
                </div>
            </div>
        </div>
{{--        <div class="checkbox">--}}
{{--            <label>--}}
{{--                <input type="checkbox" name="admin" id="admin" value="1" {{ $entry->admin ? 'checked' : '' }}> Yönetici--}}
{{--            </label>--}}
{{--        </div>--}}

        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection
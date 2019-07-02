@extends('admin.layouts.master')
@section('title', 'Kullanıcı Düzenleme')
@section('content')
    <h1 class="page-header">Kullanıcı Düzenleme</h1>
    <h1 class="sub-header">Form</h1>
    <form method="post" action="{{route('admin.user.save', $entry->id)}}">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_img">Profil Resmi</label>
                <input type="file" class="form-control" name="user_img" id="user_img" placeholder="Profil Resmi"
                       value="#" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Ad Soyad</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Ad Soyad" value="#"
                           readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emai1">E-mail Adresi</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="#"
                           readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password" class="sr-only">Yeni Parola</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Yeni Parola">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password_confirmation" class="sr-only">Yeni Parola (Tekrar)</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                           placeholder="Yeni Parola(Tekrar)">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Adres" value="#"
                           readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefon" value="#"
                           readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="fax" class="form-control" name="fax" id="fax" placeholder="Fax" value="#" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="content">Özgeçmiş</label>
                    <input type="text" class="form-control" name="content" id="content" placeholder="Özgeçmiş" value="#"
                           readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="facebook_url">Facebook Adresi</label>
                    <input type="text" class="form-control" name="facebook_url" id="facebook_url"
                           placeholder="Facebook Adresi" value="#" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="twitter_url">Twitter Adresi</label>
                    <input type="text" class="form-control" name="twitter_url" id="twitter_url"
                           placeholder="Twitter Adresi" value="#" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="instagram_url">İnstagram Adresi</label>
                    <input type="text" class="form-control" name="instagram_url" id="instagram_url"
                           placeholder="İnstagram Adresi" value="#" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="youtube_url">Youtube Adresi</label>
                    <input type="text" class="form-control" name="youtube_url" id="youtube_url" placeholder="*"
                           value="#" readonly>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection
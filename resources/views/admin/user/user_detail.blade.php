@extends('admin.layouts.master')
@section('title', 'Kullanıcı Düzenleme')
@section('content')
    <h1 class="page-header">Kullanıcı Düzenleme</h1>
    <h1 class="sub-header">Form</h1>
    <form method="post" action="#">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="user_img">Profil Resmi</label>
                    <input type="file" class="form-control" name="user_img" id="user_img" placeholder="Profil Resmi"
                           value="#">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="name">Ad Soyad</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Ad Soyad" value="#"
                           >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="emai1">E-mail Adresi</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="#"
                           >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="password" >Yeni Parola</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Yeni Parola">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="password_confirmation" >Yeni Parola (Tekrar)</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                           placeholder="Yeni Parola(Tekrar)">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Adres" value="#"
                           >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefon" value="#"
                           >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="fax" class="form-control" name="fax" id="fax" placeholder="Fax" value="#" >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="facebook_url">Facebook Adresi</label>
                    <input type="text" class="form-control" name="facebook_url" id="facebook_url"
                           placeholder="Facebook Adresi" value="#" >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="twitter_url">Twitter Adresi</label>
                    <input type="text" class="form-control" name="twitter_url" id="twitter_url"
                           placeholder="Twitter Adresi" value="#" >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="instagram_url">İnstagram Adresi</label>
                    <input type="text" class="form-control" name="instagram_url" id="instagram_url"
                           placeholder="İnstagram Adresi" value="#" >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="youtube_url">Youtube Adresi</label>
                    <input type="text" class="form-control" name="youtube_url" id="youtube_url" placeholder="*"
                           value="#" >
                </div>
            </div>
            <div class="col-md-9">
                <label for="content">Özgeçmiş</label>
                <div class="form-group">
                    <textarea rows="9" cols="50" class="summernote" name="content"></textarea>
                </div>
            </div>

        </div>
        <button style=" margin-right:auto;" type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection
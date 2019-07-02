<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yönetici Kayıt</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="/css/admin/login.css">
</head>
<body>
<div class="container">
    <form class="form-signin" method="post" action="{{ route('admin.signup') }}">
        {{ csrf_field() }}
        <img src="#" class="logo">
        @include('admin.layouts.partials.errors')
        <label for="name" class="sr-only">Ad Soyad</label>
        <input type="name_lastname" id="name" name="name" class="form-control" placeholder="Ad Soyad">

        <label for="email" class="sr-only">Email address</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Parola">
        <label for="password_confirmation" class="sr-only">Password (Tekrar)</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
               placeholder="Parola(Tekrar)">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Kaydol</button>
    </form>
</div>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>
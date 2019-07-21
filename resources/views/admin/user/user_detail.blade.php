@extends('admin.layouts.master')
@section('title', 'Kullanıcı Düzenleme')
@section('content')
    <h1 class="page-header">Kullanıcı Düzenleme</h1>
    <h1 class="sub-header">Form</h1>
    <form mrole="form" method="post" enctype="multipart/form-data" action="{{ route('admin.user.detail', $user->id) }}">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="user_img">Profil Resmi</label>
                    <div class="column">
                        <div class="inner">
                            <a class="zooming"
                               @if($user->detail->user_img !=null )
                               href="{{$user->detail->user_img}}"
                               @else
                               href="http://via.placeholder.com/640x400?text=UrunResmi"
                               @endif
                               title="">
                                <div class="img-wrap">
                                    <img class="img-responsive" style="width: 100px"
                                         @if($user->detail->user_img !=null )
                                         src="{{ $user->detail->user_img}}"
                                         @else
                                         src="http://via.placeholder.com/640x400?text=UrunResmi"
                                            @endif>
                                    <br>
                                </div>
                            </a>
                        </div>
                    </div>
                    <input type="file" class="form-control" name="user_img" id="user_img" placeholder="Profil Resmi"
                           value="#">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="name">Ad Soyad</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Ad Soyad"
                           value="{{ $user->name }}"
                    >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="emai1">E-mail Adresi</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                           value="{{ $user->email }}"
                    >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="password">Yeni Parola</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Yeni Parola">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="password_confirmation">Yeni Parola (Tekrar)</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                           placeholder="Yeni Parola(Tekrar)">
                </div>
            </div>
            <div class="col-md-9">
                <label for="content">Özgeçmiş</label>
                <div class="form-group">
                    <textarea rows="9" cols="50" class="summernote"
                              name="content">{{ $user->detail->content }}</textarea>
                </div>
            </div>

        </div>
        <button style=" margin-right:auto;" type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection
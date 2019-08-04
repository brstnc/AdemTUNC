@extends('admin.layouts.master')
@section('title', 'Kullanıcı Düzenleme')
@section('content')
    <h1 class="page-header">Bilgi Düzenleme</h1>
    <h1 class="sub-header">Form</h1>
    <form mrole="form" method="post" enctype="multipart/form-data" action="{{ route('admin.company_detail') }}">
        {{ csrf_field() }}
        @include('admin.layouts.partials.errors')
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="company_img">Firma Logosu</label>
                    <div class="column">
                        <div class="inner">
                            <a class="zooming"
                               @if(isset($company_detail->company_img))
                                    href="{{ $company_detail->company_img}}"
                               @else
                                     href="#">
                                @endif
                                <div class="img-wrap">
                                    <img class="img-responsive" style="width: 100px"
                                         @if(isset($company_detail->company_img))
                                         src="{{ $company_detail->company_img}}"
                                         @else
                                         src="http://via.placeholder.com/640x400?text=UrunResmi"
                                            @endif>
                                    <br>
                                </div>
                            </a>
                        </div>
                    </div>
                    <input type="file" class="form-control" name="company_img" id="company_img"
                           placeholder="Firma Logosu"
                           value="#">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="address">Firma Adı</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Adres"
                           value="{{ $company_detail->name}}"
                    >
                </div>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Adres"
                           value="{{ $company_detail->address}}"
                    >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefon"
                           value="{{ $company_detail->phone }}"
                    >
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="fax" class="form-control" name="fax" id="fax" placeholder="Fax"
                           value="{{$company_detail->fax }}">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="facebook_url">Facebook Adresi</label>
                    <input type="text" class="form-control" name="facebook_url" id="facebook_url"
                           placeholder="Facebook Adresi" value="{{ $company_detail->facebook_url }}">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="twitter_url">Twitter Adresi</label>
                    <input type="text" class="form-control" name="twitter_url" id="twitter_url"
                           placeholder="Twitter Adresi" value="{{$company_detail->twitter_url }}">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="instagram_url">İnstagram Adresi</label>
                    <input type="text" class="form-control" name="instagram_url" id="instagram_url"
                           placeholder="İnstagram Adresi" value="{{$company_detail->instagram_url }}">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="youtube_url">Youtube Adresi</label>
                    <input type="text" class="form-control" name="youtube_url" id="youtube_url"
                           placeholder="Youtube Adresi"
                           value="{{ $company_detail->youtube_url }}">
                </div>
            </div>
        </div>
        <button style=" margin-right:auto;" type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection
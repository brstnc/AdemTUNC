@extends('front.partials.master')
@section('title', 'Ana Sayfa')
@section('content')
    <div class="cart-table-area section-padding-120">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-title">
                            <h2>ILETISIM</h2>
                        </div>
                        <form action="{{route('front.contact')}}" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="name" value="" placeholder="ISIM" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="last_name" value="" placeholder="SOYISIM" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="company_name" placeholder="FIRMA ISMI" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="EMAIL ADRESI" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control mb-3" id="phone" placeholder="NUMARA" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control mb-3" id="address" placeholder="ADRES" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="subject" placeholder="KONU" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="message" placeholder="MESAJ" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <a type="submit" class="btn amado-btn w-100">GÖNDER</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation_detail.css') }}">
@endsection
@section('content')
<div class="detail__container">
    <h2>予約詳細</h2>

    <p>店舗：{{ $reservation->shop->name }}</p>
    <p>日時：{{ $reservation->date }} {{ $reservation->time }}</p>
    <p>人数：{{ $reservation->number_of_people }}</p>

    <h3 class="mt-4">来店用QRコード</h3>
    <div style="width:400px; height:400px;">
        {!! QrCode::size(400)->generate($reservation->checkin_token) !!}
    </div>
    <p class="mt-3">来店時にこのQRコードを店舗に提示してください。</p>

    <a href="{{ route('user.reservations.index') }}" class="detail__btn">
        予約一覧に戻る
    </a>
</div>
@endsection

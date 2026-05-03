@extends('layouts.app')

@section('content')
<div class="container">
    <h2>予約詳細</h2>

    <p>店舗：{{ $reservation->shop->name }}</p>
    <p>日時：{{ $reservation->date }} {{ $reservation->time }}</p>
    <p>人数：{{ $reservation->number_of_people }}</p>

    <h3 class="mt-4">来店用QRコード</h3>

    {!! QrCode::size(200)->generate($reservation->checkin_token) !!}

    <p class="mt-3">来店時にこのQRコードを店舗に提示してください。</p>

    <a href="{{ route('user.reservations.index') }}" class="btn btn-secondary mt-3">
        予約一覧に戻る
    </a>
</div>
@endsection
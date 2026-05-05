@extends('layouts.app')

@section('content')
<h2>決済が完了しました</h2>

<p>予約が完了しました。</p>

<p>予約ID：{{ $reservation->id }}</p>
<p>金額：{{ number_format($reservation->price_at_booking) }}円</p>

<a href="{{ route('user.reservations.index') }}">予約一覧へ</a>
@endsection

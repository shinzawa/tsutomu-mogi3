@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/payment.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="payment__container">
<h2>決済がキャンセルされました</h2>

    <a href="{{ route('user.reservations.index') }}">予約一覧へ</a>
</div>
@endsection

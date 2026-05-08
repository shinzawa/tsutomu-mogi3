@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation_notify.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<dive class="menu__container">
    <div class="header__top">
        <div class="title__wrapper">
            <h1 class="title">予約通知メールの送信</h1>
        </div>
    </div>
    <form action="{{ route('owner.reservation.sendNotify', $reservation->id) }}" method="post">
        @csrf

        <div class="input__wrapper">
            <label class="form-label">宛先</label>
            <input type="email" class="form-control" value="{{ $reservation->user->email }}" disabled>
        </div>
        <div class="input__wrapper">
            <label class="form-label">件名</label>
            <input type="text" class="form-control" name="subject" value="{{ old('subject', '予約に関するお知らせ') }}">
        </div>

        <div class="input__wrapper">
            <label class="form-label">本文</label>
            <textarea class="form-control" name="message" rows="8">{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn-primary">送信する</button>
    </form>
 @endsection

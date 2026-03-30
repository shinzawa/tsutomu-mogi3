@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css')}}">
<!-- Font Awesome CDN (アイコン用) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('link')
@endsection

@section('content')
<div class="login-form">
    <form class="login-form__form" action="/login" method="post">
        @csrf
        <div class="login-form__heading">
            Login
        </div>
        <div class="login-form__group">
            <i class="fas fa-envelope"></i> <!-- メールアイコン -->
            <input class="login-form__input" type="mail" placeholder="Email" name="email" id="email">
            <p class="login-form__error-message">
                @error('email')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="login-form__group">
            <i class="fas fa-lock"></i> <!-- パスワードアイコン -->
            <input class="login-form__input" type="password" placeholder="Password" name="password" id="password">
            <p class="login-form__error-message">
                @error('password')
                {{ $message }}
                @enderror
            </p>
        </div>
        <button class="login-form__btn" type="submit" value="ログイン">ログイン</button>
    </form>
</div>
@endsection('content')

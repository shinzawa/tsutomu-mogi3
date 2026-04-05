@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css')}}">
<!-- Font Awesome CDN (アイコン用) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('link')
@endsection

@section('content')
<div class="register-form">
    <form class="register-form__form" action="/register" method="post">
        @csrf
        <div class="register-form__heading">
            Registration
        </div>
        <div class="register-form__group">
            <i class="fas fa-user"></i> <!-- ユーザー名アイコン -->
            <input class="register-form__input" type="text" placeholder="Username" name="name" id="name">
            <p class="register-form__error-message">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-form__group">
            <i class="fas fa-envelope"></i> <!-- メールアイコン -->
            <input class="register-form__input" type="mail" placeholder="Email" name="email" id="email">
            <p class="register-form__error-message">
                @error('email')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-form__group">
            <i class="fas fa-lock"></i> <!-- パスワードアイコン -->
            <input class="register-form__input" type="password" placeholder="Password" name="password" id="password">
            <p class="register-form__error-message">
                @error('password')
                {{ $message }}
                @enderror
            </p>
        </div>
        <button class="register-form__btn" type="submit" value="登録">登録</button>
    </form>
</div>
@endsection('content')

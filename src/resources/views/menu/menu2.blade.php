@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/menu.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="menu__container">
    <a href="{{ route('shop.index') }}" class="menu__btn">Home</a>
    <a href="{{ route('register') }}" class="menu__btn">Registration</a>
    <a href="{{ route('login') }}" class="menu__btn">Login</a>
</div>
@endsection('content')

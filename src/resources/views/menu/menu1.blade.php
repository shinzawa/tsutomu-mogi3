@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/menu.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="menu__container">
    <a href="{{ route('shop.index') }}" class="menu__btn">Home</a>
    <a href="{{ route('logout') }}" class="menu__btn">Logout</a>
    <a href="{{ route('shop.mypage') }}" class="menu__btn">Mypage</a>
</div>
@endsection('content')

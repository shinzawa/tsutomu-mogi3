@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/menu.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="menu__container">
    <a href="{{ route('shop.index') }}" class="menu__btn">Home</a>
    <form method="POST" action="{{ route('logout') }}" >
        @csrf
        <button type="submit" class="menu__btn">Logout</button>
    </form>
    <a href="{{ route('shop.mypage') }}" class="menu__btn">Mypage</a>
</div>
@endsection('content')
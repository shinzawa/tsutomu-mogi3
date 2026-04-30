@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/menu.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="menu__container">
    <a href="/admin/owners" class="menu__btn">Owner List</a>
    <a href="/admin/shops" class="menu__btn">Shop List</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="menu__btn">Logout</button>
    </form>
</div>
@endsection('content')

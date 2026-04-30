@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/owner_menu.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="menu__container">
    <a href="/owner/dashboard" class="menu__btn">Dashboard</a>
    <a href="/owner/shop/create" class="menu__btn">Create Shop Information</a>
    <a href="/owner/shop/edit" class="menu__btn">Edit Shop Information</a>
    <a href="/owner/reservations" class="menu__btn">Reservation List</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="menu__btn">Logout</button>
    </form>
</div>
@endsection('content')

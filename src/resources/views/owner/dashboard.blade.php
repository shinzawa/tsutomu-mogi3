@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/owner_dashboard.css')}}">
@endsection

@section('link')
@endsection

@section('content')

<div class="menu__container">

    <div class="header__top">
        <div class="title__wrapper">
            <h1 class="title">Shop Owner Dashboard</h1>
        </div>
    </div>
    <div class="card__container">
        <h3>{{ $shop->name }}</h3>
        <p>Today's reservation count: {{ $todayCount }}</p>
        <p>This week's reservation count: {{ $weekCount }}</p>
        <div class="button__container">
            <a href="{{ route('owner.shop.create') }}" class="btn-primary">Create shop information</a>
            <a href="{{ route('owner.shop.edit') }}" class="btn-primary">Edit shop information</a>
            <a href="{{ route('owner.reservations.index') }}" class="btn-secondary">View reservation list</a>
            <a href="{{ route('owner.checkin.scan') }}">Checkin</a>
        </div>
    </div>
</div>
@endsection

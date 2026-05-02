@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation_index.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="menu__container">
    <div class="header__top">
        <div class="title__wrapper">
            <h1 class="title">Reservation List</h1>
        </div>
    </div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Customer Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Number of People</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservations as $r)
        <tr>
            <td>{{ $r->user->name }}</td>
            <td>{{ $r->date }}</td>
            <td>{{ $r->time }}</td>
            <td>{{ $r->number_of_people }}</td>
            <td>{{ $r->user->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection

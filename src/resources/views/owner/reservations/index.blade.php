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
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->time }}</td>
                <td>{{ $reservation->number_of_people }}</td>
                <td>{{ $reservation->user->email }}</td>
                <td>
                    <a href="{{ route('owner.reservation.notifyForm', $reservation->id) }}"
                        class="btn btn-sm btn-primary">
                        メール送信
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('title', 'mypage')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="reservation__wrapper">
        <p class="reservation__title">予約状況</p>
        @foreach($reservations as $reservation)
        <div class="reservation__items">
            <div class="table__wrapper">
                <table>
                    <tr>
                        <th>Shop</th>
                        <td id="display-shop">{{$reservation->shop->name}}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td id="display-date">{{$reservation->date}}</td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td id="display-time">{{$reservation->time}}</td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td id="display-number">{{$reservation->number_of_people}}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endforeach
    </div>
    <div class="shop">
        <div class="shop__right">
            @foreach($shops as $shop)
            <div class="shop__name-wrapper">
                <p class="shop__name">{{$shop->name}}</p>
            </div>
            <img src="{{ \Storage::url($shop->img_url) }}" class="shop__img" alt="店舗画像">
            <div class="shop__content">
                <div class="shop__details">
                    <p class="shop__area">#{{$shop->area}}</p>
                    <p class="shop__genre">#{{$shop->genre}}</p>
                </div>
            </div>
            <div class="shop__card-footer">
                <div class="shop__button-wrapper">
                    <a href="/detail/{{$shop->id}}">
                        <button class="shop__button">詳しく見る</button>
                    </a>
                </div>
                <span style="color: #eeeeee" class="shop__heart">&hearts;</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

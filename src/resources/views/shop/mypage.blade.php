@extends('layouts.app')

@section('title', 'mypage')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<!-- CDN経由でスクリプトを読み込み -->

@endsection

@section('content')

<div class="container">
    <div class="reservation__wrapper">
        <p class="reservation__title">予約状況</p>
        @foreach($reservations as $index => $reservation)
        <div class="reservation__items">
            <div class="reservation__top">
                <div class="reservation__header">
                    <div class="clock__wrapper">
                        <div class="clock">
                            <div class="hand hour"></div>
                            <div class="hand minute"></div>
                        </div>
                    </div>
                    <p class="reservation__name">予約{{$index + 1}}</p>
                </div>
                <div class="reservation__cancel-wrapper">
                    <a href="/cancel/{{ $reservation->id }}">
                        <button class="reservation__cancel-button">
                            <div class="circle-cross"></div>
                        </button>
                    </a>
                </div>
            </div>
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
        <p class="shop__subtitle">{{$user->name}}さん
        </p>
        <p class="shop__title">お気に入り店舗</p>
        <div class="shop__right">
            @foreach($shops as $shop)
            <div class="shop__card">

                <img src="{{ \Storage::url($shop->img_url) }}" class="shop__img" alt="店舗画像">
                <div class="shop__content">
                <div class="shop__name-wrapper">
                    <p class="shop__name">{{$shop->name}}</p>
                </div>
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
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

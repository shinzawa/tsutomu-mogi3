@extends('layouts.app')

@section('title', 'detail')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="shop">
        <div class="shop__left">
            <div class="shop__name-wrapper">
                <a href="/">
                    <button class="shop__button">
                        &lt;
                    </button>
                </a>
                <p class="shop__name">{{$shop->name}}</p>
            </div>
            <img src="{{ \Storage::url($shop->img_url) }}" class="shop__img" alt="店舗画像">
            <div class="shop__content">
                <div class="shop__details">
                    <p class="shop__area">#{{$shop->area}}</p>
                    <p class="shop__genre">#{{$shop->genre}}</p>
                </div>
                <p class="shop__description">{{$shop->description}}</p>
            </div>
            <div class="shop__card-footer">
                <div class="shop__button-wrapper">
                </div>
                <span style="color: #eeeeee" class="shop__heart">&hearts;</span>
            </div>
        </div>
        <div class="reservation__card">
            <form class="form" action="/reservation" method="POST">
                @csrf
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                <div class="reservation__wrapper">
                    <p class="reservation__title">予約</p>
                    <input class="date__input" type="date" name="date" id="input-date"">
                    </input>
                    <div class=" select-wrapper">
                    <select name="time" class="time__select" id="input-time">
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                    </select>
                </div>
                <div class="select-wrapper">
                    <select name="number_of_people" class="people__select" id="input-people">
                        <option value="1">1人</option>
                        <option value="2">2人</option>
                        <option value="3">3人</option>
                        <option value="4">4人</option>
                        <option value="5">5人</option>
                        <option value="6">6人</option>
                        <option value="7">7人</option>
                        <option value="8">8人</option>
                        <option value="9">9人</option>
                        <option value="10">10人</option>
                    </select>
                </div>
                <div class="reservation__items">
                    <div class="table__wrapper">
                        <table>
                            <tr>
                                <th>Shop</th>
                                <td id="display-shop">{{$shop->name}}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td id="display-date">2021/04/01</td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td id="display-time">17:00</td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td id="display-number">1人</td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
        <button class="reservation__button" type="submit">予約する</button>
        </form>
    </div>
</div>
<script src="{{ asset('/js/detail.js') }}"></script>
@endsection

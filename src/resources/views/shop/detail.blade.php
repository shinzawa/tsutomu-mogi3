@extends('layouts.app')

@section('title', 'Rese Home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="shop">
        <div class="shop__left">
            <div class="shop__name-wrapper">
                <a href="/detail /{{$shop->id}}">
                    <button class="shop__button">詳しく見る</button>
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
            <p class="reservation__title">予約</p>
            <form action="/reserve" method="POST">
            <input class="date__input" type="date" name="date">
            </input>
            <input class="time__input" type="time" name="time">
            </input>
            <input class="people__input" type="number" name="people">
            </input>
            <div class="shop__info">

            </div>
            <button class="reservation__button" type="submit">予約する</button>
            </form>
    </div>
</div>
@endsection

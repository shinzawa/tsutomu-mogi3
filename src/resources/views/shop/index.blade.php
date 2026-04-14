@extends('layouts.app')

@section('title', 'Rese Home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<!-- Font Awesome CDN (アイコン用) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('content')

<div class="container">
    <div class="shops">
        @foreach ($shops as $shop)

        <div class="shop__card">
            <img src="{{ \Storage::url($shop->img_url) }}" class="shop__img" alt="店舗画像">
            <div class="shop__content">
                <p class="shop__name">{{$shop->name}}</p>
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
                <form action="/like-toggle" method="POST">
                     @csrf
                     <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                     <button type="submit" class="shop__like-button">
                        @if(in_array($shop->id, $favoriteShopIds))
                        <span class="shop__red-heart">&hearts;</span>
                        @else
                        <span class="shop__heart">&hearts;</span>
                        @endif
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

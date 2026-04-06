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
                <span style="color: #eeeeee" class="shop__heart">&hearts;</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection

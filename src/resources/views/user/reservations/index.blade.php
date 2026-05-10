@extends('layouts.app')

@section('title', 'user.reservations.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<!-- CDN経由でスクリプトを読み込み -->

@endsection

@section('content')

<div class="container">
    <div class="reservation__wrapper">
        <p class="reservation__title">予約状況</p>
        @if($reservations->isEmpty())
        <p class="no-reservations">予約はありません</p>
        @else
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
                    <form action="/reservation/cancel/{{ $reservation->id }}" method="POST">
                        @csrf
                        <button class="reservation__cancel-button">
                            <div class="circle-cross"></div>
                        </button>
                    </form>
                </div>
            </div>
            <div class="table__wrapper">
                <table>
                    <form action="/reservation/update/{{ $reservation->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="ship_id" value="{{$reservation->shop->id}}">
                        <tr>
                            <th>Shop</th>
                            <td>{{$reservation->shop->name}}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>
                                <input class="date__input" type="date" name="date" value="{{ $reservation->date }}">
                                <div class="form__error">
                                    @error('date')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>
                                <div class=" select-wrapper">
                                    <select name="time" class="time__select" id="input-time">
                                        @php $selected_time = $reservation->time;@endphp
                                        @foreach(['17:00', '18:00', '19:00', '20:00'] as $time)
                                        <option value="{{ $time }}" {{ str_starts_with($selected_time, $time) ? 'selected' : '' }}>
                                            {{ $time }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="form__error">
                                        @error('time')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Number</th>
                            <td>
                                <select class="people__select" name="number_of_people">
                                    @for($i = 1; $i <= 10; $i++)
                                        @php $number_of_people=(int)$reservation->number_of_people; @endphp
                                        <option value="{{ $i }}" {{ $i == $number_of_people ? 'selected' : '' }}>
                                            {{ $i }}人
                                        </option>
                                        @endfor
                                </select>
                                <div class="form__error">
                                    @error('number_of_people')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <div class="update-btn__wrapper">
                                    <button type="submit" class="update-btn">更新する</button>
                                </div>

                            </td>
                        </tr>
                    </form>
                    <tr>
                        <th>Detail</th>
                        <td>
                            <a href="{{ route('user.reservations.show', $reservation->id) }}" class="detail-link">
                                詳細を見る
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Review</th>
                        <td>
                            @if ($reservation->checkin_time && !$reservation->review)
                            <a href="{{ route('review.create', $reservation->id) }}">
                                評価する
                            </a>
                            @endif

                            @if ($reservation->review)
                            <span>評価済み</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Payment</th>
                        <td>
                            <form action="{{ route('payment.create', $reservation->shop->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    予約して支払う（{{ number_format($reservation->shop->price) }}円）
                                </button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="shop">
        <p class="shop__subtitle">{{$user->name}}さん
        </p>
        <p class="shop__title">お気に入り店舗</p>
        <div class="shop__right">
            @if($shops->isEmpty())
            <p class="no-favorites">お気に入り店舗はありません</p>
            @else
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
                    @if(in_array($shop->id, $favoriteShopIds))
                    <span class="shop__red-heart">&hearts;</span>
                    @else
                    <span class="shop__heart">&hearts;</span>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

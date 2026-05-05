@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css')}}">
@endsection

@section('content')
<h2>評価する</h2>



<form action="{{ route('review.store', $reservation->id) }}" method="POST">
    @csrf

    <div class="rating">
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5">★</label>

        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4">★</label>

        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3">★</label>

        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2">★</label>

        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1">★</label>
    </div>

    <div style="margin-top:20px;">
        <textarea name="comment" rows="4" style="width:100%;" placeholder="コメント（任意）"></textarea>
    </div>

    <button type="submit" style="margin-top:20px;">送信</button>
</form>
@endsection

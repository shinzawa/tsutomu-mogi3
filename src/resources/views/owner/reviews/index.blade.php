@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="review__container">
<h2>レビュー一覧</h2>

@foreach ($reviews as $review)
<div style="margin-bottom:20px; border-bottom:1px solid #ccc; padding-bottom:10px;">
    <strong>{{ $review->user->name }}</strong> さん
    <span>評価: {{ str_repeat('★', $review->rating) }}</span>

    <p>{{ $review->comment }}</p>

    <small>
        予約日時: {{ $review->reservation->reserved_at }}
        評価日時: {{ $review->created_at }}
    </small>
</div>
@endforeach
</div>
@endsection

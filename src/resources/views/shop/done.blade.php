@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="done__container">
    <h1>ご予約ありがとうございます</h1>
    <a href="{{ route('login') }}" class="done__btn">戻る</a>
</div>
@endsection('content')

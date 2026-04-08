@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="thanks__container">
    <h1>会員登録ありがとうございます</h1>
    <a href="{{ route('login') }}" class="thanks__btn">ログインする</a>
</div>
@endsection('content')

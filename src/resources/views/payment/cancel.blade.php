@extends('layouts.app')

@section('content')
<h2>決済がキャンセルされました</h2>

<a href="{{ route('user.reservations.index') }}">予約一覧へ</a>
@endsection

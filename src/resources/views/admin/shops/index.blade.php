@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_index.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="menu__container">
    <div class="header__top">
        <div class="title__wrapper">
            <h1 class="title">Shop List</h1>
        </div>
        <div class="back__wrapper">
            <a href="/admin/menu">
                <button class="back-btn">
                    <div class="circle-cross"></div>
                </button>
            </a>
        </div>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ショップ名</th>
                <th>オーナー</th>
                <th>作成日</th>
                <th>詳細</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($shops as $shop)
            <tr>
                <td>{{ $shop->id }}</td>
                <td>{{ $shop->name }}</td>
                <td>{{ $shop->owner->name ?? '未設定' }}</td>
                <td>{{ $shop->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('shop.detail', $shop->id) }}" class="admin-link">
                        詳細
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

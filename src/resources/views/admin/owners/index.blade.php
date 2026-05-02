@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/owner_list.css')}}">
@endsection

@section('link')
@endsection
@section('content')
<div class="menu__container">
    <div class="header__top">
        <div class="title__wrapper">
            <h1 class="title">Owner List</h1>
        </div>
    </div>
    <a href="{{ route('admin.owners.create') }}" class="menu__btn">
        Add Owner
    </a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Assigned Shop</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($owners as $owner)
            <tr>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->email }}</td>
                <td>{{ optional($owner->shop)->name ?? '未設定' }}</td>
                <td>{{ $owner->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">店舗代表者の作成</h1>

    <form action="{{ route('admin.owners.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">名前</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">メール</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">パスワード</label>
            <input type="password" name="password" class="form-control">
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">作成する</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_create.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="menu__container">
    <div class="header__top">
        <div class="title__wrapper">
            <h1 class="title">Create Shop Information</h1>
        </div>
        <div class="back__wrapper">
            <a href="/owner/menu">
                <button class="back-btn">
                    <div class="circle-cross"></div>
                </button>
            </a>
        </div>
    </div>
<div class="form__wrapper">
        <form action="{{ route('owner.shop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input__wrapper">
                <label class="form-label">Shop Name</label>
                <input type="text" name="name" class="form-control" required>
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror            </div>
            <div class="input__wrapper">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>
                @error('address') <div class="text-danger">{{ $message }}</div> @enderror
            <p style="color: #666;">
                ※ Area (Region) is automatically determined from the address
            </p>
            <div class="input__wrapper">
                <label class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control">
                @error('genre') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="textarea__input">
                <label class="form-label">Description</label>
                <textarea name="description" class="textarea-control" rows="4">{{ old('description') }}</textarea>
                @error('description') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="input__wrapper">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @error('image') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
@endsection

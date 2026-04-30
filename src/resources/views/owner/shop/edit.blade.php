@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_edit.css')}}">
@endsection

@section('link')
@endsection

@section('content')
<div class="menu__container">
    <div class="header__top">
        <div class="title__wrapper">
            <h1 class="title">Edit Shop Information</h1>
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
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('owner.shop.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input__wrapper">
                <label class="form-label">Shop Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $shop->name) }}" \>
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="input__wrapper">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $shop->address) }}">
                @error('address') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="input__wrapper">
                <label class="form-label">Area</label>
                <input type="text" class="form-control" value="{{ $shop->area }}" disabled>
            </div>
            <div class="input__wrapper">
                <label class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control">
                @error('genre') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="textarea__input">
                <label class="form-label">Description</label>
                <textarea name="description" class="textarea-control" rows="4">{{ old('description', $shop->description) }}</textarea>
                @error('description') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="input__wrapper">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @if($shop->img_url)
                <img src="{{ asset('storage/' . $shop->img_url) }}" class="mt-2" width="200">
                @endif
                @error('image') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

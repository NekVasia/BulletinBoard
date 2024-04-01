@extends('layouts.app')

@section('title', 'Добавление объявления :: Мои объявления')

@section('content')
<form action="{{ route('bb.store') }}" method="POST">
    @csrf
    <div class="section__input__create">
        <p class="p__input">Название:</p>
        <input name="title" id="txtTitle" class="input__create @error('title') is-invalid @enderror" value="{{ old('title') }}">
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="section__input__create">
        <p class="p__input">Описание:</p>
        <input name="content" id="txtContent" class="input__create__about @error('content') is-invalid @enderror" value="{{ old('content') }}">
        @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="section__input__create">
        <p class="p__input">Цена:</p>
        <input name="price" id="txtPrice" class="input__create @error('title') is-invalid @enderror" value="{{ old('price') }}">
        @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="section__picture">
        <input name="image" id="txtImage" class="product__image @error('title') is-invalid @enderror" value="{{ old('image') }}">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <button class="button">Загрузить фото</button>
    </div>
    <div class="section__save">
        <input type="submit" class="button__save" value="Сохранить">
    </div>
</form>
@endsection('content')

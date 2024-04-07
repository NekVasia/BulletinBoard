@extends('layouts.app')

@section('title', 'Изменение объявления')

@section('content')
<form action="{{ route('bb.update', ['bb' => $bb->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="section__input__create">
        <p class="p__input">Название:</p>
        <input name="title" id="txtTitle" class="input__create @error('title') is-invalid @enderror" value="{{ old('title', $bb->title) }}">
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="section__input__create">
        <p class="p__input">Описание:</p>
        <input name="content" id="txtContent" class="input__create__about @error('content') is-invalid @enderror" value="{{ old('content', $bb->content) }}">
        @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="section__input__create">
        <p class="p__input">Цена:</p>
        <input name="price" id="txtPrice" class="input__create @error('title') is-invalid @enderror" value="{{ old('price', $bb->price) }}">
        @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="section__picture">
        <div class="product__image">
            <img class="product__image" src="{{ Storage::url($bb->image) }}">
        </div>
        <input type="file" name="image" class="button">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="section__save">
        <input type="submit" class="button__save" value="Изменить">
    </div>
</form>
@endsection('content')

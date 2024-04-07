@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    @if(count($bbs) > 0)
        @foreach($bbs as $bb)
        <section class="product">
            <div class="product__block">
                <div class="product__image">
                    <img class="product__image" src="{{ Storage::url($bb->image) }}">
                </div>
                <button class="product__phone">{{ $bb->user->phone }}</button>
            </div>
            <div class="product__block product__block__grow">
                <div class="product__cell">
                    <div class="product__cell__description">
                        <div class="product__title">{{ $bb->title }}</div>
                        <div class="product__about">{{ $bb->content }}</div>
                    </div>
                    <div class="product__sum">{{ $bb->price }}</div>
                </div>
                <div class="product__name">{{ $bb->user->name }}</div>
            </div>
        </section>
        @endforeach
    @endif
@endsection('content')



@extends('layouts.app')

@section('title', 'Мои объявления')

@section('content')
    @if(count($bbs) > 0)
        <p class="product__create__button"><a href="{{ route('bb.create') }}">Добавить объявление</a></p>
        @foreach($bbs as $bb)
        <section class="product">
            <div class="product__block">
                <img class="product__image" src="{{ Storage::url($bb->image) }}">
            </div>
            <div class="product__block product__block__grow">
                <div class="product__cell">
                    <div class="product__cell__description">
                        <div class="product__title">{{ $bb->title }}</div>
                        <div class="product__about">{{ $bb->content }}</div>
                    </div>
                    <div class="product__sum">{{ $bb->price }}</div>
                </div>
                <div class="product__button">
                    <a class="button" href="{{ route('bb.edit', ['bb' => $bb->id]) }}">Изменить</a>
                    <a class="button" href="{{ route('bb.delete', ['bb' => $bb->id]) }}">Удалить</a>
                </div>
            </div>
        </section>
        @endforeach
    @endif
@endsection('content')



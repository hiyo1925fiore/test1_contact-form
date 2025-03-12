@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="#" method="post">
        <div class="form__group">
            <div class="form__group-title">
                <p class="form__label--item">お名前</p>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--name">
                    <input class="form__input--name-content" type="text" name="last_name" placeholder="例：山田">
                    <input class="form__input--name-content" type="text" name="first_name" placeholder="例：太郎">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <p class="form__label--item">性別</p>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--gender">
                    <input type="radio" name="gender" value="男性" checked>
                    <label for="男性">男性</label>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
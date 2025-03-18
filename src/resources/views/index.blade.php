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
    <form class="form" action="{{ route('contact.confirm') }}" method="post">
        @csrf
        <!-- 名前入力欄 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--name">
                    <input class="form__input--name-content" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田">
                    <input class="form__input--name-content" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎">
                </div>
                <div class="form__error">
                    @if ($errors->has('last_name') && $errors->has('first_name'))
                        @error('last_name')
                        {{ $message }}
                        @enderror
                        <br>
                        @error('first_name')
                        {{ $message }}
                        @enderror
                    @elseif ($errors->has('last_name'))
                        @error('last_name')
                        {{ $message }}
                        @enderror
                    @elseif ($errors->has('first_name'))
                        @error('first_name')
                        {{ $message }}
                        @enderror
                    @else
                    <!-- 入力値にエラーが無い場合は処理をしない -->
                    @endif
                </div>
            </div>
        </div>

        <!-- 性別選択 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--gender">
                    <div class="form__input-inner--gender">
                        <input type="radio" id="button-1" name="gender" value="1" checked>
                        <label for="button-1">男性</label>
                    </div>
                    <div class="form__input-inner--gender">
                        <input type="radio" id="button-2" name="gender" value="2">
                        <label for="button-2">女性</label>
                    </div>
                    <div class="form__input-inner--gender">
                        <input type="radio" id="button-3" name="gender" value="3">
                        <label for="button-3">その他</label>
                    </div>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <!-- メールアドレス入力欄 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@examle.com">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <!-- 電話番号入力欄 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--tel">
                    <input class="form__input--tel-content" type="text" name="tel1" value="{{ old('tel1') }}" placeholder="080">
                    <span class="form__input--tel-hyphen">&#45;</span>
                    <input class="form__input--tel-content" type="text" name="tel2" value="{{ old('tel2') }}" placeholder="1234">
                    <span class="form__input--tel-hyphen">&#45;</span>
                    <input class="form__input--tel-content" type="text" name="tel3" value="{{ old('tel3') }}" placeholder="5678">
                </div>
                <div class="form__error">
                    @if ($errors->has('tel1'))
                        @error('tel1')
                        {{ $message }}
                        @enderror
                    @elseif ($errors->has('tel2'))
                        @error('tel2')
                        {{ $message }}
                        @enderror
                    @elseif ($errors->has('tel3'))
                        @error('tel3')
                        {{ $message }}
                        @enderror
                    @else
                    <!-- 入力値にエラーが無い場合は処理をしない -->
                    @endif
                </div>
            </div>
        </div>

        <!-- 住所入力欄 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <!-- 建物入力欄 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101">
                </div>
            </div>
        </div>

        <!-- お問い合わせの種類選択欄 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select">
                    <select name="category_id">
                        <option value="" hidden>選択してください</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <!-- お問い合わせ内容記入欄 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail"  placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <!-- 確認画面ボタン -->
        <div class="form__button">
            <button class="form__button-submit"type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection
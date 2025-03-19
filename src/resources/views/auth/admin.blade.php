@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('auth__button')
@if (Auth::check())
    <form class="form" action="/logout" method="post">
        @csrf
        <button class="logout__button">logout</button>
    </form>
@endif
@endsection

@section('content')
<p>admin</p>
@endsection
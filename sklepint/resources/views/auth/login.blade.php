@extends('layouts.layout')
@section('content')
    <h2>Logowanie</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Adres e-mail:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required class="form-control">
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Zapamiętaj mnie</label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Zaloguj się</button>
            <a href="{{ route('register') }}" class="btn btn-primary">Zarejestruj się</a>
        </div>
    </form>
@endsection

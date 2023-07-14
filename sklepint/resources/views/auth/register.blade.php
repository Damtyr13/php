@extends('layouts.layout')
@section('content')
    <h2>Rejestracja</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nazwa użytkownika:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Adres e-mail:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Powtórz hasło:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Zarejestruj się</button>
            <a href="{{ route('login') }}" class="btn btn-primary">Zaloguj się</a>
        </div>
    </form>
@endsection

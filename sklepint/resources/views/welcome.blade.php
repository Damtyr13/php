@extends('layouts.layout')

@section('content')
    <h2>Witaj w naszym sklepie internetowym!</h2>

    <p>Zapraszamy do zakupów. Zaloguj się lub zarejestruj, aby korzystać z pełnej funkcjonalności naszego sklepu.</p>
    <p>Przykładowy admin na cele projektu email: Admin@gmail.com hasło: Admin123</p>
    <div>
        <a href="{{ route('login') }}" class="btn btn-primary">Zaloguj się</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Zarejestruj się</a>
    </div>
@endsection

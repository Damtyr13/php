@extends('layouts.layout')

@section('content')
    <h2>Formularz zamówienia:</h2>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Imię i nazwisko:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adres e-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Adres dostawy:</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Zapisz zamówienie</button>
    </form>
@endsection

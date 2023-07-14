@extends('layouts.layout')

@section('content')
    <h2>Lista zamówień:</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Numer zamówienia</th>
                <th>Imię i nazwisko</th>
                <th>Adres e-mail</th>
                <th>Adres dostawy</th>
                <th>Data utworzenia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

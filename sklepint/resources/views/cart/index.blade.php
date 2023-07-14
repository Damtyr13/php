@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Twój koszyk:</h2>
        
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Ilość</th>
                <th>Cena</th>
                <th>Łączny koszt</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $groupedItems = $cartItems->groupBy('product.name');
            @endphp

            @foreach ($groupedItems as $productName => $items)
                @php
                    $totalQuantity = $items->sum('quantity');
                    $productPrice = $items[0]->product->price;
                    $totalCost = $productPrice * $totalQuantity;
                @endphp

                <tr>
                    <td>{{ $productName }}</td>
                    <td>{{ $totalQuantity }}</td>
                    <td>{{ $productPrice }} Zł</td>
                    <td>{{ $totalCost }} Zł</td>
                    <td>
                        <form action="{{ route('cart.removeFromCart', $items[0]->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td><strong>Suma:</strong></td>
                <td><strong>{{ $cartItems->sum(function ($item) {
                            return $item->product->price * $item->quantity;
                        }) }} Zł</strong></td>
            </tr>
            <tr>
                <td colspan="5" class="text-end">
                    <form action="{{ route('orders.create') }}" method="GET">
                        <button type="submit" class="btn btn-primary">Złóż zamówienie</button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection

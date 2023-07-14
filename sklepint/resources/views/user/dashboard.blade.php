@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Witaj, {{ auth()->user()->name }}!</h1>

        <h2>Produkty:</h2>
        <table>
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Cena</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} zł</td>
                        <td>
                            <form action="{{ route('cart.addToCart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary">Dodaj do koszyka</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
       
    </div>
@endsection

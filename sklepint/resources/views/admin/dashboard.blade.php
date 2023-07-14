@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Produkty</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Cena</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Dodaj nowy produkt</h2>

        <form action="{{ route('admin.products.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Cena:</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>

            

            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection

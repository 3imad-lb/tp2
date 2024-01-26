<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Liste des Produits</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Marque</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->libelle }}</td>
                    <td>{{ $product->marque }}</td>
                    <td>{{ $product->prix }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

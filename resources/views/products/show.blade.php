<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Détails du Produit</h2>

    <p><strong>ID:</strong> {{ $product->id }}</p>
    <p><strong>Libellé:</strong> {{ $product->libelle }}</p>
    <p><strong>Marque:</strong> {{ $product->marque }}</p>
    <p><strong>Prix:</strong> {{ $product->prix }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>

    @if ($product->image)
        <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" style="max-width: 300px;">
    @endif

    <p>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Modifier</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </p>
@endsection


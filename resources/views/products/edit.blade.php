<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Modifier le Produit</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="libelle">Libellé:</label>
        <input type="text" name="libelle" value="{{ $product->libelle }}" required>
        
        <label for="marque">Marque:</label>
        <input type="text" name="marque" value="{{ $product->marque }}" required>
        
        <label for="prix">Prix:</label>
        <input type="number" name="prix" value="{{ $product->prix }}" step="0.01" required>
        
        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="{{ $product->stock }}" required>
        
        <label for="image">Image:</label>
        <input type="file" name="image">

        <button type="submit">Modifier</button>
    </form>
@endsection

<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Créer un Produit</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="libelle">Libellé:</label>
        <input type="text" name="libelle" required>
        
        <label for="marque">Marque:</label>
        <input type="text" name="marque" required>
        
        <label for="prix">Prix:</label>
        <input type="number" name="prix" step="0.01" required>
        
        <label for="stock">Stock:</label>
        <input type="number" name="stock" required>
        
        <label for="image">Image:</label>
        <input type="file" name="image">

        <button type="submit">Créer</button>
    </form>
@endsection

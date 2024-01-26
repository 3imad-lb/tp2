<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
        session()->flash('success', 'Le produit a été créé avec succès!');

    }

    public function create()
    {
        return view('products.create');
        session()->flash('success', 'Le produit a été créé avec succès!');

    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'marque' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer|between:1,9999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product($request->all());

        // Gérer l'upload de l'image s'il y en a une
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();
        session()->flash('success', 'Le produit a été créé avec succès!');

        return redirect()->route('products.show', $product->id)->with('success', 'Le produit a été créé avec succès!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
        session()->flash('success', 'Le produit a été créé avec succès!');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
        session()->flash('success', 'Le produit a été créé avec succès!');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string',
            'marque' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer|between:1,9999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        $request->validate([
            'libelle' => 'required|string',
            'marque' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer|between:1,9999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
            $product->save();
        }
        session()->flash('success', 'Le produit a été créé avec succès!');

        return redirect()->route('products.show', $product->id)->with('success', 'Le produit a été mis à jour avec succès!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('success', 'Le produit a été créé avec succès!');

        return redirect()->route('products.index')->with('success', 'Le produit a été supprimé avec succès!');
    }
}


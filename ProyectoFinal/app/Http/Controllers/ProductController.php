<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('products', 'public');
            $data['imagen'] = $imagenPath;
        }
    
        Product::create($data);
    
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('products', 'public');
            $data['imagen'] = $imagenPath;
        }
    
        $product->update($data);
    
        return redirect()->route('products.index')->with('success', 'Producto actualizado.');
    }
    

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado.');
    }
}

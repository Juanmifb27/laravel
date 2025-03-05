@extends('layout')

@section('content')
<h3>Editar Producto</h3>
<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" name="price" value="{{ $product->price }}" step="0.01" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Imagen</label>
        <input type="file" name="image" class="form-control">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen actual" class="img-fluid mt-2" width="150">
        @endif
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>

<a href="{{ route('products.index') }}" class="btn btn-danger mt-5">Volver al Inicio</a>

@endsection

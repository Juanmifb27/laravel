@extends('layout')

@section('content')
<h3>Crear Producto</h3>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" name="price" step="0.01" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Imagen</label>
        <input type="file" name="imagen" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    
</form>
<a href="{{ route('products.index') }}" class="btn btn-danger mt-5">Volver al Inicio</a>

@endsection

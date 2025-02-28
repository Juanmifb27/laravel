@extends('layout')

@section('content')
    <div class="container text-center">
        <h1>{{ $product->name }}</h1>
        <p><strong>Descripción:</strong> {{ $product->description ?? 'Sin descripción' }}</p>
        <p><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>

        @if($product->imagen)
            <img src="{{ asset('storage/' . $product->imagen) }}" class="img-fluid" alt="Imagen del producto" width="200">
        @else
            <p>No hay imagen disponible.</p>
        @endif

        <br>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>

        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
        </form>
    </div>
@endsection

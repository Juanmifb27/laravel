@extends('layout')

@section('content')
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Nuevo Producto</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>
                @if($product->imagen)
                    <img src="{{ asset('storage/' . $product->imagen) }}" alt="Imagen del producto" width="100">
                @else
                    No hay imagen
                @endif
            </td>
            <td>{{ $product->name }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>
                <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

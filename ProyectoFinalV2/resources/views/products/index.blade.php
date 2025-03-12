@extends('layout')

@section('content')
@auth
    <!-- Mostrar el botón "Nuevo Producto" solo si el usuario está autenticado -->
    <a href="{{ route('products.create') }}" class="btn btn-primary mt-3">Nuevo Producto</a>
@endauth

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
            <th>Ultima Modificacion</th>
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
                @auth
                <!-- Botón Editar -->
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <!-- Botón Eliminar -->
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            @endauth
            </td>
            <td>{{ $product->user->name ?? 'Desconocido' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Paginación -->
<div class="d-flex justify-content-center">
    <ul class="pagination pagination-sm">
        {{ $products->links('pagination::bootstrap-5') }}
    </ul>
</div>

@endsection

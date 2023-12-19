<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required><br>

        <label for="referencia">Referencia:</label>
        <input type="text" name="referencia" value="{{ old('referencia', $producto->referencia) }}" required><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="{{ old('precio', $producto->precio) }}" required><br>

        <label for="peso">Peso:</label>
        <input type="number" name="peso" value="{{ old('peso', $producto->peso) }}" required><br>

        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" value="{{ old('categoria', $producto->categoria) }}" required><br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="{{ old('stock', $producto->stock) }}" required><br>

        <label for="fecha_creacion">Fecha de creación:</label>
        <input type="date" name="fecha_creacion" value="{{ old('fecha_creacion', $producto->fecha_creacion) }}" required><br>

        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>

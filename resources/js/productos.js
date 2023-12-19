document.addEventListener('DOMContentLoaded', function () {
    function listarProductos() {
        // Hacer una solicitud GET a la API para obtener la lista de productos
        fetch('/api/productos')
            .then(response => response.json())
            .then(data => {
                const listaProductos = document.getElementById('lista-productos');

                // Limpiar la lista antes de agregar nuevos elementos
                listaProductos.innerHTML = '';

                // Verificar si hay productos para mostrar
                if (data.length === 0) {
                    const mensaje = document.createElement('p');
                    mensaje.textContent = 'No hay productos disponibles.';
                    listaProductos.appendChild(mensaje);
                } else {
                    // Recorrer la lista de productos y agregar elementos a la lista HTML
                    data.forEach(producto => {
                        const listItem = document.createElement('li');
                        listItem.textContent = `${producto.nombre} - Precio: ${producto.precio} - Stock: ${producto.stock}`;
                        listaProductos.appendChild(listItem);
                    });
                }
            })
            .catch(error => console.error('Error al obtener la lista de productos:', error));
    }

    // Llamar a la función para listar productos al cargar la página
    listarProductos();

        function crearProducto() {
           
            const nombre = document.getElementById('nombre').value;
            const referencia = document.getElementById('referencia').value;
            const precio = document.getElementById('precio').value;
            const peso = document.getElementById('peso').value;
            const categoria = document.getElementById('categoria').value;
            const stock = document.getElementById('stock').value;
            const fecha_creacion = document.getElementById('fecha_creacion').value;
    
            if (!nombre || !referencia || !precio || !peso || !categoria || !stock || !fecha_creacion) {
                alert('Por favor, complete todos los campos.');
                return;
            }
    
            const nuevoProducto = {
                nombre: nombre,
                referencia: referencia,
                precio: precio,
                peso: peso,
                categoria: categoria,
                stock: stock,
                fecha_creacion: fecha_creacion,
            };
    
            fetch('/api/productos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(nuevoProducto),
            })
            .then(response => response.json())
            .then(data => {
                alert('Producto creado exitosamente.');
                
            })
            .catch(error => console.error('Error al crear el producto:', error));
        }        
});
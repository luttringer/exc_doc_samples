window.addEventListener("DOMContentLoaded",()=> 
{
    for(let i=1;i<=2;i++)
    {
        fetch_consulta(i);
    }
})

function fetch_consulta(id_producto) 
{
    // Obtén el contenedor donde se mostrará el resultado
    const resultadoContainer = document.getElementById('contProductos');

    // URL del archivo PHP que procesará la solicitud y devolverá los datos del producto
    const url = 'PHP_files/query.php';

    // ID del producto a consultar
    const productoID = id_producto; // Cambia esto según el ID deseado

    // Crea el objeto de datos para enviar a través de la solicitud POST
    const data = new FormData();
    data.append('id', productoID);

    // Configura la solicitud Fetch
    const opcionesFetch = {
        method: 'POST',
        body: data
    };

    // Realiza la solicitud Fetch
    fetch(url, opcionesFetch)
        .then(response => response.json())
        .then(data => {
            // Procesa la respuesta del servidor
            const nombreProducto = data.nombre;
            const precioProducto = data.precio;

            // Muestra los datos del producto en el contenedor
            resultadoContainer.innerHTML = `<div><p>Nombre del producto: ${nombreProducto}</p>
                                            <p>Precio del producto: ${precioProducto}</p></div>`;
        })
        .catch(error => {
            // Maneja cualquier error que pueda ocurrir durante la solicitud
            resultadoContainer.innerHTML = 'Error: ' + error.message;
        });
}
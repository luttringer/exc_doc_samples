<?php
    include_once("connect.php");
    // Obtén el ID del producto enviado a través de la solicitud POST
    $productoID = $_POST['id'];

    // Consulta para obtener los datos del producto según el ID
    $sql = "SELECT nombre, precio FROM productos WHERE id = $productoID";

    // Ejecutar la consulta y obtener el resultado
    $result = $conn->query($sql);
    // Verificar si se obtuvieron resultados
    if ($result->num_rows > 0) {
        // Obtener los datos del producto de la fila obtenida
        $row = $result->fetch_assoc();

        // Obtener el nombre y el precio del producto
        $nombreProducto = $row['nombre'];
        $precioProducto = $row['precio'];

        // Crear un array asociativo con los datos del producto
        $datosProducto = array(
            'nombre' => $nombreProducto,
            'precio' => $precioProducto
        );

        // Devolver los datos del producto como respuesta en formato JSON
        echo json_encode($datosProducto);
    } else {
        // Si no se encontró ningún producto con el ID especificado, devolver un mensaje de error
        echo "No se encontró ningún producto con el ID: " . $productoID;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
?>
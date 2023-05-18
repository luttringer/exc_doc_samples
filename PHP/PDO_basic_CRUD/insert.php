<?php
    include_once "connect.php";

    // Procesamiento del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        
        // Ejemplo de inserción de datos en la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    
        echo "Se ha insertado un nuevo usuario en la base de datos";
    }else
    {
        echo "no esta accediendo a este recurso web desde el medio correcto. complete el formulario de registro de : index.php";
    }
?>
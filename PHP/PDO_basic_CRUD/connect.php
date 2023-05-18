<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_example";

    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexión exitosa a la base de datos";
    } catch(PDOException $e) 
    {
        //echo "Error de conexión: " . $e->getMessage();
    }
?>
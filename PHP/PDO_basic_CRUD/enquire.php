<?php
    include_once "connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $tipo_consulta = $_POST['tipo_consulta'];

        if($tipo_consulta==2) //consulta general
        {
            $stmt = $conn->query("SELECT * FROM usuarios");

            while ($row = $stmt->fetch()) 
            {
                echo $row['id_usuarios'] . " " . $row['nombre'] . " " . $row['email'] . "<br>";
            }
        }else   //consulta unica
        {
            $nombre = $_POST['nombre'];
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre=:nombre");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "<br><br>" . "Id de usuario: " . $resultado['id_usuarios'];
            echo "<br>" . "Nombre de usuario: " . $resultado['nombre'];
            echo "<br>" . "Email de usuario: " . $resultado['email'];
        }
    }
    

    
?>
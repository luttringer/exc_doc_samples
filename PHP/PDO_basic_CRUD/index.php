<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Registro de usuario</h2>
	<form action="insert.php" method="post">
		<label for="nombre">Nombre:</label>
		<input type="text" id="nombre" name="nombre" required><br><br>
		
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>
		
		<label for="password">Contraseña:</label>
		<input type="password" id="password" name="password" required><br><br>
		
		<input type="submit" value="Registrar">
	</form>




	
    <h2>Consulta de dato único</h2>
	<form action="enquire.php" method="post">
		<label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
		<input type="hidden" id="tipo_consulta" name="tipo_consulta" value="1"><br><br>
		
		<input type="submit" value="consultar">
	</form>

    <h2>Consulta de dato general</h2>
	<form action="enquire.php" method="post">
		<input type="hidden" id="tipo_consulta" name="tipo_consulta" value="2"><br><br>
		
		<input type="submit" value="consultar">
	</form>
</body>
</html>
<?php
	$edad;								//declaro una variable sin asignarle valor
	$peso;
	$nombre = "christian";				//declaro una variable asignandole valor
	$edad = 28;
	$alergiaMani = false;				//tipo de dato boolean
	$peso = 67.5;						//tipo de dato float
	
	define("CEDULA", 46185468);			//declaro una constante de tipo integer
	define("CREDENCIAL", "BVC11800");	//declaro una constante de tipo string
	
	echo "bienvenido " . $nombre . " segun nuestros datos tu tienes: " . $edad . " años de edad.";		//ejemplo de concatenacion de variables y cadenas de texto
	//cuando no se agrega nada mas que una variable, constante o funcion. if automaticamente detectara si es true o false sin depender de los operadores (==true o ==false)
	if($alergiaMani) 
	{ 
		echo "\nEres alergico al mani y pesas: " . $peso . " kilogramos.";	//se utiliza \n para poder dar un salto de linea.
	}else 
	{
		echo "\nNo eres alergico al mani y pesas: {$peso} kilogramos.";		//ejemplo de concatenacion de variables dentro de cadena de texto mediante {$nombreVariable}
	}
	
	echo "\n\ntu cedula es " . constant("CEDULA");			//ejemplo de concatenacion de constante mediante metodo constant("NOMBRECONSTANTE")
	echo "\ny du credencial es " . CREDENCIAL;				//concatenacion de constante por nombre 
?>
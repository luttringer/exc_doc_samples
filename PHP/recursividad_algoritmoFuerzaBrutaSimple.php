<?php
    $arr_nombres = ["Christian","Pia","Pablo","Pilar","Romina","Raquel","Manuel","Teo","Lupe","Helena", "Delfina", "Valentina"]; //declaro un array con nombres de diferente largos.
	$max_length_name = "";          //variable global utilizada para guardar el nombre mas largo que el algoritmo vaya encontrando
	define("CICLOS_FB", 500);       //constante utilizada para marcar cuantos ciclos (capacidad de computo) le asignaremos a la funcion recursiva
	
	
	function encontrarMayor($i)     //declaro funcion recursiva que recibe variable $i (contador)
	{
		global $arr_nombres;        //accedo a variables globales mediante la palabra reservada "global"
		global $max_length_name;
		
		if($i<=CICLOS_FB)           //configuro control de la funcion recursiva, solo ira hasta que el contador sea igual a los ciclos establecidos
		{
			$numero_aleatorio = rand(0, count($arr_nombres)-1);         //creo un numero aleatorio desde 0 hasta la cantidad de elementos del array -1
			if($max_length_name == "")                                  //en el caso de que aun no hayan registros de nombres, o sea, primer ciclo de la recursividad, accedo a almacenar lo primero que encuentr
			{
				$max_length_name = $arr_nombres[$numero_aleatorio];     //guardo en variable global max_length_name el nombre que aleatoriamente se haya seleccionado
			}else                                                       //en caso de que variable global no este vacia, significa que ya paso el primer ciclo y puedo comenzar a guardar en base a la condicion del problema (la palabra con mas caracteres)
			{
				if(strlen($max_length_name) < strlen($arr_nombres[$numero_aleatorio]))      //si el largo de la palabra global almacenada es menor en caracteres al largo de la aleatoria actual del array, entonces guardo la actual
				{
					$max_length_name = $arr_nombres[$numero_aleatorio];	    //guardo actual palabra aleatoria como la nueva palabra mas larga encontrada.
				}
			}
			
			encontrarMayor($i + 1);         //auto invoco a funcion recursiva aumentando en +1 su ciclo
		}
	}
	
	encontrarMayor(0);      //invoco funcion recursiva partiendo desde cero
	echo "El nombre con mayor cantidad de caracteres encontrado por fuerza bruta es: " . $max_length_name . "[" . strlen($max_length_name) . "]";  //muestro palabra con mas caracteres encontrada.
?>
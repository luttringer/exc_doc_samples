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
			$numero_aleatorio = rand(0, count($arr_nombres)-1);
			if($max_length_name == "")
			{
				$max_length_name = $arr_nombres[$numero_aleatorio];
			}else
			{
				if(strlen($max_length_name) < strlen($arr_nombres[$numero_aleatorio]))
				{
					$max_length_name = $arr_nombres[$numero_aleatorio];	
				}
			}
			
			encontrarMayor($i + 1);
		}
	}
	
	encontrarMayor(0);
	echo "El nombre con mayor cantidad de caracteres encontrado por fuerza bruta es: " . $max_length_name . "[" . strlen($max_length_name) . "]";
?>
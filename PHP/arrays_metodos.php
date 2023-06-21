<?php
    $arrayNombres = array("christian","ezequiel");	//ejemplo de declaracion y asignacion de array sin key declaradas. 
        
    $arrayFrutas = array   //ejemplo de declaracion y asignacion de array con keys y values. donde keys son los nombres de las frutas (izq.) y values sus precios por kg(der.)
    (
        "manzana" => 45,
        "naranja" => 30,
        "uva"     => 120
    );

    $arrayLenguajes =	//ejemplo de declaracion y asignacion de array con keys y value (metodo mas moderno)
    [
        "JavaScript" => 1995,
        "PHP"		 => 1994,
        "C"			 => 1972
    ];

    echo "El lenguaje de programacion C se desarrollo en: " . $arrayLenguajes["C"];
    echo "\nEl precio actual del kilo de naranja esta a: {$arrayFrutas["naranja"]}";
    echo "\nEl primer nombre almacenado en su arrayNombres es: " . $arrayNombres[0];


    //***METODOS DE ARRAYS***

    //el metodo [] al final del nombre del array y seguido de asignacion de valor agrega un nuevo elemento siguiendo su posicionamiento incremental por indice
    $arrayNombres[] = "Mikhail";		
    echo "\n\n---informacion arrayNombres---\n";
    print_r($arrayNombres);			//print_r nos devuelve la informacion completa del array, elementos, valores y keys

    $arrayFrutas["kiwi"] = 100;     //al aclarar una key dentro de las llaves rectas, siguiendo el metodo anterior, nos permite insertar un elemento con valor y key.
    echo "\n\n---informacion arrayFrutas---\n";
    print_r($arrayFrutas);	

    //el metodo push agrega un elemento con valor indicado (1980) al final del array sin indicar su key (se asigna el primer valor incremental disponible)
    array_push($arrayLenguajes, 1980);	
    echo "\n\n---informacion arrayLenguajes---\n";
    print_r($arrayLenguajes);	 //notese como el valor agregado "1980" quedo en ultima posicion pero con key 0

    array_unshift($arrayLenguajes, 1989);	//el metodo unshift agrega un elemento con valor indicado al principio del array, sin key asignada manual
    echo "\n\n---informacion arrayLenguajes---\n";
    //notese como ahora el primer elemento agregado por unshift pasa a tener key 0 mientras que el ultimo (1980) se reasigna a la siguiente key disponible (1)
    print_r($arrayLenguajes);	 

    echo "\nEl arrayLenguajes tiene un total de: " . count($arrayLenguajes) . " elementos.\n\n"; //el metodo count devuelve el numero total de elementos (sin contar el 0) neto de un array

    //el metodo slice devuelve una porcion indicada (subArray) del array original, se indica posicion de partida y cantidad de elementos. En este caso desde el primero que cuente 3
    $arrLenguajesPrimerosTres = array_slice($arrayLenguajes,0,3);	
    echo "\n\n---informacion arrLenguajesPrimerosTres---\n";
    print_r($arrLenguajesPrimerosTres);


    $arrayLenguajes["C++"] = $arrayLenguajes[1];		//haciendo uso de la tecnica de creacion de elemento con value y key, podemos igualar uno nuevo hacia uno viejo.
    $arrayLenguajes["Python"] = $arrayLenguajes[0];
    //unset es un metodo que nos permite eliminar un elemento indicado, en este caso borramos los antiguos elementos sin key asignada ya que ahora creamos dos nuevos con sus valores
    unset($arrayLenguajes[1]);							
    unset($arrayLenguajes[0]);
    echo "\n\n---informacion arrayLenguajes---\n";
    print_r($arrayLenguajes);

    array_pop($arrayFrutas);		//elimino el ultimo elemento del array
    array_shift($arrayFrutas);		//elimino el primer elemento del array
    echo "\n\n---informacion arrayFrutas---\n";
    print_r($arrayFrutas);	
?>
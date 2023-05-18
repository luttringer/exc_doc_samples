//constantes del DOM elements
const ORIGEN = document.querySelector("#inp_org");
const DESTINO = document.getElementById("inp_dest");
const DIA = document.querySelector("#inp_dia");
const BTN_CONSULTA = document.getElementById("btn_cons");
const RESULTADO = document.querySelector("#resultado");


//"BD" lineas 
const lineas = 
[
    {
        nombre:"425", 
        hora_salidas: [[8,00] , [10,00] , [13,15] , [14,35]], 
        cantidad_asientos: 42, 
        trayecto: ["montevideo", "toledo", "sauce", "san jacinto", "atlantida", "costa azul", "piriapolis"], 
        tiempo_reco:[0 , 40 , 55 , 120 , 140 , 165 , 225]
    },
];

//click en boton consulta
BTN_CONSULTA.addEventListener("click", ()=>
{
    let arr_consulta_origen = verificar_punto(ORIGEN.value);        //creo un array con el return que me devuelve la funcion verificar_punto pasandole el value de origen
    let arr_consulta_destino = verificar_punto(DESTINO.value);      //creo un array con el return que me devuelve la funcion verificar_punto pasandole el value de destino
    let indice_linea = arr_consulta_destino[1];                     //creo una variable con el indice de la linea para mas comodidad.

    RESULTADO.innerHTML = "";   //limpio la ventana resultado.

    if(arr_consulta_destino[0]==false || arr_consulta_origen[0]==false) //si no se encontro el destino u origen en el array de trayecto, avisamos al usuario
    {
        RESULTADO.innerHTML= "no se puede realizar su viaje porque el destino u origen no existe en nuestra BD"
    }else if(arr_consulta_destino[0]==true && arr_consulta_origen[0]==true) //si ambos se encontraron y estan en true avanzamos
    {
        if(arr_consulta_origen[1] == arr_consulta_destino[1]) //no solo tienen que existir esas paradas en el array sino que tienen que pertenecer a la misma linea
        {
            RESULTADO.innerHTML += "\n se puede realizar su viaje porque el destino y el origen pertenecen a la misma linea";
            RESULTADO.innerHTML += `\n la linea que le sirve es: ${lineas[indice_linea].nombre}`; //accedo a la linea y su propiedad nombre.
            RESULTADO.innerHTML += `\n\n los horarios de partida de su linea son: `;
            lineas[indice_linea].hora_salidas.forEach(e=> //recorro el array de la propiedad hora_salidas
            {
                RESULTADO.innerHTML += `\n --- ${e[0]}:${e[1]}`; //muestro todos los valores del array (son mini arrays)
            });

            RESULTADO.innerHTML+= `\n\n por su parada, pasa el omnibus en los siguientes horarios:`;

            let array_horas_origen = []; //creo array vacio
            lineas[indice_linea].hora_salidas.forEach(e=> //recorro horas salidas
            {
                //el array vacio que cree lo igualo a llamar a la funcion sumar horas pasandole: la hora de salida (ej:[8,00]) y los minutos de tiempo_reco (ej:55)
                array_horas_origen = sumar_horas(e, lineas[indice_linea].tiempo_reco[arr_consulta_origen[2]]);
                RESULTADO.innerHTML+= `\n --- ${array_horas_origen[0]} : ${array_horas_origen[1]}`; //mostramos en pantalla el la posicion [0] (horas) y [1] minutos
            });

        }else 
        {
            RESULTADO.innerHTML += "\n no se puede realizar su viaje porque el destino y origen no pertenecen a la misma linea";
        }
    }
});

function verificar_punto(parada)    //recibe un parametro que lo asignamos a una variable local llamada parada
{
    let array_return = [false,"indice linea", "indice parada"];  //declaramos un array con false en su posicion 0(sera true si encuentra la parada buscada en el trayecto de cada linea), indice linea [1] es el indice del array de lineas, indice parada es la posicion de la parada especifica buscada en el array trayecto

    lineas.forEach((element, indice) =>     //recorremos el array de lineas. element es una variable que traera cada linea e indice es una variable que traera la posicion del a linea en el array lineas
    {
        element.trayecto.forEach((e,i) => { //en cada linea de omnibus (el objeto que creamos) recorreremos su array de trayecto (donde estan todas las paradas)
            if(e==parada)   //si encontramos que la parada que nos pasaron se encuentra dentro del array de trayecto (o sea, existe dentro de las paradas de la linea)
            {
                array_return[0] = true;     //cargamos en true la posicion 0 del array que devolveremos
                array_return[1] = indice;   //cargamos el indice de la linea que tiene esa parada
                array_return[2] = i;        //cargamos el indice de la parada en el array trayecto (o sea, la posicion de la parada en todos los destinos de trayecto)
            }
        });
    });

    return array_return; //devuelvo el array con los valores cargados. si no encontro nada lo devuelve con false en su posicion [0]
}

function sumar_horas([...array_partida], minutos_suma) //recibo dos valores, un array con la hora y minuto de partida (ej:[8.00]) y los minutos a sumarle (ej:55)
{
    let horas = Math.floor(minutos_suma/60);  //las horas a sumar sera igual a los minutos/60 redondeado para abajo (ej:150/60= 2.5>redondeado = 2 )
    let minutos = minutos_suma - (horas*60);  //los minutos son igual a los minutos a sumar menos las horas devueltas por 60. o sea: 150 - (2*60)= 30  > 150 - 120 = 30 minutos

    array_partida[0] = array_partida[0] + horas; //a la hora de partida que recibi le sumo las horas que calcule

    if((array_partida[1] + minutos) >=60)  //si los minutos a sumar son mayores a 60 significa que tengo que sumar una hora ej: 55 + 30 = 85 (1h, 25minutos)
    {
        array_partida[0]+=1; //sumamos una hora

        array_partida[1]=(array_partida[1] + minutos) -60; //y sumamos los minutos menos 60
    }else 
    {
        array_partida[1] = array_partida[1] + minutos;  //si la suma de los minutos no es mayor que 60, simplement sumamos los minutos (ej: 30+15=45. sumo 45)
    }

    return array_partida;
}


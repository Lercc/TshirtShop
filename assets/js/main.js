//FUCNION PARA OBTENER EL PARAMETRO ID DE LA RUTA HTTP
function getParametroId() {
    //OBTENER LA RUTA HHTP
    var rutaHttp = window.location.pathname  
    //master-php/08%20-%20proyecto-php%20(POO%20MVC%20SQL)/producto/categoria&id=1

    //OBTENER LA POSICION DONDE EMPIEZAN LOS PARAMETROS, COMO ALERTANIVA A LA PROPPIEDAD SEARCH DE widows location
    var posicion =   rutaHttp.indexOf('&')
    // posicion del concaetnador & -> 72

    //OBTENER LOS VALORES DE GET DESPUES DEL PRIMER &
    var parametrosGet = rutaHttp.substr(posicion+1)
    //id=&nombre=luis

    //CERAR UN ARRAY DE PARAMETROS QUE ESTES DEFINIDOS/SEPADADOS POR '&'
    var arrayParametros = parametrosGet.split('&')
    //  arrayParametros   ["id=1", "nombre=luis"]
    //          arrayParametros[0]: "id=1"
    //          arrayParametros[1]: "nombre=luis"

    //CREAR ARRAY PARA OBTENER EL NOMBRE DEL PARAMETRO Y SU VALOR, LOS CUALES ESTAN SEPARADOS POR '='
    var parametro1 = arrayParametros[0].split('=')
    //  parametro1  ["id=1"]
    //         parametro1[0]: "id"
    //         parametro1[1]: "1"

    // console.log(rutaHttp)
    // console.log(posicion)
    // console.log(parametrosGet)
    // console.log(arrayParametros)
    // console.log(parametro1)

    var nombreParametro = parametro1[0]
    var valorParametro = parametro1[1]

    if (typeof(nombreParametro) == 'string' && nombreParametro == 'catId') {
        selectCat(valorParametro)
    } else if (typeof(valorParametro) == 'undefined') {
        selectCat(0)
    }
} 
//FUNCION PARA PONER ESTILOS A LA CATEGORIA CORRESPONIENTE AL ID QUE VIENE POR PARAMETRO HTTP
function selectCat($pPosition){
   var  $lercc =document.getElementsByClassName('category')
    //BORRAR TODOS POS POSIBLES ACCTIVE
    for(i=0;i<$lercc.length;i++) if($lercc[i].classList.contains('active')) $lercc[i].classList.remove('active')
    
    //RECORRE EL ARRAY DE GETELEMENT
    for (i=0;i<$lercc.length;i++) {
        //SI ENCUENTRA QUE TIENE COMO CLASE EL VALOR QUE LE INDICAMOS COMO PARAMETRO,
        //EN ESTE CASO EL ID DE LA CATEGORIA Y COMO ANTERIOMENTE DEFINIMOS UNA CLASE CON 
        //EL ID DE CATEGORIA QUE LE CORRESPONE;ENTONCES SERA TRUE SI COINCIDEN
        if($lercc[i].classList.contains($pPosition)) {
            $lercc[i].classList.add('active')
        }
    }
}

function accountUserToggle(){
    var $lercc = document.getElementsByClassName('account-user-containt')
    var $lerc = document.getElementsByClassName('account-user')
    if($lercc[0].classList.contains('toggleOFF') && !$lerc[0].classList.contains('account-close')) {
        $lercc[0].classList.remove('toggleOFF')
        $lerc[0].classList.add('account-close')
    } else {
        $lercc[0].classList.add('toggleOFF') 
        $lerc[0].classList.remove('account-close')
    }
}
var countIgm=0
function imgTransition() {
    var $lercc = document.getElementsByClassName('imgTransition')
    var $models = Array("model-1","model-2","model-3","model-4","model-5")
    
    $lercc[0].setAttribute('src',"http://localhost/master-php/08%20-%20proyecto-php%20(POO%20MVC%20SQL)/assets/img/models/"+$models[countIgm]+".png")
    countIgm+=1
    if(countIgm == $models.length) countIgm=0
}






function autoload() {
    getParametroId()
    imgTransition();
    setInterval("imgTransition()",6000)
}
//autoload
autoload()
















///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                AMBITO / ESCOPE / DECLARACION DE VARIBLE
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// la variable DECLARADA dentro de una funcion o bucle o epsacio entre { }, tendra validez dentro de ese escope/ambio que es la llave de apertura y cierre
//el ejemplo siguiente muestra como la variable minumero fuera de la funcion escupe un valor diferente al de la variable delcarada con el mismo nombre dentro
//de la funcion
var minumero = 15
function prueba() {
    var minumero = 45
    console.log(minumero)
}
prueba()
console.log(minumero)
//por el contrario si no declaramos la variable hacemos que sta variable sea global e indiferente a su escope/ambito creado,
//en este ejemplo, esta accion es controlada(aproposito). Pero si en relaidad olvidaras DECLARAR la variable esto se consideraria
//como un (side Efect) efecto colateral , que significa que estarias haciendo un efecto de sobreescrituta no deseada a otra
//variable que prodria tener el mismo nombre.
var minumero2 = 18
function prueba2() {
    minumero2 +=2
}
prueba2()
console.log(minumero2)
//ejemplo3

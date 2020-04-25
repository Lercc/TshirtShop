function selectCat($pPosition){
   var  $lercc =document.getElementsByClassName('category')
    // for(i=0;i<$lercc.length;i++) {
    //     if($lercc[i].classList.contains('active')) {
    //         $lercc[i].classList.remove('active')
    //     }
    // }
    for(i=0;i<$lercc.length;i++) if($lercc[i].classList.contains('active')) $lercc[i].classList.remove('active')
    lercc[$pPosition].classList.add('active')
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
setInterval("imgTransition()",5000)















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
function selectCat($pPosition){
    $lercc =document.getElementsByClassName('category')
    // for(i=0;i<$lercc.length;i++) {
    //     if($lercc[i].classList.contains('active')) {
    //         $lercc[i].classList.remove('active')
    //     }
    // }
    for(i=0;i<$lercc.length;i++) if($lercc[i].classList.contains('active')) $lercc[i].classList.remove('active')
    $lercc[$pPosition].classList.add('active')
}
function accountUserToggle(){
    $lercc = document.getElementsByClassName('account-user-containt')
    $lerc = document.getElementsByClassName('account-user')
    if($lercc[0].classList.contains('toggleOFF') && !$lerc[0].classList.contains('account-close')) {
        $lercc[0].classList.remove('toggleOFF')
        $lerc[0].classList.add('account-close')
    } else {
        $lercc[0].classList.add('toggleOFF')
        $lerc[0].classList.remove('account-close')
    }
}
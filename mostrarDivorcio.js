function mostrarDivorcio(){
    divorcio= document.getElementById("desplegar_divorcio");
    check_divorcio = document.getElementById("divorcio");
    if ( check_divorcio.checked){
        divorcio.style.display="block";
    }
    else {
        divorcio.style.display="none";
    }
}

function mostrarSegundo(){
    segundo= document.getElementById("desplegar_segundo");
    check_segundo = document.getElementById("segundo");
    if ( check_segundo.checked ){
        segundo.style.display="block";
    }
    else {
        segundo.style.display="none";
    }
}

function mostrarSegundoDivorcio(){
    segundoDivorcio= document.getElementById("desplegar_segundo_divorcio");
    check_segundoDivorcio = document.getElementById("segundo_divorcio");
    if ( check_segundoDivorcio.checked ){
        segundoDivorcio.style.display="block";
    }
    else {
        segundoDivorcio.style.display="none";
    }
}
function mostrarTercero(){
    tercero= document.getElementById("desplegar_tercero");
    check_tercero = document.getElementById("tercero");
    if ( check_tercero.checked ){
        tercero.style.display="block";
    }
    else {
        tercero.style.display="none";
    }
}


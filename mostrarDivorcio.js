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


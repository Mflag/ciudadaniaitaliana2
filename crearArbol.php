<?php
    include("database.php");

    $acta = $_POST["acta"];
    $nombre = ucfirst($_POST["nombre"]);
    $apellido = ucfirst($_POST["apellido"]);
    $idCliente = $_POST["idCliente"];
    $lugar_nacimiento = $_POST["lugar_nacimiento"];
    $datos_nacimiento = $_POST["datos_nacimiento"] ;
    $fecha_nacimiento = $_POST["fecha_nacimiento"]; 
    $lugar_matrimonio = $_POST["lugar_matrimonio"] ;
    $datos_matrimonio = $_POST["datos_matrimonio"] ;
    $fecha_matrimonio = $_POST["fecha_matrimonio"] ;
    $lugar_defuncion = $_POST["lugar_defuncion"] ;
    $datos_defuncion = $_POST["datos_defuncion"] ;
    $fecha_defuncion = $_POST["fecha_defuncion"] ;
    if(isset($_POST["divorcio"])){
        $divorcio = $_POST["divorcio"];
    }else {
        $divorcio = 0;
    }
    $lugar_divorcio = $_POST["lugar_divorcio"] ;
    $datos_divorcio = $_POST["datos_divorcio"] ;
    $fecha_divorcio = $_POST["fecha_divorcio"] ;
    if(isset($_POST["segundo"])){   
        $segundo = $_POST["segundo"];
    }else{
        $segundo = 0;
    } 
    $lugar_segundo = $_POST["lugar_segundo"] ;
    $datos_segundo = $_POST["datos_segundo"] ;
    $fecha_segundo = $_POST["fecha_segundo"] ;
    if(isset($_POST["segundo_divorcio"])){
        $segundo_divorcio = $_POST["segundo_divorcio"];
    }else {
        $segundo_divorcio = 0;
    }
    $lugar_segundo_divorcio = $_POST["lugar_segundo_divorcio"] ;
    $datos_segundo_divorcio = $_POST["datos_segundo_divorcio"] ;
    $fecha_segundo_divorcio = $_POST["fecha_segundo_divorcio"] ;
    if(isset($_POST["tercero"])){
        $tercero = $_POST["tercero"];
    }else {
        $tercero = 0;
    }
    $lugar_tercero = $_POST["lugar_tercero"] ;
    $datos_tercero = $_POST["datos_tercero"] ;
    $fecha_tercero = $_POST["fecha_tercero"] ;

    $insertar = "INSERT INTO arboles (id_arbol, acta, id_cliente, nombre, apellido, lugar_nacimiento, datos_nacimiento, fecha_nacimiento, lugar_matrimonio, datos_matrimonio, fecha_matrimonio, lugar_defuncion, datos_defuncion, fecha_defuncion, divorcio, lugar_divorcio, datos_divorcio, fecha_divorcio, segundo, lugar_segundo,datos_segundo,fecha_segundo,segundoDivorcio,lugar_segundoDivorcio,datos_segundoDivorcio,fecha_segundoDivorcio,tercero,lugar_tercero,datos_tercero,fecha_tercero) VALUES (NULL, '$acta', '$idCliente','$nombre', '$apellido',  '$lugar_nacimiento','$datos_nacimiento','$fecha_nacimiento','$lugar_matrimonio','$datos_matrimonio','$fecha_matrimonio','$lugar_defuncion','$datos_defuncion','$fecha_defuncion','$divorcio','$lugar_divorcio','$datos_divorcio','$fecha_divorcio','$segundo','$lugar_segundo','$datos_segundo','$fecha_segundo','$segundo_divorcio','$lugar_segundo_divorcio','$datos_tercero','$fecha_segundo_divorcio','$tercero','$lugar_tercero','$datos_tercero','$fecha_tercero' );";

    $resultado = mysqli_query($conexion, $insertar);

    if($resultado){
        echo "<script> alert('Se registro el usuario con exito');
        window.location='/CiudadaniaItaliana/arbol.php?id=$idCliente?'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
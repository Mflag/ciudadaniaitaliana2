<?php
    include("database.php");

    $idArbol = $_POST["idArbol"];    
    $idCliente =$_POST["idCliente"];
    $acta = $_POST["acta"];
    $nombre = ucfirst($_POST["nombre"]);
    $apellido = ucfirst($_POST["apellido"]);
    $lugar_nacimiento = $_POST["lugar_nacimiento"];
    $datos_nacimiento = $_POST["datos_nacimiento"] ;
    $fecha_nacimiento = $_POST["fecha_nacimiento"]; 
    $lugar_matrimonio = $_POST["lugar_matrimonio"] ;
    $datos_matrimonio = $_POST["datos_matrimonio"] ;
    $fecha_matrimonio = $_POST["fecha_matrimonio"] ;
    $lugar_defuncion = $_POST["lugar_defuncion"] ;
    $datos_defuncion = $_POST["datos_defuncion"] ;
    $fecha_defuncion = $_POST["fecha_defuncion"] ;
    
    $divorcio = $_POST["divorcio"];
    $lugar_divorcio = $_POST["lugar_divorcio"] ;
    $datos_divorcio = $_POST["datos_divorcio"] ;
    $fecha_divorcio = $_POST["fecha_divorcio"] ;
    $segundo = $_POST["segundo"];
    $lugar_segundo = $_POST["lugar_segundo"] ;
    $datos_segundo = $_POST["datos_segundo"] ;
    $fecha_segundo = $_POST["fecha_segundo"] ;

    $actualizar = "UPDATE arboles SET acta='$acta',nombre ='$nombre', apellido='$apellido',lugar_nacimiento='$lugar_nacimiento',datos_nacimiento='$datos_nacimiento',fecha_nacimiento='$fecha_nacimiento',lugar_matrimonio='$lugar_matrimonio',datos_matrimonio='$datos_matrimonio',fecha_matrimonio='$fecha_matrimonio',lugar_defuncion='$lugar_defuncion',datos_defuncion='$datos_defuncion',fecha_defuncion='$fecha_defuncion', divorcio = '$divorcio', lugar_divorcio = '$lugar_divorcio', datos_divorcio = '$datos_divorcio', fecha_divorcio = '$fecha_divorcio', segundo = '$segundo', lugar_segundo = '$lugar_segundo', datos_segundo = '$datos_segundo', fecha_segundo = '$fecha_segundo' WHERE id_arbol ='$idArbol'";

    $resultado = mysqli_query($conexion, $actualizar);

    if($resultado){
        echo "<script>window.location='/CiudadaniaItaliana/arbol.php?id=$idCliente'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
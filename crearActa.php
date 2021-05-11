<?php
    include("database.php");
    $idCliente =$_POST["idCliente"];
    $acta = $_POST["acta"];
    $codActa = $_POST["codActa"];
    $lugar = $_POST["lugar"];
    $dato = $_POST["estado"];
    $fecha = $_POST["fecha"];
    $fecha = date_create($fecha);
    $fecha =date_format($fecha,"d/m/Y");

    $insertar = "INSERT INTO actas(id_acta, id_arbol, acta, lugar, dato, fecha ) VALUES (NULL, '$acta','$codActa','$lugar','$dato','$fecha' );";

    $resultado = mysqli_query($conexion, $insertar);

    if($resultado){
        echo "<script>window.location='/CiudadaniaItaliana/arbol.php?id=$idCliente?'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
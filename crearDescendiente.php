<?php
    include("database.php");

    $idCliente =$_POST["idCliente"];
    $numActa =$_POST["numActa"];
    $apellido =$_POST["apellido"];
    $nombre =$_POST["nombre"];

    $insertar = "INSERT INTO arboles(id_arbol, acta,id_cliente, nombre, apellido ) VALUES (NULL, '$numActa','$idCliente','$nombre','$apellido');";

    $resultado = mysqli_query($conexion, $insertar);

    if($resultado){
        echo "<script> alert('Se registro el usuario con exito');
        window.location='/CiudadaniaItaliana/arbol.php?id=$idCliente?'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
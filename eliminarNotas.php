<?php
    include("database.php");

    $id = $_GET["id"];  
    $idCliente = $_GET["idCliente"];
    $tipoTrabajo = $_GET["tipoTrabajo"];

    $eliminar = "DELETE FROM notas WHERE id_notas ='$id'";
    
    $resultado = mysqli_query($conexion, $eliminar);

    if($resultado){
        
        if($tipoTrabajo == "Carpeta" || $tipoTrabajo == "Estado civil"){
            echo "<script>window.location='/CiudadaniaItaliana/arbol.php?id=$idCliente'</script>";
        }else{
            echo "<script>window.location='/CiudadaniaItaliana/notas.php?id=$idCliente'</script>";
        }
    }else{
        echo "<script> alert(No se pudo al cliente');
        window.location='/CiudadaniaItaliana'</script>";
    }
<?php
    include("database.php");

    $id = $_GET["id"];  
    $idArbol = $_GET["idArbol"];

    $eliminar = "DELETE FROM actas WHERE id_acta ='$id'";
    
    $resultado = mysqli_query($conexion, $eliminar);

    if($resultado){
        echo "<script> window.location='/CiudadaniaItaliana/actualizarArbol.php?id=$idArbol'</script>";
    }else{
        echo "<script> alert(No se pudo al cliente');
        window.location='/CiudadaniaItaliana'</script>";
    }
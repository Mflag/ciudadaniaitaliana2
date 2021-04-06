<?php
    include("database.php");

    $id = $_GET["id"];  
    $idCliente = $_GET["idCliente"];

    $eliminar = "DELETE FROM arboles WHERE id_arbol ='$id'";
    
    $resultado = mysqli_query($conexion, $eliminar);

    if($resultado){
        echo "<script> alert('Se elimino correctamente al cliente');
        window.location='/CiudadaniaItaliana/arbol.php?id=$idCliente'</script>";
    }else{
        echo "<script> alert(No se pudo al cliente');
        window.location='/CiudadaniaItaliana'</script>";
    }
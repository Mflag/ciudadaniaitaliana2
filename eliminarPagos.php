<?php
    include("database.php");

    $id = $_GET["id"];  
    $idCliente = $_GET["idCliente"];

    $eliminar = "DELETE FROM cuentas WHERE id_cuentas ='$id'";
    
    $resultado = mysqli_query($conexion, $eliminar);

    if($resultado){
        echo "<script> window.location='/CiudadaniaItaliana/pagos.php?id=$idCliente'</script>";
    }else{
        echo "<script> alert(No se pudo al cliente');
        window.location='/CiudadaniaItaliana'</script>";
    }
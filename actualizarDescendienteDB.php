<?php
    include("database.php");

    $idArbol = $_POST["idArbol"];    
    $idCliente =$_POST["idCliente"];
    $acta = $_POST["numActa"];
    $nombre = ucfirst($_POST["nombre"]);
    $apellido = ucfirst($_POST["apellido"]);
   

    $actualizar = "UPDATE arboles SET acta='$acta',nombre ='$nombre', apellido='$apellido' WHERE id_arbol ='$idArbol'";

    $resultado = mysqli_query($conexion, $actualizar);

    if($resultado){
        echo "<script>window.location='/CiudadaniaItaliana/arbol.php?id=$idCliente'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
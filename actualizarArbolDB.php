<?php
    include("database.php");

    $idArbol = $_POST["idArbol"];    
    $idCliente =$_POST["idCliente"];
    $partida = $_POST["partida"];
    $nombre = ucfirst($_POST["nombre"]);
    $comuna = $_POST["comuna"];
    $estadoPartida = $_POST["estadoPartida"];
    

    $actualizar = "UPDATE arboles SET partida='$partida',nombre ='$nombre', comuna='$comuna',estado_partida='$estadoPartida' WHERE id_arbol ='$idArbol'";

    $resultado = mysqli_query($conexion, $actualizar);

    if($resultado){
        echo "<script> alert('Se actualizo el usuario con exito');
        window.location='/CiudadaniaItaliana/arbol.php?id=$idCliente?'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
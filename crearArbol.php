<?php
    include("database.php");

    $partida = $_POST["partida"];
    $nombre = ucfirst($_POST["nombre"]);
    $comuna = $_POST["comuna"];
    $estadoPartida = $_POST["estadoPartida"];
    $idCliente = $_POST["idCliente"];

    $insertar = "INSERT INTO arboles (id_arbol, partida, nombre, comuna, id_cliente, estado_partida) VALUES (NULL, '$partida', '$nombre', '$comuna', '$idCliente', '$estadoPartida');";

    $resultado = mysqli_query($conexion, $insertar);

    if($resultado){
        echo "<script> alert('Se registro el usuario con exito');
        window.location='/CiudadaniaItaliana/arbol.php?id=$idCliente?'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
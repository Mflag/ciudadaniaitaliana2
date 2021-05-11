<?php
    include("database.php");
    
    $idCliente = $_POST["idCliente"];
    $tipoTrabajo = $_POST["tipoTrabajo"];
    $nota = $_POST["nota"];
    $fecha = $_POST["fecha"];
    $fecha = date_create($fecha);
    $fecha =date_format($fecha,"d/m/Y");

    $insertar = "INSERT INTO notas (id_notas, id_cliente, fecha_nota, nota) VALUES (NULL,'$idCliente', '$fecha', '$nota');";
    $resultado = mysqli_query($conexion, $insertar);
    if($resultado){
        if($tipoTrabajo == "Carpeta" || $tipoTrabajo == "Estado civil"){
            echo "<script>window.location='/CiudadaniaItaliana/arbol.php?id=$idCliente'</script>";
        }else{
            echo "<script>window.location='/CiudadaniaItaliana/notas.php?id=$idCliente'</script>";
        }
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }
?>
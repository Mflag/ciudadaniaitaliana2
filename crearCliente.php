<?php
    include("database.php");

    $nombre = ucfirst($_POST["nombre"]);
    $apellido = ucfirst($_POST["apellido"]);
    $fecha = $_POST["fecha"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $estado = $_POST["estado"];

    $insertar = "INSERT INTO clientes (id_cliente, apellido, nombre, fecha, email, telefono, estado) VALUES (NULL,'$apellido', '$nombre', '$fecha', '$email', '$telefono',  '$estado');";

    $resultado = mysqli_query($conexion, $insertar);

    if($resultado){
        echo "<script> alert('Se registro el usuario con exito');
        window.location='/CiudadaniaItaliana'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
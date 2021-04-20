<?php
    include("database.php");

    $nombre = ucfirst($_POST["nombre"]);
    $apellido = ucfirst($_POST["apellido"]);
    $fecha = $_POST["fecha"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $tipo_de_cleinte = $_POST["tipo_de_cliente"];
    $carpeta = $_POST["carpeta"];
    $estado = $_POST["estado"];

    $insertar = "INSERT INTO clientes (id_cliente, apellido, nombre, fecha, email, telefono,tipo_de_cliente, carpeta, estado) VALUES (NULL,'$apellido', '$nombre', '$fecha', '$email', '$telefono','$tipo_de_cleinte','$carpeta','$estado');";
    $resultado = mysqli_query($conexion, $insertar);

   

    if($resultado){
        echo "<script>window.location='/CiudadaniaItaliana'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
<?php
    include("database.php");

    $nombre = ucfirst($_POST["nombre"]);
    $apellido = ucfirst($_POST["apellido"]);
    $fecha = $_POST["fecha"];
    $fecha = date_create($fecha);
    $fecha =date_format($fecha,"d/m/Y");
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $tipo_de_cleinte = $_POST["tipo_de_cliente"];
    $carpeta = $_POST["carpeta"];
    $tipo_trabajo = $_POST["tipo_trabajo"];
    $estado = $_POST["estado"];

    $insertar = "INSERT INTO clientes (id_cliente, apellido, nombre, fecha, email, telefono,tipo_de_cliente, carpeta, tipo_trabajo, estado) VALUES (NULL,'$apellido', '$nombre', '$fecha', '$email', '$telefono','$tipo_de_cleinte','$carpeta','$tipo_trabajo','$estado');";
    $resultado = mysqli_query($conexion, $insertar);

   

    if($resultado){
        echo "<script>window.location='/CiudadaniaItaliana'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
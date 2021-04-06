<?php
    include("database.php");

    $id = $_POST["id"];    
    $apellido = ucfirst($_POST["apellido"]);
    $nombre = ucfirst($_POST["nombre"]);
    $fecha = $_POST["fecha"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $estado = $_POST["estado"];

    $actualizar = "UPDATE clientes SET apellido='$apellido',nombre='$nombre',fecha='$fecha',email='$email',telefono='$telefono',estado='$estado' WHERE id_cliente ='$id';";

    $resultado = mysqli_query($conexion, $actualizar);

    if($resultado){
        echo "<script> alert('Se actualizo el usuario con exito');
        window.location='/CiudadaniaItaliana'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
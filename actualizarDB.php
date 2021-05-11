<?php
    include("database.php");

    $id = $_POST["id"];    
    $apellido = ucfirst($_POST["apellido"]);
    $nombre = ucfirst($_POST["nombre"]);
    $fecha = $_POST["fecha"];
    $fecha = date_create($fecha);
    $fecha =date_format($fecha,"d/m/Y");
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $tipo_de_cliente= $_POST["tipo_de_cliente"];
    $carpeta= $_POST["carpeta"];
    $tipo_trabajo =$_POST["tipo_trabajo"];
    $estado = $_POST["estado"];

    $actualizar = "UPDATE clientes SET apellido='$apellido',nombre='$nombre',fecha='$fecha',email='$email',telefono='$telefono', tipo_de_cliente='$tipo_de_cliente',carpeta ='$carpeta',tipo_trabajo ='$tipo_trabajo',estado='$estado' WHERE id_cliente ='$id';";

    $resultado = mysqli_query($conexion, $actualizar);

    if($resultado){
        echo "<script> alert('Se actualizo el usuario con exito');
        window.location='/CiudadaniaItaliana'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
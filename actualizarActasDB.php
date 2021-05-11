<?php
    include("database.php");

    $idArbol = $_POST["idArbol"];    
    $idActa =$_POST["idActa"];
    $acta = $_POST["acta"];
    $lugar = $_POST["lugar"];
    $dato = $_POST["dato"];
    $fecha = $_POST["fecha"];
   

    $actualizar = "UPDATE actas SET acta='$acta',lugar ='$lugar', dato='$dato', fecha ='$fecha' WHERE id_acta ='$idActa'";

    $resultado = mysqli_query($conexion, $actualizar);

    if($resultado){
        echo "<script>window.location='/CiudadaniaItaliana/actualizarArbol.php?id=$idArbol'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }

    
?>
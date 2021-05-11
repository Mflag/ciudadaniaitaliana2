<?php

    include("database.php");
    
    $idCliente = $_POST["idCliente"];
    $presupuesto = $_POST["presupuesto"];
    $monto = $_POST["monto"];
    if(isset($_POST["sumar"]) || isset($_POST["restar"])){
        $sumar = $_POST["sumar"];
        $restar = $_POST["restar"];
    
    if($sumar == 1 ){
        $nuevoPresupuesto = $presupuesto + $monto;
        $insertar = "UPDATE cuentas SET presupuesto = '$nuevoPresupuesto', saldo = saldo + '$monto' WHERE id_cliente = '$idCliente' ;";
    } elseif($restar == -1) {
        $nuevoPresupuesto = $presupuesto - $monto;
        $insertar = "UPDATE cuentas SET presupuesto = '$nuevoPresupuesto', saldo = saldo - '$monto' WHERE id_cliente = '$idCliente' ;";
    }
    
    

    
    $resultado = mysqli_query($conexion, $insertar);
    if($resultado){
        echo "<script>window.location='/CiudadaniaItaliana/pagos.php?id=$idCliente'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }
    }else {
        echo "<script>window.location='/CiudadaniaItaliana/pagos.php?id=$idCliente'</script>";
    }
?>
    

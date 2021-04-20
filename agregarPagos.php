<?php
    include("database.php");
    
    $idCliente = $_POST["idCliente"];
    $presupuesto = $_POST["presupuesto"];
    $pago = $_POST["pago"];
    $total_pagos = $_POST["total_pagos"];
    if($pago == 0){
        $saldo = $_POST["presupuesto"];
    }else{
        $saldo = intval($presupuesto) - (intval($pago) + intval($total_pagos)) ;
    }    
    $fecha_pago = $_POST["fecha_pago"];

    $insertar = "INSERT INTO cuentas (id_cuentas, id_cliente, presupuesto, pagos, saldo, fecha_pago) VALUES (NULL,'$idCliente', '$presupuesto', '$pago', '$saldo','$fecha_pago');";
    $resultado = mysqli_query($conexion, $insertar);
    if($resultado){
        echo "<script>window.location='/CiudadaniaItaliana/pagos.php?id=$idCliente'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/CiudadaniaItaliana'</script>";
    }
?>
    

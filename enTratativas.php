<?php
    include("database.php");    
    $clientes= "SELECT * FROM clientes WHERE estado = 'Tratamiento' ORDER BY apellido";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <title>Document</title>
</head>
<body>
    <ul class="menu">
        <li><a href="index.php">Activos</a></li>
        <li><a href="enTratativas.php" style="text-decoration: underline; color: black;">En Tratavivas</a></li>
        <li><a href="terminados.php">Terminados</a></li>
        <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
    </ul>
    <div id="main-container">

    <table>
        <thead>
            <tr style="font-size: 1.5rem;">
            <th>Cliente</th><th>Fecha</th><th>Email</th><th>Telefono</th><th>Tipo de Cliente</th><th>Agente</th><th>Arbol</th><th>Presupuesto</th><th>Pagos</th><th>Saldo</th><th></th>
            </tr>
        </thead>
        <?php
    $resultado = mysqli_query($conexion,$clientes); 
    
    while($row=mysqli_fetch_assoc($resultado)){
       
?>
        <tr style="font-size: 1.5rem;">
            <td><?php echo $row["apellido"]," ", $row["nombre"]; ?></td>
            <td><?php echo $row["fecha"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["telefono"]; ?></td>
            <td><?php echo $row["tipo_de_cliente"]; ?></td>
            <td><?php echo $row["carpeta"]; ?></td>
            <td><a href="arbol.php?id=<?php echo $row["id_cliente"];?>">Arbol</a></td>
            <?php 
    $idCliente= $row["id_cliente"];
    $cuentas = "SELECT * FROM cuentas WHERE id_cliente = $idCliente"; 
    $resultado_cuentas = mysqli_query($conexion,$cuentas);
    $total_pagos=0;
    $presupuesto=0;
    while($rowCuentas=mysqli_fetch_assoc($resultado_cuentas)){
        if($rowCuentas["presupuesto"]){
        $presupuesto = $rowCuentas["presupuesto"];
        }
        $total_pagos= $total_pagos + $rowCuentas["pagos"];
        $saldo = $presupuesto - $total_pagos;

    }

    if($presupuesto > 0){
    
       
?>            
            
            <td>$<?php 
                        if(strlen($presupuesto) ==6){echo wordwrap($presupuesto, 3, ".",true);}
                        else
                        {echo $presupuesto;}
                                 
            ?></td>
            <td>$<a href="pagos.php?id=<?php echo $row["id_cliente"];?>"><?php if(strlen($total_pagos) ==6){echo wordwrap($total_pagos, 3, ".",true);}
                        else
                        {echo $total_pagos;} ?></a></td>
            <td>$<?php if(strlen($saldo) ==6){echo wordwrap($saldo, 3, ".",true);}
                        else
                        {echo $saldo;}; ?></td>

<?php }else{ ?>     

            <td><a href="pagos.php?id=<?php echo $row["id_cliente"];?>">Pagos</a><td>
            <td></td>
            

<?php } ?>
            <td class="acciones">
                <a href="actualizar.php?id=<?php echo $row["id_cliente"];?>" class="mover"><i class="fas fa-edit"></i></a>
                <a href="eliminar.php?id=<?php echo $row["id_cliente"];?>&estado=enTratativas.php" class="eliminar"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
<?php } ?>
    </table>
    </div>
    <script src="confirmacion.js"></script>

</body>
</html>
<?php
    include("database.php");    
    $clientes= "SELECT * FROM clientes WHERE estado = 'Activo' ORDER BY apellido";
    
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
        <li><a href="index.php" style="text-decoration: underline; color:black;">Activos</a></li>
        <li><a href="enTratativas.php">En Tratativas</a></li>
        <li><a href="terminados.php">Terminados</a></li>
        <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
    </ul>
    <div id="main-container">

    <table>
        <thead>
            <tr style="font-size: 1.5rem;">
                <th>Cliente</th><th>Fecha</th><th>Email</th><th>Telefono</th><th>Tipo de Cliente</th><th>Responsable</th><th>Trabajo</th><th>Presupuesto</th><th>Pagos</th><th>Saldo</th><th></th>
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
            <td><?php if($row["tipo_trabajo"] == "Carpeta" || $row["tipo_trabajo"] == "Estado civil"){ ?>
            <a href="arbol.php?id=<?php echo $row["id_cliente"];?>"><?php echo $row["tipo_trabajo"]; ?></a>
            <?php }else{ ?>
                <a href="notas.php?id=<?php echo $row["id_cliente"];?>"><?php echo $row["tipo_trabajo"]; ?></a>
                <?php } ?>
            </td>
            
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
            
            <td >$<a href="pagos.php?id=<?php echo $row["id_cliente"];?>"><?php echo number_format($presupuesto,0, ",", "."); ?>
            </a></td>
            <td >$<?php echo number_format($total_pagos,0, ",", "."); ?></td>
            <td >$<?php echo number_format($saldo,0, ",", "."); ?></td>

<?php }else{ ?>     

            <td><a href="pagos.php?id=<?php echo $row["id_cliente"];?>">Pagos</a><td>
            <td></td>
            

<?php } ?>
            <td class="acciones">
                <a href="actualizar.php?id=<?php echo $row["id_cliente"];?>" class="mover"><i class="fas fa-edit"></i></a>
                <a href="eliminar.php?id=<?php echo $row["id_cliente"];?>&estado=index.php" class="eliminar"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
<?php } ?>
    </table>
    </div>
    <script src="confirmacion.js"></script>
</body>
</html>
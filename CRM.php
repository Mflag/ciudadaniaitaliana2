<?php
    include("database.php");    
    $clientes= "SELECT * FROM clientes WHERE tipo_de_cliente = 'CRM' AND estado='Activo' ORDER BY fecha";
    
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
    <!-- 12/05 Agragar la proxima conexion-->
<nav class="menu">
    <ul>
        <li> <a href="#" class="boton_desplegar_clientes" style="text-decoration: underline; color:black;">Clientes</a>
            <ul class="desplegar_clientes">
                <li><a href="index.php" >Activos</a></li>
                <li><a href="enTratativas.php">En Tratativas</a></li>
                <li><a href="terminados.php">Terminados</a></li>
                <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
                <li><a href="CRM.php">CRM</a></li>
            </ul>
        </li>
        <li><a href="#">Responsables</a></li>
        <li><a href="#">Socios</a> </li>
    </ul>
    
</nav>
<h1>CRM</h1>
 <!-- 12/05 Agragar la proxima conexion-->
 <div id="main-container">
 <table>
        <thead>
            <tr style="font-size: 1.5rem;">
                <th>Cliente</th><th>Fecha</th><th>Email</th><th>Telefono</th><th>Tipo de Cliente</th><th>Asignado a</th><th>Trabajo</th><th>Presupuesto</th><th>Pagos</th><th>Saldo</th><th></th>
            </tr>
        </thead>
<?php
    $resultado = mysqli_query($conexion,$clientes); 
    $total_pagos_CRM=0;
    $total_saldo_CRM=0;
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
    $cuentas_pagos = "SELECT * FROM cuentas WHERE  id_cliente = '$idCliente' " ;
    $resultado_cuentas_pagos = mysqli_query($conexion,$cuentas_pagos);
    
    while($rowPagos=mysqli_fetch_assoc($resultado_cuentas_pagos)){
        $total_pagos_CRM = $total_pagos_CRM + $rowPagos["pagos"];
        
        
    }  

    $cuentas = "SELECT * FROM cuentas WHERE  id_cliente = '$idCliente' AND id_cuentas= (SELECT MAX(id_cuentas) FROM cuentas ) " ; 
    $resultado_cuentas = mysqli_query($conexion,$cuentas);
    
    
    while($rowCuentas=mysqli_fetch_assoc($resultado_cuentas)){
        
        $total_saldo_CRM = $total_saldo_CRM + $rowCuentas["saldo"];
        
 }}?>
    </table>
    <p><?php echo $total_pagos_CRM;?></p>
    <p><?php echo $total_saldo_CRM;?></p>
 
 </div>

</body>
</html>
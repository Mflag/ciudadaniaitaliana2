<?php
    include("database.php"); 
    $id=$_GET["id"];   
    $cliente= "SELECT * FROM clientes WHERE id_cliente='$id'";
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
        <li><a href="enTratativas.php">En Tratavivas</a></li>
        <li><a href="terminados.php">Terminados</a></li>
        <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
    </ul>
    <?php
    $resultadoCliente = mysqli_query($conexion,$cliente); 
    
    while($rowUno=mysqli_fetch_assoc($resultadoCliente)){
        
        ?>
        <div class="Cliente">
            <p>Cliente: <?php echo $rowUno["apellido"]," ", $rowUno["nombre"]; ?></p>
            <p>Fecha de Inicio: <?php echo $rowUno["fecha"]; ?></p>
            <p>Email: <?php echo $rowUno["email"]; ?></p>
            <p>Telefono: <?php echo $rowUno["telefono"]; ?></p>
            <p>Estado: <?php echo $rowUno["estado"]; ?></p>
        </div>    
        <?php } ?>
        <div id="main-container">
        <table>
            <thead>
                <tr style="font-size: 2rem;">
                   <th>Fecha de pago</th><th>Medio de Pago</th><th>Pagos</th><th>Saldo</th><th></th>
                </tr>
            </thead>
        <?php 
            $cuentas = "SELECT * FROM cuentas WHERE id_cliente = '$id'"; 
            $resultado_cuentas = mysqli_query($conexion,$cuentas);
            $total_pagos=0;
            $flagPresupuesto = 0;
            
            while($rowCuentas=mysqli_fetch_assoc($resultado_cuentas)){
                $total_pagos = $total_pagos + $rowCuentas["pagos"];
                $presupuesto = $rowCuentas["presupuesto"];
                if($flagPresupuesto == 0){
                ?>
                    <tr style="border-bottom: 3px solid black;">
                    <td></td><td style="font-size: 2rem;">Presupuesto: $<?php echo $presupuesto ?></td><td ></td><td></td><td></td>
                    </tr>
                <?php    
                    $flagPresupuesto++;
                }
        ?>            
                <tr style="font-size: 2rem;">    
                                      
                    <td><?php echo $rowCuentas["fecha_pago"]; ?></td>
                    <td><?php echo $rowCuentas["medio"]; ?></td>
                    <td>$<?php echo $rowCuentas["pagos"]; ?></td>
                    <td>$<?php echo $rowCuentas["saldo"]; ?></td>
                    <td><a href="eliminarPagos.php?id=<?php echo $rowCuentas["id_cuentas"]; ?>&idCliente=<?php echo $id;?>" class="eliminar"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
        <?php } ?>

        </table>
        <?php
           if(isset($presupuesto) ){
        ?>
            <form action="agregarPagos.php" method="post" class="crear_pago">
            <h3>Agregar Pago</h3>    
            <ul>
                <input type="hidden" name="idCliente" value="<?php echo $id ?>">                
                <input type="hidden" name="presupuesto" value="<?php echo $presupuesto ?>">
                <input type="hidden" value="<?php echo $total_pagos ?>" name="total_pagos">
                <li>
                    <label for="pago">Pago: </label>
                    <input type="number" name="pago"  required></li>
                <li>
                <li>
                    <label for="medio">Medio: </label>
                    <select name="medio" id="medio">
                        <option value="Efectivo">Efectivo</option>
                        <option value="Transferecia">Transferecia</option>

                    </select>
                </li>
                    <label for="fecha_pago">Fecha: </label>
                    <input type="date" name="fecha_pago" value="<?php echo date('Y-m-d'); ?>" required>
                </li>
                <li><input type="submit"></li>
            </ul>
            </form>
        <?php }else{ ?>
            <form action="agregarPagos.php" method="post" class="crear_pago">
            <h3>Agregar Presupuesto</h3>    
            <ul>
                <input type="hidden" name="idCliente" value="<?php echo $id ?>">
                <li>
                    <label for="presupuesto">Presupuesto: </label>
                    <input type="number" name="presupuesto" required >
                </li>
                <input type="hidden" value="<?php echo $total_pagos ?>" name="total_pagos">
                    
                    <input type="hidden" name="pago" value="0" >
                
                <li>
                    <label for="fecha_pago">Fecha: </label>
                    <input type="date" name="fecha_pago" value="<?php echo date('Y-m-d'); ?>" required>
                </li>
                <li>
                    <input type="submit">
                </li>
            </ul>
            </form>
        <?php } ?>
        </div>
</body>
</html>
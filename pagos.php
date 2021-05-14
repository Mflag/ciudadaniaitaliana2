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
 <!-- 12/05 Agragar la proxima conexion-->
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
                   <th>Fecha de pago</th><th>Medio de Pago</th><th class="tamaño_numeros">Pagos</th><th class="tamaño_numeros">Saldo</th><th></th>
                </tr>
            </thead>
        <?php 
            $cuentas = "SELECT * FROM cuentas WHERE id_cliente = '$id'"; 
            $resultado_cuentas = mysqli_query($conexion,$cuentas);
            $total_pagos=0;
            $flagPresupuesto = 0;
            $saldo =0;
            
            while($rowCuentas=mysqli_fetch_assoc($resultado_cuentas)){
                $total_pagos = $total_pagos + $rowCuentas["pagos"];
                $presupuesto = $rowCuentas["presupuesto"];
                if($flagPresupuesto == 0){
                ?>
                    <tr style="border-bottom: 3px solid black;">
                    <td colspan="5" style="font-size: 2rem; text-align: center;">Presupuesto: $<?php echo number_format($presupuesto,2, ",", ".") ?></td>
                    </tr>
                <?php    
                    $flagPresupuesto++;
                }
        ?>            
                <tr style="font-size: 2rem;">    
                                      
                    <td><?php echo $rowCuentas["fecha_pago"]; ?></td>
                    <td><?php echo $rowCuentas["medio"]; ?></td>
                    <td class="numeros">$<?php echo number_format($rowCuentas["pagos"],2, ",", "."); ?></td>
                    <td class="numeros">$<?php echo number_format($rowCuentas["saldo"],2, ",", "."); ?></td>
                    <td class="numeros"><a href="eliminarPagos.php?id=<?php echo $rowCuentas["id_cuentas"]; ?>&idCliente=<?php echo $id;?>" class="eliminar"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
        <?php $saldo = $rowCuentas["saldo"]; } ?>

        </table>
        <?php
        
        if(isset($presupuesto) ){ ?>
        <div>
            <div class="crear_pago">
                <h3> <button onclick="javascript:modificarPresupuesto()">Modificar Presupuesto<i class="fas fa-sort-down"></i></button></h3>
                <form action="modificarPresupuesto.php" method="post" id="modificarPresupuesto" style="display:none;">
                
                    <input type="hidden" name="idCliente" value="<?php echo $id ?>">
                    <input type="hidden" name="presupuesto" value="<?php echo $presupuesto ?>">
                    <ul>
                        <li>
                            <label for="monto">Monto :</label>
                            <input type="number" name="monto" required>
                        </li>
                    
                        <li >
                        <label  for="sumar">Sumar</label>
                        <input style="width: 20px" type="checkbox" name="sumar"  id="sumar" value="1">
                        </li>
                        <li>
                        <label for="restar">Restar</label>
                        <input style="width: 20px" type="checkbox" name="restar" id="restar" value="-1">
                        </li>
                        
                        <li>
                        <input type="submit">
                        </li>
                    </ul>
                </form>
            </div>
        <?php
            if($saldo != 0 ){
                ?>
            <div class="crear_pago">
                <h3> <button onclick="javascript:agregarPago()">Agregar Pago<i class="fas fa-sort-down"></i></button></h3>    
                <form action="agregarPagos.php" method="post" id="agregarPago" style="display:none;">
                
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
                            <option value="Mercado Pago">Mercado Pago</option>

                        </select>
                    </li>
                        <label for="fecha_pago">Fecha: </label>
                        <input type="date" name="fecha_pago" value="<?php echo date('Y-m-d'); ?>" required>
                    </li>
                    <li><input type="submit"></li>
                </ul>
                </form>
            </div>
        </div>
        <?php }}else{ ?>
            <div class="crear_pago">
            <h3>Agregar Presupuesto</h3>  
            <form action="agregarPagos.php" method="post" id="agregarPresupuesto" >  
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
            </div>
        <?php }?>
        </div>
        <script src="ocultarFormularios.js"></script>
</body>
</html>
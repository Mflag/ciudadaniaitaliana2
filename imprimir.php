<?php
    include("database.php"); 
    $id=$_GET["id"];   
    $arbol= "SELECT * FROM arboles WHERE id_cliente= '$id'";
    $cliente= "SELECT * FROM clientes WHERE id_cliente= '$id'";
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
        
<?php } ?><br><h2>Pagos</h2><br>
    <table class="paraImprimir">
            <thead >
                <tr>
                   <th>Fecha de pago</th><th>Medio de Pago</th><th>Pagos</th><th>Saldo</th>
                </tr>
            </thead>
        <?php 
            $cuentas = "SELECT * FROM cuentas WHERE id_cliente ='$id'"; 
            $resultado_cuentas = mysqli_query($conexion,$cuentas);
            $total_pagos=0;
            $flagPresupuesto = 0;
            
            while($rowCuentas=mysqli_fetch_assoc($resultado_cuentas)){
                $total_pagos = $total_pagos + $rowCuentas["pagos"];
                $presupuesto = $rowCuentas["presupuesto"];
                if($flagPresupuesto == 0){
                ?>
                    <tr >
                    <td >Presupuesto: $<?php echo $presupuesto ?></td><td></td><td ></td><td></td><td></td>
                    </tr>
                <?php    
                    $flagPresupuesto++;
                }
        ?>            
                <tr >    
                                      
                    <td><?php echo $rowCuentas["fecha_pago"]; ?></td>
                    <td><?php echo $rowCuentas["medio"]; ?></td>
                    <td>$<?php echo $rowCuentas["pagos"]; ?></td>
                    <td>$<?php echo $rowCuentas["saldo"]; ?></td>
                    
                </tr>
        <?php } ?>

        </table><br><h2>Arbol</h2><br>

    <div >
    <table class="paraImprimir">
        <thead>
            <tr>
                <th class="acta">Acta</th><th class="lugar">Lugar</th><th class="datos">Estado de acta</th><th class="fecha">Fecha</th>
            </tr>
            
        </thead>
<?php
    $resultadoArbol = mysqli_query($conexion,$arbol); 
    
    while($row=mysqli_fetch_assoc($resultadoArbol)){
        
        ?>
        
            <td><?php echo $row["acta"]; ?></td>
            <td><?php echo $row["nombre"]; ?> <?php echo $row["apellido"]; ?></td>
            <td></td>
            <td></td>
        
        <tr>
            
            <td><?php echo $row["acta"]; ?>.1</td>
            <td><?php echo $row["lugar_nacimiento"]; ?></td>
            <td><?php echo $row["datos_nacimiento"]; ?></td>
            <td><?php echo $row["fecha_nacimiento"]; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $row["acta"]; ?>.2<?php    if($row["segundo"] == 1){echo ".1";}?></td>
            <td><?php echo $row["lugar_matrimonio"]; ?></td>
            <td><?php echo $row["datos_matrimonio"]; ?></td>
            <td><?php echo $row["fecha_matrimonio"]; ?></td>
            <td></td>
        </tr>
        
        <?php    if($row["divorcio"] == 1){    ?>
            <tr>
            <td><?php echo $row["acta"]; ?>.9</td>
            <td><?php echo $row["lugar_divorcio"]; ?></td>
            <td><?php echo $row["datos_divorcio"]; ?></td>
            <td><?php echo $row["fecha_divorcio"]; ?></td>
            <td></td>           
            </tr>
            <?php    if($row["segundo"] == 1){    ?>
            <tr>
            <td><?php echo $row["acta"]; ?>.2.2</td>
            <td><?php echo $row["lugar_segundo"]; ?></td>
            <td><?php echo $row["datos_segundo"]; ?></td>
            <td><?php echo $row["fecha_segundo"]; ?></td>
            <td></td>           
            </tr>  
            <?php    if($row["segundoDivorcio"] == 1){    ?>
            <tr>
            <td><?php echo $row["acta"]; ?>.9.2</td>
            <td><?php echo $row["lugar_segundoDivorcio"]; ?></td>
            <td><?php echo $row["datos_segundoDivorcio"]; ?></td>
            <td><?php echo $row["fecha_segundoDivorcio"]; ?></td>
            <td></td>           
            </tr>
            <?php    if($row["tercero"] == 1){    ?>
            <tr>
            <td><?php echo $row["acta"]; ?>.2.3</td>
            <td><?php echo $row["lugar_tercero"]; ?></td>
            <td><?php echo $row["datos_tercero"]; ?></td>
            <td><?php echo $row["fecha_tercero"]; ?></td>
            <td></td>           
            </tr>      
        <?php }}}} ?>        


        <tr>
            <td><?php echo $row["acta"]; ?>.3</td>
            <td><?php echo $row["lugar_defuncion"]; ?></td>
            <td><?php echo $row["datos_defuncion"]; ?></td>
            <td><?php echo $row["fecha_defuncion"]; ?></td>
            <td></td>           
            
        </tr>   
        <tr class="separacion"><td></td><td></td><td></td><td></td><td></td></tr>
        
<?php } ?>
    </table>
        
    </div>
    
</body>
</html>
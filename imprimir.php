<?php
    include("database.php"); 
    $id=$_GET["id"];   
    $arbol= "SELECT * FROM arboles WHERE id_cliente= '$id'";
    $cliente= "SELECT * FROM clientes WHERE id_cliente= '$id'";
    $notas= "SELECT * FROM notas WHERE id_cliente= '$id' ORDER BY fecha_nota";
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
        <div class="Cliente" style="border-bottom: none">           
            <p>Cliente: <?php echo $rowUno["apellido"]," ", $rowUno["nombre"]; ?></p>
            <p>Fecha de Inicio: <?php echo $rowUno["fecha"]; ?></p>
            <p>Email: <?php echo $rowUno["email"]; ?></p>
        </div>
        <div class="Cliente">
            <p>Telefono: <?php echo $rowUno["telefono"]; ?></p>            
            <p>Tipo de trabajo: <?php echo $rowUno["tipo_de_cliente"]; ?></p>
            <p>Trabajo: <?php echo $rowUno["tipo_trabajo"]; ?></p>
            <p>Estado: <?php echo $rowUno["estado"]; ?></p>
        </div>    
        
<?php } ?><p style="font-size:1.5rem;text-align: center;">Pagos</p>
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
                    <td colspan="4" style="text-align: center;border: solid black 3px;font-size: 1.7rem;">Presupuesto: $<?php echo number_format($presupuesto,0, ",", "."); ?></td>
                    </tr>
                <?php    
                    $flagPresupuesto++;
                }
        ?>            
                <tr >    
                                      
                    <td><?php echo $rowCuentas["fecha_pago"]; ?></td>
                    <td><?php echo $rowCuentas["medio"]; ?></td>
                    <td>$<?php echo number_format($rowCuentas["pagos"],0, ",", "."); ?></td>
                    <td>$<?php echo number_format($rowCuentas["saldo"],0, ",", "."); ?></td>
                    
                </tr>
        <?php } ?>

        </table><p style="font-size:1.5rem;text-align: center;">Arbol</p>

    <div >
    <table class="paraImprimir">
        <thead>
            <tr >
                <th>Acta</th><th>Lugar</th><th>Estado de acta</th><th>Fecha</th>
            </tr>
            
        </thead>
<?php
    $resultadoArbol = mysqli_query($conexion,$arbol); 
    
    while($row=mysqli_fetch_assoc($resultadoArbol)){
        
        ?>
        <tr style="border: solid black 3px;font-size: 1.7rem;">
            <td><?php echo $row["acta"]; ?></td>
            <td colspan="4" style="text-align: center;"><?php echo $row["nombre"]; ?> <?php echo $row["apellido"]; ?></td>            
            
            
        </tr>
        <?php
    $idArbol = $row["id_arbol"];    
    $acta= "SELECT * FROM actas WHERE id_arbol= '$idArbol' ORDER BY acta";
    $resultadoActas = mysqli_query($conexion,$acta); 
    
    while($rowActa=mysqli_fetch_assoc($resultadoActas)){
        
        ?>      
        <tr>
            
            <td><?php echo $row["acta"]; ?>.<?php echo $rowActa["acta"]; ?></td>
            <td><?php echo $rowActa["lugar"]; ?></td>
            <td><?php echo $rowActa["dato"]; ?></td>
            <td><?php echo $rowActa["fecha"]; ?></td>
            
        </tr>
    <?php }} ?>
    </table><p style="font-size:1.5rem;text-align: center;">Notas</p>
    <table class="paraImprimir">
        <thead>
        <tr >           
            <th style="width: 200px;">Fecha</th><th>Nota</th><th></th>
        </tr>             
        </thead>
        
        <?php
    $resultadoNotas = mysqli_query($conexion,$notas); 
    
    while($rowNotas=mysqli_fetch_assoc($resultadoNotas)){
        
        ?>
        <tr style="font-size: 1.5rem;">
            <td><?php echo $rowNotas["fecha_nota"]; ?></td>
            <td><?php echo $rowNotas["nota"]; ?></td>
            <td class="numeros"><a href="eliminarNotas.php?id=<?php echo $rowNotas["id_notas"]; ?>&idCliente=<?php echo $id;?>" class="eliminar"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
<?php } ?>
    </table>
        
    </div>
    
</body>
</html>
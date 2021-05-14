<?php
    include("database.php"); 
    $id=$_GET["id"];   
    $notas= "SELECT * FROM notas WHERE id_cliente= '$id' ORDER BY fecha_nota";
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
    <ul class="menu">
        <li><a href="index.php">Activos</a></li>
        <li><a href="enTratativas.php">En Tratativas</a></li>
        <li><a href="terminados.php">Terminados</a></li>
        <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
        <li><a href="CRM.php">CRM</a></li>
    </ul>
    <?php
    $resultadoCliente = mysqli_query($conexion,$cliente); 
    
    while($rowUno=mysqli_fetch_assoc($resultadoCliente)){
        
        ?>
        <div class="Cliente" style="font-size:1.7rem;">
            <p>Cliente: <?php echo $rowUno["apellido"]," ", $rowUno["nombre"]; ?></p>
            <p>Fecha de Inicio: <?php echo $rowUno["fecha"]; ?></p>
            <p>Email: <?php echo $rowUno["email"]; ?></p>
            <p>Telefono: <?php echo $rowUno["telefono"]; ?></p>
            <p>Trabajo: <?php echo $rowUno["tipo_trabajo"]; ?></p>
            <p>Estado: <?php echo $rowUno["estado"]; ?></p>
        </div>       
<?php } ?>
<div id="main-container">
    <table>
        <thead>
        <tr style="font-size: 2rem;">           
            <th style="width: 200px;">Fecha</th><th>Nota</th><th></th>
        </tr>             
        </thead>
        
        <?php
    $resultadoNotas = mysqli_query($conexion,$notas); 
    
    while($rowNotas=mysqli_fetch_assoc($resultadoNotas)){
        
        ?>
        <tr style="font-size: 2rem;">
            <td><?php echo $rowNotas["fecha_nota"]; ?></td>
            <td><?php echo $rowNotas["nota"]; ?></td>
            <td class="numeros"><a href="eliminarNotas.php?id=<?php echo $rowNotas["id_notas"]; ?>&idCliente=<?php echo $id;?>" class="eliminar"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
<?php } ?>
    </table>
    <form action="agregarNotas.php" method="post" class="crear_pago">
    <h3>Agregar Nota</h3> 
        <input type="hidden" name="idCliente" value="<?php echo $id ?>">
        <input type="hidden" name="tipoTrabajo" value="<?php echo $tipoTrabajo ?>">
        <ul>
           
            <li>
                <label for="nota">Nota</label>
                <textarea name="nota" required></textarea>
            </li>
            <li>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" value="<?php echo date('Y-m-d');?>" required>
            </li>
        <li><input type="submit"></li>    
        </ul>
        
    </form>
    </div>
</body>
</html>
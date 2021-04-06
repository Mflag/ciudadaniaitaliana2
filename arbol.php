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
            <p>Cliente: <?php echo $rowUno["nombre"]; ?></p>
            <p>Fecha de Inicio: <?php echo $rowUno["fecha"]; ?></p>
            <p>Email: <?php echo $rowUno["email"]; ?></p>
            <p>Telefono: <?php echo $rowUno["telefono"]; ?></p>
            <p>Estado: <?php echo $rowUno["estado"]; ?></p>
        </div>    
        
<?php } ?>

    <div id="main-container">
    <table>
        <thead>
            <tr>
                <th>Partida</th><th>Nobre</th><th>Comuna</th><th>Estado de partida</th><th></th>
            </tr>
        </thead>
<?php
    $resultadoArbol = mysqli_query($conexion,$arbol); 
    
    while($row=mysqli_fetch_assoc($resultadoArbol)){
        
        ?>
        <tr>
            <td><?php echo $row["partida"]; ?></td>
            <td><?php echo $row["nombre"]; ?></td>
            <td><?php echo $row["comuna"]; ?></td>
            <td><?php echo $row["estado_partida"]; ?></td>
            
            <td>
                <a href="actualizarArbol.php?id=<?php echo $row["id_arbol"];?>" class="mover">Modificar</a>
                <a href="eliminarArbol.php?id=<?php echo $row["id_arbol"];?>&idCliente=<?php echo $row["id_cliente"];?>" class="eliminar">Eliminar</a>
            </td>
        </tr>
<?php } ?>
    </table>
        <form action="crearArbol.php" method="post" class="crear_arbol">
            <h3>Crear Descendiente</h3>
            <ul>
                <input type="hidden" name="idCliente" value="<?php echo $id;?>">
                <li><input name="partida" type="text" placeholder="Partida"></li>       
                <li><input name="nombre" type="text" placeholder="Nombre" required></li>     
                <li><input name="comuna" type="text" placeholder="Comuna"></li>       
                <li><input name="estadoPartida" type="text" placeholder="Estado de partida"></li>            
                <li><input type="submit" value="Crear"></li>
            </ul>
        </form>
    </div>
    <script src="confirmacion.js"></script>
</body>
</html>
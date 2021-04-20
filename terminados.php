<?php
    include("database.php");    
    $clientes= "SELECT * FROM clientes WHERE estado = 'Terminado' ORDER BY apellido";
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
        <li><a href="terminados.php" style="text-decoration: underline;">Terminados</a></li>
        <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
    </ul>
    <div id="main-container">

    <table>
        <thead>
            <tr>
            <th>Cliente</th><th>Fecha</th><th>Email</th><th>Telefono</th><th>Origen</th><th>Carpeta</th><th>Arbol</th><th>Acciones</th>
            </tr>
        </thead>
        <?php
    $resultado = mysqli_query($conexion,$clientes); 
    
    while($row=mysqli_fetch_assoc($resultado)){
       
?>
        <tr>
            <td><?php echo $row["apellido"]," ", $row["nombre"]; ?></td>
            <td><?php echo $row["fecha"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["telefono"]; ?></td>
            <td></td>
            <td></td>
            <td><a href="arbol.php?id=<?php echo $row["id_cliente"];?>">Arbol</a></td>
            <td class="acciones">
                <a href="actualizar.php?id=<?php echo $row["id_cliente"];?>" class="mover"><i class="fas fa-edit"></i></a>
                <a href="eliminar.php?id=<?php echo $row["id_cliente"];?>&estado=terminados.php" class="eliminar"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
<?php } ?>
    </table>
    </div>
    <script src="confirmacion.js"></script>

</body>
</html>
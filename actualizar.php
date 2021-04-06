<?php
    include("database.php");    
    $id=$_GET["id"];
    $clientes= "SELECT * FROM clientes WHERE id_cliente ='$id'";
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
    <div id="main-container">

    <table>
        <thead>
            <tr>
                <th>Apellido</th><th>Nombre</th><th>Fecha</th><th>Email</th><th>Telefono</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
<?php
    $resultado = mysqli_query($conexion,$clientes); 
    
    while($row=mysqli_fetch_assoc($resultado)){
       
?>
    <form action="actualizarDB.php" method="post" id="actualizar_cliente">
        
            <td><input type="hidden" value="<?php echo $row["id_cliente"]; ?>" name="id">
            <input type="text" value="<?php echo $row["apellido"]; ?>" name="apellido" required></td>
            <td><input type="text" value="<?php echo $row["nombre"]; ?>" name="nombre" required></td>
            <td><input type="text" value="<?php echo $row["fecha"]; ?>" name="fecha" required></td>
            <td><input type="text" value="<?php echo $row["email"]; ?>" name="email"></td>
            <td><input type="text" value="<?php echo $row["telefono"]; ?>" name="telefono"></td>
            <td><select name="estado" id="estado" form="actualizar_cliente">
                <option value="activo">Activo</option>
                <option value="tratamiento">En Tratamiento</option>
                <option value="terminado">Terminado</option>
            </select></td>
            
            <td><input type="submit" value="Actualizar"> </td>            
        
</form>
<?php } ?>
    </table>
    </div>
</body>
</html>
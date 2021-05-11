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
        <li><a href="enTratativas.php">En Tratativas</a></li>
        <li><a href="terminados.php">Terminados</a></li>
        <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
    </ul>
    <div id="main-container">

    <table>
        <thead>
            <tr>
                <th>Apellido</th><th>Nombre</th><th>Fecha</th><th>Email</th><th>Telefono</th><th>Tipo de Cliente</th><th>Carpeta</th><th>Trabajo</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
<?php
    $resultado = mysqli_query($conexion,$clientes); 
    
    while($row=mysqli_fetch_assoc($resultado)){
       
?>
    <form action="actualizarDB.php" method="post" id="actualizar_cliente">
        
            <input type="hidden" value="<?php echo $row["id_cliente"]; ?>" name="id">
            <td><input type="text" value="<?php echo $row["apellido"]; ?>" name="apellido" required></td>
            <td><input type="text" value="<?php echo $row["nombre"]; ?>" name="nombre" required></td>
            <td><input type="text" value="<?php echo $row["fecha"]; ?>" name="fecha" required></td>
            <td><input type="text" value="<?php echo $row["email"]; ?>" name="email"></td>
            <td><input type="text" value="<?php echo $row["telefono"]; ?>" name="telefono"></td>
            <td>
                <select name="tipo_de_cliente" id="tipo_de_cliente" form="actualizar_cliente">
                    <option value="<?php echo $row["tipo_de_cliente"]; ?>"><?php echo $row["tipo_de_cliente"]; ?></option>
                    <option value="CRM">CRM</option>
                    <option value="Propio">Propio</option>
                
                </select>
            </td>
            <td>
                <select name="carpeta" id="carpeta" form="actualizar_cliente">
                    <option value="<?php echo $row["carpeta"]; ?>"><?php echo $row["carpeta"]; ?></option>
                    <option value="Andrea">Andrea</option>
                    <option value="Franco">Franco</option>
                    <option value="Matias">Matias</option>
                    <option value="Rocio">Rocio</option>
                </select>
            </td>
            <td>
                <select name="tipo_trabajo" id="tipo_trabajo" form="actualizar_cliente">
                    <option value="<?php echo $row["tipo_trabajo"]; ?>"><?php echo $row["tipo_trabajo"]; ?></option>
                    <option value="Carpeta">Carpeta</option>
                    <option value="Turno">Turno</option>
                    <option value="Fastit">Fastit</option>
                    <option value="Estado civil">Estado civil</option>
                    <option value="Rectificaiones">Rectificaiones</option>
                    <option value="Actas">Actas</option>
                    <option value="CNE">CNE</option>
                    <option value="Traducciones">Traducciones</option>
                </select>
            </li>       
            <td>
                <select name="estado" id="estado" form="actualizar_cliente">
                <option value="<?php echo $row["estado"]; ?>"><?php echo $row["estado"]; ?></option>
                <option value="Activo">Activo</option>
                <option value="Tratamiento">En Tratamiento</option>
                <option value="Terminado">Terminado</option>
                </select>
            </td>
           
            
            <td><input type="submit" value="Actualizar"> </td>            
        
</form>
<?php } ?>
    </table>
    </div>
</body>
</html>
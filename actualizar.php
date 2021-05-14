<?php
    include("database.php");    
    $id=$_GET["id"];
    $clientes= "SELECT * FROM clientes WHERE id_cliente ='$id'";
    $responsables= "SELECT * FROM responsables ORDER BY responsable";
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
    <div id="main-container">

    <table>
        <thead>
            <tr>
                <th>Apellido</th><th>Nombre</th><th>Fecha</th><th>Email</th><th>Telefono</th><th>Tipo de Cliente</th><th>Asignado a</th><th>Trabajo</th><th>Estado</th><th>Acciones</th>
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

                    <?php
    $resultado = mysqli_query($conexion,$responsables); 
    
    while($rowResponsable=mysqli_fetch_assoc($resultado)){
       
?>        
                    <option value="<?php echo $rowResponsable["responsable"];?>"><?php echo $rowResponsable["responsable"];?></option>
<?php } ?>                    
                
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
                <option value="En Tratativas">En Tratativas</option>
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
<?php
    include("database.php");    
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
    <form action="crearCliente.php" method="post" id="nuevo_cliente" style="font-size: 1.5rem;">
        <h2>Nuevo Cliente</h2>
        <ul>
            <li>
                <label for="apellido">Apellido: </label>
                <input name="apellido" type="text" required>
            </li>        
            <li>
                <label for="nombre">Nombre: </label>
                <input name="nombre" type="text"  required>
            </li>       
            <li>
                <label for="fecha">Fecha:</label>
                <input name="fecha" type="date" value="<?php echo date('Y-m-d'); ?>" required>
            </li>     
            <li>
                <label for="email">Email: </label>
                <input name="email" type="text" >
            </li>       
            <li>
                <label for="telefono">Telefono: </label>
                <input name="telefono" type="number" >
            </li>
            <li>
                <label for="tipo_de_cliente"> Tipo de Cliente: </label>
                <select name="tipo_de_cliente" id="tipo_de_cliente" form="nuevo_cliente">
                    <option value="Indefinido">Indefinido</option>
                    <option value="CRM">CRM</option>
                    <option value="Propio">Propio</option>
                    <option value="Agostino">Agostino</option>
                </select>
            </li>           
            <li>
                <label for="carpeta">Asignado a: </label>
                <select name="carpeta" id="carpeta" form="nuevo_cliente">
                    <option value="Indefinido">Indefinido</option>
                    <?php
    $resultado = mysqli_query($conexion,$responsables); 
    
    while($row=mysqli_fetch_assoc($resultado)){
       
?>        
                    <option value="<?php echo $row["responsable"];?>"><?php echo $row["responsable"];?></option>
<?php } ?>                    
                </select>
            </li>
            <li>
                <label for="tipo_trabajo">Tipo de trabajo: </label>
                <select name="tipo_trabajo" id="tipo_trabajo" form="nuevo_cliente">
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
            <li>
                <label for="estado">Estado: </label>
                <select name="estado" id="estado" form="nuevo_cliente">
                    <option value="Activo">Activo</option>
                    <option value="En Tratativas">En Tratativas</option>
                    <option value="Terminado">Terminado</option>
                </select>
            </li>
            
            <li><input type="submit"></li>
        </ul>
    </form>
</body>
</html>
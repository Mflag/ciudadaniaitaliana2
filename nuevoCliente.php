
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
    <nav>
    <ul class="menu">
        <li><a href="index.php">Activos</a></li>
        <li><a href="enTratativas.php">En Tratavivas</a></li>
        <li><a href="terminados.php">Terminados</a></li>
        <li><a href="nuevoCliente.php" style="text-decoration: underline;">Nuevo Cliente</a></li>
    </ul>
    </nav>
    <form action="crearCliente.php" method="post" id="nuevo_cliente">
        <ul>
            <li><input name="apellido" type="text" placeholder="Apellido" required></li>        
            <li><input name="nombre" type="text" placeholder="Nombre" required></li>       
            <li><input name="fecha" type="date" value="<?php echo date('Y-m-d'); ?>" required></li>     
            <li><input name="email" type="text" placeholder="Email"></li>       
            <li><input name="telefono" type="number" placeholder="Telefono"></li>       
            <select name="estado" id="estado" form="nuevo_cliente">
                <option value="activo">Activo</option>
                <option value="tratamiento">En Tratamiento</option>
                <option value="terminado">Terminado</option>
            </select>
            <li><input type="submit"></li>
        </ul>
    </form>
</body>
</html>
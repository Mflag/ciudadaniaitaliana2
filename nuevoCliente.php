
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
                    <option value="Compartido con Gonzalo">Compartido con Gonzalo</option>
                    <option value="Propio">Propio</option>
                </select>
            </li>           
            <li>
                <label for="carpeta">Carpeta: </label>
                <select name="carpeta" id="carpeta" form="nuevo_cliente">
                    <option value="Indefinido">Indefinido</option>
                    <option value="Andrea">Andrea</option>
                    <option value="Franco">Franco</option>
                    <option value="Matias">Matias</option>
                    <option value="Rocio">Rocio</option>
                </select>
            </li>       
            <li>
                <label for="estado">Estado: </label>
                <select name="estado" id="estado" form="nuevo_cliente">
                    <option value="Activo">Activo</option>
                    <option value="Tratamiento">En Tratamiento</option>
                    <option value="Terminado">Terminado</option>
                </select>
            </li>
            
            <li><input type="submit"></li>
        </ul>
    </form>
</body>
</html>
<?php
    include("database.php");    
    $id=$_GET["id"];
    $clientes= "SELECT * FROM arboles WHERE id_arbol ='$id'";
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
            <th>Partida</th><th>Nobre</th><th>Comuna</th><th>Estado de partida</th><th></th>
            </tr>
        </thead>
<?php
    $resultado = mysqli_query($conexion,$clientes); 
    
    while($row=mysqli_fetch_assoc($resultado)){
       
?>
    <form action="actualizarArbolDB.php" method="post" id="actualizar_cliente">
        <tr>
            <input type="hidden" value="<?php echo $row["id_arbol"]; ?>" name="idArbol">
            <input type="hidden" value="<?php echo $row["id_cliente"]; ?>" name="idCliente">
            <td><input type="text" value="<?php echo $row["partida"]; ?>" name="partida"></td>
            <td><input type="text" value="<?php echo $row["nombre"]; ?>" name="nombre" required></td>
            <td><input type="text" value="<?php echo $row["comuna"]; ?>" name="comuna"></td>
            <td><input type="text" value="<?php echo $row["estado_partida"]; ?>" name="estadoPartida"></td>
            <td><input type="submit" value="Actualizar"></td> 
        </tr>   
    </form>
<?php } ?>
                       
        

    </table>
    </div>
</body>
</html>
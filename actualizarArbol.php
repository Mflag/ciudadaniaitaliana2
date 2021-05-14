<?php
    include("database.php");    
    $id=$_GET["id"];
    $clientes= "SELECT * FROM arboles WHERE id_arbol ='$id'";
    $actas= "SELECT * FROM actas WHERE id_arbol ='$id' ORDER BY acta";
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
    <div id="main-container" >
    <table style="font-size: 1.7rem;">
        <thead>
            <tr> <th>Acta</th><th>Lugar</th><th>Estado de acta</th><th>Fecha</th><th></th><th></th></tr>
        </thead>
    <?php 
        $resultadoActas = mysqli_query($conexion,$actas); 
    
        while($rowActas=mysqli_fetch_assoc($resultadoActas)){
    ?>
    <form action="actualizarActasDb.php" method="post">
        <input type="hidden" value="<?php echo $rowActas["id_acta"];?>" name="idActa">
        <input type="hidden" value="<?php echo $rowActas["id_arbol"];?>" name="idArbol">
        <tr>
            <td><input type="text" value="<?php echo $rowActas["acta"];?>" name="acta"></td>
            <td><input type="text" value="<?php echo $rowActas["lugar"];?>" name="lugar"></td>
            <td><input type="text" value="<?php echo $rowActas["dato"];?>" name="dato"></td>
            <td><input type="text" value="<?php echo $rowActas["fecha"];?>" name="fecha"></td>
            <td><input type="submit" ></td>
            <td><a href="eliminarActa.php?id=<?php echo $rowActas["id_acta"];?>&idArbol=<?php echo $rowActas["id_arbol"];?>" class="eliminar"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    </form>
    
    <?php } ?>
</table>
    
        
<?php
    $resultado = mysqli_query($conexion,$clientes); 
    
    while($row=mysqli_fetch_assoc($resultado)){
       
?>
    <form action="actualizarDescendienteDb.php" method="post" class="crear_pago" id="crear_descendiente">
    <input type="hidden" value="<?php echo $row["id_arbol"];; ?>" name="idArbol">        
    <input type="hidden" value="<?php echo $row["id_cliente"];; ?>" name="idCliente">
            <h3>Agregar Descendiente</h3>
            <ul>
                <li>
                    <label for="numActa">Nro Acta :</label>
                    <input type="text" name="numActa" value="<?php echo $row["acta"]; ?>">
                </li>
                <li>
                    <label for="apellido">Apellido :</label>
                <input type="text" name="apellido" value="<?php echo $row["apellido"]; ?>">
            </li>
            <li>
                <label for="nombre">Nombre :</label>
                <input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>">
            </li>
            <li>
                <input type="submit">
            </li>
        </ul>
        
    </form>
<?php } ?>
                       
        

    
    </div>
    <script src="mostrarDivorcio.js"></script>
</body>
</html>
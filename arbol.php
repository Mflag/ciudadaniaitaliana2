<?php
    include("database.php"); 
    $id=$_GET["id"];   
    $arbol= "SELECT * FROM arboles WHERE id_cliente= '$id' ORDER BY acta";
    $cliente= "SELECT * FROM clientes WHERE id_cliente= '$id'";
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
        <li><a href="terminados.php">Terminados</a></li>
        <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
    </ul>
    <?php
    $resultadoCliente = mysqli_query($conexion,$cliente); 
    
    while($rowUno=mysqli_fetch_assoc($resultadoCliente)){
        
        ?>
        <div class="Cliente">
            <p>Cliente: <?php echo $rowUno["apellido"]," ", $rowUno["nombre"]; ?></p>
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
                <th>Acta</th><th>Lugar</th><th>Datos</th><th>Fecha</th><th></th>
            </tr>
            
        </thead>
<?php
    $resultadoArbol = mysqli_query($conexion,$arbol); 
    
    while($row=mysqli_fetch_assoc($resultadoArbol)){
        
        ?>
        
            <td><?php echo $row["acta"]; ?></td>
            <td><td><h3><?php echo $row["nombre"]; ?> <?php echo $row["apellido"]; ?></h3></td></td>
            
            <td></td>
            <td>
                <a href="actualizarArbol.php?id=<?php echo $row["id_arbol"];?>" class="mover"><i class="fas fa-edit"></i></a>
                <a href="eliminarArbol.php?id=<?php echo $row["id_arbol"];?>&idCliente=<?php echo $row["id_cliente"];?>" class="eliminar"><i class="fas fa-trash-alt"></i></a>
            </td>
        
        <tr>
            
            <td><?php echo $row["acta"]; ?>.1</td>
            <td><?php echo $row["lugar_nacimiento"]; ?></td>
            <td><?php echo $row["datos_nacimiento"]; ?></td>
            <td><?php echo $row["fecha_nacimiento"]; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $row["acta"]; ?>.2<?php    if($row["segundo"] == 1){echo ".1";}?></td>
            <td><?php echo $row["lugar_matrimonio"]; ?></td>
            <td><?php echo $row["datos_matrimonio"]; ?></td>
            <td><?php echo $row["fecha_matrimonio"]; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $row["acta"]; ?>.3</td>
            <td><?php echo $row["lugar_defuncion"]; ?></td>
            <td><?php echo $row["datos_defuncion"]; ?></td>
            <td><?php echo $row["fecha_defuncion"]; ?></td>
            <td></td>           
            
        </tr>
        <?php    if($row["divorcio"] == 1){    ?>
            <tr>
            <td><?php echo $row["acta"]; ?>.9</td>
            <td><?php echo $row["lugar_divorcio"]; ?></td>
            <td><?php echo $row["datos_divorcio"]; ?></td>
            <td><?php echo $row["fecha_divorcio"]; ?></td>
            <td></td>           
            </tr>
            <?php    if($row["segundo"] == 1){    ?>
            <tr>
            <td><?php echo $row["acta"]; ?>.2.2</td>
            <td><?php echo $row["lugar_segundo"]; ?></td>
            <td><?php echo $row["datos_segundo"]; ?></td>
            <td><?php echo $row["fecha_segundo"]; ?></td>
            <td></td>           
            </tr>  
        <?php } ?>        


        <?php } ?>    
        <tr><td>---</td><td></td><td></td><td></td><td></td></tr>
        
<?php } ?>
    </table>
        <form action="crearArbol.php" method="post" class="crear_arbol">
        <input type="hidden" name="idCliente"value="<?php echo $id;?>">
            <h3>Crear Descendiente</h3>
            <ul>
            <h4>Descendiente</h4>
                <li>
                    <label for="acta">Acta:</label>
                    <input name="acta" type="text" >
                </li>       
                <li>
                    <label for="nombre">Nombre: </label>
                    <input name="nombre" type="text" required>
                </li>     
                <li>
                    <label for="apellido">Apellido: </label>
                    <input name="apellido" type="text" >
                </li>  
            <h4>Nacimiento</h4>     
                <li>
                    <label for="lugar_nacimiento">Lugar de nacimiento: </label>
                    <input name="lugar_nacimiento" type="text" >
                </li>
                <li>
                    <label for="datos_nacimiento">Datos de nacimiento: </label>
                    <input name="datos_nacimiento" type="text" >
                </li>
                <li>
                    <label for="fecha_nacimiento">Fecha de nacimiento: </label>
                    <input name="fecha_nacimiento" type="date" >
                </li>
            <h4>Matrimonio</h4>
                <li>
                    <label for="lugar_matrimonio">Lugar de matrimonio: </label>
                    <input name="lugar_matrimonio" type="text" >
                </li>
                <li>
                    <label for="datos_matrimonio">Datos de matrimonio: </label>
                    <input name="datos_matrimonio" type="text" >
                </li>
                <li>
                    <label for="fecha_matrimonio">Fecha de  matrimonio: </label>
                    <input name="fecha_matrimonio" type="date" >
                </li>
            <h4>Defuncion</h4>
                <li>
                    <label for="lugar_defuncion">Lugar de defuncion: </label>
                    <input name="lugar_defuncion" type="text" >
                </li>
                <li>
                    <label for="datos_defuncion">Datos de defuncion</label>
                    <input name="datos_defuncion" type="text" >
                </li>
                <li>
                    <label for="fecha_defuncion">Fecha de defuncion: </label>
                    <input name="fecha_defuncion" type="date" >
                </li> <br>    
                <li>
                    <label for="divorcio">Acta de divorcio </label>
                    <input type="checkbox" name="divorcio"  id="divorcio" value="1" onchange="javascript:mostrarDivorcio()">
                </li>
                <div id="desplegar_divorcio" style="display: none;">
                <h4>Divorcio</h4>
                <li>
                    <label for="lugar_divorcio">Lugar de divorcio: </label>
                    <input name="lugar_divorcio" type="text" >
                </li>
                <li>
                    <label for="datos_divorcio">Datos de divorcio</label>
                    <input name="datos_divorcio" type="text" >
                </li>
                <li>
                    <label for="fecha_divorcio">Fecha de divorcio: </label>
                    <input name="fecha_divorcio" type="date" >
                </li> <br>    
                <li>
                    <label for="segundo">Segundo matrimonio </label>
                    <input type="checkbox" name="segundo" id="segundo" value="1" onchange="javascript:mostrarSegundo()">
                </li>
                
                <div id="desplegar_segundo" style="display: none;">
                <h4>Segundo matrimonio</h4>
                <li>
                    <label for="lugar_segundo">Lugar de segundo: </label>
                    <input name="lugar_segundo" type="text" >
                </li>
                <li>
                    <label for="datos_segundo">Datos de segundo</label>
                    <input name="datos_segundo" type="text" >
                </li>
                <li>
                    <label for="fecha_segundo">Fecha de segundo: </label>
                    <input name="fecha_segundo" type="date" >
                </li>     
                                 
                </div>                  
                </div>
                <li><input type="submit" value="Crear"></li>
            </ul>
        </form>
    </div>
        <a href="http://localhost/CiudadaniaItaliana/imprimir.php?id=<?php echo $id; ?>" target="_blank">IMPRIMIR ARBOL</a>
    <script src="confirmacion.js"></script>
    <script src="mostrarDivorcio.js"></script>
</body>
</html>
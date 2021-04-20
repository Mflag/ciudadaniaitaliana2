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

    
        
<?php
    $resultado = mysqli_query($conexion,$clientes); 
    
    while($row=mysqli_fetch_assoc($resultado)){
       
?>
    <form action="actualizarArbolDB.php" method="post" id="actualizar_cliente" class="crear_arbol">
            <h3>Actualizar descendiente</h3>
            <input type="hidden" value="<?php echo $row["id_arbol"]; ?>" name="idArbol">
            <input type="hidden" value="<?php echo $row["id_cliente"]; ?>" name="idCliente">
            <h4>Descendiente</h4>
                <li>
                    <label for="acta">Acta:</label>
                    <input value="<?php echo $row["acta"]; ?>" name="acta" type="text" >
                </li>       
                <li>
                    <label for="nombre">Nombre: </label>
                    <input value="<?php echo $row["nombre"]; ?>" name="nombre" type="text" required>
                </li>     
                <li>
                    <label for="apellido">Apellido: </label>
                    <input value="<?php echo $row["apellido"]; ?>" name="apellido" type="text" >
                </li>  
            <h4>Nacimiento</h4>     
                <li>
                    <label for="lugar_nacimiento">Lugar de acta nacimiento: </label>
                    <input value="<?php echo $row["lugar_nacimiento"]; ?>" name="lugar_nacimiento" type="text" >
                </li>
                <li>
                    <label for="datos_nacimiento">Datos de acta nacimiento: </label>
                    <input value="<?php echo $row["datos_nacimiento"]; ?>" name="datos_nacimiento" type="text" >
                </li>
                <li>
                    <label for="fecha_nacimiento">Fecha de nacimiento: </label>
                    <input value="<?php echo $row["fecha_nacimiento"]; ?>" name="fecha_nacimiento" type="date" >
                </li>
            <h4>Matrimonio</h4>
                <li>
                    <label for="lugar_matrimonio">Lugar de acta matrimonio: </label>
                    <input value="<?php echo $row["lugar_matrimonio"]; ?>" name="lugar_matrimonio" type="text" >
                </li>
                <li>
                    <label for="datos_matrimonio">Datos de acta matrimonio: </label>
                    <input value="<?php echo $row["datos_matrimonio"]; ?>" name="datos_matrimonio" type="text" >
                </li>
                <li>
                    <label for="fecha_matrimonio">Fecha de  matrimonio: </label>
                    <input value="<?php echo $row["fecha_matrimonio"]; ?>" name="fecha_matrimonio" type="date" >
                </li>
            <h4>Defuncion</h4>
                <li>
                    <label for="lugar_defuncion">Lugar de acta defuncion: </label>
                    <input value="<?php echo $row["lugar_defuncion"]; ?>" name="lugar_defuncion" type="text" >
                </li>
                <li>
                    <label for="datos_defuncion">Datos de acta defuncion</label>
                    <input value="<?php echo $row["datos_defuncion"]; ?>" name="datos_defuncion" type="text" >
                </li>
                <li>
                    <label for="fecha_defuncion">Fecha de defuncion: </label>
                    <input value="<?php echo $row["fecha_defuncion"]; ?>" name="fecha_defuncion" type="date" >
                </li>
                <?php    if($row["divorcio"] == 1){    ?>
            
            <h4>Divorcio</h4>
            <li>
            <label for="lugar_divorcio">Lugar de acta divorcio</label>
            <input type="text" value="<?php echo $row["lugar_divorcio"]; ?>" name="lugar_divorcio">
            </li>
            <li>
            <label for="datos_divorcio">Datosde acta divorcio</label>
            <input type="text" value="<?php echo $row["datos_divorcio"]; ?>" name="datos_divorcio">
            </li>
            <li>
            <label for="fecha_divorcio">Fechade de divorcio</label>
            <input type="text" value="<?php echo $row["fecha_divorcio"]; ?>" name="fecha_divorcio">
            </li>
            <li>
            <label for="divorcio">Borrar divorcio</label>
            <input type="checkbox" value="0" name="divorcio">
            </li>
            <?php if($row["fecha_divorcio"] == 0){ ?>
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
            <?php } ?>       
            
            <?php    if($row["segundo"] == 1){    ?>
            
            <h4>Segundo Matrimonio</h4>
            <li>
            <label for="lugar_segundo">Lugar segundo matrimonio</label>
            <input type="text" value="<?php echo $row["lugar_segundo"]; ?>" name="lugar_segundo">
            </li>
            <li>
            <label for="datos_segundo">Datos segundo matrimonio</label>
            <input type="text" value="<?php echo $row["datos_segundo"]; ?>" name="datos_segundo">
            </li>
            <li>
            <label for="fecha_segundo">Fecha segundo matrimonio</label>
            <input type="text" value="<?php echo $row["fecha_segundo"]; ?>" name="fecha_segundo">
            </li>
            <label for="segundo">Borrar segundo matrimonio</label>
            <input type="checkbox" value="0" name="segundo">         
             
            <?php }}else{ ?>  
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
            <?php } ?>                  
    
            <input type="submit" value="Actualizar">
          
    </form>
<?php } ?>
                       
        

    
    </div>
    <script src="mostrarDivorcio.js"></script>
</body>
</html>
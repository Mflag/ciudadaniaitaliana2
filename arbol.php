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
        <div class="Cliente" style="font-size:1.7rem;">
            <p>Cliente: <?php echo $rowUno["apellido"]," ", $rowUno["nombre"]; ?></p>
            <p>Fecha de Inicio: <?php echo $rowUno["fecha"]; ?></p>
            <p>Email: <?php echo $rowUno["email"]; ?></p>
            <p>Telefono: <?php echo $rowUno["telefono"]; ?></p>
            <p>Estado: <?php echo $rowUno["estado"]; ?></p>
        </div>    
        
<?php } ?>

    <div id="main-container" class="bordeArbol">
    <table>
        <thead>
            <tr style="font-size: 2rem;">
                <th>Acta</th><th>Lugar</th><th>Estado de acta</th><th>Fecha</th><th><a href="http://localhost/CiudadaniaItaliana/imprimir.php?id=<?php echo $id; ?>" target="_blank"><i class="fas fa-print"></i></a></th>
            </tr>
            
        </thead>
<?php
    $resultadoArbol = mysqli_query($conexion,$arbol); 
    
    while($row=mysqli_fetch_assoc($resultadoArbol)){
        
        ?>
        <tr style="border: solid black 3px;font-size: 1.7rem; border-right:0px">
            <td><?php echo $row["acta"]; ?></td>
            <td><td><?php echo $row["nombre"]; ?> <?php echo $row["apellido"]; ?></td></td>
            
            <td></td>
            <td>
                <a href="actualizarArbol.php?id=<?php echo $row["id_arbol"];?>" class="mover"><i class="fas fa-edit"></i></a>
                <a href="eliminarArbol.php?id=<?php echo $row["id_arbol"];?>&idCliente=<?php echo $row["id_cliente"];?>" class="eliminar"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        
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
        
        <?php    if($row["divorcio"] == 1){    ?>
            <tr>
            <td><?php echo $row["acta"]; ?>.9.1</td>
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
            <?php    if($row["segundoDivorcio"] == 1){    ?>
            <tr>
            <td><?php echo $row["acta"]; ?>.9.2</td>
            <td><?php echo $row["lugar_segundoDivorcio"]; ?></td>
            <td><?php echo $row["datos_segundoDivorcio"]; ?></td>
            <td><?php echo $row["fecha_segundoDivorcio"]; ?></td>
            <td></td>           
            </tr>
            <?php    if($row["tercero"] == 1){    ?>
            <tr>
            <td><?php echo $row["acta"]; ?>.2.3</td>
            <td><?php echo $row["lugar_tercero"]; ?></td>
            <td><?php echo $row["datos_tercero"]; ?></td>
            <td><?php echo $row["fecha_tercero"]; ?></td>
            <td></td>           
            </tr>      
        <?php }}}} ?>
        <tr>
            <td><?php echo $row["acta"]; ?>.3</td>
            <td><?php echo $row["lugar_defuncion"]; ?></td>
            <td><?php echo $row["datos_defuncion"]; ?></td>
            <td><?php echo $row["fecha_defuncion"]; ?></td>
            <td></td>           
            
        </tr>        
  
       
        
<?php } ?>
    </table>
        <form action="crearArbol.php" method="post" class="crear_arbol" style="font-size: 1.5rem;">
        <input type="hidden" name="idCliente"value="<?php echo $id;?>">
            <h3>Crear Descendiente</h3>
            <ul>
            <h4>Descendiente</h4>
                <li>
                    <label for="acta">Nro acta:</label>
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
                    <label for="lugar_nacimiento">Lugar: </label>
                    <input name="lugar_nacimiento" type="text" >
                </li>
                <li>
                    <label for="datos_nacimiento">Datos: </label>
                    <input name="datos_nacimiento" type="text" >
                </li>
                <li>
                    <label for="fecha_nacimiento">Fecha: </label>
                    <input name="fecha_nacimiento" type="date" >
                </li>
            <h4>Matrimonio</h4>
                <li>
                    <label for="lugar_matrimonio">Lugar: </label>
                    <input name="lugar_matrimonio" type="text" >
                </li>
                <li>
                    <label for="datos_matrimonio">Datos: </label>
                    <input name="datos_matrimonio" type="text" >
                </li>
                <li>
                    <label for="fecha_matrimonio">Fecha: </label>
                    <input name="fecha_matrimonio" type="date" >
                </li>
            <h4>Defuncion</h4>
                <li>
                    <label for="lugar_defuncion">Lugar : </label>
                    <input name="lugar_defuncion" type="text" >
                </li>
                <li>
                    <label for="datos_defuncion">Datos :</label>
                    <input name="datos_defuncion" type="text" >
                </li>
                <li>
                    <label for="fecha_defuncion">Fecha : </label>
                    <input name="fecha_defuncion" type="date" >
                </li> <br>    
                <li>
                    <label for="divorcio">Acta de divorcio </label>
                    <input type="checkbox" name="divorcio"  id="divorcio" value="1" onchange="javascript:mostrarDivorcio()"><br>
                </li>
                <div id="desplegar_divorcio" style="display: none;">
                    
                    <li>
                        <label for="lugar_divorcio">Lugar : </label>
                        <input name="lugar_divorcio" type="text" >
                    </li>
                    <li>
                        <label for="datos_divorcio">Datos :</label>
                        <input name="datos_divorcio" type="text" >
                    </li>
                    <li>
                        <label for="fecha_divorcio">Fecha : </label>
                        <input name="fecha_divorcio" type="date" >
                    </li><br>  
                    <li>
                        <label for="segundo">Segundo matrimonio </label>
                        <input type="checkbox" name="segundo" id="segundo" value="1" onchange="javascript:mostrarSegundo()">
                    </li>
                    
                    <div id="desplegar_segundo" style="display: none;">
                        
                        <li>
                            <label for="lugar_segundo">Lugar :</label>
                            <input name="lugar_segundo" type="text" >
                        </li>
                        <li>
                            <label for="datos_segundo">Datos :</label>
                            <input name="datos_segundo" type="text" >
                        </li>
                        <li>
                            <label for="fecha_segundo">Fecha :</label>
                            <input name="fecha_segundo" type="date" >
                        </li><br>
                        <li>
                            <label for="segundo_divorcio">Segundo Divorcio </label>
                            <input type="checkbox" name="segundo_divorcio" id="segundo_divorcio" value="1" onchange="javascript:mostrarSegundoDivorcio()">
                        </li>
                        <div id="desplegar_segundo_divorcio" style="display: none;">
                            
                            <li>
                                <label for="lugar_segundo_divorcio">Lugar :</label>
                                <input name="lugar_segundo_divorcio" type="text" >
                            </li>
                            <li>
                                <label for="datos_segundo_divorcio">Datos :</label>
                                <input name="datos_segundo_divorcio" type="text" >
                            </li>
                            <li>
                                <label for="fecha_segundo_divorcio">Fecha :</label>
                                <input name="fecha_segundo_divorcio" type="date" >
                            </li><br>
                            <li>
                                <label for="tercero">Tercer Matrimonio:</label>
                                <input type="checkbox" name="tercero" id="tercero" value="1" onchange="javascript:mostrarTercero()">
                            </li>
                            <div id="desplegar_tercero" style="display: none;">
                                <li>
                                    <label for="lugar_tercero">Lugar :</label>
                                    <input name="lugar_tercero" type="text" >
                                </li>
                                <li>
                                    <label for="datos_tercero">Datos :</label>
                                    <input name="datos_tercero" type="text" >
                                </li>
                                <li>
                                    <label for="fecha_tercero">Fecha :</label>
                                    <input name="fecha_tercero" type="date" >
                                </li>

                            </div>
                        </div>                  
                    </div>                  
                </div>
                <li><input type="submit" value="Crear"></li>
            </ul>
        </form>
    </div>
        
    <script src="confirmacion.js"></script>
    <script src="mostrarDivorcio.js"></script>
</body>
</html>

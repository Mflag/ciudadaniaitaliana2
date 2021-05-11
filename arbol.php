<?php
    include("database.php"); 
    $id=$_GET["id"];   
    $arbol= "SELECT * FROM arboles WHERE id_cliente= '$id' ORDER BY acta";
    $notas= "SELECT * FROM notas WHERE id_cliente= '$id' ORDER BY fecha_nota";
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
        <li><a href="enTratativas.php">En Tratativas</a></li>
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
            <p>Trabajo: <?php echo $rowUno["tipo_trabajo"]; ?></p>
            <p>Estado: <?php echo $rowUno["estado"]; ?></p>
        </div>    
        
<?php $tipoTrabajo = $rowUno["tipo_trabajo"];} ?>

    <div id="main-container" class="bordeArbol">
    <table>
        <thead>
            <tr style="font-size: 2rem;">
                <th>Acta</th><th>Lugar</th><th>Estado de acta</th><th>Fecha</th><th style="text-alaing:center;" ><a style="color: white;" href="http://localhost/CiudadaniaItaliana/imprimir.php?id=<?php echo $id; ?>" target="_blank"><i class="fas fa-print"></i></a></th>
            </tr>
            
        </thead>
<?php
    $resultadoArbol = mysqli_query($conexion,$arbol); 
    
    while($row=mysqli_fetch_assoc($resultadoArbol)){
        
        ?>
        <tr style="border: solid black 3px;font-size: 1.7rem;">
            <td><?php echo $row["acta"]; ?></td>
            <td colspan="3" style="text-align: center;"><?php echo $row["nombre"]; ?> <?php echo $row["apellido"]; ?></td>            
            
            <td>
                <a href="actualizarArbol.php?id=<?php echo $row["id_arbol"];?>" class="mover"><i class="fas fa-edit"></i></a>
                <a href="eliminarArbol.php?id=<?php echo $row["id_arbol"];?>&idCliente=<?php echo $row["id_cliente"];?>" class="eliminar"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php
    $idArbol = $row["id_arbol"];    
    $acta= "SELECT * FROM actas WHERE id_arbol= '$idArbol' ORDER BY acta";
    $resultadoActas = mysqli_query($conexion,$acta); 
    
    while($rowActa=mysqli_fetch_assoc($resultadoActas)){
        
        ?>      
        <tr>
            
            <td><?php echo $row["acta"]; ?>.<?php echo $rowActa["acta"]; ?></td>
            <td><?php echo $rowActa["lugar"]; ?></td>
            <td><?php echo $rowActa["dato"]; ?></td>
            <td><?php echo $rowActa["fecha"]; ?></td>
            <td></td>
        </tr>
    <?php }} ?>
    </table>
    <div>
    <div  class="crear_pago">
        <h3><button onclick="javascript:crearDescendiente()" >Agregar Descendiente<i class="fas fa-sort-down"></i></button></h3>
        <form action="crearDescendiente.php" method="post" id="crear_descendiente" style="display:none;">
            <input type="hidden" value="<?php echo $id; ?>" name="idCliente">
            
            <ul>
                <li>
                    <label for="numActa">Nro Acta :</label>
                    <input type="text" name="numActa">
                </li>
                <li>
                    <label for="apellido">Apellido :</label>
                    <input type="text" name="apellido">
                </li>
                <li>
                    <label for="nombre">Nombre :</label>
                    <input type="text" name="nombre">
                </li>
                <li>
                    <input type="submit">
                </li>
            </ul>
            
        </form>
    </div>
    <div class="crear_pago">
            <h3><button onclick="javascript:agregarActa()" >Agregar Acta<i class="fas fa-sort-down"></i></button></h3>
    <form action="crearActa.php" method="post"  id="crear_acta"  style="display:none;">
        
        <ul>
            <li>
                <label for="acta">Descendiente :</label>
                <select name="acta" id="acta" form="crear_acta">
                    <?php
    $actas = "SELECT * FROM arboles WHERE id_cliente= '$id'";
    $resActas = mysqli_query($conexion,$actas);   
    while($rowArbol=mysqli_fetch_assoc($resActas)){ 
        ?>
                <option value="<?php echo $rowArbol["id_arbol"];?>"><?php echo $rowArbol["acta"]; ?>-<?php echo $rowArbol["apellido"]; ?> <?php echo $rowArbol["nombre"];?></option>
                <?php }?>
            </select>
        </li> 
        <input type="hidden" name="idCliente" value="<?php echo $id ?>">
        
        <li>
            <label for="codActa">Cod Acta :</label>
            <input type="text" name="codActa">
        </li>
        <li>
            <label for="lugar">Lugar :</label>
            <input type="text" name="lugar">
        </li>
        <li>
            <label for="dato">Estado :</label>
            <input type="text" name="estado">
        </li>
        <li>
            <label for="fecha">Fecha :</label>
            <input type="date" name="fecha" value="<?php echo date('Y-m-d');?>" required>
        </li>
        <li>
            <input type="submit">
        </li>
    </ul>
    </form>
    </div>
</div>
</div><br> 
    <div id="main-container">
    <table>
        <thead>
        <tr style="font-size: 2rem;">           
            <th style="width: 200px;">Fecha</th><th>Nota</th><th></th>
        </tr>             
        </thead>
        
        <?php
    $resultadoNotas = mysqli_query($conexion,$notas); 
    
    while($rowNotas=mysqli_fetch_assoc($resultadoNotas)){
        
        ?>
        <tr style="font-size: 2rem;">
            <td><?php echo $rowNotas["fecha_nota"]; ?></td>
            <td><?php echo $rowNotas["nota"]; ?></td>
            <td class="numeros"><a href="eliminarNotas.php?id=<?php echo $rowNotas["id_notas"]; ?>&idCliente=<?php echo $id;?>&tipoTrabajo=<?php echo $tipoTrabajo;?>" class="eliminar"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
<?php } ?>
    </table>
    <div class="crear_pago">
        <h3><button onclick="javascript:agregarNota()" >Agregar Nota<i class="fas fa-sort-down"></i></button></h3> 
    <form action="agregarNotas.php" method="post" id="agregarNota" style="display: none;">
    
        <input type="hidden" name="idCliente" value="<?php echo $id ?>">
        <input type="hidden" name="tipoTrabajo" value="<?php echo $tipoTrabajo ?>">
        <ul>
            <li>
                <label for="nota">Nota</label>
                <textarea name="nota" required></textarea>
            </li>
            <li>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" value="<?php echo date('Y-m-d');?>" required>
            </li>
            <li>
                <input type="submit">
            </li>
        </ul>
        
    </form>
    </div>
    </div>
    <script src="ocultarFormularios.js"></script>    
    
</body>
</html>

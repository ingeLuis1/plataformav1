<?php
include "../Control/conexionBD.php";
$conexion=new mysqli($host,$user,$pass,$db) or die ("Error al conectarse con la base de datos".$mysqli->error);
$consultaSQL_bolsaA="Select * from bolsa ORDER BY idBolsa DESC";
 //ejecutamos la consulta 
 $ejecutarConsulta=$conexion->query($consultaSQL_bolsaA); 


?><ul id="lista">
<?php while ($fila=$ejecutarConsulta->fetch_array()){ ?>
        <li>
        <?php echo $fila[1];?> <button class="delete-btn" onclick="eliminarTarea(<?php echo $fila[0];?>)">Eliminar</button>
    </li>
      <?php } ?> 

    </ul>

    <script>
    
   

    </script>
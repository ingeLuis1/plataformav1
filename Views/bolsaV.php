<<<<<<< HEAD
<?php
include "../Control/conexionBD.php";
$id_usuario=$_SESSION['id_usuario'];
$conexion=new mysqli($host,$user,$pass,$db) or die ("Error al conectarse con la base de datos".$mysqli->error);
$consultaSQL_bolsaA = "SELECT * FROM bolsa WHERE id_usuario = $id_usuario ORDER BY idBolsa DESC";
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
    
   

=======
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
    
   

>>>>>>> 732d09d688c31e0f5d9b3cf0b09089ca7055ad01
    </script>
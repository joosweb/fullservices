<?php   
    require('../config/conexion.php');
    $class = new Mysql();
    $listar = mysqli_query($class->conexion(),"SELECT * FROM productos WHERE cat_id='".$_GET['pid']."'");
    $i=1;
    echo '
          <table class="table table-hover">
          <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Stock</th>
          <th>Acción</th>
          </tr>';
          while($row=mysqli_fetch_array($listar,MYSQLI_ASSOC)){
          echo '<tr>';  
          echo '<td>'.$i++.'</td><td>'.$row['name'].'</td><td>'.$row['stock'].'</td><td><a href="index.php?a=addpro&action=del&id='.$row["id"].'" class="label label-danger"><i class="fa fa-trash-o"></i> Eliminar</a></td>';
          echo '</tr>';

          }
    echo '</table>';
?> 
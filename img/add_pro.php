<?php 
  
 $admin = new admin_panel();
  
 $sql = mysqli_query($class->conexion(),"SELECT * from productos WHERE id='".$_GET['id']."'");
 $rs  = mysqli_fetch_array($sql,MYSQLI_ASSOC);
 
 $id   = mysqli_real_escape_string($class->conexion(),$_GET['id']);
 $name = mysqli_real_escape_string($class->conexion(),$_POST['name']);
 $desc = mysqli_real_escape_string($class->conexion(),$_POST['description']);
 $img  = mysqli_real_escape_string($class->conexion(),$_POST['archivo']);
 $cat  = mysqli_real_escape_string($class->conexion(),$_POST['categoria']);
 $stock  = mysqli_real_escape_string($class->conexion(),$_POST['stock']);
 $price  = mysqli_real_escape_string($class->conexion(),$_POST['price']);

 if(htmlentities($_GET['action']) == 'del'){
 	$admin->delete_pro($id);
 }
 
 if(isset($_POST['add'])) {

      $file = $_FILES['archivo']['name'];
      // obtener extension del archivo
      $trozos = explode(".", $file); 
      $extension = end($trozos);
      $img_name = $admin->random_code(15).'.'.$extension;
      ////////////////////////////////
     if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"img/productos/".$img_name))
      {
       sleep(3);//retrasamos la petición 3 segundos
       $admin->insert_pro($name,$desc,$img_name,$cat,$stock,$price);
     }
 }

if(htmlentities($_GET['action']) == 'add'){
?>
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Añadir producto</h3>
  </div>
  <div class="panel-body">
    <form action="" enctype="multipart/form-data" method="POST" class="formulario">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre del Producto</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Guantes Ergonomicos..">
  </div>
 <div class="form-group">
    <label for="exampleInputPassword1">Descripcion (max 255 caracteres)</label>
    <textarea id="description" name="description"></textarea>
  </div>
  <div class="well">
  <div class="form-group">
    <label for="exampleInputFile"></label>
    <input name="archivo" type="file" id="imagen" />
  </div>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Seleccione categoria</label>
    <select name="categoria" id="categoria">
      <?php echo $class->get_cats(); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Stock</label>
    <input type="number" name="stock" style="width:80px;" value="1" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Precio</label>
    <input type="text" name="price" style="width:100px;" value="1" class="form-control">
  </div>
  <button type="submit" name="add" class="btn btn-default">Añadir</button>
</form>
</div>
</div>
</div>
<?php } else { ?>
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Actualizar producto</h3>
  </div>
  <div class="panel-body">
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre del Producto</label>
    <input type="text" value="<?php echo $rs['name']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Guantes Ergonomicos..">
  </div>
 <div class="form-group">
    <label for="exampleInputPassword1">Descripcion (max 255 caracteres)</label>
    <textarea> <?php echo $rs['desc_long']; ?></textarea>
  </div>
  <div class="well">
  <div class="form-group">
    <label for="exampleInputFile"></label>
    <input type="file" id="img" name="img">
  </div>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Seleccione categoria</label>
    <select name="" id="categoria">
      <?php echo $class->get_cats(); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Stock</label>
    <input type="number" <?php echo $rs['stock']; ?> style="width:80px;" value="1" class="form-control" id="stock">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Precio</label>
    <input type="text" style="width:100px;" <?php echo $rs['price']; ?> value="1" class="form-control" id="stock">
  </div>
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
</div>
</div>
</div>
<?php } ?>
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">Productos Actuales</h3>
  </div>
  <div class="panel-body">
    <table class="table">
      <tbody>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Stock</th>
          <th>Acción</th>
          </tr>
          <?php 
          $listar = mysqli_query($class->conexion(),"SELECT * FROM productos");
          $i=1;
          while($row=mysqli_fetch_array($listar,MYSQLI_ASSOC)){          
          ?>
          <tr>
          <td><?php echo $i++;?></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['stock'];?></td>
          <td><a href="index.php?a=addpro&action=del&id=<?=$row['id'];?>" class='label label-danger'><i class='fa fa-trash-o'></i> Eliminar</a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
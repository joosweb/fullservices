<script>
	$(document).ready(function(){
		$('#carousel-example-generic').css('display','none');
	});
	function goBack() {
	    window.history.back();
	}
</script>
<?php 
	$sql = mysqli_query($class->conexion(),"SELECT * FROM productos WHERE id='".$_GET['id']."'");
	$rs = mysqli_fetch_array($sql,MYSQLI_ASSOC);
	
?>
<div class="col-md-9" style="margin-top:5px;">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $rs['name'];?> <button class="btn btn-success btn-xs" onclick="goBack()">Volver</button></h3>
  </div>
  <div class="table-responsive">
  <table class="table table-bordered">
  <tbody>
    <tr >
      <td width="33%" rowspan="6" align="center" ><img src="img/productos/<?php echo $rs['img1']; ?> " width="100%" alt=""></td>
      <td class="active" width="19%" style="font-weight:bold;">Nombre del producto </td>
      <td width="48%"> <?php echo $rs['name'];?> </td>
    </tr>
    <tr>
      <td class="active" style="font-weight:bold;">Caracteristicas</td>
      <td rowspan="2"><?php echo $rs['desc_long'];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="active" style="font-weight:bold;">Stock</td>
      <td><?php echo $rs['stock'];?></td>
    </tr>
    <tr>
       <td class="active" style="font-weight:bold;">Precio</td>
      <td>$ <?php echo $rs['price'];?></td>
    </tr>
    <tr>
       <td class="active" style="font-weight:bold;">Codigo</td>
      <td><?php echo $rs['code'];?></td>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>	
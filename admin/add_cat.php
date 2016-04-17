
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Categorias</h3>
  </div>
  <div class="panel-body">
  <div id="cat-status"></div>
  <form class="form-inline">
  <div class="form-group">
    <label for="exampleInputEmail1">Categoria</label>
    <input type="text" class="form-control input-sm" name="name" id="cat-name" placeholder="Seguridad,casco, etc..">
  </div>
  <button type="button" onclick="add_categoria();" id="add-cat" class="btn btn-default btn-sm">Añadir</button>
</form>
  </div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Actuales Categorias</h3>
  </div>
  <div class="panel-body">
  <div id="actionstatus"></div>
 	<table class="table table-hover">
 		<tr>
 			<th>#</th>
 			<th>Nombre</th>
 			<th>#</th>
 		</tr>
 		<?php echo $class->get_cat_all();?>	
 	</table>
  </div>
  </div>
</div>
</div>
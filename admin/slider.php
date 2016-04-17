<?php 
if(isset($_POST['update_slide1']) == 'Actualizar'){
		 if (move_uploaded_file($_FILES['slide1']['tmp_name'],"img/slider1.jpg")){
			echo '<div class="alert alert-dismissible alert-success">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Success!</strong> La imagen se subio satisfactoriamente.
				</div>';
		}
	else {
		echo '<div class="alert alert-dismissible alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Error!</strong> Las dimensiones de la imagen no son de 1000x250px!.
			</div>';
	}
	
}
if(isset($_POST['update_slide2']) == 'Actualizar'){
		if (move_uploaded_file($_FILES['slide1']['tmp_name'],"img/slider2.jpg")){
			echo '<div class="alert alert-dismissible alert-success">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Success!</strong> La imagen se subio satisfactoriamente.
				</div>';
		}
	else {
		echo '<div class="alert alert-dismissible alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Error!</strong> Las dimensiones de la imagen no son de 1000x250px!.
			</div>';
	}
	
}
if(isset($_POST['update_slide3']) == 'Actualizar'){
		if (move_uploaded_file($_FILES['slide1']['tmp_name'],"img/slider3.jpg")){
			echo '<div class="alert alert-dismissible alert-success">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Success!</strong> La imagen se subio satisfactoriamente.
				</div>';
		}
	else {
		echo '<div class="alert alert-dismissible alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Error!</strong> Las dimensiones de la imagen no son de 1000x250px!.
			</div>';
	}
	
}
?>
<h3 align="center" id="msg"> Las img deben exactamente de 1000px (ancho) X 250px (alto) formato JPG.</h3>
<div class="col-md-4">
<form action="index.php?a=slider&nav=Cambiar Slider" method="POST" enctype="multipart/form-data">
<img src="img/slider1.jpg" width="100%" alt="SLIDE1">
<hr>
<input type="file" name="slide1">
<hr>
<input type="submit" class="btn btn-warning btn-sm" value="Actualizar" name="update_slide1">
</form>
</div>
<div class="col-md-4">
<form action="index.php?a=slider&nav=Cambiar Slider" method="POST" enctype="multipart/form-data">
<img src="img/slider2.jpg" width="100%" alt="SLIDE2">
<hr>
<input type="file"  name="slide1">
<hr>
<input type="submit" class="btn btn-warning btn-sm" value="Actualizar" name="update_slide2">
</form>
</div>
<div class="col-md-4">
<form action="index.php?a=slider&nav=Cambiar Slider" method="POST" enctype="multipart/form-data">
<img src="img/slider3.jpg" width="100%" alt="SLIDE3">
<hr>
<input type="file"  name="slide1">
<hr>
<input type="submit" class="btn btn-warning btn-sm" value="Actualizar" name="update_slide3">
</form>
</div>

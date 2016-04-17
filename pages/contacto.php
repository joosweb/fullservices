<script type="text/javascript">
	$(document).ready(function(){
		$('#carousel-example-generic').css('display','none');
	});
	</script>
	<div class="col-md-9">
	<div class="panel panel-default">
  	<div class="panel-heading">
    <h3 class="panel-title">Contacto</h3>
  	</div>
  	<div class="panel-body">
  	  <?php 
	  	if(isset($_POST['contacto'])) {
	  		include_once $_SERVER['DOCUMENT_ROOT'] . '/captcha/securimage.php';
			$securimage = new Securimage();
			if ($securimage->check($_POST['captcha_code']) == false) {
				echo '<div class="alert alert-dismissible alert-danger">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Error!</strong> El codigo ingresado es incorrecto! <a href="javascript:history.go(-1);" class="alert-link">Volver</a></a>.
					</div>';
	  			exit;
			}
			else 
			{	
				$admin_email = 'info@Fabricafullservices.cl';
				$subject   = 'www.fabricafullservices.cl';
				$mensaje   = $_POST['message'];
				mail($admin_email, $subject, $mensaje, $_POST['email']);
			}
	  	}
	  ?>
   	   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.6958504321015!2d-73.04706498526818!3d-36.82580757994336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9669b5d2494fa1d3%3A0x18be04d29d0fcafa!2sDiagonal+Pedro+Aguirre+Cerda+817%2C+Concepci%C3%B3n%2C+Regi%C3%B3n+del+B%C3%ADo+B%C3%ADo!5e0!3m2!1ses-419!2scl!4v1444831112687" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
	   <div class="col-md-4">
	   <div class="panel panel-default" style="margin-left:-14px;">
	   <div class="panel-heading">
	    <h3 class="panel-title"><i class="icon-pushpin main-color"></i>Dirección</h3>
	    </div>
	  	<div class="panel-body">
	    <address>
		<strong>FabricaFullServices, Inc.</strong><br>
		Pedro Aguirre Cerda<br>
		Concepción, Nº 817<br>
		<i class="icon-phone-sign"></i>  +56942213096 - 041-2921343
		</address>
	  </div>
	 </div>
	</div>
	<div class="col-md-8">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Sientete Libre de contactarnos</h3>
	  </div>
	  <div class="panel-body">
	    <form role="form" id="feedbackForm" method="POST">
			      <div class="form-group">
				<input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
				<span class="help-block" style="display: none;">Please enter your name.</span>
			      </div>
			      <div class="form-group">
				<input type="email" class="form-control" id="email" name="email" placeholder="Dirección de Email">
				<span class="help-block" style="display: none;">Please enter a valid e-mail address.</span>
			      </div>
			      <div class="form-group">
				<textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Mensaje"></textarea>
				<span class="help-block" style="display: none;">Please enter a message.</span>
			      </div>
			      <img id="captcha" src="captcha/securimage_show.php" alt="CAPTCHA Image" />
			      <div class="form-group" style="margin-top: 10px;">
				<input type="text" class="form-control" name="captcha_code" id="captcha_code" placeholder="Por seguridad, inserte el codigo." />
				<span class="help-block" style="display: none;">Please enter the code displayed within the image.</span>
			      </div>    
			      <span class="help-block" style="display: none;">Please enter a the security code.</span>
			      <button type="submit" id="feedbackSubmit" name="contacto" class="btn btn-primary btn-lg" style="display: block; margin-top: 10px;">Enviar</button>
			    </form>
	  </div>
	</div>
	</div>
  </div>
</div>
</div>
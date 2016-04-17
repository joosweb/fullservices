<?php
session_start();
require('config/conexion.php');
$class = new General();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FullServices</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="js/web.js"></script>
	<body>
	<!-- modal -->
	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	 <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="mySmallModalLabel">Login de Usuarios</h4>
        </div>
        <div class="modal-body">
        <div id="msg-login-status">
        </div>
         <form  action="" id="formlogin" method="POST">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input type="email" class="form-control" id="email" placeholder="example@info.cl">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Contraseña</label>
		    <input type="password" class="form-control" id="passwd" placeholder="Contraseña">
		  </div>
		  <button type="submit" class="btn btn-default">Entrar</button>
		  <button type="reset" class="btn btn-warning">Reset</button><span id="login_status"></span>
		</form>
        </div>
      </div>
    </div>
    </div>
    <!-- /.modal-content -->
	<div class="container-fluid">
		<div class="row">
			<div class="info">
				<div class="text">
				<i class="fa fa-envelope-o"></i> info@fabricafullservices.cl - <i class="fa fa-phone-square"></i> +56942213096
				</div>
			</div>
		</div>
		</div>
		<div class="container">
		<div class="row">
	   <div id="session-new">
       <p>
       <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm">Acceder</a> | <a href="#">Registrarse</a>
       </p>         	
       </div>
		</div>
		<div class="col-md-4 col-md-offset-4">
		<img src="img/logo2.png" width="97%" alt="">
		</div>
		</div>
		</div>
		<nav class="navbar navbar-default" style="margin-top:10px;">
		  <div class="container-fluid"  >
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header" style="margin-left:27%;">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#"></a>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="index.php?p=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
		        <li><a href="#table item-pro" id="pro"><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> Productos</a></li>
		        <li><a href="#"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Cotización Online</a></li>
		        <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Quienes Somos</a></li>
		        <li><a href="index.php?p=contacto"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Contacto</a></li>
		      </ul>
		      <form class="form-inline" id="form-search" style="display:none;">
			  <div class="form-group" style="margin-top:-20px;">
			  <input type="text" class="form-control input-sm" id="exampleInputName2" placeholder="Buscar en la web">
			  </div>	
			  <button type="submit" class="btn btn-danger btn-sm" style="margin-top:-20px;">Buscar</button> 
			</form>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		</div>
		<div class="container">
			<div class="row"> <!--- row -->
			<?php if(!isset($_SESSION['admin'])) { ?>
			<div class="col-md-3">	
				<img src="http://www.kupfer.cl/skin/frontend/default/default/images/certificaciones-home1.png" width="100%">
				<img src="img/caltex.png" width="100%" alt="" style="margin:3px 3px 3px 0px; border:1px black solid; padding:2px;">
				<div class="panel panel-default" style="margin-top:3px;">
				  <div class="panel-heading">
				    <h3 class="panel-title"><strong>Productos por Categoria</strong></h3>
				  </div>
				  <div class="panel-body">
				  <?php 
				    $class->get_cats_index();
				  ?>
				  </div>
				</div>
				</div>	
				<?php } else { ?>
				<div class="col-md-3">	
				<img src="http://www.kupfer.cl/skin/frontend/default/default/images/certificaciones-home1.png" width="100%">
				<img src="img/caltex.png" width="100%" alt="caltex">
				<div class="panel panel-default" style="margin-top:3px;">
				  <div class="panel-heading">
				    <h3 class="panel-title"><strong>Panel de Administración</strong></h3>
				  </div>
				  <div class="panel-body">
				    <div class="cat-button">
				    	<a href="index.php?a=addcat&nav=Agregar Categorias">Agregar Categorias<span style="float:right;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a><br>
				    </div>
				     <div class="cat-button">
				    	<a href="index.php?a=addpro&nav=Agregar Productos&action=add">Agregar Productos<span style="float:right;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a><br>
				    </div>
				    <div class="cat-button">
				    	<a href="index.php?a=slider&nav=Cambiar Slider">Cambiar Slider<span style="float:right;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a><br>
				    </div>
					<div class="logout">
					<table class="table">
					<tr>
					<td><button id="salir" class="btn btn-danger btn-sm"> Salir</button> <span id="logout"> </span></td>
					</tr>
				 	</table> 
					</div>
				  </div>
				</div>
				</div>		
				<?php } ?>
				<?php if(!isset($_SESSION['admin'])) { ?>	
				<div class="col-md-9">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    <div class="item active">
				      <img src="img/slider1.jpg" alt="...">
				      <div class="carousel-caption">
				      </div>
				    </div>
				    <div class="item">
				      <img src="img/slider2.jpg" alt="...">
				      <div class="carousel-caption">
				      </div>
				    </div>
				    <div class="item">
				      <img src="img/slider3.jpg" alt="...">
				      <div class="carousel-caption">
				      </div>
				    </div>
				  </div>
				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
				</div>
					<?php 
						$page = htmlentities($_GET['p']);
						switch ($page) {
							case 'home':
								include('pages/home.php');
								break;
							case 'view':
								include('pages/view.php');
								break;
							case 'contacto':
								include('pages/contacto.php');
								break;
							default:
								include('pages/home.php');
								break;
						}
					?>
					<?php } else { ?>
					<div class="col-md-9">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <p class="panel-title">
					    <?php 
					    if($_GET['nav'] == false){
					  		echo "Bienvenido";
					  	}
					  	else {
					  		echo $_GET['nav'];
					  	}
					    ?> </p>
					  </div>
					  <div class="panel-body">
					  <?php 
					  	$admin_page = htmlentities($_GET['a']);
					  	switch ($admin_page) {
					  		case 'addcat':
					  			include('admin/add_cat.php');
					  			break;
					  		case 'addpro':
					  			include('admin/add_pro.php');
					  			break;
					  		case 'slider':
					  			include('admin/slider.php');
					  			break;					  		
					  		default:
					  			include('admin/home.php');
					  			break;
					  	   }
					  ?>
					  </div>
					</div>
					</div>
					<?php } ?>
					</div>
				 </div>
			  </div>
			</div>
		   </div>
		</div>
		<footer>
		  <div class="container">
		    <div class="row">
		      <div class="col-md-10 col-md-offset-2">
		            <div class="row">
		              <div class="col-md-4">
		                <div class="widget">
		                  <h5>Contacto</h5>
		                  <hr>
		                    <div class="social">
		                      <a href="#"><i class="fa fa-facebook facebook"></i></a>
		                      <a href="#"><i class="fa fa-twitter twitter"></i></a>
		                      <a href="#"><i class="fa fa-linkedin linkedin"></i></a>
		                      <a href="#"><i class="fa fa-google-plus-square google-plus"></i></a> 
		                    </div>
		                  <hr>
		                  <i class="icon-home"></i> &nbsp; Pedro Aguirre Cerda 817, Concepción.
		                  <hr>
		                  <i class="icon-phone"></i> &nbsp; <i class="fa fa-whatsapp"></i> +56942213096 - <i class="fa fa-phone-square"></i> 041-2921343
		                  <hr>
		                  <i class="icon-envelope-alt"></i> &nbsp; <a href="mailto:#">info@fabricafullservices.cl</a>
		                  <hr>
		                  
		                </div>
		              </div>

		              <div class="col-md-4">
		                <div class="widget">
		                  <h5>Quienes Somos</h5>
		                  <hr>
		                   <p style="text-align: justify;">Somos una empresa que ofrece un servicio integral que satisfaga por completo las necesidades de nuestros clientes, en cuanto a vestuario corporativo. Además otorgamos soluciones de excelencia, desde la perspectiva de nuestros productos, que cumplen con el más alto estándar de calidad, diseño y confección Somos fabricantes e importadores..</p> 
		                </div>
		              </div>

		              <div class="col-md-4">
		                <div class="widget">
		                  <h5>Links Goes Here</h5>
		                  <hr>
		                  <div class="two-col">
		                    <div class="col-left">
		                      <ul>
		                        <li><a href="#">Condimentum</a></li>
		                        <li><a href="#">Etiam at</a></li>
		                        <li><a href="#">Fusce vel</a></li>
		                        <li><a href="#">Vivamus</a></li>
		                        <li><a href="#">Pellentesque</a></li>
		                        <li><a href="#">Vivamus</a></li>
		                      </ul>
		                    </div>
		                   
		                    <div class="clearfix"></div>
		                  </div>
		                </div>
		              </div>
		              
		            </div>

		            <hr>
		            <!-- Copyright info -->
		            <p class="copy">Copyright © 2015 | Developed by <a href="mailto:jooswebs@gmail.com">jooswebs</a> - <a href="index.php?p=home">Inicio</a> | <a href="#">Quienes somos</a> | <a href="#">Productos</a> | <a href="#">Soporte</a> | <a href="#">Contacto</a></p>
		      </div>
		    </div>
		  <div class="clearfix"></div>
		  </div>
		</footer>
</body>
</html>
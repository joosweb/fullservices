$(document).ready(function(){

/// Logout

	$('#salir').click(function(){
		$.ajax({
    		url: 'ajax/logout.php',
    		beforeSend: function(){
    			$("#logout").html('<img src="http://upli.st/img/loader.gif" width="22px">');
    		},
   		 	success: function(result){
   		 		setInterval(function() {
				window.location.href = 'index.php';
				}, 3000);
     	  }});

	});

// fin logout


// AGREGAR PRODUCTO



// login

$('#formlogin').submit(function(e){

	e.preventDefault();

	var vpb_email = $("#email").val();
	var vpb_passwd = $("#passwd").val();
	
	if(vpb_email == "")
	{
		$("#msg-login-status").html('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><i class="fa fa-times-circle"></i> Ingrese un Email!</div>');
	}
	else if(vpb_passwd == "")
	{
		$("#msg-login-status").html('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><i class="fa fa-times-circle"></i> Ingrese una contraseña!</div>');
	}
	else
	{

		var dataString = 'email=' + vpb_email + '&passwd=' + vpb_passwd;
		$.ajax({
			type: "POST",
			url: "ajax/login.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#login_status").html(' &nbsp; <img src="http://upli.st/img/loader.gif" width="22px">');
			},
			success: function(response)
			{
				
				if (response == true) 
				{
					$("#login_status").html('');
					$("#msg-login-status").html('<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><i class="fa fa-check-square"></i> Inicio de sesión correcto!</div>');
					 setTimeout(function(){ 
						 window.location.reload(true);
					  }, 2000);
					
				}
				else
				{
					$("#login_status").html(response);
					$("#msg-login-status").html('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>Datos ingresados no son validos!</div>');
					}
				}
			});
		}
	});
});

// admin 

function cat_delete(id) {

	var dataString = 'action=cat-delete&id=' + id;

	$.ajax({
			type: "POST",
			url: "ajax/functions.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#actionstatus").html('<center><img src="http://www.estrategiasdeinversion.com/iconos/hloading.gif" width="140px"></center><br>');
			},
			success: function(response)
			{
				if(response == true){
					$("#actionstatus").html('<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong><i class="fa fa-check-square"></i>  Categoria Eliminada!</strong></div>');
				}
				else 
				{
					$("#actionstatus").html('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong><i class="fa fa-ban"></i> Ocurrio un error!</strong></div>');

				}
			}
		});	
}

function add_categoria() {

	var name = $('#cat-name').val();

	var dataString = 'action=add-cat&name=' + name;

	$.ajax({
			type: "POST",
			url: "ajax/functions.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#cat-status").html('<center><img src="http://www.estrategiasdeinversion.com/iconos/hloading.gif" width="140px"></center><br>');
			},
			success: function(response)
			{	
				if(response == 'vacio'){
				$("#cat-status").html('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong><i class="fa fa-ban"></i> Debe ingresar un nombre!</strong></div>');
				}
				else if(response == 'ok'){
				$("#cat-status").html('<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong><i class="fa fa-check-square"></i>  Categoria Añadida!</strong></div>');
				}
				else if(response == 'exist'){
				$("#cat-status").html('<div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong><i class="fa fa-ban"></i>  Este Nombre ya existe!</strong></div>');
				}
				else 
				{
				$("#cat-status").html('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong><i class="fa fa-ban"></i> Ocurrio un error!</strong></div>');
				}
			}
	   });	
}


$('#pro').click(function() {
  $('#productos').focus();
});







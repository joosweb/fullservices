<?php
require('../config/conexion.php');
$class = new admin_panel();
$email = mysqli_real_escape_string($class->conexion(),$_POST['email']);
$passwd = mysqli_real_escape_string($class->conexion(),$_POST['passwd']);
$class->login($email,$passwd);
?>
<?php
session_start();

require('../config/conexion.php');

$class = new Mysql;

$action = mysqli_real_escape_string($class->conexion(),$_POST['action']);

if(isset($_SESSION['admin'])) {

	switch ($action) {
		
		case 'add-cat':

			$name = mysqli_real_escape_string($class->conexion(),$_POST['name']);

			if($name == false){
				echo 'vacio';
				exit();
			}

			$check = mysqli_query($class->conexion(),"SELECT id FROM categorias WHERE name = '".$name."'");
			$res = mysqli_fetch_array($check,MYSQLI_ASSOC);

			if($res['id']) {
				echo 'exist';
			}
			else {
				
			$add = mysqli_query($class->conexion(),"INSERT INTO categorias (name) VALUES ('".$name."')");
			
			if($add){
				echo 'ok';
			}
			else {
				echo false;
			 }
			}			
			break;

		case 'cat-delete':
			
			$id = mysqli_real_escape_string($class->conexion(),$_POST['id']);
			
			$delete = mysqli_query($class->conexion(),"DELETE FROM categorias WHERE id ='".$id."' LIMIT 1");
			
			if($delete){
				echo true;
			}
			else {
				echo false;
			}
			break;
		
		default:
			# code...
			break;
	}

}
?>
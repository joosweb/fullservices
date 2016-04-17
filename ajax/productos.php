<?php
		require('../config/conexion.php');
		$class = new Productos();
		$id_cat = $_GET['id'];
		$class->productos($id_cat);
?>
<!-- Item #1 -->
                
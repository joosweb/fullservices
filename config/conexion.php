<?php 
	session_start();

	define('DB_HOST','localhost');
    define('DB_USER','asdasds');
    define('DB_PASS','asdasdas');
    define('DB_NAME','asdasda');
    define('DB_CHARSET','utf-8'); 

    class Mysql {

    	protected $_db;

		public function conexion() {

			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			$mysqli->set_charset("utf8");

			if($mysqli) {
				return $mysqli;
			}
			else {
				return;
			}

			$this->_db->set_charset(DB_CHARSET);

		    $this->_db->set_charset("utf8");
		 }
	 }

	 /**
	 *  ADMIN PANEL
	 */
	 class admin_panel extends Mysql
	 {
	 	/* ADMIN LOGIN */
	 	public function login($email,$pass){
	 		
	 		$sql = mysqli_query($this->conexion(),"SELECT * FROM admin WHERE email='".$email."' AND password='".$pass."' LIMIT 1");
	 		$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

	 		if($row['id']){
	 			$_SESSION['id'] = $row['id'];
	 			$_SESSION['admin'] = $row['email'];
	 			echo true;
	 		}
	 		else{
	 			return false;
	 		}
	 	}

	 	public function random_code($length) {
		    $key = '';
		    $keys = array_merge(range(0, 9));
		    for ($i = 0; $i < $length; $i++) {
		        $key .= $keys[array_rand($keys)];
		    }
		    return $key;
	    } 

	 	public function insert_pro($name,$desc,$img_name,$cat,$stock,$price) {
	 		$code = $this->random_code(7);
	 		$insert = mysqli_query($this->conexion(),"INSERT INTO productos (name,desc_long,img1,cat_id,price,code,stock) VALUES ('".$name."','".$desc."','".$img_name."','".$cat."','".$price."','".$code."','".$stock."')");
	 		if($insert){
	 			echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong><i class="fa fa-check-square"></i>  El producto '.$name.' ha sido añadido!</strong></div>';
	 		}
	 	}

	 	public function delete_pro($id){
	 		$delete = mysqli_query($this->conexion(),"DELETE FROM productos WHERE id='".$id."' LIMIT 1");
	 		if($delete){
	 			echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong><i class="fa fa-check-square"></i>  El producto se ha eliminado!</strong></div>';
	 		}
	 	}
	 }

	 /**
	 *  WEB USER
	 */
	 class General extends Mysql
	 {
	 	
	 	// DEVUELVE IMG SLIDER WEB

	 	public function get_slider_img($id) {

	 		$sql = mysqli_query($this->conexion(), "SELECT * FROM slider WHERE id='".$id."'");
	 		$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

	 		return $row['url'];

	 	}

	 	// IMPRIMIR CATEGORIAS SELECT

	 	public function get_cats() {

	 		$sql = mysqli_query($this->conexion(), "SELECT * FROM categorias");
	 		while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
	 			echo "<option value='".$row['id']."'>".$row['name']."</option>";
	 		}

	 	}

	 	public function get_cats_index() {

	 		$sql = mysqli_query($this->conexion(), "SELECT * FROM categorias");
	 		while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
	 			echo '<div class="cat-button" style="font-size:11px;">';
	 			echo '<a href="index.php?p=home&idcat='.$row['id'].'">'.$row['name'].'<span style="float:right;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>';
	 			echo '</div>';
	 		}

	 	}

	 	// IMPRIMIR CATEGORIAS  

	 	public function get_cat_all() {

	 		$sql = mysqli_query($this->conexion(), "SELECT * FROM categorias");
	 		while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
	 			echo "<tr>";
	 			echo "<td>".$row['id']."</td>";
	 			echo "<td>".$row['name']."</td>";
	 			echo "<td><button onclick='cat_delete(".$row['id'].");' class='label label-danger'><i class='fa fa-trash-o'></i> Eliminar</button></td>";
	 			echo "</tr>";
	 		}

	 	}




	 }


?>
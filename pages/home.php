<div class="col-md-9" style="margin-top:5px;">
      <div class="panel panel-default">
      <div class="panel-heading">
      <h3 class="panel-title"><span style="font-size:13px;">Inicio > <strong>Seguridad Industrial</strong></span></h3>
      </div>
      <div class="table-responsive">
      <?php
      // maximo por pagina
      $limit = 15;
      // pagina pedida
      $pag = (int) $_GET["pag"];
      if ($pag < 1)
      {
         $pag = 1;
      }
      $catid = htmlentities($_GET['idcat']);
      if($catid == ''){
        $catid=1;
      }
      $offset = ($pag-1) * $limit;
      $sql = mysqli_query($class->conexion(),"SELECT SQL_CALC_FOUND_ROWS id, name, img1 FROM productos WHERE cat_id='".$catid."' LIMIT $offset, $limit");
      $sqlTotal = mysqli_query($class->conexion(),"SELECT * FROM productos where cat_id='".$catid."'");
      // Total de registros sin limit
      $total = mysqli_num_rows($sqlTotal);
      if($total == 0){
            echo '<br><div class="alert alert-dismissible alert-warning" style="width:92%">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <p><i class="fa fa-exclamation-triangle"></i> Esta categoria no tiene productos.</p>
                </div>';
      }
      ?>
      <?php
      while ($row = mysqli_fetch_assoc($sql))
      {
        
      ?>
      <table class="table item-pro">    
        <tr>
        <td>
        <div class="item-header" style="height:40px; padding:3px;">
        <?php 
          echo $row['name'];
        ?>
        </div>
        </td>
        </tr>
        <tr>
        <td><div class="p-body" align="center">
        <img src="img/productos/<?php echo $row['img1']; ?>" class="img-circle" width="100px" height="100px">
        </div></td>
        </tr>
        <tr>
        <td><div class="p-footer" align="center">
        <a href="index.php?p=view&id=<?=$row['id']?>" type="button" style="width:100%;" class="btn btn-warning btn-xs">Ver Más!</a>
        </div>
        </td>        
        </tr>
        </table>
        <?php } ?>
        </div>
        <br>
        <div class="col-md-9 col-md-offset-1" align="center"  id="productos">
        <ul class="pagination pagination-sm">
            <?php
               $totalPag = ceil($total/$limit);
               $links = array();
               for( $i=1; $i<=$totalPag ; $i++)
               {
                  $links[] = '<li><a href="index.php?p=home&idcat='.$_GET['idcat'].'&pag='.$i.'">'.$i.'</a></li>';
               }
               echo implode(" ", $links);
            ?></ul>
      </div>
       

              
       


		          
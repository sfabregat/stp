<?php 
	include 'head_common_admin.php';
?>
<?php
	use X\Sys\Session;
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
		<h1>Todas las historias</h1>
			<table class="table table-hover">
			<thead><th>Id historia</th><th>Usuario</th><th>Path</th><th>Titulo</th><th>Descrpción</th><th>Valor Medio</th></thead>
              <?php for($i=0;$i<count($this->dataTable);$i++){ ?>
                <tr onclick="location.href = '<?= APP_W.'story/get/user/'.$this->dataTable[$i]['users'].'/idstory/'.$this->dataTable[$i]['idstories'];?>'">
                <?php $cont=0; ?>
                <?php foreach($this->dataTable[$i] as $key=>$value) :?>
                  	<?php if($cont==0){$id=$value;$cont++;} ?>
                  	
                        <td><?= $value; ?></td>
                  
                  <?php endforeach; ?>
                  
                  </tr>
                <?php } ?>
                
            </table>

        </section>


<?php 
	include 'footer_common.php';
?>
<?php 
	include 'head_common_user.php';
?>
<?php
	use X\Sys\Session;
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

		<div style="margin-left: 40%">
		<h1>Añadir</h1>
			
			<form method="POST" action="/stp/addstory/add">
			<label>Titulo</label><br>
			<input type="text" name="titulo"><br><br>
			<label>Historia</label><br>

			<textarea name="texto"></textarea><br><br>

			<input type="submit" name="newstory" id="newstory" class="btn btn-primary"><br><br>
			</form>
            <span class="msg"></span>
            </div>
        </section>


<?php 
	include 'footer_common.php';
?>
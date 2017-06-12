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

 		<div  style="margin-left: 45%; margin-top: 50px;">
			<h1><u>Perfil de Usuario</u></h1>
			<table border="1">
				<tr><td><p><b>Username:</b> <?= $this->dataTable[0]['username'] ?></p></td></tr>
				<tr><td><p><b>Email:</b> <?= $this->dataTable[0]['email'] ?></p></td></tr>
				<tr><td><p><b>Password:</b> <?= $this->dataTable[0]['password'] ?></td></tr>
            </table><br>
            	<h4><a href="#" >Editar<span class="glyphicon glyphicon-pencil" id="gly"></span></a></h4>
            	<br><br>
        </div>



<!--<a class="navbar-brand" href="/stp/dashboard"><?= Session::get('users')['username'] ?></a>-->



<?php 
	include 'footer_common.php';
?>
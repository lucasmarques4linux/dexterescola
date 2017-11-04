<?php include_once '../layout/_topo.php'; ?>
<?php require_once '../../include/data/database-cursos.php'; ?>
<?php verificarLogin() ?>
<?php 

if ($_POST ){
	
	exclui_curso($_POST['id']);

	header('Location:index.php');
}
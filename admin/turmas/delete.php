<?php include_once '../layout/_topo.php'; ?>
<?php require_once '../../include/data/database-turmas.php'; ?>
<?php verificarLogin() ?>
<?php 

if ($_POST ){
	
	exclui_turma($_POST['id']);

	header('Location:index.php');
}
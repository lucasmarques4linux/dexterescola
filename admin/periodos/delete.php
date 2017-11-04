<?php include_once '../layout/_topo.php'; ?>
<?php require_once '../../include/data/database-periodos.php'; ?>
<?php verificarLogin() ?>
<?php 

if ($_POST ){
	
	exclui_periodo($_POST['id']);

	header('Location:index.php');
}
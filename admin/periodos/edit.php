<?php include_once '../layout/_topo.php'; ?>
<?php require_once '../../include/data/database-periodos.php'; ?>
<?php verificarLogin() ?>

<?php 
	if ($_GET) {
		$periodo = lista_periodo_por_id($_GET['id']);
	}
 ?>

<div class="cointainer">

	<div class="page-header">
		<h2>Editar <small>Período</small></h2>		
	</div>

	<form action="#" method="POST">
	  <div class="form-group">
	    <label>Período</label>
	    <input type="text" name="periodo" class="form-control" value= "<?= $periodo['descricao'] ?>" required>
	  </div>
	   <input type="hidden" name="id" value="<?php echo $periodo['id']; ?>">
	  <a class="btn btn-warning" href="/DexterEscola/admin/periodos/index.php" role="button">Voltar</a>
	  <button type="submit" class="btn btn-default">Salvar</button>
	</form>

</div>


<?php 

if ($_POST ){

	$updatePeriodo = [
		'descricao' => $_POST['periodo'],
		'id'		=> $_POST['id']
	];
	
	edita_periodo($updatePeriodo);

	header('Location:index.php');
}


?>
<?php include_once '../layout/_rodape.php'; ?>
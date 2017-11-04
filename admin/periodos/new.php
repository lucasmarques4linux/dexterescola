<?php include_once '../layout/_topo.php'; ?>
<?php require_once '../../include/data/database-periodos.php'; ?>
<?php verificarLogin() ?>

<div class="cointainer">

	<div class="page-header">
		<h2>Novo <small>Período</small></h2>		
	</div>

	<form action="#" method="POST">
	  <div class="form-group">
	    <label>Período</label>
	    <input type="text" name="periodo" class="form-control" placeholder="Período" required>
	  </div>
	  <a class="btn btn-warning" href="/DexterEscola/admin/periodos/index.php" role="button">Voltar</a>
	  <button type="submit" class="btn btn-default">Cadastrar</button>
	</form>

</div>


<?php 

if ($_POST ){
	
	insere_periodo($_POST['periodo']);

	header('Location:index.php');
}


?>
<?php include_once '../layout/_rodape.php'; ?>
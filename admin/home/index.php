<?php include_once '../layout/_topo.php'; ?>
<?php verificarLogin() ?>

<div class="cointainer">

	<div class="page-header">
		<h2>Bem-Vindo <small><?php echo $_SESSION['usuario']; ?></small></h2>
	</div>


</div>

<?php include_once '../layout/_rodape.php'; ?>
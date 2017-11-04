<?php include_once '../layout/_topo.php'; ?>
<?php require_once '../../include/data/database-turmas.php'; ?>
<?php require_once '../../include/data/database-cursos.php'; ?>
<?php require_once '../../include/data/database-periodos.php'; ?>
<?php verificarLogin() ?>

<div class="cointainer">

	<div class="page-header">
		<h2>Nova <small>Turma</small></h2>		
	</div>

	<form action="#" method="POST">
	  <div class="form-group">
		  <label>Curso</label>
		  <select class="form-control" name="curso">
		  <?php $listaCursos = lista_cursos(); ?>
		   	<?php foreach ($listaCursos as $curso) :?>
		   		<option value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
		   		
		   	<?php endforeach; ?>
		  </select>
		</div>
		<div class="form-group">
		  <label>Curso</label>
		  <select class="form-control" name="periodo">
		  <?php $listaPeriodos = lista_periodos(); ?>
		   	<?php foreach ($listaPeriodos as $periodo) :?>
		   		<option value="<?php echo $periodo['id']; ?>"><?php echo $periodo['descricao']; ?></option>
		   		
		   	<?php endforeach; ?>
		  </select>
		</div>
		 <div class="form-group">
		  <label>Instrutor</label>
		  <select class="form-control" name="instrutor">
		    <option value="1">Lucas</option>
		    <option value="2">João</option>
		    <option value="3">Gabriel</option>
		  </select>
		</div>
	  <a class="btn btn-warning" href="/DexterEscola/admin/periodos/index.php" role="button">Voltar</a>
	  <button type="submit" class="btn btn-default">Cadastrar</button>
	</form>

</div>


<?php 

if ($_POST ){
		
	$turma = [
		'curso_id' => $_POST['curso'],
		'periodo_id' => $_POST['periodo'],
		'instrutor_id' => $_POST['instrutor'],
	];

	insere_turma($turma);

	header('Location:index.php');
}


?>
<?php include_once '../layout/_rodape.php'; ?>
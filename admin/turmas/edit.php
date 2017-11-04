<?php include_once '../layout/_topo.php'; ?>
<?php require_once '../../include/data/database-turmas.php'; ?>
<?php require_once '../../include/data/database-cursos.php'; ?>
<?php require_once '../../include/data/database-periodos.php'; ?>
<?php verificarLogin() ?>

<?php 
	if ($_GET) {
		$turma = lista_turma_por_id($_GET['id']);
	}
 ?>

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

		   		<?php 
		   			$selected = '';
		   			if ($turma['curso_id'] == $curso['id']){
		   				$selected = 'selected';
		   			}
		   		?>
		   		<option value="<?php echo $curso['id']; ?>" <?php echo $selected ?>><?php echo $curso['nome']; ?></option>
		   		
		   	<?php endforeach; ?>
		  </select>
		</div>
		<div class="form-group">
		  <label>Curso</label>
		  <select class="form-control" name="periodo">
		  <?php $listaPeriodos = lista_periodos(); ?>
		   	<?php foreach ($listaPeriodos as $periodo) :?>
		   		<?php 
		   			$selected = '';
		   			if ($turma['periodo_id'] == $periodo['id']){
		   				$selected = 'selected';
		   			}
		   		?>
		   		<option value="<?php echo $periodo['id']; ?>" <?php echo $selected ?>><?php echo $periodo['descricao']; ?></option>
		   		
		   	<?php endforeach; ?>
		  </select>
		</div>
		 <div class="form-group">
		  <label>Instrutor</label>
		  <select class="form-control" name="instrutor">
		     <?php $instrutores = array('1' => 'Lucas', '2' => 'João', '3' => 'Gabriel' ); 
		   ?>

		   	<?php foreach ($instrutores as $key => $value) :?>
		   		<?php 
		   			$selected = '';
		   			if ($curso['tipo'] == $key){
		   				$selected = 'selected';
		   			}
		   		?>
		   		<option value="<?php echo $key; ?>" <?php echo $selected; ?> ><?php echo $value; ?></option>
		   		
		   	<?php endforeach; ?>
		  </select>
		</div>
		<input type="hidden" name="id" value="<?php echo $turma['id']; ?>">
	  <a class="btn btn-warning" href="/DexterEscola/admin/periodos/index.php" role="button">Voltar</a>
	  <button type="submit" class="btn btn-default">Salvar</button>
	</form>

</div>


<?php 

if ($_POST ){
		
	$turma = [
		'id'			=> $_POST['id'],
		'curso_id' 		=> $_POST['curso'],
		'periodo_id' 	=> $_POST['periodo'],
		'instrutor_id' 	=> $_POST['instrutor'],
	];

	edita_turma($turma);

	header('Location:index.php');
}


?>
<?php include_once '../layout/_rodape.php'; ?>
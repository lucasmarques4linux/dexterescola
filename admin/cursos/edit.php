<?php include_once '../layout/_topo.php'; ?>
<?php require_once '../../include/data/database-cursos.php'; ?>
<?php verificarLogin() ?>

<?php 
	if ($_GET) {
			$curso = lista_curso_por_id($_GET['id']);
		}

 ?>

<div class="cointainer">

	<div class="page-header">
		<h2>Novo <small>Curso</small></h2>		
	</div>

	<form action="#" method="POST">
	  <div class="form-group">
	    <label>Curso</label>
	    <input type="text" name="curso" class="form-control" value="<?php echo $curso['nome']; ?>" placeholder="Curso" required>
	  </div>
	   <div class="form-group">
		  <label>Tipo do Curso</label>
		  <select class="form-control" name="tipo">
		  <?php $tiposCurso = array('EAD' => 'EAD', 'Presencial' => 'Presencial' ); 
		   ?>

		   	<?php foreach ($tiposCurso as $key => $value) :?>
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
		<div class="form-group">
			<label>Carga Horária</label>
			<input type="number" minlength="0" name="carga_horaria" value="<?php echo $curso['carga_horaria']; ?>" class="form-control">
		</div>
	   <div class="form-group">
		  <label>Requisitos</label>
		  <textarea class="form-control" name="requisitos" rows="5"><?php echo $curso['requisitos']; ?></textarea>
		</div>
		<input type="hidden" name="id" value="<?php echo $curso['id']; ?>">
	  <a class="btn btn-warning" href="/DexterEscola/admin/cursos/index.php" role="button">Voltar</a>
	  <button type="submit" class="btn btn-default">Salvar</button>
	</form>

</div>


<?php 

if ($_POST ){

	$curso = [
		'id'			=> $_POST['id'],
		'nome' 			=> $_POST['curso'],
		'tipo' 			=> $_POST['tipo'],
		'carga_horaria'	=> $_POST['carga_horaria'],
		'requisitos'	=> $_POST['requisitos'],	
	];
	
	edita_curso($curso);

	header('Location:index.php');
}


?>
<?php include_once '../layout/_rodape.php'; ?>
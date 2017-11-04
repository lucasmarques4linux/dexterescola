<?php include_once '../layout/_topo.php'; ?>
<?php require_once '../../include/data/database-cursos.php'; ?>
<?php verificarLogin() ?>

<div class="cointainer">

	<div class="page-header">
		<h2>Novo <small>Curso</small></h2>		
	</div>

	<form action="#" method="POST">
	  <div class="form-group">
	    <label>Curso</label>
	    <input type="text" name="curso" class="form-control" placeholder="Curso" required>
	  </div>
	   <div class="form-group">
		  <label>Tipo do Curso</label>
		  <select class="form-control" name="tipo">
		    <option value="EAD">EAD</option>
		    <option value="Presencial" selected>Presencial</option>
		  </select>
		</div>
		<div class="form-group">
			<label>Carga Horária</label>
			<input type="number" minlength="0" name="carga_horaria" value="0" class="form-control">
		</div>
	   <div class="form-group">
		  <label>Requisitos</label>
		  <textarea class="form-control" name="requisitos" rows="5">Requisitos do Curso</textarea>
		</div> 
	  <a class="btn btn-warning" href="/DexterEscola/admin/cursos/index.php" role="button">Voltar</a>
	  <button type="submit" class="btn btn-default">Cadastrar</button>
	</form>

</div>


<?php 

if ($_POST ){

	$curso = [
		'nome' 			=> $_POST['curso'],
		'tipo' 			=> $_POST['tipo'],
		'carga_horaria'	=> $_POST['carga_horaria'],
		'requisitos'	=> $_POST['requisitos'],	
	];
	
	insere_curso($curso);

	header('Location:index.php');
}


?>
<?php include_once '../layout/_rodape.php'; ?>
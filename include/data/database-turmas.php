<?php 

require_once 'conexao.php';

function insere_turma($turma){
	$con = conecta();

	$sql = <<< SQL

	INSERT INTO tb_turmas 
		(curso_id,periodo_id,instrutor_id) 
	VALUES 
	('{$turma['curso_id']}','{$turma['periodo_id']}','{$turma['instrutor_id']}')

SQL;
	
	pg_query($con, $sql);
	
	desconecta($con);
}

function lista_turmas(){

	$con = conecta();

	$sql = "SELECT * FROM tb_turmas";

    $result = pg_query($con, $sql);
    $found = pg_fetch_all($result);

    desconecta($con);

    return $found;

}

function lista_turmas_cursos_periodos(){

	$con = conecta();

	$sql = <<< SQL
	SELECT 
		tb_turmas.id AS id, 
		tb_cursos.nome AS curso, 
		tb_periodos.descricao AS periodo,
		tb_turmas.instrutor_id AS instrutor
	FROM tb_turmas 
	INNER JOIN tb_cursos 
		ON tb_turmas.curso_id = tb_cursos.id 
	INNER JOIN tb_periodos 
		ON tb_turmas.periodo_id = tb_periodos.id
SQL;

	$result = pg_query($con, $sql);
    $found = pg_fetch_all($result);

    desconecta($con);

    return $found;
}

function lista_turma_por_id($id){
	$con = conecta();

	$sql = "SELECT * FROM tb_turmas WHERE id = {$id}";

    $result = pg_query($con, $sql);
    $found = pg_fetch_assoc($result);

    desconecta($con);

    return $found;
}

function edita_turma($turma){
	$con = conecta();

	$sql = <<< SQL

	UPDATE tb_turmas SET 
		curso_id = '{$turma['curso_id']}', 
		periodo_id = '{$turma['periodo_id']}', 
		instrutor_id = '{$turma['instrutor_id']}'
	WHERE id = '{$turma['id']}'

SQL;

	pg_query($con, $sql);
	
	desconecta($con);
}

function exclui_turma($id){
	$con = conecta();

	$sql = "DELETE FROM tb_turmas WHERE id = {$id}";

	pg_query($con, $sql);

	desconecta($con);

}
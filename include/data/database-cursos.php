<?php 

require_once 'conexao.php';

function insere_curso($curso){
	$con = conecta();

	$sql = "INSERT INTO tb_cursos (nome,tipo,carga_horaria,requisitos) VALUES ('{$curso['nome']}','{$curso['tipo']}','{$curso['carga_horaria']}','{$curso['requisitos']}')";

	pg_query($con, $sql);
	
	desconecta($con);
}

function lista_cursos(){

	$con = conecta();

	$sql = "SELECT * FROM tb_cursos";

    $result = pg_query($con, $sql);
    $found = pg_fetch_all($result);

    desconecta($con);

    return $found;

}

function lista_curso_por_id($id){
	$con = conecta();

	$sql = "SELECT * FROM tb_cursos WHERE id = {$id}";

    $result = pg_query($con, $sql);
    $found = pg_fetch_assoc($result);

    desconecta($con);

    return $found;
}

function edita_curso($curso){
	$con = conecta();

	$sql = "UPDATE tb_cursos SET nome = '{$curso['nome']}',tipo = '{$curso['tipo']}',
	carga_horaria = '{$curso['carga_horaria']}',requisitos = '{$curso['requisitos']}' WHERE id = {$curso['id']}";

	pg_query($con, $sql);
	
	desconecta($con);
}

function exclui_curso($id){
	$con = conecta();

	$sql = "DELETE FROM tb_cursos WHERE id = {$id}";

	pg_query($con, $sql);

	desconecta($con);

}
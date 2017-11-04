<?php 

require_once 'conexao.php';

function insere_periodo($descricao){
	$con = conecta();

	$sql = "INSERT INTO tb_periodos (descricao) VALUES ('{$descricao}')";

	pg_query($con, $sql);
	
	desconecta($con);
}

function lista_periodos(){

	$con = conecta();

	$sql = "SELECT * FROM tb_periodos";

    $result = pg_query($con, $sql);
    $found = pg_fetch_all($result);

    desconecta($con);

    return $found;

}

function lista_periodo_por_id($id){
	$con = conecta();

	$sql = "SELECT * FROM tb_periodos WHERE id = {$id}";

    $result = pg_query($con, $sql);
    $found = pg_fetch_assoc($result);

    desconecta($con);

    return $found;
}

function edita_periodo($periodo){
	$con = conecta();

	$sql = "UPDATE tb_periodos SET descricao = '{$periodo['descricao']}' WHERE id = {$periodo['id']}";

	pg_query($con, $sql);
	
	desconecta($con);
}

function exclui_periodo($id){
	$con = conecta();

	$sql = "DELETE FROM tb_periodos WHERE id = {$id}";

	pg_query($con, $sql);

	desconecta($con);

}
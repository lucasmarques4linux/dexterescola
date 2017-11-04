<?php 

require_once 'conexao.php';

function insere_periodo($descricao){
	$con = conecta();

	$sql = "INSERT INTO periodos (descricao) VALUES ('{$descricao}')";

	pg_query($con, $sql);
	
	desconecta($con);
}

function lista_periodos(){

	$con = conecta();

	$sql = "SELECT * FROM periodos";

    $result = pg_query($con, $sql);
    $found = pg_fetch_all($result);

    desconecta($con);

    return $found;

}

function lista_periodo_por_id($id){
	$con = conecta();

	$sql = "SELECT * FROM periodos WHERE id = {$id}";

    $result = pg_query($con, $sql);
    $found = pg_fetch_all($result);

    desconecta($con);

    return $found;
}

function edita_periodo($periodos){
	$con = conecta();

	$sql = "UPDATE periodos SET descricao = '{$periodos['descricao']}' WHERE id = {$periodos['id']}";

	pg_query($con, $sql);
	
	desconecta($con);
}

function exclui_periodo($id){
	$con = conecta();

	$sql = "DELETE FROM periodos WHERE id = {$id}";

	pg_query($con, $sql);

	desconecta($con);

}

// echo "<pre>";
// // insere_periodo('noturno');
// // exclui_periodo(3);

// $periodo = ['id' => 1, 'descricao' => 'matutino'];
// edita_periodo($periodo);

// $periodos = lista_periodos();

// var_dump($periodos);
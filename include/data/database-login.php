<?php 

require_once 'conexao.php';

function logar($aluno){
	$con = conecta();

	$sql = <<< SQL

	SELECT * FROM tb_alunos 
	WHERE email = '{$aluno['email']}' 
	AND senha = '{$aluno['senha']}'

SQL;

    $result = pg_query($con, $sql);
    $found = pg_fetch_assoc($result);

    desconecta($con);

    return $found;
}
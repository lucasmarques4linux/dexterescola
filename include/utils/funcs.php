<?php 

require_once dirname(dirname(dirname(__FILE__))) .'/include/data/database-login.php';

session_start();

function login($dados){
	if (!isset($dados['email'])) {
		return false;
	}
	if (!isset($dados['senha'])) {
		return false;
	}
	
	$retorno = logar($dados);

	if( $retorno ){
		$_SESSION['logado'] = true;
		$_SESSION['usuario'] = $retorno['nome'];
		$_SESSION['id'] = $retorno['id'];
		return true;
	}else{
		$_SESSION['error'] = true;
		return false;
	} 
}
function deslogar(){  //Destroi as sessões de login ativa
	session_start();
	session_destroy();
	header("Location:/DexterEscola/admin/login/login.php");
}
function verificarLogin(){ // Verifica se o usuário está logado... direcionado para pagina correta
	if( isset( $_SESSION['logado'] ) ){
		return true;
	}else{
		header("Location:/DexterEscola/admin/login/login.php");
	}
}
function isLogado(){
	if (isset($_SESSION['logado'])) {
		return true;
	}
}
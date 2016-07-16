<?php
// Verifica se foi feito uma requisição do tipo POST para o arquivo
if($_POST['ajax'] == true){

	// Recupera o id do estado e transforma para um numero inteiro
	$estado = (int) $_POST['estado'];
	// Cria conexão com o banco de dados
	$pdo = new \PDO("mysql:host=localhost;dbname=dbteste", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	// Cria um array com as respostas que serão enviadas de volta ao AJAX, por padrão (success = false)
	$response = array( 'success' => false, 'error' => '', 'cidades' => array() );

	// Prepara a query contra SQL Injection
	$stmt = $pdo->prepare("SELECT * FROM `tb_cidades` WHERE estado_id = :estado");
	$stmt->bindValue(":estado", $estado, PDO::PARAM_INT);
	$stmt->execute();
	// Verifica se há dados retornados
	if($stmt->rowCount()){
		
		// Altera o success para true, para que o AJAX saiba que achou resultados
		$response['success'] = true;
		$response['cidades'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

	} else {
		// Seta a mensagem de erro caso não encontre nenhuma cidade
		$response['error'] = "Nenhuma cidade encontrada para este estado";
	}

	// Retorna o array de respostas como um JSON (JavaScript Object Notation) para que o script consiga manipular os dados
	echo json_encode($response);

}

<?php
	// Cria conexão com o banco de dados para popular os estados
	$pdo = new \PDO("mysql:host=localhost;dbname=dbteste", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Popular Select</title>
<style>
	.input {
		float: left;
		padding: 5px;
		margin-right: 3px;
	}
	
	.input input[type="submit"] {
		background: lightblue;
		border: 1px solid darkblue;
		color: blue;
	}
</style>
</head>
<body>
	<fieldset style="width: 420px; margin: 0 auto;">
		<legend>Populando select exemplo</legend>
		<form action="">
			<div class="input">
				<label for="estados">Estado: </label>
				<select name="estados" id="estados">
					<option value="">-- Selecione</option>
					<?php
						// Busca todos os estados no banco de dados e lista como opções do select
						$estados = $pdo->query("SELECT * FROM `tb_estados`", PDO::FETCH_ASSOC);
						foreach($estados as $estado){
							echo '<option value="'.$estado['id'].'">'.$estado['estado_nome'].'</option>';
						}
					?>
				</select>
			</div>
			<div class="input">
				<label for="cidades">Cidade: </label>
				<select name="cidades" id="cidades">
					<option value="">-- Selecione</option>
					<!-- O Javascript vai popular as opções de acordo com o estado selecionado automaticamente -->
				</select>
			</div>
			<div class="input" style="float: right;">
				<input type="submit" value="Buscar">
			</div>
		</form>
	</fieldset>
	
	<!-- Include do jQuery para funcionamento das funções -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
			// Aciona o evento quando o select mudar de valor
			$("#estados").on('change', function(){
				// Recupera o valor da opção selecionada
				var estado = $(this).val();
				// Verifica se não é o valor padrão
				if(estado != ""){

					$.post('ajax/get_cidades.php', {estado: estado, ajax: true}, function(data, status){

						if(data.success){
							// Retorna o conteúdo do select de cidades para o valor padrão
							$("#cidades").html('<option value="">-- Selecione</option>');
							// Percorre a array de cidades que foi retornado do banco de dados e adiciona ao final do select
							for(var item in data.cidades){
								$("#cidades").append('<option value="'+data.cidades[item].id+'">'+data.cidades[item].cidade_nome+'</option>');
							}

						} else {
							// Mostra a mensagem de erro no console caso não tenha encontrado resultados.
							console.log('Erro: '+data.error);
						}

					}, 'json');

				} else {
					// Retorna ao valor padrão, caso o estado tbm retorne ao valor padrão
					$("#cidades").html('<option value="">-- Selecione</option>');
				}
			});
		});
	</script>
</body>
</html>
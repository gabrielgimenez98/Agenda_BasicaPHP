<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sistema-MT4</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
		<script>
			var tel = 1;
			var mail = 1;

			function mais_tel() {

					$("#formulario-tels").append("<input type='text' class='form-control' name='tel[]" + tel + "' style='width:200px'>");
					$("#formulario-tels").append("<input type='text' class='form-control' name='tipo_tel[]' value = 'Pessoal' style='width:200px'>");
					tel++;
				}
				//função para adicionar campo e-mail
			function mais_mail() {
				$("#formulario-mails").append("<input type='text' class='form-control' name='email[]" + mail + "' style='width:200px'>");
				$("#formulario-mails").append("<input type='text' class='form-control' name='tipo_mail[]' value = 'Pessoal' style='width:200px'>");
				mail++;
			}
		</script>

		<?php 
			session_start();
		    // conexão com o banco de dados 
		    include 'conecta.php';
		     
		    //seleciona todos os itens da tabela 
		    $indice = 1;
		    $consulta = $con->query("SELECT * FROM tbcontatos LIMIT 1");
		    
		    $consulta_pg = $con->query("SELECT * FROM tbcontatos");
		    $cont = $consulta_pg->rowCount();
		    $restante = ceil($cont/1);


		    if (isset($_GET['page'])==$indice){
		        $url=$_GET['page'];
		        $comeca = $url*1-1;
		        $consulta = $con->query("SELECT * FROM tbcontatos LIMIT 1 OFFSET $comeca");

		    }
		    while($show=$consulta->fetch(PDO::FETCH_ASSOC)){
		        echo "<h2>-{$show['nomeContato']}-</h2>";
		        $pegaid = $show['idContato'];
		        $_SESSION['id'] = $pegaid;
		        echo "{$_SESSION['id']}";

		    }
		    //mostra e-mails
		    echo "<h3> E-MAILS:</h3>";
		    $consulta_mail = $con->query("SELECT * FROM tbemail where idContato = $pegaid");

		    while($show_mail=$consulta_mail->fetch(PDO::FETCH_ASSOC)){
		        echo "<h4>{$show_mail['email']}</h4>";
		        echo "  <h4>Tipo do email:  {$show_mail['tipoEmail']}</h4>";
		        echo"<br>";

		    }

		    //mostra telefones

		    echo "<h3> TELEFONES:</h3>";
		    $consulta_tel = $con->query("SELECT * FROM tbtelefone where idContato = $pegaid");

		    while($show_tel=$consulta_tel->fetch(PDO::FETCH_ASSOC)){
		        echo "<h4>{$show_tel['telefone']}</h4>";
		        echo "  <h4>Tipo do telefone :  {$show_tel['tipoTelefone']}</h4>";
		        echo"<br>";

		    }





		    while($indice <= $restante ){
		        echo "<a href = '?page=$indice' class ='btn_pg'> $indice </a>";
		        $indice++;
		    }
		    echo "<b><br><br> Você possui {$cont} contatos</b>"

		?>
		<br><br><br><br>

		<!-- Botões -->
		<button type="button" class="btn btn-info btn-lg" align="center" data-toggle="modal" data-target="#modalCadastro">Cadastrar Contato</button>
		<button class="btn btn-info btn-lg" align="center" onclick="javascript: location.href='delete.php';" >Deletar Contato Selecionado</button>

		
		<!-- Criação do modal Cadastro -->
		<div class="modal fade" id="modalCadastro" role="dialog">
			<div class="modal-dialog">

				<!-- Conteúdo do modal-->
				<div class="modal-content">
					<div class="modal-header">

						<!--Botão para fechar o modal -->
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Cadastro de novo usuário</h4>
					</div>
					<div class="modal-body" style="width: 50px">
						<div class="container">

							<h2>Preencha todos os dados</h2>
							<div class="container">


								<form action="salva.php" method="post">
									<div class="form-group">
										<!--Parte do nome -->
										<label for="usr">Nome:</label>
										<input type="text" class="form-control" name = "usr" id="usr"  style="width: 200px">
									</div>

									<div id="formulario-tels" class="form-group">
										<!--Parte do telefone -->
										<label for="pwd">Telefone:</label>
										<input type="button" class="btn btn-default" value="adicionar campo telefone" onClick="mais_tel()">
										<input type="text" class="form-control" name="tel[]" id="tel" style="width: 200px">
										<input type='text' class='form-control' name='tipo_tel[]' id = 'tipo_tel' value="Pessoal" style='width:200px'>
										
									</div>

									<div id="formulario-mails" class="form-group">
										<!--Parte do e-mail -->
										<label for="pwd">E-mail:</label>
										<input type="button" class="btn btn-default" value="adicionar campo email" onClick="mais_mail()">
										<input type="text" class="form-control" name="email[]" id="mail[]" style="width: 200px">
										<input type='text' class='form-control' name='tipo_mail[]' id = 'tipo_mail[]' value="Pessoal" style='width:200px'>
									</div>


							</div>
						</div>


					</div>

					<div class="modal-footer">
						<button type="submit">Cadastrar</button>
					</form>
					</div>
				</div>
			</div>

			
		</div>

</body>

</html>
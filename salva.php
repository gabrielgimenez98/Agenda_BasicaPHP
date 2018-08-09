
<?php
session_start();
try {
	include 'conecta.php';
  // insere o nome 
  $stmt = $con->prepare('INSERT INTO tbcontatos(nomeContato) VALUES(:nomeContato)');
  $stmt->execute(array(
    ':nomeContato' => $_POST['usr']
  ));

  //insere os e-mails
  foreach ($_POST['email'] as $key => $value) {
  	$stmt = $con->prepare('INSERT INTO tbemail(idContato,email,tipoEmail) VALUES(:idContato,:email, :tipoEmail)');
  	$stmt->execute(array(
    ':email' => $_POST['email'][$key],
    ':idContato' => $_SESSION['id'],
    ':tipoEmail'=> $_POST['tipo_mail'][$key]
	));
  }

  //insere os telefones
  foreach ($_POST['tel'] as $key => $value) {
  	$stmt = $con->prepare('INSERT INTO tbtelefone(idContato,telefone,tipoTelefone) VALUES(:idContato,:telefone, :tipoTelefone)');
  	$stmt->execute(array(
    ':telefone' => $_POST['tel'][$key],
    ':idContato' => $_SESSION['id'],
    ':tipoTelefone'=> $_POST['tipo_tel'][$key]
	));
  }
   
  echo "Dados Cadastrados!!!"; 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();}


   ?>
   <br>
   <input type="button" value="Voltar" onclick="javascript: location.href='main.php';" />
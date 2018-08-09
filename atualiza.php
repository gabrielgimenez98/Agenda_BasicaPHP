<?php 
session_start();  
   
try {
	include 'conecta.php';
	
   //atualiza o nome
  $stmt = $con->prepare('UPDATE tbcontatos SET nomeContato = :nome WHERE idContato=:idContato');
  $stmt->execute(array(
    ':nome' => $_POST['usr'],
    ':idContato' => $_SESSION['id']
  ));

  //atualiza emails
	foreach ($_POST['email'] as $key => $value) {
  	$stmt = $con->prepare ("UPDATE tbemail SET email = :email, tipoEmail= :tipoEmail WHERE idContato = 3");
  	$stmt->execute(array(
    ':email' => $_POST['email'][$key],
    ':tipoEmail'=> $_POST['tipo_mail'][$key]
));
  }

  //atualiza emails
  foreach ($_POST['tel'] as $key => $value) {
  	$stmt = $con->prepare('UPDATE tbtelefone SET telefone=:telefone,tipoTelefone=:tipoTelefone where idContato = :idContato');
  	$stmt->execute(array(
    ':telefone' => $_POST['tel'][$key],
    ':idContato' => $_SESSION['id'],
    ':tipoTelefone'=> $_POST['tipo_tel'][$key]
	));
  }
     
  echo "Dados atualizados!"; 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
<input type="button" value="Voltar" onclick="javascript: location.href='main.php';" />
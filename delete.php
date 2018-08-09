<?php 
session_start();   
try { 
  include 'conecta.php';

  //deleta da tabela e-mail
  $stmt = $con->prepare('DELETE FROM tbemail WHERE idContato = :idContato'); 
  $stmt->execute(array(
    ':idContato' => $_SESSION['id']
	));

  //deleta da tabela telefone
  $stmt = $con->prepare('DELETE FROM tbtelefone WHERE idContato = :idContato'); 
  $stmt->execute(array(
    ':idContato' => $_SESSION['id']
	));

  //deleta da tabela contatos  
  $stmt = $con->prepare('DELETE FROM tbcontatos WHERE idContato = :idContato');

  $stmt->execute(array(
    ':idContato' => $_SESSION['id']
	));



     
  echo "Dados deletados!"; 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
<input type="button" value="Voltar" onclick="javascript: location.href='main.php';" />
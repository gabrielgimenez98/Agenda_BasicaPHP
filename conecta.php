<?php
//conexão com o servidor
$con = new PDO('mysql:host=localhost:4306;dbname=agenda', "root", "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
// Caso a conexão seja reprovada, exibe na tela uma mensagem de erro
if (!$con) die ("<h1>Falha na conexão com o Banco de Dados!</h1>");
 
/*Configurando este arquivo, depois é só você dar um include em suas paginas php,
isto facilita muito, pois caso haja necessidade de mudar seu Banco de Dados
você altera somente um arquivo*/
?>

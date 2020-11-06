<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
ini_set("display_errors",0);
error_reporting(0);
include("verifica.php");
if($_GET["acao"] == logout){
setcookie("logado","");
echo'
<script type="text/javascript">
alert("Você foi deslogado com sucesso, redirecionando...");
location="index.php";
</script>
';
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adriel Central</title>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="http://www.centralbtn.com.br/global/css/bootstrap.min3f0d.css?v2.2.0">
<link rel="stylesheet" href="http://www.centralbtn.com.br/global/css/bootstrap-extend.min3f0d.css?v2.2.0">

</head>

<body bgcolor="white"><center>
<center><img src="img/centralbg.jpg"></center><br>
<h1><center><font color="blue">Bem Vindo</font></center></h1>
<br>
<div class="container">
  <h2>Escolha seu checker.</h2>
  <p>Estamos desenvolvendo nossa central, breve mais testadoes!</p>
  <div class="panel-group">
    <div class="panel-success class">
      <div class="panel-heading">Saldos (Clique em Cima do Checker que Deseja usar.)</div>
      <a href="pagseguro.php" class="btn btn-link" role="button">Pagseguro</a>
    </div>
    <div class="panel panel-info">
      <div class="panel-heading">Logins (Clique em Cima do Checker que Deseja usar.)</div>
	  <a href="gerador.php" class="btn btn-link" role="button">Gerador De CPF</a>
	  <a href="pontofrio.php" class="btn btn-link" role="button">Ponto Frio</a>
	  <a href="ifood.php" class="btn btn-link" role="button">Ifood</a>
	  <a href="hostgator.php" class="btn btn-link" role="button">Host Gator</a>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">Outros</div>
      <div class="panel-body">Breve iremos adicionar novos checkes .</div>
    </div>
  </div>
</div>
</body>
</html>
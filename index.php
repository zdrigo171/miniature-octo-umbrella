<?php
ini_set("display_errors",0);
error_reporting(0);
if($_GET["acao"] == logar){
$logincorreto=admin;
$senhacorreta="171team";
$user=$_POST["login"];
$pass=$_POST["senha"];	
if($user==$logincorreto && $pass==$senhacorreta){
setcookie("logado","1");
echo'
<script type="text/javascript">
alert("Redirecionando...");
location="logado.php";
</script>
';
}else{
echo'
<script type="text/javascript">
alert("Usuario ou senha incorretos, digite novamente...");
location="index.php";
</script>
';	
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GSCheckers</title>

<link rel="stylesheet" href="http://www.centralbtn.com.br/global/css/bootstrap.min3f0d.css?v2.2.0">
<link rel="stylesheet" href="http://www.centralbtn.com.br/global/css/bootstrap-extend.min3f0d.css?v2.2.0">

</head>


<body>
<center><div>
<img src="http://i68.tinypic.com/2dagltw.jpg">
</div></center>
<br>
<br>
<H1><center>Pagina de login</center></h1><br>
<form id="formulario" name="formulario" method="post" action="?acao=logar">
  <label for="login"></label>
  <center><h4>Usuario</h4></center>
  <center><input type="text" name="login" id="login" /> </center>
  <label for="senha"></label>
  <center><h4>Senha</h4></center>
  <CENTER> <input type="password" name="senha" id="senha" /></center>
  <br>
  <center><input type="submit" class="btn btn-info" name="logar" id="logar" value="Acessar" /></center>
</form>
<br>
<center><a href="skype://cristianthecrims?chat" class="btn btn-default" role="button">Não possui cadastro? Contato-nos!</a></center>

<p>&nbsp;</p>

<body bgcolor="#00e6e6"><Center>
<center><a href="planos.php" class="btn btn-danger" role="button">Planos e Preços aqui.</a></center>
</select></center>

</body></CENTER>
</html>
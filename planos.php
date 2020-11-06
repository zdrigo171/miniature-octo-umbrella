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

                        global $email, $pwd;

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

</head>



<body><center>
  <table class="table">
    <thead>
      <tr>
        <th>Validade</th>
        <th>Preço (REAL)</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>1. Semana</td>
        <td>R$ 40,00</td>
      </tr>
      <tr class="info">
        <td>15. Dias</td>
        <td>R$ 70,00</td>
      </tr>
      <tr class="success">
        <td>1. Mês</td>
        <td>R$ 120,00</td>
      </tr>
      <tr class="info">
        <td>1. Ano</td>
        <td>R$ 550,00</td>
      </tr>
    </tbody>
  </table>
</div>
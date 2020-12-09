<?php

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once('get_user_resp.php');

if(checkRequestData(array($_REQUEST['email'], $_REQUEST['pass']))){
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];

    $result = Login::tryLogin($email, $pass);
}
else{
    $result = formatError('No hay datos suficientes para iniciar sesión');
}

echo json_encode($result);
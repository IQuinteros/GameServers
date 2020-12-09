<?php

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');



if(checkRequestData(array('email', 'pass'))){
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];

    $result = Login::tryLogin($email, $pass);
}
else{
    $result = formatError('No hay datos suficientes para iniciar sesión');
}

echo json_encode($result);
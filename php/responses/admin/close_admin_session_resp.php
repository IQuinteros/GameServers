<?php

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');

Login::closeAdminSession();

$result = array('result' => 'success');

echo json_encode($result);
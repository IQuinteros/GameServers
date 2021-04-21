<?php

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');

Login::closeSession();

$result = array('result' => 'success');

echo json_encode($result);
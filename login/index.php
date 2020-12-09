<?php
    require_once('../php/utils/token.php');
    require_once __DIR__.('/../php/config.php');

    Token::checkOrGoToken(ROUTE_PROFILE, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameServers: Inicia Sesión</title>

    <?php require_once('../php/components/include.php') ?>
    <link rel="stylesheet" href="/css/popup.css">
    <link rel="stylesheet" href="/css/extra.css">
    <link rel="stylesheet" href="/css/intranet.css">
</head>
<body>

    <?php require_once('../php/components/header.php') ?>

    <?php require_once('../php/components/register/login_popup.php') ?>

    <script type="module" src="/js/behavior/behavior.js"></script>

</body>
</html>
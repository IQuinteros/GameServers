<?php
    require_once __DIR__.('/../php/utils/token.php');
    require_once __DIR__.('/../php/config.php');

    Token::checkOrGoToken(ROUTE_LOGIN);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameServers</title>
    <?php require_once('../php/components/include.php') ?>

    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>

    <div class="intranet-background"></div>

    <?php require_once('../php/components/header.php') ?>

    <?php require_once('../php/components/profile/info.php') ?>

    <?php require_once('../php/components/footer.php') ?>

    <script type="module" src="/js/behavior/behavior.js"></script>
</body>
</html>
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
    <link rel="stylesheet" href="../css/extra.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body>

    <div class="intranet-background"></div>

    <?php require_once('../php/components/header.php') ?>

    <?php require_once('../php/components/profile/info.php') ?>

    <?php require_once('../php/components/footer.php') ?>

    <script type="module" src="/js/behavior/behavior.js"></script>
</body>
</html>
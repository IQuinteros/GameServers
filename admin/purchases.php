<?php

    require_once __DIR__.('/../php/repositories/project_repository.php');
    require_once __DIR__.('/../php/utils/login.php');

    Token::checkOrGoAdminToken(ROUTE_ADMIN_LOGIN);

    $currentAdmin = Login::getCurrentAdmin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameServers: Mi proyecto</title>

    <?php require_once('../php/components/include.php') ?>
    <script src="/js/third-party/chart.min.js"></script>

    <link rel="stylesheet" href="/css/intranet.css">
    <link rel="stylesheet" href="/css/popup.css">
</head>
<body>

    <div class="intranet-background"></div>

    <?php require_once('../php/components/intranet/header_admin.php') ?>

    <main>
        <?php require_once('../php/components/intranet/purchases_toolbar.php') ?>
        <?php require_once('../php/components/intranet/purchases_info.php') ?>
    </main>

    <?php require_once('../php/components/footer.php') ?>

    <script type="module" src="/js/behavior/behavior.js"></script>

</body>
</html>
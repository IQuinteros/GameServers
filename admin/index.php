<?php
    require_once __DIR__.('/../php/utils/session.php');
    require_once __DIR__.('/../php/utils/token.php');

    Token::checkOrGoAdminToken(ROUTE_ADMIN_LOGIN);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameServers: Admin</title>

    <?php require_once __DIR__.('/../php/components/include.php') ?>
    <script src="/js/third-party/chart.min.js"></script>

    <link rel="stylesheet" href="/css/intranet.css">
</head>
<body>

    <div class="intranet-background"></div>

    <?php require_once __DIR__.('/../php/components/intranet/header_admin.php') ?>

    <main class="intranet-layout">
        <?php require_once __DIR__.('/../php/components/intranet/aside_admin.php') ?>
        <?php require_once __DIR__.('/../php/components/intranet/admin_info.php') ?>
    </main>



    <script type="module" src="/js/behavior/behavior.js"></script>

</body>
</html>
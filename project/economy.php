<?php

    require_once __DIR__.('/../php/repositories/project_repository.php');
    require_once __DIR__.('/../php/utils/login.php');

    Token::checkOrGoToken(ROUTE_LOGIN);

    $currentUser = Login::getCurrentUser();

    $projects = ProjectRepository::getProjectsByUserId($currentUser->id);

    if(count($projects) <= 0){
        header('Location:'.ROUTE_NEW_PROJECT);
    }

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

    <?php require_once('../php/components/header.php') ?>

    <main>
        <?php require_once('../php/components/project/economy_toolbar.php') ?>
        <?php require_once('../php/components/project/economy_info.php') ?>
    </main>

    <?php require_once('../php/components/footer.php') ?>

    <?php require_once('../php/components/project/economy_popup.php') ?>

    <script type="module" src="/js/behavior/behavior.js"></script>

</body>
</html>
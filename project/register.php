<?php
    require_once('../php/utils/token.php');
    require_once __DIR__.('/../php/repositories/project_repository.php');
    require_once __DIR__.('/../php/config.php');

    Token::checkOrGoToken(ROUTE_LOGIN);

    $currentUser = Login::getCurrentUser();

    $projects = ProjectRepository::getProjectsByUserId($currentUser->id);

    if(count($projects) > 1){
        header('Location:'.ROUTE_PROJECT);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameServers: Registra tu proyecto</title>

    <?php require_once('../php/components/include.php') ?>

    <link rel="stylesheet" href="/css/popup.css">
    <link rel="stylesheet" href="/css/extra.css">
    <link rel="stylesheet" href="/css/intranet.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body>

    <?php require_once('../php/components/header.php') ?>

    <?php require_once('../php/components/project/new_project_popup.php') ?>

    <script type="module" src="/js/behavior/behavior.js"></script>

</body>
</html>
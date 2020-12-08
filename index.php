<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameServers</title>

    <script src="https://kit.fontawesome.com/a12b0cdc6e.js" crossorigin="anonymous"></script>
    <script src="js/third-party/chart.min.js"></script>
    <script src="js/third-party/sweetalert2.all.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/inputs.css">
    <link rel="stylesheet" href="css/intranet.css">
    <link rel="stylesheet" href="css/pricing.css">
    <link rel="stylesheet" href="css/extra.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/cover.css">
    <link rel="stylesheet" href="css/showcase.css">
    <link rel="stylesheet" href="css/features.css">

</head>
<body>

    <?php require_once('php/components/header.php') ?>

    <main>
        <?php require_once('php/components/index/cover.php') ?> 
        <?php require_once('php/components/index/showcase.php') ?> 
        <?php require_once('php/components/index/features.php') ?> 
        <?php require_once('php/components/start_now.php') ?> 
    </main>

    <?php require_once('php/components/footer.php') ?>

    <script type="module" src="js/behavior/behavior.js"></script>
</body>
</html>
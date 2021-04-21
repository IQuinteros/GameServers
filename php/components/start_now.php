<?php
    require_once __DIR__.('/../utils/token.php');
    require_once __DIR__.('/../repositories/project_repository.php');

    $buttonText = Token::checkToken()? 'Ver planes' : 'Regístrate';
    $goToPricing = Token::checkToken()? 'true' : 'false';

    $currentUser = Login::getCurrentUser(false);

    if(!$currentUser == null){
        $projects = ProjectRepository::getProjectsByUserId($currentUser->id);

        if(count($projects) > 0){
            ?>
            <div class="blank"></div> 
            <?php
            return;
        }
    }
?>

<div class="start-now">
    <h1>¡Comienza ahora!</h1>
    <button class="btn" onclick="onRegisterClicked(<?= $goToPricing ?>)"><?= $buttonText ?></button>
    <div class="start-now__inner"></div>
</div>
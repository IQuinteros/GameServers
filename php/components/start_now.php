<?php
    require_once __DIR__.('/../utils/token.php');

    $buttonText = Token::checkToken()? 'Ver planes' : 'Regístrate';
    $goToPricing = Token::checkToken()? 'true' : 'false';
?>

<div class="start-now">
    <h1>¡Comienza ahora!</h1>
    <button class="btn" onclick="onRegisterClicked(<?= $goToPricing ?>)"><?= $buttonText ?></button>
    <div class="start-now__inner"></div>
</div>
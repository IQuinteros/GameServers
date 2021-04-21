<?php
    require_once __DIR__.('/../../utils/token.php');
    require_once __DIR__.('/../../repositories/project_repository.php');
    require_once __DIR__.('/../../repositories/plan_repository.php');

    // Not logged
    $url = 'onRegisterClicked()';
    $text = '¡Comienza ya!';

    $currentUser = Login::getCurrentUser(false);

    if(!$currentUser == null){
        // Logged
        $url = 'onProjectClicked()';
        $text = '¡Registra tu proyecto!';

        $projects = ProjectRepository::getProjectsByUserId($currentUser->id);

        if(count($projects) > 0){
            // Have projects
            $url = 'onProfileClicked()';
            $text = '¡Actualiza tu plan!';
        }
    }

    // Get plans
    $plans = PlanRepository::getPlansBySearch('');
?>

<div class="card-container">
    <div class="pricing-card">
        <h1>Gratis</h1>
        <p>- Modo de desarrollo. Recibe feedback de nuestras analíticas.</p>
        <p>- Prueba nuestro hosting de servidores hasta 600 horas de cómputo.</p>
        <p>- Incluye hasta 10.000 minutos de conectividad con grupos.</p>
        <h1 class="price">$<?= $plans[0]->price?><span class="price-description">USD /mensual</span></h1>

        <button class="btn" onclick="<?= $url?>"><?= $text ?></button>
    </div>
    <div class="pricing-card">
        <h1>Estándar</h1>
        <p>- Métricas rondando los 500 USD.</p>
        <p>- Cuentas ilimitadas de usuarios.</p>
        <p>- Soporte exclusivo de GameServers.</p>
        <h1 class="price">$<?= $plans[1]->price?><span class="price-description">USD /mensual</span></h1>

        <button class="btn" onclick="<?= $url?>"><?= $text ?></button>
    </div>
    <div class="pricing-card">
        <h1>Premium</h1>
        <p>- Métricas rondando los 8000 USD.</p>
        <p>- Todo lo incluido en el plan estándar.</p>
        <p>- Soporte ultra exclusivo de GameServers. Solicitudes de emergencia.</p>
        <h1 class="price">$<?= $plans[2]->price?><span class="price-description">USD /mensual</span></h1>

        <button class="btn"><?= $text ?></button>
    </div>
    <div class="pricing-card">
        <h1>Empresa</h1>
        <p>- Precio personalizado basado en el volumen de consumo.</p>
        <p>- Máximo soporte de emergencia.</p>
        <p>- Consulta con expertos para optimizar el uso del servicio.</p>
        <h1 class="price">$<?= $plans[3]->price?><span class="price-description">USD /mensual</span></h1>

        <button class="btn" onclick="<?= $url?>"><?= $text ?></button>
    </div>
</div>
<?php
    require_once __DIR__.('/../../repositories/user_repository.php');
    require_once __DIR__.('/../../repositories/project_repository.php');

    $users = UserRepository::getUsersByEmailOrName('');

    $usersCount = $users != null? count($users) : 0;

    // GET NEW USERS (LAST 3 DAYS)

    $newUsers = 0;

    foreach($users as $userRef){
        $timestamp = new DateTime($userRef->registerDate);
        $diff = $timestamp->diff(new DateTime('NOW'));
        if($diff->d <= 3){
            $newUsers++;
        }
    }

    // GET PLANS from projects

    $projects = ProjectRepository::getProjectsBySearch('');

    $freePlan = 0;
    $standardPlan = 0;
    $premiumPlan = 0;
    $businessPlan = 0;

    foreach($projects as $projectRef){
        switch($projectRef->planID){
            case 1: $freePlan++; break;
            case 2: $standardPlan++; break;
            case 3: $premiumPlan++; break;
            case 4: $businessPlan++; break;
        }
    }

?>

<div class="info">
    <div class="info__item">
        <h1><?= $usersCount?></h1>
        <h2>Clientes registrados</h2>
    </div>

    <div class="info__item">
        <h1><?= $newUsers ?></h1>
        <h2>Nuevos clientes</h2>
    </div>

    <div class="info__item--graph">
        <h2>Planes adquiridos</h2>
        <canvas id="plans"></canvas>
    </div>
</div>

<script>
    const ctxDiary = document.getElementById('plans').getContext('2d');
    const plans = new Chart(ctxDiary, {
        type: 'bar',
        data: {
            labels: ['Gratis', 'Estándar', 'Premium', 'Empresa'],
            datasets: [{
                label: 'Clientes',
                data: [<?= $freePlan?>, <?= $standardPlan?>, <?= $premiumPlan?>, <?= $businessPlan?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
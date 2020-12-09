<div class="info">
    <div class="info__item">
        <h1><?= rand(100, 3000000)?></h1>
        <h2>Jugadores activos</h2>
    </div>

    <div class="info__item">
        <h1><?= rand(2, 999)?></h1>
        <h2>Nuevos registros</h2>
    </div>

    <div class="info__item--graph">
        <h2>Jugadores diarios</h2>
        <canvas id="diary-players"></canvas>
    </div>

    <div class="info__item large">
        <h1><?= rand(999, 99999)?></h1>
        <h2>Jugadores de la semana</h2>
    </div>

    <div class="info__item--graph">
        <h2>Jugadores por región</h2>
        <canvas id="regions"></canvas>
    </div>
</div>

<script>
    const ctxDiary = document.getElementById('diary-players').getContext('2d');
    const diary = new Chart(ctxDiary, {
        type: 'bar',
        data: {
            labels: ['Lunes', 'Martes', 'Míercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
            datasets: [{
                label: 'Jugadores',
                data: [<?= rand(999, 9999)?>, <?= rand(999, 9999)?>, <?= rand(999, 9999)?>, <?= rand(999, 9999)?>, <?= rand(999, 9999)?>, <?= rand(999, 9999)?>, <?= rand(999, 9999)?>],
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

    const ctxRegion = document.getElementById('regions').getContext('2d');
    const region = new Chart(ctxRegion, {
        type: 'bar',
        data: {
            labels: ['América del Norte', 'Latinoamerica', 'Europa', 'Asia'],
            datasets: [{
                label: 'Jugadores',
                data: [<?= rand(9999, 999999)?>, <?= rand(9999, 999999)?>, <?= rand(9999, 999999)?>, <?= rand(9999, 999999)?>, <?= rand(9999, 999999)?>, <?= rand(9999, 999999)?>, <?= rand(9999, 999999)?>],
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
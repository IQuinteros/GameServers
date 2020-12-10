<?php
    $projectRef = $projects[0];
?>

<aside class="intranet-aside">
    <h2><?= $projectRef->name?></h2>

    <?php if($projectRef->status == ProjectStatus::Active){?>
    <div class="server-status status--active">
        <h2>Servidores activos</h2>
    </div>
    <?php }else{?>
    <div class="server-status status--inactive">
        <h2>Servidores inactivos</h2>
    </div>
    <?php }?>

    <button class="btn" onclick="onProjectEconomyClicked()">Ajustar economía</button>
    <button class="btn">Ajustar experimentos</button>
</aside>
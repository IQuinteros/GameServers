<?php

    require_once __DIR__.('/../../utils/login.php');

    $user = Login::getCurrentUser();

?>

<main class="profile-main">
    <h3>Mi perfil</h3>
    <img class="profile__img" src="<?= $user->image == null? '/assets/images/profile.png' : $user->image; ?>" alt="">
    <h1 class="profile__username"><?= $user->name ?></h1>
    <hr>
    <form id="profile" method="post" onsubmit="return onProfileSubmit(this, event)" enctype="multipart/form-data">
        <div class="profile">
                <div class="input-zone">
                    <label for="username">Nombre de usuario: </label>
                    <div class="input">
                        <input id="name" name="name" type="text" placeholder="Nombres" value="<?= $user->name ?>" required>
                    </div>
                    <label for="contact">Número de contacto: </label>
                    <div class="input">
                        <input id="contactNum" name="contactNum" type="number" placeholder="912345678" value="<?= $user->contactNum ?>" required>
                    </div>
                    <label for="team">Miembros de equipo: </label>
                    <div class="input">
                        <input id="membersNum" name="membersNum" type="number" placeholder="999" value="<?= $user->membersNum ?>" required>
                    </div>
                    <label for="pass">Nueva contraseña: </label>
                    <div class="input">
                        <input id="pass" name="pass" type="password" placeholder="Seguridad">
                    </div>
                </div>
                <div class="input-zone">
                    <label for="email">Email: </label>
                    <div class="input disabled">
                        <input id="email" name="email" type="email" placeholder="email@ejemplo.com" value="<?= $user->email ?>" disabled>
                    </div>
                    <label for="location">Ubicación: </label>
                    <div class="input">
                        <input id="location" name="location" type="text" placeholder="Calle, Población, Distrito, Ciudad, País" value="<?= $user->location ?>" required>
                    </div>
                    <label for="image">Nueva imagen: </label>
                    <div class="input">
                        <input id="image" name="image" type="file" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <label for="repass">Repetir contraseña: </label>
                    <div class="input">
                        <input id="repass" name="repass" type="password" placeholder="Repetir">
                    </div>
                </div>
            <button class="btn" type="submit" form="profile">Guardar datos</button>
        </div>
    </form>
    <h3 class="project__title">Mi proyecto</h3>
    <?php
        require_once __DIR__.('/../../repositories/project_repository.php');

        $projects = ProjectRepository::getProjectsByUserId($user->id);

        if(count($projects) > 0){

            $projectRef = $projects[0];
    ?>
    <form id="project" method="post" onsubmit="return onProjectSubmit(this, event)" enctype="multipart/form-data">
        <div class="project">
            <div class="input-zone">
                <label for="name">Nombre de proyecto: </label>
                <div class="input">
                    <input id="name" name="name" type="text" placeholder="Proyecto nombre" value="<?= $projectRef->name ?>" required>
                </div>
                <label for="plan">Plan actual: </label>
                <div class="input">
                    <select name="plan" id="sel-plan" required>
                        <option value="1" <?= $projectRef->planID == 1? 'selected': ''; ?> >Gratis</option>
                        <option value="2" <?= $projectRef->planID == 2? 'selected': ''; ?>>Estándar</option>
                        <option value="3" <?= $projectRef->planID == 3? 'selected': ''; ?>>Premium</option>
                        <option value="4" <?= $projectRef->planID == 4? 'selected': ''; ?>>Empresa</option>
                    </select>
                </div>
            </div>
            <div class="input-zone">
                <label for="region">Region: </label>
                <div class="input">
                    <select name="region" id="sel-region" required>
                        <option value="America del Norte" <?= $projectRef->region == 'America del Norte'? 'selected': ''; ?>>America del Norte</option>
                        <option value="Latinoamerica" <?= $projectRef->region == 'Latinoamerica'? 'selected': ''; ?>>Latinoamerica</option>
                        <option value="Europa" <?= $projectRef->region == 'Europa'? 'selected': ''; ?>>Europa</option>
                        <option value="Asia" <?= $projectRef->region == 'Asia'? 'selected': ''; ?>>Asia</option>
                    </select>
                </div>
                <div class="input__empty"></div>
            </div>

            <button class="btn">Guardar datos</button>
        </div>
    </form>
    <?php 
        }else{ 
            ?>
            <h2>Parece que no tienes ningún proyecto aún</h2>
            <?php
            require_once __DIR__.('/../start_now.php');
        }
    ?>

    <button class="btn btn--cancel" onclick="closeSession()">Cerrar sesión</button>

    <button class="btn btn--cancel btn--red" onclick="deleteAccount()">Eliminar cuenta</button>
</main>

<script>
    $(document).ready(function() {
        $('#sel-plan').select2({
            width: '100%',
            language: 'es',
            selectionCssClass: 'input-font-size select-background',
            dropdownCssClass: 'input-font-size select-background'
        });
        $('#sel-region').select2({
            width: '100%',
            language: 'es',
            selectionCssClass: 'input-font-size select-background',
            dropdownCssClass: 'input-font-size select-background'
        });
    });
</script>
<?php

    require_once __DIR__.('/../../utils/login.php');

    $user = Login::getCurrentUser();

?>

<main class="profile-main">
    <h3>Mi perfil</h3>
    <img class="profile__img" src="/assets/images/csgo.jpg" alt="">
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
                    <label for="pass">Contraseña: </label>
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
    <div class="project">
        <div class="input-zone">
            <label for="project">Nombre de proyecto: </label>
            <div class="input">
                <input id="project" name="project" type="text" placeholder="Proyecto nombre">
            </div>
            <label for="plan">Plan actual: </label>
            <div class="input">
                <input id="plan" name="plan" type="number" placeholder="1">
            </div>
        </div>
        <div class="input-zone">
            <label for="region">Region: </label>
            <div class="input">
                <input id="region" name="region" type="text" placeholder="Region">
            </div>
            <div class="input__empty"></div>
        </div>

        <button class="btn">Guardar datos</button>
    </div>

    <button class="btn btn--cancel" onclick="closeSession()">Cerrar sesión</button>
</main>
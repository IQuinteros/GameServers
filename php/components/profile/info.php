<main class="profile-main">
    <h3>Mi perfil</h3>
    <img class="profile__img" src="/assets/images/csgo.jpg" alt="">
    <h1 class="profile__username">Nombre de usuario</h1>
    <hr>
    <div class="profile">
        <div class="input-zone">
            <label for="email">Nombre de usuario: </label>
            <div class="input">
                <input id="username" name="username" type="text" placeholder="Nombres">
            </div>
            <label for="message">Número de contacto: </label>
            <div class="input">
                <input id="contact" name="contact" type="number" placeholder="912345678">
            </div>
            <label for="message">Miembros de equipo: </label>
            <div class="input">
                <input id="team" name="team" type="number" placeholder="999">
            </div>
            <label for="message">Contraseña: </label>
            <div class="input">
                <input id="pass" name="pass" type="password" placeholder="Seguridad">
            </div>
        </div>
        <div class="input-zone">
            <label for="email">Email: </label>
            <div class="input">
                <input id="email" name="email" type="email" placeholder="email@ejemplo.com">
            </div>
            <label for="message">Ubicación: </label>
            <div class="input">
                <input id="location" name="location" type="text" placeholder="Calle, Población, Distrito, Ciudad, País">
            </div>
            <div class="input__empty"></div>
            <label for="message">Repetir contraseña: </label>
            <div class="input">
                <input id="repass" name="repass" type="password" placeholder="Repetir">
            </div>
        </div>

        <button class="btn">Guardar datos</button>
    </div>
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
</main>
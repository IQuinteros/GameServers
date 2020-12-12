<div class="intranet-background"></div>

<div class="popup">
    <div class="popup__block">
        <div class="popup__content">
            <h1>Registro</h1>
            <h3>Administra los servidores de tu juego como nunca antes</h3>

            <form id="register" method="post" onsubmit="return onRegisterSubmit(this, event)" enctype="multipart/form-data">
                <div class="input-zone">
                    <label for="name">Nombre de usuario: </label>
                    <div class="input">
                        <input id="name" name="name" type="text" placeholder="" maxlength="150" pattern="[^\x22]+" title="No se permite el uso de comillas dobles" required>
                    </div>
                    <label for="email">Email: </label>
                    <div class="input">
                        <input id="email" name="email" type="email" placeholder="email@ejemplo.com" maxlength="150" required>
                    </div>
                    <label for="pass">Contraseña: </label>
                    <div class="input">
                        <input id="pass" name="pass" type="password" placeholder="" maxlength="50" required>
                    </div>
                    <label for="repass">Repetir Contraseña: </label>
                    <div class="input">
                        <input id="repass" name="repass" type="password" placeholder="" maxlength="50" required>
                    </div>
                    <label for="membersNum">Número de integrantes: </label>
                    <div class="input">
                        <input id="membersNum" name="membersNum" type="number" placeholder="999" min="1" max="99999999999" required>
                    </div>
                    <label for="contactNum">Número de contacto: </label>
                    <div class="input">
                        <input id="contactNum" name="contactNum" type="number" placeholder="912345678" min="10000000" max="999999999" required>
                    </div>
                    <label for="location">Dirección de empresa: </label>
                    <div class="input">
                        <input id="location" name="location" type="text" placeholder="Calle, Pasaje, Ciudad, Región..." maxlength="300" pattern="[^\x22]+" title="No se permite el uso de comillas dobles" required>
                    </div>
                </div>
            </form>
        
            <div class="popup__content__buttons">
                <button class="btn" type="submit" form="register">Aceptar</button>
            </div>

            <a href="/login">Ya tengo cuenta -> Iniciar sesión</a>
        </div>
    </div>
</div>
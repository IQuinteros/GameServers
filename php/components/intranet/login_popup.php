<div class="intranet-background"></div>

<div class="popup">
    <div class="popup__block">
        <div class="popup__content">
            <h1>Administrador</h1>

            <form id="login" method="post" onsubmit="return onAdminLoginSubmit(this, event)" enctype="multipart/form-data">
                <div class="input-zone">
                    <label for="email">Email: </label>
                    <div class="input">
                        <input id="email" name="email" type="text" placeholder="" required>
                    </div>
                    <label for="pass">Contraseña: </label>
                    <div class="input">
                        <input id="pass" name="pass" type="password" placeholder="" required>
                    </div>
                </div>
            </form>
            <div class="popup__content__buttons">
                <button class="btn" type="submit" form="login">Ingresar</button>
            </div>
        </div>
    </div>
</div>
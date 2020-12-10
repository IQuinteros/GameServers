<div class="intranet-background"></div>

<div class="popup open canclose">
    <div class="popup__block">
        <div class="popup__content">
            <h1>Nuevo ítem</h1>
            <h3>Añade un nuevo ítem de economía</h3>

            <form id="register" method="post" onsubmit="return onRegisterSubmit(this, event)" enctype="multipart/form-data">
                <div class="input-zone">
                    <label for="name">Nombre de ítem: </label>
                    <div class="input">
                        <input id="name" name="name" type="text" placeholder="" required>
                    </div>
                    <label for="initial">Cantidad inicial: </label>
                    <div class="input">
                        <input id="initial" name="initial" type="number" placeholder="" required>
                    </div>
                    <label for="max">Cantidad máxima: </label>
                    <div class="input">
                        <input id="max" name="max" type="number" placeholder="" required>
                    </div>
                </div>
            </form>
        
            <div class="popup__content__buttons">
                <button class="btn btn--cancel" onclick="closePopUp()">Volver</button>
                <button class="btn" type="submit" form="register">Aceptar</button>
            </div>

        </div>
    </div>
</div>
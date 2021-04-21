<div class="popup canclose">
    <div class="popup__block">
        <div class="popup__content">
            <h1 id="popup-title">Nuevo ítem</h1>
            <h3 id="popup-text">Añade un nuevo ítem de economía</h3>

            <form id="economy" method="post" onsubmit="return onEconomySubmit(this, event)" enctype="multipart/form-data">
                <div class="input-zone">
                    <label for="name">Nombre de ítem: </label>
                    <div class="input">
                        <input id="name" name="name" type="text" placeholder="" maxlength="150" pattern="[^\x22]+" title="No se permite el uso de comillas dobles" required>
                    </div>
                    <label for="initial">Cantidad inicial: </label>
                    <div class="input">
                        <input id="initial" name="initial" type="number" placeholder="" min="0" max="99999999999" required>
                    </div>
                    <label for="max">Cantidad máxima: </label>
                    <div class="input">
                        <input id="max" name="max" type="number" placeholder="" min="0" max="99999999999" required>
                    </div>
                    <input type="hidden" name="id" id="id" value="">
                </div>
            </form>
        
            <div class="popup__content__buttons">
                <button class="btn btn--cancel" onclick="closePopUp()">Volver</button>
                <button class="btn" type="submit" form="economy">Aceptar</button>
            </div>

        </div>
    </div>
</div>
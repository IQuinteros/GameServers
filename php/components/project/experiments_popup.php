<div class="popup canclose">
    <div class="popup__block">
        <div class="popup__content">
            <h1 id="popup-title">Nuevo experimento</h1>
            <h3 id="popup-text">Añade un nuevo experimento</h3>

            <form id="experiment" method="post" onsubmit="return onExperimentSubmit(this, event)" enctype="multipart/form-data">
                <div class="input-zone">
                    <label for="name">Nombre de experimento: </label>
                    <div class="input">
                        <input id="name" name="name" type="text" placeholder="" maxlength="150" pattern="[^\x22]+" title="No se permite el uso de comillas dobles" required>
                    </div>
                    <label for="description">Descripción: </label>
                    <div class="input">
                    <textarea name="description" id="description" cols="30" rows="5" placeholder="" maxlength="400"  pattern="[^\x22]+" title="No se permite el uso de comillas dobles" required></textarea>
                    </div>
                    <input type="hidden" name="id" id="id" value="">
                </div>
            </form>
        
            <div class="popup__content__buttons">
                <button class="btn btn--cancel" onclick="closePopUp()">Volver</button>
                <button class="btn" type="submit" form="experiment">Aceptar</button>
            </div>

        </div>
    </div>
</div>
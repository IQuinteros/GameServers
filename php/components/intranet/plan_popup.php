<div class="popup canclose">
    <div class="popup__block">
        <div class="popup__content">
            <h1 id="popup-title">Editar plan</h1>
            <h3 id="popup-text">Edita los datos del plan</h3>

            <form id="pricing" method="post" onsubmit="return onPlanSubmit(this, event)" enctype="multipart/form-data">
                <div class="input-zone">
                    <label for="name">Nombre de plan: </label>
                    <div class="input">
                        <input id="name" name="name" type="text" placeholder="" required>
                    </div>
                    <label for="description">Descripción: </label>
                    <div class="input">
                        <input id="description" name="description" type="text" placeholder="" required>
                    </div>
                    <label for="price">Precio: </label>
                    <div class="input">
                        <input id="price" name="price" type="number" placeholder="" required>
                    </div>
                    <input type="hidden" name="id" id="id" value="">
                </div>
            </form>
        
            <div class="popup__content__buttons">
                <button class="btn btn--cancel" onclick="closePopUp()">Volver</button>
                <button class="btn" type="submit" form="pricing">Aceptar</button>
            </div>

        </div>
    </div>
</div>
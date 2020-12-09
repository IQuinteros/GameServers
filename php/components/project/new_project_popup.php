<div class="intranet-background"></div>

<div class="popup">
    <div class="popup__block">
        <div class="popup__content">
            <h1>Nuevo Proyecto</h1>
            <h3>Comienza a usar nuestros servidores y llevar tu videojuego a lo máximo</h3>

            <form id="newproject" method="post" onsubmit="return onRegisterSubmit(this, event)" enctype="multipart/form-data">
                <div class="input-zone">
                    <label for="name">Nombre: </label>
                    <div class="input">
                        <input id="name" name="name" type="text" placeholder="" required>
                    </div>
                    <label for="sel-plan">Plan: </label>
                    <div class="input">
                        <select name="plan" id="sel-plan">
                            <option value="0">Gratis</option>
                            <option value="1">Estándar</option>
                            <option value="2">Premium</option>
                            <option value="3">Empresa</option>
                        </select>
                    </div>
                    <label for="pass">Jugadores estimados: </label>
                    <div class="input">
                        <input id="pass" name="pass" type="password" placeholder="" required>
                    </div>
                    <label for="repass">Cantidad del equipo: </label>
                    <div class="input">
                        <input id="repass" name="repass" type="password" placeholder="" required>
                    </div>
                    <label for="region">Región: </label>
                    <div class="input">
                        <select name="region" id="sel-region">
                            <option value="0">America del norte</option>
                            <option value="0">Latinoamérica</option>
                            <option value="1">Europa</option>
                            <option value="2">Asia</option>
                        </select>
                    </div>
                </div>
            </form>
        
            <div class="popup__content__buttons">
                <button class="btn" type="submit" form="register">Aceptar</button>
            </div>

            <a href="/pricing">¿Qué plan escoger?</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#sel-plan').select2({
            width: '100%',
            language: 'es',
            selectionCssClass: 'input-font-size',
            dropdownCssClass: 'input-font-size'
        });
        $('#sel-region').select2({
            width: '100%',
            language: 'es',
            selectionCssClass: 'input-font-size',
            dropdownCssClass: 'input-font-size'
        });
    });
</script>
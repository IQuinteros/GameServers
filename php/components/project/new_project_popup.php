<div class="intranet-background"></div>

<div class="popup">
    <div class="popup__block">
        <div class="popup__content">
            <h1>Nuevo Proyecto</h1>
            <h3>Comienza a usar nuestros servidores y llevar tu videojuego a lo máximo</h3>

            <form id="newproject" method="post" onsubmit="return onNewProjectSubmit(this, event)" enctype="multipart/form-data">
                <div class="input-zone">
                    <label for="name">Nombre: </label>
                    <div class="input">
                        <input id="name" name="name" type="text" placeholder="" maxlength="150" required>
                    </div>
                    <label for="sel-plan">Plan: </label>
                    <div class="input">
                        <select name="plan" id="sel-plan" required>
                            <?php
                            require_once __DIR__.('/../../repositories/plan_repository.php');

                            $plans = PlanRepository::getPlansBySearch('');

                            ?>
                            <option value="1"><?= $plans[0]->name ?></option>
                            <option value="2"><?= $plans[1]->name ?></option>
                            <option value="3"><?= $plans[2]->name ?></option>
                            <option value="4"><?= $plans[3]->name ?></option>
                        </select>
                    </div>
                    <label for="players">Jugadores estimados: </label>
                    <div class="input">
                        <input id="players" name="players" type="number" placeholder="" min="1" max="99999999999" required>
                    </div>
                    <label for="team">Cantidad del equipo: </label>
                    <div class="input">
                        <input id="team" name="team" type="number" placeholder="" min="1" max="99999999999" required>
                    </div>
                    <label for="sel-region">Región: </label>
                    <div class="input">
                        <select name="region" id="sel-region" required>
                            <option value="America del Norte">America del Norte</option>
                            <option value="Latinoamerica">Latinoamerica</option>
                            <option value="Europa">Europa</option>
                            <option value="Asia">Asia</option>
                        </select>
                    </div>
                </div>
            </form>
        
            <div class="popup__content__buttons">
                <button class="btn" type="submit" form="newproject">Aceptar</button>
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
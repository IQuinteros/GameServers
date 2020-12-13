<div class="intranet__title">
    <button class="btn btn--cancel" onclick="onProjectClicked()">Volver</button>
    <a href="/admin"><</a><h1>Administrar planes adquiridos</h1>
</div>

<div class="toolbar__limit">
    <div class="toolbar">
        <div class="toolbar__buttons">
        <button class="btn visible" onclick="setPlanStatus(selected, 'active')">Activar</button>
            <button class="btn visible" onclick="setPlanStatus(selected, 'inactive')">Desactivar</button>
        </div>
        <span class="toolbar__text" id="toolbar-text">0 seleccionados</span>
        <a class="toolbar__docs" href="/docs/?id=16" target="_blank">Ir a la documentación de esta sección</a>
    </div>
</div>
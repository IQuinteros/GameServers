<div class="table__limit">
    <div class="table__block">

        <div class="input-zone">
            <label for="search">Buscar: </label>
            <div class="input">
                <input id="search" name="search" type="text" placeholder="Por nombre">
            </div>
        </div>

        <div class="table">
            
            <div class="table__header table--economy">
                <h3>Ítem</h3>
                <h3>Inicial</h3>
                <h3>Máxima</h3>
            </div>

            <div class="table__item table--economy">
                <input type="checkbox" name="" id="" onchange="onCheck(this, 2)">
                <p>Dinero A</p>
                <p>1.500</p>
                <p>999.999</p>
            </div>

            <div class="table__item table--economy">
                <input type="checkbox" name="" id="" onchange="onCheck(this, 1)">
                <p>Dinero A</p>
                <p>1.500</p>
                <p>999.999</p>
            </div>

        </div>

    </div>
</div>

<script>

let selected = [];

function onCheck(elem, id){
    if(elem.checked){
        selected.push(elem);
    }
    else{
        selected.pop(elem);
    }

    const toolbarText = document.getElementById('toolbar-text');
    toolbarText.textContent = `${selected.length} seleccionados`;

    checkDeleteButton();
}

function checkDeleteButton(){
    const deleteButton = document.getElementById('delete-btn');
    if(selected.length > 0){
        deleteButton.classList.add('visible');
    }
    else{
        deleteButton.classList.remove('visible');
    }
}

</script>
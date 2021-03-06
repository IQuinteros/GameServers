<div class="table__limit">
    <div class="table__block">

        <div class="input-zone">
            <label for="search">Buscar: </label>
            <div class="input">
                <input id="search" name="search" type="text" placeholder="Por nombre" onkeyup="searchEconomy()">
            </div>
        </div>

        <div class="table">
            
            <div class="table__header table--economy">
                <h3>Ítem</h3>
                <h3>Inicial</h3>
                <h3>Máxima</h3>
            </div>

            <div id="table-results">

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

// To abort last ajax search
let lastSearch = null;

window.loadedData = [];

function searchEconomy(){
    const searchInput = document.getElementById('search');

    if(lastSearch != null){
        lastSearch.abort();
    }

    lastSearch = $.ajax({
        url: "/php/responses/economy/get_economy_project_resp.php",
        type: "post",
        data:  `toSearch=${searchInput.value}`,
        beforeSend : function(){
            $('#table-results').empty();
            $('#table-results').append(`<div class="loader"></div>`);
        },
        success: function(data){
            $('#table-results').empty();
            loadedData = [];
            if(data.length > 0){
                for(let i = 0; i < data.length; i++){
                    loadedData.push(data[i]);
                    $('#table-results').append(
                        `<div class="table__item table--economy">` +
                            `<input type="checkbox" name="${data[i].id}" id="${data[i].id}" onchange="onCheck(this, ${data[i].id})">`+
                            `<a href="#" onclick="editElement(${data[i].id})"><p>${data[i].name}</p></a>` +
                            `<p>${data[i].initialQuantity}</p>` +
                            `<p>${data[i].maxQuantity}</p>` +
                        `</div>`
                    );
                }
            }
            else{
                $('#table-results').append(`<p class="text-center">No se han encontrado resultados</p>`);
            }
        },
        error: function(e) {
            $('#table-results').empty();
            $('#table-results').append(`<p class="text-center">Ha habido un error de conexión</p>`);
        }          
    });
}

searchEconomy();

</script>
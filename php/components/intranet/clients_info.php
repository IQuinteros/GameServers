<div class="table__limit">
    <div class="table__block">

        <div class="input-zone">
            <label for="search">Buscar: </label>
            <div class="input">
                <input id="search" name="search" type="text" placeholder="Por nombre" onkeyup="searchClients()">
            </div>
        </div>

        <div class="table">
            
            <div class="table__header table--clients">
                <h3>Logo</h3>
                <h3>Cliente</h3>
                <h3>Fecha Registro</h3>
                <h3>Fecha Última conexión</h3>
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

function searchClients(){
    const searchInput = document.getElementById('search');

    if(lastSearch != null){
        lastSearch.abort();
    }

    lastSearch = $.ajax({
        url: "/php/responses/user/get_users_resp.php",
        type: "post",
        data:  `text=${searchInput.value}`,
        beforeSend : function(){
            $('#table-results').empty();
            $('#table-results').append(`<div class="loader"></div>`);
        },
        success: function(data){
            $('#table-results').empty();
            window.loadedData = [];
            if(data.length > 0){
                for(let i = 0; i < data.length; i++){
                    loadedData.push(data[i]);

                    let imageUrl = data[i].image;
                    if(imageUrl == null){ imageUrl = '/assets/images/profile.png'; }

                    $('#table-results').append(
                        `<div class="table__item table--clients">` +
                            `<input type="checkbox" name="${data[i].id}" id="${data[i].id}" onchange="onCheck(this, ${data[i].id})">`+
                            `<img class="table__item__image" src="${imageUrl}" alt="">` +
                            `<a href="#" onclick="displayClientInfo(${data[i].id})"><p>${data[i].name}</p></a>` +
                            `<p>${data[i].registerDate}</p>` +
                            `<p>${data[i].lastConnectionDate}</p>` +
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

searchClients();

</script>
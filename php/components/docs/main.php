<main class="docs-main">
    <div class="open-aside">
        <button class="btn" onclick="toggleAsideDoc(this)">
            <i class="fas fa-chevron-left"></i>
            <span>Abrir menú</span>
        </button>
    </div>

    <div class="docs__path">
        <!-- <a id="doc-master" class="doc--master"></a>
        <a id="doc-current"></a> -->
    </div>

    <h1 id="doc-title">GameServers</h1>
    <p id="doc-date" class="docs__date"></p>

    <div id="doc-content" class="doc__content">
        Cargando documentación
    </div>

    

    <h1 class="docs__question">¿Esto te ha sido útil?</h1>

    <div class="docs__question__buttons">
        <button class="btn" onclick="rateDoc(true)">
            <i class="far fa-smile"></i>
            <span>Si, gracias</span>
        </button>
        <button class="btn" onclick="rateDoc(false)">
            <i class="far fa-frown"></i>
            <span>No mucho</span>
        </button>
    </div>

    <?php require_once __DIR__.('/../start_now.php') ?>
</main>

<script>

window.currentAsideElement = null;

function ajaxUpdateCurrentDoc(id){
    $.ajax({
        url: "/php/responses/docs/get_doc_resp.php",
        type: "post",
        data: `id=${id}`,
        beforeSend : function(){
            $('#doc-content').empty();
            $('#doc-content').append(`<div class="loader"></div>`);
        },
        success: function(data){
            $('#doc-content').empty();
            if(!data.Error){
                $('#doc-title').empty();
                $('#doc-title').append(data.title);

                $('#doc-date').empty();
                $('#doc-date').append(data.publishDate);

                $('#doc-content').append(data.content.replace(/(?:\r\n|\r|\n)/g, '<br>'));

                if(currentAsideElement != null){
                    currentAsideElement.classList.remove('doc--current');
                }

                const asideID = document.getElementById(data.id);
                currentAsideElement = asideID;

                currentAsideElement.classList.add('doc--current');
            }
            else{
                Swal.fire({
                    icon: 'warning',
                    title: 'Hubo un problema',
                    text: data.Error,
                    
                    customClass: {
                        popup: 'normal-font-size'
                    }
                });
            }
        },
        error: function(e) {
            Swal.fire({
                icon: 'warning',
                title: 'Hubo un problema de conexión',
                text: 'Por favor intente más tarde',
                
                customClass: {
                    popup: 'normal-font-size'
                }
            });
        }          
    });
}


</script>
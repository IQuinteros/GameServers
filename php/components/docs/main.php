<main class="docs-main">
    <div class="open-aside">
        <button class="btn" onclick="toggleAsideDoc(this)">
            <i class="fas fa-chevron-left"></i>
            <span>Abrir menú</span>
        </button>
    </div>

    <div class="docs__path">
        <a id="doc-master" class="doc--master"></a>
        <a id="doc-current"></a>
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

let currentAsideElement = null;

function updateCurrrentDoc(docID, parentID, title, publishDate, likes, dislikes, content, parentTitle = ''){
    const docMaster = document.getElementById('doc-master');
    const docCurrent = document.getElementById('doc-current');

    const docTitle = document.getElementById('doc-title');
    const docDate = document.getElementById('doc-date');
    const docContent = document.getElementById('doc-content');


    if(currentAsideElement != null){
        currentAsideElement.classList.remove('doc--current');
    }

    const asideID = document.getElementById(docID);
    currentAsideElement = asideID;

    currentAsideElement.classList.add('doc--current');

    if(parentID == null){
        docMaster.textContent = title;
        docCurrent.textContent = null;
    }
    else{
        docMaster.textContent = parentTitle;
        docCurrent.textContent = title;
    }
    docTitle.textContent = title;
    docDate.textContent = publishDate;

    docContent.innerHTML = content;
}

</script>
<aside id="docs-aside" class="docs-aside">
    
    <div class="close-aside">
        <button class="btn" onclick="toggleAsideDoc(this)">
            <i class="fas fa-chevron-right"></i>
            <span>Cerrar menú</span>
        </button>
    </div>

    <span class="aside__title">Documentación</span>
    <h1 class="logo-text aside__subtitle">GameServers</h1>

    <div class="aside__list">
        <?php
        require_once __DIR__.('/../../repositories/documentation_element_repository.php');

        $docs = DocumentationElementRepository::getOrderDocs();

        $first = true;
        $firstDoc = null;
        foreach($docs as $docRef){
            $masterClass = '';
            if(count($docRef['children']) > 0){
                $masterClass = 'doc--master';
            }
            else{
                if($first){ 
                    $masterClass = $masterClass; 
                    $firstDoc = $docRef;
                    $first = false; 
                }
            }
        ?>
            <a id="<?= $docRef['id'] ?>" class="doc <?= $masterClass ?>" href="#" onclick="ajaxUpdateCurrentDoc(<?= $docRef['id'] ?>)"><?= $docRef['title'] ?></a>
        <?php 
            if(count($docRef['children']) > 0){
                ?>
                <div class="doc__inner">
                <?php
                foreach($docRef['children'] as $childDoc){
                    ?>
                    <a id="<?= $childDoc['id'] ?>" class="doc" href="#" onclick="ajaxUpdateCurrentDoc(<?= $childDoc['id'] ?>)"><?= $childDoc['title'] ?></a>
                    <?php
                }
                ?>
                </div>
                <?php
            }

        } 
        ?>
    </div>
</aside>

<script>
    $(document).ready(() => {

        <?php
        $firstUpdate = $firstDoc['id'];
        if(isset($_GET['id'])){
            $firstUpdate = (int)$_GET['id'];

            if($firstUpdate <= 0){
                $firstUpdate = 1;
            }
        }
        ?>

        ajaxUpdateCurrentDoc(<?= $firstUpdate ?>);

    });
</script>
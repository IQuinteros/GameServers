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
                    $masterClass = $masterClass.' doc--current'; 
                    $firstDoc = $docRef;
                    $first = false; 
                }
            }
        ?>
            <a id="<?= $docRef['id'] ?>" class="doc <?= $masterClass ?>" href="#" onclick="updateCurrrentDoc(<?= $docRef['id'] ?>, null, '<?= $docRef['title'] ?>', '<?= $docRef['publishDate'] ?>', <?= $docRef['likes'] ?>, <?= $docRef['dislikes'] ?>, `<?= nl2br($docRef['content']) ?>`)"><?= $docRef['title'] ?></a>
        <?php 
            if(count($docRef['children']) > 0){
                ?>
                <div class="doc__inner">
                <?php
                foreach($docRef['children'] as $childDoc){
                    ?>
                    <a id="<?= $childDoc['id'] ?>" class="doc" href="#" onclick="updateCurrrentDoc(<?= $childDoc['id'] ?>, <?= $childDoc['parentID'] ?>, '<?= $childDoc['title'] ?>', '<?= $childDoc['publishDate'] ?>', <?= $childDoc['likes'] ?>, <?= $childDoc['dislikes'] ?>, `<?= nl2br($childDoc['content']) ?>`, '<?= $docRef['title'] ?>')"><?= $childDoc['title'] ?></a>
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

        updateCurrrentDoc(<?= $firstDoc['id'] ?>, null, '<?= $firstDoc['title'] ?>', '<?= $firstDoc['publishDate'] ?>', <?= $firstDoc['likes'] ?>, <?= $firstDoc['dislikes'] ?>, `<?= nl2br($firstDoc['content']) ?>`);

    });
</script>
<header class="header__limit">
    <div class="header">
        <a class="logo-text" href="/"><h1>GameServers</h1></a>

        <nav class="desktop-nav">
            <button onclick="toggleFeaturesNav(this)">
                <span>Características</span>
                <i class="fas fa-caret-down"></i>
            </button>
            <div id="feature-submenu" class="button__submenu">
                <button class="btn" onclick="onFeatureMultiplayerClicked()">Multijugador</button>
                <button class="btn" onclick="onFeatureAnalyticsClicked()">Analíticas</button>
                <button class="btn" onclick="onFeatureLiveOpsClicked()">LiveOps</button>
            </div>
            <button onclick="onPricingClicked()">Precios</button>
            <button onclick="onDocsClicked()">Documentación</button>
        </nav>

        <?php 
        require_once __DIR__.('/../utils/token.php');
        require_once __DIR__.('/../repositories/project_repository.php');

        if(Token::checkToken()){

        $text = 'Ir a mi proyecto';

        $currentUser = Login::getCurrentUser(false);

        if(!$currentUser == null){    
            $projects = ProjectRepository::getProjectsByUserId($currentUser->id);
    
            if(count($projects) <= 0){
                $text = 'Registrar proyecto';
            }
        }

        ?>

        <a href="#" onclick="onProjectClicked()" class="header__project"><h3><?= $text ?></h3></a>

        <?php } else{?>

        <button class="btn desktop-nav" onclick="onRegisterClicked()">Regístrate</button>

        <?php }?>

        <button class="btn--profile desktop-nav" onclick="onProfileClicked()"><i class="far fa-user-circle"></i></button>

        <div class="hamburger-mobile" onclick="toggleMobileNav(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </div>  
</header>

<nav id="mobile-nav" class="mobile-nav">
    <button onclick="toggleFeaturesNav(this)">
        <span>Características</span>
        <i class="fas fa-caret-down"></i>
    </button>
    <div id="feature-submenu-mobile" class="button__submenu mobile">
        <button class="btn" onclick="onFeatureMultiplayerClicked()">Multijugador</button>
        <button class="btn" onclick="onFeatureAnalyticsClicked()">Analíticas</button>
        <button class="btn" onclick="onFeatureLiveOpsClicked()">LiveOps</button>
    </div>
    <button onclick="onPricingClicked()">Precios</button>
    <button onclick="onDocsClicked()">Documentación</button>

    <div class="mobile-nav__profile">
        <?php 
        require_once __DIR__.('/../utils/token.php');

        if(Token::checkToken()){
        ?>

        <a href="#" onclick="onProjectClicked()" class="header__project"><h3>Ir a mi proyecto</h3></a>

        <?php } else{?>

        <button class="btn" onclick="onRegisterClicked()">Regístrate</button>

        <?php }?>

        <button class="btn--profile" onclick="onProfileClicked()"><i class="far fa-user-circle"></i></button>
    </div>
</nav>
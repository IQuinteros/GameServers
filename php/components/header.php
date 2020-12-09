<header class="header__limit">
    <div class="header">
        <a class="logo-text" href="/"><h1>GameServers</h1></a>

        <nav class="desktop-nav">
            <button onclick="toggleFeaturesNav(this)">
                <span>Características</span>
                <i class="fas fa-caret-down"></i>
            </button>
            <div id="feature-submenu" class="button__submenu">
                <button class="btn" onclick="onFeatureMultiplayerClicked()">Multiplayer</button>
                <button class="btn" onclick="onFeatureAnalyticsClicked()">Analytics</button>
                <button class="btn" onclick="onFeatureLiveOpsClicked()">LiveOps</button>
            </div>
            <button onclick="onPricingClicked()">Precios</button>
            <button onclick="onDocsClicked()">Documentación</button>
        </nav>

        <?php 
            require_once __DIR__.('/../utils/token.php');

            if(Token::checkToken()){
        ?>

        <h2>Mi perfil</h2>

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
        <button class="btn" onclick="onFeatureMultiplayerClicked()">Multiplayer</button>
        <button class="btn" onclick="onFeatureAnalyticsClicked()">Analytics</button>
        <button class="btn" onclick="onFeatureLiveOpsClicked()">LiveOps</button>
    </div>
    <button onclick="onPricingClicked()">Precios</button>
    <button onclick="onDocsClicked()">Documentación</button>

    <div class="mobile-nav__profile">
        <button class="btn" onclick="onRegisterClicked()">Regístrate</button>

        <button class="btn--profile" onclick="onProfileClicked()"><i class="far fa-user-circle"></i></button>
    </div>
</nav>
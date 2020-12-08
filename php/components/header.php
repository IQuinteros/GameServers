<header class="header__limit">
    <div class="header">
        <a class="logo-text" href="/"><h1>GameServers</h1></a>

        <nav class="desktop-nav">
            <button>Características</button>
            <button onclick="onPricingClicked()">Precios</button>
            <button onclick="onDocsClicked()">Documentación</button>
        </nav>

        <button class="btn desktop-nav" onclick="onRegisterClicked()">Regístrate</button>

        <button class="btn--profile desktop-nav"><i class="far fa-user-circle"></i></button>

        <div class="hamburger-mobile" onclick="toggleMobileNav(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </div>  
</header>

<nav id="mobile-nav" class="mobile-nav">
    <button>Características</button>
    <button onclick="onPricingClicked()">Precios</button>
    <button onclick="onDocsClicked()">Documentación</button>

    <div class="mobile-nav__profile">
        <button class="btn" onclick="onRegisterClicked()">Regístrate</button>

        <button class="btn--profile"><i class="far fa-user-circle"></i></button>
    </div>
</nav>
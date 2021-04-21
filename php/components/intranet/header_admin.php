<header class="header__limit">
    <div class="header">
        <a class="logo-text" href="/"><h1>GameServers</h1></a>

        <nav class="desktop-nav">

        </nav>

        <?php 
        require_once __DIR__.('/../../utils/token.php');

        if(Token::checkAdminToken()){
        ?>

        <a href="#" onclick="closeAdminSession()" class="header__project admin"><h3>Cerrar sesión</h3></a>

        <?php } else{?>

        <h3 class="header__project admin desktop">Admin</h3>

        <?php } ?>

        <div class="hamburger-mobile" onclick="toggleMobileNav(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </div>  
</header>

<nav id="mobile-nav" class="mobile-nav">


    <div class="mobile-nav__profile">
        <?php 
        require_once __DIR__.('/../../utils/token.php');

        if(Token::checkAdminToken()){
        ?>

        <a href="#" onclick="closeAdminSession()" class="header__project admin"><h3>Cerrar sesión</h3></a>

        <?php } else{?>

        <h3 class="header__project admin">Admin</h3>

        <?php } ?>
    </div>
</nav>
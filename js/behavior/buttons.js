import routes from '../routes.js';

function openSelfWindow(url){
    window.open(url, '_self');
}

export function goToHome(){
    openSelfWindow(routes.ROUTE_INDEX);
}

export function goToRegister(){
    openSelfWindow(routes.ROUTE_REGISTER);
}

export function goToFeatureMultiplayer(){
    openSelfWindow(routes.ROUTE_FEATURE_MULTIPLAYER);
}

export function goToFeatureAnalytics(){
    openSelfWindow(routes.ROUTE_FEATURE_ANALYTICS);
}

export function goToFeatureLiveOps(){
    openSelfWindow(routes.ROUTE_FEATURE_LIVEOPS);
}

export function goToPricing(){
    openSelfWindow(routes.ROUTE_PRICING);
}

export function goToDocs(){
    openSelfWindow(routes.ROUTE_DOCS);
}

export function goToProfile(){
    openSelfWindow(routes.ROUTE_PROFILE);
}

export function toggleFeaturesNav(elem){
    const featureSubmenu = document.getElementById('feature-submenu');
    const featureSubmenuMobile = document.getElementById('feature-submenu-mobile');

    featureSubmenu.classList.toggle('open');
    featureSubmenuMobile.classList.toggle('open');

    const buttonIcon = elem.children[1];

    if(featureSubmenu.classList.contains('open')){
        buttonIcon.classList.add('fa-caret-up');
        buttonIcon.classList.remove('fa-caret-down');
    }
    else{
        buttonIcon.classList.remove('fa-caret-up');
        buttonIcon.classList.add('fa-caret-down');
    }
}

export function toggleMobileNav(elem){
    elem.classList.toggle('change');

    const mobileNav = document.getElementById('mobile-nav');

    if(elem.classList.contains('change')){
        mobileNav.classList.add('open');
    }
    else{
        mobileNav.classList.remove('open');
    }
    
}
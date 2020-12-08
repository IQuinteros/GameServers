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
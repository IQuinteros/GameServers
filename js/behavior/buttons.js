import routes from '../routes.js';
import * as error from '../foundations/error.js';
import * as loading from '../foundations/loading.js';

function openSelfWindow(url){
    window.open(url, '_self');
}

export function goToHome(){
    openSelfWindow(routes.ROUTE_INDEX);
}

export function goToAdmin(){
    openSelfWindow(routes.ROUTE_ADMIN);
}

export function goToRegister(goToPricing = false){
    if(goToPricing){
        openSelfWindow(routes.ROUTE_PRICING);
    }else{
        openSelfWindow(routes.ROUTE_REGISTER);
    }
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

export function goToProject(){
    openSelfWindow(routes.ROUTE_PROJECT);
}

export function goToProjectEconomy(){
    openSelfWindow(routes.ROUTE_PROJECT_ECONOMY);
}

export function goToProjectExperiments(){
    openSelfWindow(routes.ROUTE_PROJECT_EXPERIMENTS);
}

export function goToAdminPricing(){
    openSelfWindow(routes.ROUTE_ADMIN_PLANS);
}

export function goToAdminClients(){
    openSelfWindow(routes.ROUTE_ADMIN_CLIENTS);
}

export function goToAdminPlans(){
    openSelfWindow(routes.ROUTE_ADMIN_PURCHASES);
}

export function closeSession(){
    Swal.fire({
        title: 'Cerrar sesión',
        text: 'Estás a un paso de cerrar sesión',
        showCancelButton: true,
        confirmButtonText: `Cerrar sesión`,
        customClass: {
            popup: 'normal-font-size'
        }
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "/php/responses/user/close_session_resp.php",
                type: "post",
                data:  '',
                beforeSend : function(){
                    loading.showLoading('Cerrando sesión');
                },
                success: function(data){
                    onHomeClicked();
                },
                error: function(e) {
                    error.showNetError(e);
                }          
            });
        }
    })
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
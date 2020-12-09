import * as error from '../foundations/error.js';
import * as loading from '../foundations/loading.js';

function registerAjax(form, event){
    
    $.ajax({
        url: "/php/responses/user/add_user_resp.php",
        type: "post",
        data:  $('#register').serialize(),
        beforeSend : function(){
            loading.showLoading('Enviando solicitud');
        },
        success: function(data){
            onHomeClicked();
        },
        error: function(e) {
            error.showNetError(e);
        }          
    });

}

export function onRegisterSubmit(form, event){

    event.preventDefault();

    if(form['pass'].value == form['repass'].value){
        registerAjax(form, event);
    }
    else{
        form['repass'].setCustomValidity('Las contraseñas no coinciden');
    }    

    return false;
}

function loginSubmit(form, event){
    $.ajax({
        url: "/php/responses/user/new_login_resp.php",
        type: "post",
        data:  $('#login').serialize(),
        beforeSend : function(){
            loading.showLoading('Iniciando sesión');
        },
        success: function(data){
            console.log(data);
            if(data.email){
                onHomeClicked();
            }
            else{
                Swal.fire({
                    icon: 'warning',
                    title: 'No se ha podido iniciar sesión',
                    text: 'El email y/o la contraseña son incorrectas. Intente nuevamente',
                    
                    customClass: {
                        popup: 'normal-font-size'
                    }
                });
            }
        },
        error: function(e) {
            error.showNetError(e);
        }          
    });
}

export function onLoginSubmit(form, event){

    event.preventDefault();
    
    loginSubmit(form, event);

    return false;

}
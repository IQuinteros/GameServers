import * as error from '../foundations/error.js';
import * as loading from '../foundations/loading.js';

function adminLoginSubmit(form, event){
    $.ajax({
        url: "/php/responses/admin/new_admin_login_resp.php",
        type: "post",
        data:  $('#login').serialize(),
        beforeSend : function(){
            loading.showLoading('Iniciando sesión de administrador');
        },
        success: function(data){
            console.log(data);
            if(data.email){
                onAdminClicked();
            }
            else{
                Swal.fire({
                    icon: 'warning',
                    title: 'No se ha podido iniciar sesión de administrador',
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

export function onAdminLoginSubmit(form, event){

    event.preventDefault();
    
    adminLoginSubmit(form, event);

    return false;

}

export function closeAdminSession(){
    Swal.fire({
        title: 'Cerrar sesión',
        text: 'Estás a un paso de cerrar sesión de administrador',
        showCancelButton: true,
        confirmButtonText: `Cerrar sesión`,
        customClass: {
            popup: 'normal-font-size'
        }
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "/php/responses/admin/close_admin_session_resp.php",
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
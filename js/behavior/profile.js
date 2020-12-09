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

function updateSubmit(form, event){

    if((form['pass'].value || form['repass'].value) && (form['pass'].value !== form['repass'].value)) {
        Swal.fire({
            icon: 'warning',
            title: 'Las contraseñas ingresadas no coinciden',
            
            customClass: {
                popup: 'normal-font-size'
            }
        });
        return;
    }  


    const formData = new FormData();
    formData.append('name', form['name'].value);
    formData.append('membersNum', form['membersNum'].value);
    formData.append('contactNum', form['contactNum'].value);
    formData.append('location', form['location'].value);
    formData.append('pass', form['pass'].value);
    formData.append('image', form['image'].files[0]);

    $.ajax({
        url: "/php/responses/user/update_user_resp.php",
        type: "post",
        data:  new FormData(form), //$('#profile')
        processData: false,
        contentType: false,
        beforeSend : function(){
            loading.showLoading('Actualizando datos');
        },
        success: function(data){
            console.log(data);
            if(data.email){
                Swal.fire({
                    icon: 'success',
                    title: 'Datos actualizados exitósamente',
                    willClose: () => {
                        location.reload();
                    },
                    
                    customClass: {
                        popup: 'normal-font-size'
                    }
                });
            }
            else{
                Swal.fire({
                    icon: 'warning',
                    title: 'No se ha podido actualizar',
                    text: 'Algo ha ocurrido mal. Por favor revisa lo ingresado e intenta nuevamente',
                    
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

export function onProfileSubmit(form, event){
    event.preventDefault();

    updateSubmit(form, event);

    return false;
}

export async function deleteAccount(form, event){
    const { value: password } = await Swal.fire({
        icon: 'warning',
        title: 'Eliminar cuenta',
        text: 'Estás a un paso de eliminar tu cuenta. Esto no se puede deshacer. Escribe tu contraseña abajo para eliminar la cuenta.',
        input: 'password',
        inputValidator: (value) => {
            if (!value) {
              return 'Necesitas escribir la contraseña'
            }
        },
        showCancelButton: true,
        confirmButtonText: `Eliminar cuenta`,
        confirmButtonColor: '#C92020',
        customClass: {
            popup: 'normal-font-size'
        }
    });

    if(password){
        $.ajax({
            url: "/php/responses/user/delete_user_resp.php",
            type: "post",
            data: `pass=${password}`,
            beforeSend : function(){
                loading.showLoading('Eliminando cuenta');
            },
            success: function(data){
                if(data.result){
                    Swal.fire({
                        icon: 'success',
                        title: 'Cuenta eliminada exitósamente',
                        willClose: () => {
                            onHomeClicked();
                        },
                        
                        customClass: {
                            popup: 'normal-font-size'
                        }
                    });
                }
                else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Hubo un problema',
                        text: data.Error,
                        willClose: () => {
                            deleteAccount();
                        },
                        
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
}
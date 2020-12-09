function registerAjax(form, event){
    
    console.log($('#register').serialize());


    $.ajax({
        url: "/php/responses/user/add_user_resp.php",
        type: "post",
        data:  $('#register').serialize(),
        beforeSend : function(){
            Swal.fire({
                title: 'Enviando solicitud',
                timerProgressBar: true,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                },
                showConfirmButton: false,
                
                customClass: {
                    popup: 'normal-font-size'
                }
            });
        },
        success: function(data){
            onHomeClicked();
        },
        error: function(e) {
            console.error(e);
            Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error',
                text: 'Verifique la conexión e intente nuevamente',
                
                customClass: {
                    popup: 'normal-font-size'
                }
            });
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
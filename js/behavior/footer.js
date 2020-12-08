function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}

export function sendContactMessage(){
    const email = document.getElementById('contactemail');
    const body = document.getElementById('contactbody');

    if(isBlank(email.value) || isBlank(body.value)){
        Swal.fire({
            //position: 'top-end',
            icon: 'error',
            title: 'Faltan datos por llenar',
            showConfirmButton: false,
            timer: 1500,
            customClass: {
                popup: 'normal-font-size'
            }
        });
        return false;
    }

    Swal.fire({
        icon: 'success',
        title: 'Gracias',
        text: 'Pronto te responderemos',
        customClass: {
            popup: 'normal-font-size'
        }
    });

    return false;
}
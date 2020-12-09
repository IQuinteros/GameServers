export function showNetError(e){
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
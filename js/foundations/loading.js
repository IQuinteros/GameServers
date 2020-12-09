export function showLoading(title = 'Cargando', text){
    Swal.fire({
        title: title,
        text: text,
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
}
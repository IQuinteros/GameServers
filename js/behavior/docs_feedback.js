export function rateDoc(approved){

    $.ajax({
        url: "/php/responses/docs/update_doc_rate_resp.php",
        type: "post",
        data: `id=${window.currentAsideElement.id}&rate=${approved?'true':'false'}`,
        beforeSend : function(){
            Swal.fire({
                title: 'Enviando',
                text: 'Estamos en enviando tu aporte',
                allowOutsideClick: false,
                showConfirmButton: false,
                customClass: {
                    popup: 'normal-font-size'
                }
            });
        },
        success: function(data){
            Swal.fire({
                icon: 'success',
                title: 'Gracias',
                text: approved? 'Agradecemos tu aporte' : 'Revisaremos el artículo para mejorarlo',
                customClass: {
                    popup: 'normal-font-size'
                }
            });
        },
        error: function(e) {
            Swal.fire({
                icon: 'warning',
                title: 'Hubo un problema de conexión',
                text: 'Por favor intente más tarde',
                
                customClass: {
                    popup: 'normal-font-size'
                }
            });
        }          
    });
}

export function toggleAsideDoc(elem){
    const docsAside = document.getElementById('docs-aside');
    docsAside.classList.toggle('open');

    if(docsAside.classList.contains('open')){
        elem.classList.add('open');
    }
    else{
        elem.classList.remove('open');
    }
}
export function rateDoc(approved){

    Swal.fire({
        icon: 'success',
        title: 'Gracias',
        text: approved? 'Agradecemos tu aporte' : 'Revisaremos el artículo para mejorarlo',
        customClass: {
            popup: 'normal-font-size'
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
import * as error from '../foundations/error.js';
import * as loading from '../foundations/loading.js';
import { openPopUp } from './popup.js';

function addEconomy(form, event){
    $.ajax({
        url: "/php/responses/economy/add_economy_project_resp.php",
        type: "post",
        data:  new FormData(form),
        processData: false,
        contentType: false,
        beforeSend : function(){
            loading.showLoading('Añadiendo ítem de economía');
        },
        success: function(data){
            console.log(data);
            if(!data.Error){
                Swal.fire({
                    icon: 'success',
                    title: 'Ítem añadido exitósamente',
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
                    title: 'No se ha podido añadir el ítem',
                    text: 'Algo ha salido mal. Por favor revisa lo ingresado e intenta nuevamente',
                    
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

function editEconomy(form, event){
    $.ajax({
        url: "/php/responses/economy/update_economy_project_resp.php",
        type: "post",
        data:  new FormData(form),
        processData: false,
        contentType: false,
        beforeSend : function(){
            loading.showLoading('Actualizando ítem de economía');
        },
        success: function(data){
            console.log(data);
            if(!data.Error){
                Swal.fire({
                    icon: 'success',
                    title: 'Ítem actualizado exitósamente',
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
                    title: 'No se ha podido actualizar el ítem',
                    text: 'Algo ha salido mal. Por favor revisa lo ingresado e intenta nuevamente',
                    
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

export function economySubmit(form, event){
    if(window.editMode){
        editEconomy(form, event);
    }else{
        addEconomy(form, event);
    }
}

export function onEconomySubmit(form, event){

    event.preventDefault();

    economySubmit(form, event);

    return false;
}

export async function onDeleteEconomy(selected){
    if(selected.length <= 0){
        Swal.fire({
            icon: 'warning',
            title: 'Eliminar ítems',
            text: `No tienes ítems por eliminar`,
            customClass: {
                popup: 'normal-font-size'
            }
        });
        return;
    }

    Swal.fire({
        icon: 'warning',
        title: 'Eliminar ítems',
        text: `Vas a eliminar ${selected.length} ítems`,
        showCancelButton: true,
        confirmButtonText: `Eliminar ítems`,
        confirmButtonColor: '#C92020',
        customClass: {
            popup: 'normal-font-size'
        }
    }).then((result) => {
        if (result.isConfirmed) {

            // Parse selected items
            let dataToSend = '';
            for(let i = 0; i < selected.length; i++){
                dataToSend = dataToSend + `items%5B${i}%5D=${selected[i].id}`;

                if(!(i >= selected.length - 1)){
                    dataToSend = dataToSend + '&';
                }
            }

            $.ajax({
                url: "/php/responses/economy/delete_economy_project_resp.php",
                type: "post",
                data: dataToSend,
                beforeSend : function(){
                    loading.showLoading('Eliminando ítems');
                },
                success: function(data){
                    if(data.result){
                        Swal.fire({
                            icon: 'success',
                            title: 'Ítems eliminados satisfactoriamente',
                            text: `${selected.length} ítems fueron eliminados`,
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
                            title: 'Hubo un problema',
                            text: data.Error,
                            
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
    });
}

export function onNewEconomy(id, name, initial, max){
    const title = document.getElementById('popup-title');
    const text = document.getElementById('popup-text');

    title.textContent = 'Añadir elemento';
    text.textContent = 'Añade un nuevo ítem de economía';

    // Set inputs
    const inputId = document.getElementById('id');
    const inputName = document.getElementById('name');
    const inputInitial = document.getElementById('initial');
    const inputMax = document.getElementById('max');

    inputId.value = '';
    inputName.value = '';
    inputInitial.value = '';
    inputMax.value = '';

    window.editMode = false;

    openPopUp();
}

export function editElement(id, name, initial, max){
    const title = document.getElementById('popup-title');
    const text = document.getElementById('popup-text');

    title.textContent = 'Editar elemento';
    text.textContent = 'Edita un elemento de economía';

    // Set inputs
    const inputId = document.getElementById('id');
    const inputName = document.getElementById('name');
    const inputInitial = document.getElementById('initial');
    const inputMax = document.getElementById('max');

    inputId.value = id;
    inputName.value = name;
    inputInitial.value = initial;
    inputMax.value = max;

    window.editMode = true;

    openPopUp();
}
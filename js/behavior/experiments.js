import * as error from '../foundations/error.js';
import * as loading from '../foundations/loading.js';
import { openPopUp } from './popup.js';

function ajaxAddExperiment(form, event){
    $.ajax({
        url: "/php/responses/experiments/add_experiment_project_resp.php",
        type: "post",
        data:  new FormData(form),
        processData: false,
        contentType: false,
        beforeSend : function(){
            loading.showLoading('Añadiendo experimento');
        },
        success: function(data){
            console.log(data);
            if(!data.Error){
                Swal.fire({
                    icon: 'success',
                    title: 'Experimento añadido exitósamente',
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
                    title: 'No se ha podido añadir el experimento',
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

function ajaxEditExperiment(form, event){
    $.ajax({
        url: "/php/responses/experiments/update_experiment_project_resp.php",
        type: "post",
        data:  new FormData(form),
        processData: false,
        contentType: false,
        beforeSend : function(){
            loading.showLoading('Actualizando experimento');
        },
        success: function(data){
            console.log(data);
            if(!data.Error){
                Swal.fire({
                    icon: 'success',
                    title: 'Experimento actualizado exitósamente',
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

function experimentSubmit(form, event){
    if(window.editMode){
        ajaxEditExperiment(form, event);
    }else{
        ajaxAddExperiment(form, event);
    }
}

export function onExperimentSubmit(form, event){

    event.preventDefault();

    experimentSubmit(form, event);

    return false;
}

export async function onDeleteExperiment(selected){
    if(selected.length <= 0){
        Swal.fire({
            icon: 'warning',
            title: 'Eliminar experimentos',
            text: `No tienes experimentos por eliminar`,
            customClass: {
                popup: 'normal-font-size'
            }
        });
        return;
    }

    Swal.fire({
        icon: 'warning',
        title: 'Eliminar experimentos',
        text: `Vas a eliminar ${selected.length} experimentos`,
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
                url: "/php/responses/experiments/delete_experiment_project_resp.php",
                type: "post",
                data: dataToSend,
                beforeSend : function(){
                    loading.showLoading('Eliminando experimentos');
                },
                success: function(data){
                    if(data.result){
                        Swal.fire({
                            icon: 'success',
                            title: 'Experimentos eliminados satisfactoriamente',
                            text: `${selected.length} experimentos fueron eliminados`,
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

export function onNewExperiment(id, name, description){
    const title = document.getElementById('popup-title');
    const text = document.getElementById('popup-text');

    title.textContent = 'Añadir experimento';
    text.textContent = 'Añade un nuevo experimento';

    // Set inputs
    const inputId = document.getElementById('id');
    const inputName = document.getElementById('name');
    const inputDescription = document.getElementById('description');

    inputId.value = '';
    inputName.value = '';
    inputDescription.value = '';

    window.editMode = false;

    openPopUp();
}

export function editExperiment(id){
    const title = document.getElementById('popup-title');
    const text = document.getElementById('popup-text');

    title.textContent = 'Editar experimento';
    text.textContent = 'Edita un elemento de experimento';

    // Set inputs
    const inputId = document.getElementById('id');
    const inputName = document.getElementById('name');
    const inputDescription = document.getElementById('description');

    const getData = window.loadedData.find(elem => elem.id == id);

    inputId.value = id;
    inputName.value = getData.name;
    inputDescription.value = getData.description;

    window.editMode = true;

    openPopUp();
}
import * as error from '../foundations/error.js';
import * as loading from '../foundations/loading.js';
import { openPopUp } from './popup.js';



function ajaxEditPlan(form, event){
    $.ajax({
        url: "/php/responses/plans/update_plan_resp.php",
        type: "post",
        data:  new FormData(form),
        processData: false,
        contentType: false,
        beforeSend : function(){
            loading.showLoading('Actualizando plan');
        },
        success: function(data){
            console.log(data);
            if(!data.Error){
                Swal.fire({
                    icon: 'success',
                    title: 'Plan actualizado exitósamente',
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
                    title: 'No se ha podido actualizar el plan',
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

function planSubmit(form, event){
    ajaxEditPlan(form, event);
}

export function onPlanSubmit(form, event){

    event.preventDefault();

    planSubmit(form, event);

    return false;
}

export function editPlan(id){

    const getData = window.loadedData.find(elem => elem.id == id);

    // Set inputs
    const inputId = document.getElementById('id');
    const inputName = document.getElementById('name');
    const inputDescription = document.getElementById('description');
    const inputPrice = document.getElementById('price');

    inputId.value = id;
    inputName.value = getData.name;
    inputDescription.value = getData.detail;
    inputPrice.value = getData.price;

    openPopUp();
}

export function displayPlanInfo(id){   

    const getData = window.loadedData.find(elem => elem.id == id);

    Swal.fire({
        icon: 'info',
        title: getData.name,
        html: `<br><b>Email de cliente:</b> ${getData.userEmail} <br><br>` + 
            `<b>Plan:</b> ${getData.planName} <br><br>` +
            `<b>Jugadores estimados:</b> ${getData.estimatedPlayers} <br><br>` +
            `<b>Cantidad de equipo:</b> ${getData.teamQuantity} <br><br>` +
            `<b>Región:</b> ${getData.region} <br><br>` +
            `<b>Fecha de registro:</b> ${getData.registerDate} <br><br>` +
            `<b>Estado:</b> ${getData.status} <br><br>`,
        customClass: {
            popup: 'normal-font-size',
            image: 'circle-image box-shadow'
        }
    });
}

export function setPlanStatus(selected, newStatus){ 
    const action = newStatus === 'inactive'? 'Desactivar' : 'Activar';
    const minAction = action.toLowerCase();
    
    if(selected.length <= 0){
        Swal.fire({
            icon: 'warning',
            title: `${action} planes`,
            text: `No tienes ítems por ${minAction}`,
            customClass: {
                popup: 'normal-font-size'
            }
        });
        return;
    }

    Swal.fire({
        icon: 'warning',
        title: `${action} planes`,
        text: `Vas a ${minAction} ${selected.length} planes`,
        showCancelButton: true,
        confirmButtonText: `${action} planes`,
        confirmButtonColor: newStatus === 'inactive'? '#C92020' : '#3085d6',
        customClass: {
            popup: 'normal-font-size'
        }
    }).then((result) => {
        if (result.isConfirmed) {

            // Parse selected items
            let dataToSend = `status=${newStatus}&`;
            for(let i = 0; i < selected.length; i++){
                dataToSend = dataToSend + `items%5B${i}%5D=${selected[i].id}`;

                if(!(i >= selected.length - 1)){
                    dataToSend = dataToSend + '&';
                }
            }

            $.ajax({
                url: "/php/responses/project/update_projects_status.php",
                type: "post",
                data: dataToSend,
                beforeSend : function(){
                    loading.showLoading(`${action.replace('r', 'ndo')} planes`);
                },
                success: function(data){
                    if(data.result){
                        Swal.fire({
                            icon: 'success',
                            title: `Planes ${minAction.replace('r', 'dos')} satisfactoriamente`,
                            text: `${selected.length} planes fueron ${minAction.replace('r', 'dos')}`,
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